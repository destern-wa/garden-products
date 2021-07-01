<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $validationRules = [
        "name" => "required|string|max:32",
        "description" => "max:255",
        "uploadFile" => "image|mimes:jpg,png,jpeg,gif,svg|max:2048"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        // Basic validation
        $this->validate($request, $this->validationRules);

        // If parent category is specified, validate it exists in the database table
        if ($request->get("parent_category_id")) {
            $this->validate($request, [
                "parent_category_id" => "exists:categories,id",
            ]);
        }

        // Get all data from the request, and generate a slug
        $data = $request->all();
        $data['slug'] = $this->slugify($request->get('name'), 40);
        // Check if slug is already used
        if (Category::where('slug', $data['slug'])->first()) {
            // prepend with timestamp to make it unique
            $data['slug'] = $this->slugify(time() . "-" . $request->get('name'), 40);
        }

        // If a file was uploaded, put it in the public/images folder under a timestamped name
        if ($request->hasFile('uploadFile')) {
            $fileName = time().'_'.$request->file('uploadFile')->getClientOriginalName();
            $request->file('uploadFile')->move(public_path('images'), $fileName);
            $data['picture'] = $fileName;
        }

        $category = Category::create($data);

        return response()->json($category, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return JsonResponse
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Category  $category
     * @return JsonResponse
     */
    public function update(Request $request, Category $category)
    {
        // Basic validation
        $this->validate($request, $this->validationRules);

        // If parent category is specified, validate it exists in the database table
        if ($request->get("parent_category_id")) {
            $this->validate($request, [
                "parent_category_id" => "exists:categories,id",
            ]);
        }

        // Get all data from the request, and generate a slug
        $data = $request->all();
        $data['slug'] = $this->slugify($request->get('name'), 40);
        // Check if slug is already used
        if (Category::where('id', '<>', $category->id)->where('slug', $data['slug'])->first()) {
            // prepend with id to make it unique
            $data['slug'] = $this->slugify($category->id . "-" . $request->get('name'), 40);
        }

        // If a file was uploaded, put it in the public/images folder under a timestamped name
        if ($request->hasFile('uploadFile')) {
            $fileName = time().'_'.$request->file('uploadFile')->getClientOriginalName();
            $request->file('uploadFile')->move(public_path('images'), $fileName);
            $data['picture'] = $fileName;
        }

        $updated = $category->update($data);

        return response()->json(compact('updated', 'category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'create' => false,
            'category' => $category,
            'allCategories' => Category::where('id', '<>', $category->id)->get(),
            'form' => [
                'method' => 'PUT',
                'action' => route('categories.update', $category)
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Category $category)
    {
        // Basic validation
        $this->validate($request, [
            "name" => "required|string|max:32",
            "description" => "string|max:255",
            "uploadFile" => "image|mimes:jpg,png,jpeg,gif,svg|max:2048"
        ]);

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

        $category->update($data);

        return redirect(route("categories.show", $category));
    }

    /**
     * Show the form to confirm deleting the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

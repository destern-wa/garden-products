<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * @var string[] Rules for validating store/update requests
     */
    protected $validationRules = [
        'name' => 'required|max:64',
        'description' => 'max:255',
        'price' => 'required|numeric|min:0',
        'pricing_unit' => 'max:16',
        'category_id' => 'required|min:0|exists:categories,id',
        'picture' => 'max:255',
        "uploadFile" => "image|mimes:jpg,png,jpeg,gif,svg|max:2048"
    ];

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);

        // Get all data from the request, and generate a slug
        $data = $request->all();
        $data['slug'] = $this->slugify($request->get('name'), 72);
        // Check if slug is already used
        if (Product::where('slug', $data['slug'])->first()) {
            // prepend with timestamp to make it unique
            $data['slug'] = $this->slugify(time() . "-" . $request->get('name'), 72);
        }
        // available needs to be a boolean instead of a string
        $data['available'] = $request->boolean('available');

        // If a file was uploaded, put it in the public/images folder under a timestamped name
        if ($request->hasFile('uploadFile')) {
            $fileName = time().'_'.$request->file('uploadFile')->getClientOriginalName();
            $request->file('uploadFile')->move(public_path('images'), $fileName);
            $data['picture'] = $fileName;
        }

        $product = Product::create($data);

        return response()->json($product, JsonResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, $this->validationRules);

        // Get all data from the request, and generate a slug
        $data = $request->all();
        $data['slug'] = $this->slugify($request->get('name'), 72);
        // Check if slug is already used
        if (Product::where('id', '<>', $product->id)->where('slug', $data['slug'])->first()) {
            // prepend with id to make it unique
            $data['slug'] = $this->slugify($product->id . "-" . $request->get('name'), 72);
        }
        // available needs to be a boolean instead of a string
        $data['available'] = $request->boolean('available');

        // If a file was uploaded, put it in the public/images folder under a timestamped name
        if ($request->hasFile('uploadFile')) {
            $fileName = time().'_'.$request->file('uploadFile')->getClientOriginalName();
            $request->file('uploadFile')->move(public_path('images'), $fileName);
            $data['picture'] = $fileName;
        }

        $updated = $product->update($data);

        return response()->json(compact('updated', 'product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, JsonResponse::HTTP_NO_CONTENT);
    }
}

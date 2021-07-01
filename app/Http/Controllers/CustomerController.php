<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Shows the customer home page
     *
     * @return View
     */
    public function home() {
        $categories = Category::whereNull('parent_category_id')->get();
        return view('customer.home', compact('categories'));
    }

    /**
     * Shows the products page, retrieving relevant products from the database
     *
     * @param Request $request
     * @return View
     */
    public function products(Request $request) {
        // Start building the products query
        $products = Product::orderBy('name');
        // If search query was specified, filter to matching products
        if ($request->query->has('q')) {
            $products = $products->where('name', 'like', '%' . $request->query('q') . '%');
        }
        // If a category was specified, limit the products to those in that category (or it's subcategories)
        if ($request->query->has('category')) {
            $category = Category::where('slug', $request->query('category'))->firstOrFail();
            $categoryIds = array_merge([ $category->id ], $category->subcats->modelKeys());
            $products = $products->wherein('category_id', $categoryIds);
        }
        // Execute the query
        $products = $products->get();

        // Get top-level categories
        $categories = Category::whereNull('parent_category_id')->orderBy('name')->get();

        // Pass the user selections (query values) back
        $selected = [
            'category' => $request->query('category'),
            'search' => $request->query('q')
        ];
        return view('customer.products', compact('products', 'categories', 'selected'));
    }
}

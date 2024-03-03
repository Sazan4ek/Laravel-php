<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFilterRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource in necessary order
     */
    public function index(ProductFilterRequest $request)
    {
        $price = $request->validated('price');
        $category = $request->validated('category');
        $vendor = $request->validated('vendor');

        $need = [];

        if($price)
        {
            $need['buyPrice'] = $price;
        }
        if($category)
        {
            $need['productLine'] = $category;
        }
        if($vendor)
        {
            $need['productVendor'] = $vendor; 
        }

        if($need)
        {
            $products = Product::where($need)->get();
        }
        else $products = Product::all();

        return response()->json($products);
    }

}

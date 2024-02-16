<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource in necessary order
     */
    public function index(Request $request)
    {
        $price = $request->query('price');
        $category = $request->query('category');
        $vendor = $request->query('vendor');

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

        dd($products);
    }

}

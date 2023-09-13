<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function Laravel\Prompts\select;
use function Symfony\Component\String\b;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function newProduct(ProductRequest $request)
    {
        //1)create new product
        $product = Product::create($request->toArray());

        //2)giv product's categories
        $categories = $request->categories;

        //3)attaching categories for product
        $categorySync = [];
        foreach ($categories as $category){
            $categorySync[] = $category;
        }
            $product->categories()->attach($categorySync);

        return response()->json($product);
    }


    public function productsList(string $id = null)
    {
        if ($id) {
            $products = Product::find($id);
        }
        else {
            $products = Product::with('categories:id,name')->get();
        }
        return response()->json($products);
    }


    public function delete(string $id)
    {
        Product::destroy($id);
        return response()->json([
            'message'=>'Went To Fucking Hell!',
            'status'=>200
        ]);
    }


    public function update(Request $request , string $id)
    {
        $product = Product::find($id);
        $product->update($request->except(['_method', '_token']));

        $categories = $request->categories;
        $categorySync = [];
        foreach ($categories as $category){
            $categorySync[] = $category;
        }
            $product->categories()->sync($categorySync);

        return response()->json($product);
    }
}

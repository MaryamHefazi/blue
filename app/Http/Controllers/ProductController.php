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
    public function displayNewProductPage()
    {

        $categorry = Category::select(['id', 'name'])->get();
        return view('products.newProduct', ['categories' => $categorry]);
    }


    public function addProduct(ProductRequest $request)
    {
        //1)create new product
        $product = Product::create($request->toArray());

        //2)giv product's categories via relation function
        $categories = $request->categories;

        //3)attaching categories for product
        foreach ($categories as $category){
            $product->categories()->attach($category);
        }

        return redirect()->route('productList');
    }


    public function productList()
    {

        $product = Product::with('categories')->get();
        return view('products.productsList', ['products' => $product]);
    }


    public function delete($id)
    {

        Product::destroy($id);
        return back();
    }


    public function displayEditProductPage($id)
    {

        $product = Product::find($id);
        $categories = Category::select(['id', 'name'])->get();
        $selectedCategories = $product->categories()->pluck('id')->toArray();
        return view('products.editProduct', compact('product' , 'selectedCategories' , 'categories'));
    }


    public function edit(ProductRequest $request, $id)
    {
        Product::find($id)->update($request->except(['_method', '_token']));
        $product = Product::find($id);
        $categories = $request->categories;
        foreach ($categories as $category){
            $product->categories()->attach($category);
        }

        return redirect()->route('productList');
    }
}

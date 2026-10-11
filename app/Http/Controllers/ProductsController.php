<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(Request $request){
        $products = Product::all();
        
        return view('products.index', ['products' => $products]);
    }

    public function myProducts(){
        $products = Auth::user()->products;
        return view('products.my-products', ['products' => $products]);
    }

    public function show(Product $product){

        return view('products.show', ['product' => $product]);

    }

    public function create(){
        return view('products.create');
    }
    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp',
            'description' => 'required|string|min:3|max:1000',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'category' => 'required|string',

        ]);
        $imagePath = null;
        if($request->hasfile('image')){
        $imagePath = $request->file('image')->store('products', 'public');
        }
        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->name;
        $product->image = $imagePath;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->save();
        return redirect()->route('products.index');
    }

    public function edit(Product $product){
        if(Auth::user()->id != $product->user_id){
            return "erro 404";
        }
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'description' => 'required|string|min:3|max:1000',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'category' => 'required|string'
        ]);
        
        
        
        if($request->hasfile('image')){
            
            Storage::disk('public')->delete($product->image);    
            $product->image = $request->file('image')->store('products', 'public');
            
        }

        
        
            $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantidy' => $request->quantity,
            'category' => $request->category

        ]);

        return redirect()->route('products.index')->with('sucess', 'product updated sucessfully');
    }
    public function destroy(Product $product){
        
        $product->delete();
        return redirect()->route('products.index');
    }
}

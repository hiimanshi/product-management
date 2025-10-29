<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->get();
        return view('index', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ], [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a valid string.',
            'name.max' => 'The product name must not exceed 255 characters.',
            
            'description.string' => 'The description must be a valid text.',

            'price.required' => 'Please enter the product price.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price cannot be negative.',

            'stock.required' => 'Please enter the stock quantity.',
            'stock.integer' => 'The stock must be a whole number.',
            'stock.min' => 'Stock cannot be negative.',
        ]);

        Product::create($data);
        return redirect('/products')->with('success','Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ], [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a valid string.',
            'name.max' => 'The product name must not exceed 255 characters.',
            
            'description.string' => 'The description must be a valid text.',

            'price.required' => 'Please enter the product price.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price cannot be negative.',

            'stock.required' => 'Please enter the stock quantity.',
            'stock.integer' => 'The stock must be a whole number.',
            'stock.min' => 'Stock cannot be negative.',
        ]);

        $product->update($data);
        return redirect('/products')->with('success','Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products')->with('success','Product deleted successfully!');
    }
}

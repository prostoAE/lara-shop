<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::orderByDesc('id')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'nullable',
            'description' => 'required',
            'product_thumbnail' => 'nullable|image',
            'category_id' => 'nullable',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'tags' => 'nullable',
            'gallery' => 'nullable',
            'quantity' => 'required|numeric',
            'stock_status' => 'required'
        ]);

        $product = new Product($request->all());
        $product->slug = Str::slug($request->get('name'), '-');
        $product->save();

        Gallery::addThumbnail($request->allFiles(), $product->id);
        foreach ($request->allFiles() as $File) {
            Gallery::add($File, $product->id);
        }

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        $categories = Category::all();
        $product_image = $product->images()->where('main_thumb', '=', 1)->first();
        return view('admin.product.edit', compact('product', 'categories', 'product_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Product $product) {

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'nullable',
            'description' => 'required',
            'product_thumbnail' => 'nullable|image',
            'category_id' => 'nullable',
            'regular_price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'tags' => 'nullable',
            'gallery' => 'nullable',
            'quantity' => 'required|numeric',
            'stock_status' => 'required'
        ]);

        $product->edit($request->all());

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(Product $product) {
        $product->deleteOrFail();

        foreach ($product->images as $image) {
            $image->removeImage();
            $image->deleteOrFail();
        }

        return redirect()->back();
    }
}

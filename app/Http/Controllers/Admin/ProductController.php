<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddProductRequest;
use App\Http\Controllers\Controller;
use App\Entities\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(AddProductRequest $r)
    {
        $input = $r->only([
            'category_id',
            'sku',
            'name',
            'price',
            'quantity',
            'featured',
            'detail',
            'description'
        ]);
        //xu ly anh
        if ($r->hasFile('img')) {
            $imgName = uniqid('vietprok88') . "." . $r->img->getClientOriginalExtension();
            $destinationDir = public_path('files/images/products/');
            $r->img->move($destinationDir, $imgName);
            $input['avatar'] = asset("files/images/products/{$imgName}");
        }


        $product = Product::create($input);
        return redirect("/admin/product/{$product->id}/edit");
    }

    public function edit(Product $product)
    {
        // $product = Product::findOrFail($product);
       return view('admin.product.edit', compact('product'));
    }

    public function update(AddProductRequest $r, $product)
    {
        $input = $r->only([
            'category_id',
            'sku',
            'name',
            'price',
            'quantity',
            'featured',
            'detail',
            'description'
        ]);
        if ($r->hasFile('img')) {
            $imgName = uniqid('vietprok88') . "." . $r->img->getClientOriginalExtension();
            $destinationDir = public_path('files/images/products/');
            $r->img->move($destinationDir, $imgName);
            $input['avatar'] = asset("files/images/products/{$imgName}");
        }
        $product = Product::findOrFail($product);
        $product->fill($input);
        $product->save();
        return back();
    }

    public function destroy($product)
    {
        $deleted = Product::destroy($product);
        if ($deleted) {
            return response()->json([], 204);
        }
        return response()->json(['message' => "Sản phẩm cần xoá không tồn tại."], 404);
    }
}

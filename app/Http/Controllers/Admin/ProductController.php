<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store()
    {
        //
    }

    public function edit()
    {
       return view('admin.product.edit');
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}

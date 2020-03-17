<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(AddCategoryRequest $r)
    {
        //
    }

    public function edit()
    {
        return view('admin.category.edit');
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

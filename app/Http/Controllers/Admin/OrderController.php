<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
    }

    public function processed()
    {
        return view('admin.order.processed');
    }

    public function edit()
    {
        return view('admin.order.edit');
    }

    public function update()
    {
        //
    }
}

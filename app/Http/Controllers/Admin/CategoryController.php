<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Controllers\Controller;
use Dotenv\Regex\Result;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class CategoryController extends Controller
{
    public function index(){
        // $client = new Client([
        //     // Base URI is used with relative requests
        //     'base_uri' => 'http://127.0.0.1:9999/api/',
        //     // You can set any number of default request options.
        // ]);
        // $reponse = $client->request('GET', 'name');
        // print_r($reponse->getBody()->getContents());
        $categories = Category::get();
        debugbar()->info($categories);

        // if ($request->wantsJson()) {
        //     $client = new \GuzzleHttp\Client();
        //     $res = $client->request('GET', 'https://api.github.com/users/l3lackheart');
        //     return response()->json([
        //         'name' => json_decode($res->getBody()->getContents())
        //     ]);
        // }

        $categories = $this->getSubCategories(0);
        //  foreach ($categories as $category ) {
        //      $category->sub = Category::whereParentId($category->id)->get();
        //  }
        //  print_r($categories->toArray());die;
        return view('admin.category.index',compact('categories'));
    }

    private function getSubCategories($parentId,$ignoreId=null)
    {
        $categories = Category::whereParentId($parentId)
        ->where('id','<>',$ignoreId)
        ->get();
        $categories->map(function($category) use($ignoreId){ // Đệ quy dừng khi $categories = NULL
            $category->sub = $this->getSubCategories($category->id,$ignoreId);
            // print_r($categories->toArray());
            return $category;
        });
        return $categories;
    }

    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.category.create',compact('categories'));
    }

    public function store(AddCategoryRequest $r)
    {
        $category = new Category();
        $category->name = $r->name;
        $category->parent_id = $r->parent_id;
        $category->save();
        session()->flash('success','Tạo mới thành công');
        return redirect('/admin/category');
    }

    public function edit($id)
    {
        $categories = $this->getSubCategories(0, $id);
        $category = Category::findOrfail($id);
        return view('admin.category.edit', compact('category','categories'));
    }

    public function update(AddCategoryRequest $r, $category)
    {
        $input = $r->only([
            'name',
            'parent_id'
        ]);
        $category = Category::findOrFail($category);
        $category->fill($input);
        $category->save();
        return redirect('/admin/category')->with('success','Đã cập nhật');
    }

    public function destroy($category)
    {
        $deleted = Category::destroy($category);
        if ($deleted) {
            return response()->json([], 204);
        }
        return response()->json(['message' => "Sản phẩm cần xoá không tồn tại."], 404);
    }

}

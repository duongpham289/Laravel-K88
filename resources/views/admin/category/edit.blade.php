@extends('admin.layouts.app', ['title' => 'Danh mục', 'activePage' => 'categories'])
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Icons</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý danh mục</h1>
        </div>
    </div>
    <!--/.row-->
@if ($errors->any())
<div class="alert alert-danger">
    {{$errors->first()}}
</div>

@endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form action="/admin/category/{{ $category->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col-md-7">

                            {{-- @component('admin.layouts.components.alert')
                            @slot('type', 'success')
                            @slot('stroke', 'checkmark')
                            Sửa danh mục thành công!
                            @endcomponent

                            @component('admin.layouts.components.alert')
                            @slot('type', 'danger')
                            @slot('stroke', 'cancel')
                            Danh mục đã tồn tại!
                            @endcomponent --}}
                            <div class="form-group">
                                <label for="">Danh mục cha:</label>
                                <select class="form-control" name="parent">
                                    <option>---ROOT---</option>
                                    @include('admin.category.option',['level' =>0])
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tên Danh mục</label>
                                <input type="text" class="form-control" name="name" placeholder="Tên danh mục mới"
                                    value="{{ $category->name }}">
                            </div>

                            <button class="btn btn-primary">Sửa danh mục</button>
                        <br/>
                        @foreach($category->products()->get() as $item)
                            {{$item->name}}
                        @endforeach
                        </div>
                    </div>
                    </form>
                </div>
            </div>



        </div>
        <!--/.col-->


    </div>
    <!--/.row-->
</div>
<!--/.main-->
@endsection

@extends('admin.layouts.app', ['activePage' => 'categories', 'title' => 'Danh mục'])
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Danh mục</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý danh mục</h1>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success"> {{ session()->get('success') }}</div>
    @endif
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-7">

                            <a href="/admin/category/create" class="btn btn-primary">Thêm danh mục</a>
                            <br/>

                            <br/>
                            <h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
                            <br/>
                            <div class="vertical-menu">
                                <div class="item-menu active">Danh mục </div>


                               @include('admin.category.row', ['level' => 0 ])


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->


    </div>
    <!--/.row-->
</div>
@endsection
@push('adminJs')
<script>
    $(document).ready(function(){
        $(".btn-destroy").on("click", function(e) {
            e.preventDefault()
            if(confirm("Bạn có chắc?")){
                $.ajax({
                    url: $(this).attr('href'),
                    method:"POST",
                    data:{
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function(){
                        window.location.reload()
                    }
                })
            }
        })
    })
</script>

@endpush

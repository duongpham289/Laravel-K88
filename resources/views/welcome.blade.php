@extends('admin.layouts.app', ['activePage' => 'users', 'title' => 'Danh sách Chuyến bay'])

@section('content')
	<!--main-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">Danh sách Chuyến bay</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách Chuyến bay</h1>
			</div>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								{{-- <div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>Đã thêm thành công<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div> --}}
								{{-- <a href="/admin/users/create" class="btn btn-primary">Thêm Thành viên</a> --}}
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											{{-- <th>ID</th> --}}
											<th>From</th>
											<th>To</th>
											<th>Price</th>
                                            <th>Airlines</th>
                                            <th>Depature Time</th>
											{{-- <th width='18%'>Tùy chọn</th> --}}
										</tr>
									</thead>
									<tbody>
                                        @foreach ($flight as $flight)

                                        <tr>
											<td>{{ $flight->from }}</td>
											<td>{{ $flight->to }}</td>
											<td>{{ $flight->price }}</td>
											<td>{{ $flight->airline }}</td>
                                            <td>{{ $flight->depature_time}}</td>
                                        {{-- <td>{{$user->roles->pluck('name')->implode(', ') ?? ''}}</td> --}}
											{{-- <td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td> --}}
                                        </tr>
                                        @endforeach

                                        {{-- <tr>
											<td>1</td>
											<td>Admin@gmail.com</td>
											<td>Nguyễn thế phúc</td>
											<td>Thường tín</td>
                                            <td>0356653300</td>
                                            <td>1</td>
											<td>
												<a href="#" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr> --}}

									</tbody>
								</table>
								<div align='right'>
									<ul class="pagination">
										<li class="page-item"><a class="page-link" href="#">Trở lại</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">tiếp theo</a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
			<!--end main-->

@endsection




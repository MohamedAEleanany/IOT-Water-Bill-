@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">قسم العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافه عميل</span>
						</div>
					</div>
				
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">

							@if (session('success'))
								<div class="alert alert-success">{{session('success')}}</div>
							@endif

							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافه عميل</a>
										
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">id</th>
												<th class="wd-15p border-bottom-0">اسم عميل</th>
												<th class="wd-20p border-bottom-0">رقم العداد</th>
												<th class="wd-20p border-bottom-0">الرقم القومي</th>
												<th class="wd-20p border-bottom-0"> العنوان</th>
												

											</tr>
										</thead>
										<tbody>
											<?php $i=0?>
											@foreach($client as $gets)
											<?php $i++?>
											<tr> 
												<td> {{$i}}</td>
												<td> {{$gets->name}}</td>
												<td> {{$gets->serial_id}}</td>
												<td> {{$gets->national_id}}</td>
												<td> {{$gets->address}}</td>
												<td>
													
													<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $gets->id }}">
													تعديل
													  </button>
											
	
											
													  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $gets->id }}">
														حذف
														  </button>

												</td>
											
											</tr>

											<div class="modal fade" id="edit{{ $gets->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
													aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">تعديل بيانات العميل</h5>
																<button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body ">
											
																<form action="{{route('client.update', ['client' => $gets->id])}}" method="post" autocomplete="off">
																	{{ method_field('put') }}
																	{{ csrf_field() }}
																	<div class="form-group">
																		{{-- <input type="hidden" name="id" id="id" value=""> --}}
																		<label for="recipient-name" class="col-form-label">اسم العميل:</label>
																		<input class="form-control" name="name" id="name" value="{{ $gets->name }}" type="text">
																	</div>
																	<div class="form-group">
																		{{-- <input type="hidden" name="id" id="id" value=""> --}}
																		<label for="recipient-name" class="col-form-label">اسم العميل:</label>
																		<input class="form-control" name="serial_id" value="{{ $gets->serial_id }}" id="serial_id" type="number">
																	</div>
																	<div class="form-group">
																		{{-- <input type="hidden" name="national_id" id="national_id" value=""> --}}
																		<label for="recipient-name" class="col-form-label">اسم العميل:</label>
																		<input class="form-control" name="national_id" value="{{ $gets->national_id }}" id="national_id" type="text">
																	</div>
																	<div class="form-group">
																		{{-- <input type="hidden" name="id" id="id" value=""> --}}
																		<label for="recipient-name" class="col-form-label">اسم العميل:</label>
																		<input class="form-control" name="address" id="address" value="{{ $gets->address }}" type="text">
																	</div>
																	
															</div>
															<div class="modal-footer">
																<button type="submit" class="btn btn-primary">تاكيد</button>
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
															</div>
															</form>
														</div>
													</div>
												</div>
												<div class="modal" id="delete{{ $gets->id }}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close"  data-bs-dismiss="modal"
																	type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('client.destroy', ['client' => $gets->id]) }}" method="post">
																{{ method_field('delete') }}
																{{ csrf_field() }}
																<div class="modal-body">
																	<p>هل انت متاكد من حذف العداد ؟</p><br>
																	<input class="form-control" name="serial_id" value="{{ $gets->serial_id }}" type="text" readonly>
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary">تاكيد</button>
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
																</div>
														</div>
														</form>
													</div>
												</div>
											
										
											@endforeach
								
						
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
					
				</div>
				<div class="modal" id="modaldemo8">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">اضافه عميل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="modal-body">
									
									<form action="{{route('client.store')}}" method="post">
							
										@csrf
				
										<div class="form-group">
											<label for="exampleInputEmail1">اسم العميل </label>
											<input type="text" class="form-control" id="name" name="name">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">رقم العداد </label>
											<input type="text" class="form-control" id="serial_id" name="serial_id">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">الرقم القومي </label>
											<input type="text" class="form-control" id="national_id" name="national_id">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">العنوان </label>
											<input type="text" class="form-control" id="address" name="address">
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-success">تاكيد</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
										</div>
									</form>
								</div>
							</div>
	
						</div>
					</div>
				</div>
				

				</div>
				



				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
{{-- <script>
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var serial_id = button.data('serial_id')
        var na = document.getElementById('national_id').value
        var address = button.data('address')
        var modal = $(this)
		console.log(na);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #serial_id').val(serial_id);
        modal.find('.modal-body #national_id').val(national_id);
        modal.find('.modal-body #address').val(address);
     })

</script>
<script>
    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var serial_id = button.data('serial_id')
        var national_id = button.data('national_id')
        var address = button.data('address')
        var modal = $(this)
		modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #serial_id').val(serial_id);
        modal.find('.modal-body #national_id').val(national_id);
        modal.find('.modal-body #address').val(address);
    })

</script> --}}
@endsection
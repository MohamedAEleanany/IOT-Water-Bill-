@extends('layouts.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافه الفاتوره</span>
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
								
								<div class="card-header pb-0">
									<div class="">
										@if (session('success'))
										<div class="alert  alert-success">{{session('success')}}</div>
										@endif
									</div>
									
								</div>
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<a href="{{route('invoice.create')}}" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
											class="fas fa-plus btn-md"></i>&nbsp; اضافة فاتورة</a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table text-md-nowrap" id="example1">
											<thead>
												<tr>
													<th class="wd-15p border-bottom-0">id</th>
													<th class="wd-15p border-bottom-0">رقم الفاتوره</th>
													<th class="wd-20p border-bottom-0">تاريخ الفاتورة</th>
													<th class="wd-15p border-bottom-0">تاريخ الاستحقاق</th>
													<th class="wd-15p border-bottom-0">الشريحه</th>
													<th class="wd-15p border-bottom-0">رقم العداد</th>
													
													<th class="wd-15p border-bottom-0">مبلغ التحصيل </th>
													<th class="wd-10p border-bottom-0">الخصم</th>
													<th class="wd-25p border-bottom-0"> القيمة المضافة</th>
													<th class="wd-25p border-bottom-0"> القيمة المضافة</th>
													<th class="wd-25p border-bottom-0">الاجمالي شامل الضريبه</th>
													<th class="wd-25p border-bottom-0">حاله الفاتوره</th>
													<th class="wd-25p border-bottom-0">ملاحظات</th>
													

												</tr>
											</thead>
											<tbody>
										@php
										$i = 0;
										@endphp
										@foreach ($invoices as $invoice)
											@php
											$i++
											@endphp
                                   	 <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $invoice->invoice_number }} </td>
                                        <td>{{ $invoice->invoice_Date }}</td>
                                        <td>{{ $invoice->Due_date }}</td>
                                       
                                        
                                        <td>{{ $invoice->section->section_name }}</td>
                                        <td>{{$invoice->client->serial_id }}</td>
                                        <td>{{ $invoice->Amount_collection }}</td>
                                        <td>{{ $invoice->Discount }}</td>
                                        <td>{{ $invoice->Rate_VAT }}</td>
                                        <td>{{ $invoice->Value_VAT }}</td>
                                        <td>{{ $invoice->Total  }}</td>
                                        <td>
                                            @if ($invoice->Value_Status == 1)
                                                <span class="text-success">{{ $invoice->Status }}</span>
                                            @elseif($invoice->Value_Status == 2)
                                                <span class="text-danger">{{ $invoice->Status }}</span>
                                            @else
                                                <span class="text-warning">{{ $invoice->Status }}</span>
                                            @endif

                                        </td>

                                        <td>{{ $invoice->note }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                  
                                                        <a class="dropdown-item"
                                                            href="invoice/{{ $invoice->id }}/edit">تعديل
                                                            الفاتورة</a>
                                                   

                                                   
                                                        <form action="{{ route('invoice.destroy',['invoice' =>$invoice->id]) }}" method="post">
															@csrf
															@method('delete')
															<button type="submit" class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}"
                                                            data-toggle="modal" data-target="#delete_invoice"><i
                                                                class="text-danger fas fa-trash-alt"></i>&nbsp;&nbsp;حذف
                                                            الفاتورة</button>
														</form>
                                                   

                                                   
                                                    
                                                   

                                                  

                                                
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
											
							
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!--/div-->
	
					
	
						
	
						
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
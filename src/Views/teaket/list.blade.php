@extends('layouts.'.Auth::user()->type->name)
 
@section('css')
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" 
		href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}" />
@endsection


@section('body')

<!-- start: page -->
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
			</div>
	
			<h2 class="panel-title">Open Tickets</h2>
		</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped mb-none" id="datatable-default">
				<thead>
					<tr>
						<th width="5%">SN</th>
						<th width="25%">Title</th>
						<th width="10%">Department</th>
						<th width="18%">Admin</th>
						<th width="10%">Status</th>
						<th width="10%">Priority</th>
						<th width="17%">Creator</th>
						<th width="5%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($teakets as $teaket)
					<tr class="gradeA">
						<td>{{$loop->iteration}}</td>
						<td>{{$teaket->title}}</td>
						<td>
                            <span class="label label-primary">                            
                                {{config('teaket.category')[$teaket->category_id - 1]['name']}}
                            </span>
                        </td>
						<td>{{$teaket->admin()}}</td>
						<td>
                            <span class="label label-info">
                                {{config('teaket.status')[$teaket->status_id - 1]['name']}}
                            </span>
                        </td>
						<td>
                            <span class="label label-success">
                                {{config('teaket.priority')[$teaket->priority_id - 1]['name']}}
                            </span>
                        </td>
						<td>{{$teaket->user->fullName()}}</td>
						<td>
							<a href="{{route('teaket.show', ['teaket' => $teaket->slug] )}}" 
								class="btn btn-sm btn-success" 
								data-toggle="tooltip" 
                                data-placement="top" 
								title="View details">
								<i class="fa fa-eye"></i>
							</a> &nbsp;
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>

@endsection

@section('js')
		<!-- Specific Page Vendor -->
		<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
		<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
		

		<!-- Examples -->
		<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>

@endsection

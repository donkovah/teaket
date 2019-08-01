@extends('layouts.'.Auth::user()->type->name)
 
@section('css')
	<!-- Vendor CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs3.css')}}" />
@endsection

@section('body')
	<!-- start: page -->
	<div class="row">
		<div class="col-md-12">
			<form 
				action="{{ (null == $teaket) ? route('teaket.store') : 
					route('teaket.update', ['teaket' => $teaket->slug]) }} " 
				method="POST" 
				class="form-horizontal">
				@csrf
				@if(null !== $teaket)
					<input type="hidden" name="_method" value="PUT">
				@endif
				<section class="panel">
					<header class="panel-heading">
						<div class="panel-actions">
							<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
						</div>
						<h2 class="panel-title">Create Ticket</h2>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">Title <span class="required">*</span></label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-comment"></i>
									</span>
									<input 
										type="text" 
										name="title" 
										class="form-control" 
										placeholder="eg.: John Doe" 
										value ="{{ (null == $teaket) ? old('title') : $teaket->title}} " 
										required/>
								</div>
								@if($errors->has('title'))
								<span class="text-danger"> {{$errors->first('title')}}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Description
									<span class="required">*</span>
							</label>
							<div class="col-md-8">
								<textarea 
									id="summernote" 
									class="summernote" 
									name="body"
									data-plugin-summernote 
									data-plugin-options='{ "height": 150, "codemirror": { "theme": "ambiance" } }'
									></textarea>
							</div>
							@if($errors->has('title'))
								<span class="text-danger"> {{$errors->first('body')}}</span>
							@endif
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Priority 
								<span class="required">*</span>
							</label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-bell"></i>
									</span>
									<select 
										class="form-control" 
										required
										name="priority">
										<option selected disabled>Choose one</option>
										@foreach (config('teaket.priority') as $priority)
											<option value="{{$priority['id']}}">
												{{$priority['name']}}
											</option>
										@endforeach
									</select>
								</div>
								@if($errors->has('priority'))
								<span class="text-danger"> {{$errors->first('priority')}}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Category <span class="required">*</span></label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-list"></i>
									</span>
									<select 
										class="form-control" 
										required
										id="ticketCategory"
										name="category">
										<option selected disabled>Choose one</option>
										@foreach (config('teaket.category') as $category)
											<option value="{{$category['id']}}">
												{{$category['name']}}
											</option>
										@endforeach
									</select>
								</div>
								@if($errors->has('category'))
								<span class="text-danger"> {{$errors->first('category')}}</span>
								@endif
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Admin <span class="required">*</span></label>
							<div class="col-sm-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select 
										class="form-control" 
										required
										id="ticketAdmin"
										name="admin">
										<option selected disabled>Choose one</option>
									</select>
								</div>
								@if($errors->has('admin'))
								<span class="text-danger"> {{$errors->first('admin')}}</span>
								@endif
							</div>
						</div>						
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn btn-success btn-block">Submit</button>
							</div>
						</div>
					</footer>
				</section>
			</form>
		</div>
	</div>
	{{-- end of page --}}
@endsection

@section('js')
		<!-- Vendor -->
		<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
		<script>
			$('document').ready(function(){
				$('#ticketCategory').change(function(){
					$('#ticketAdmin').find('option:not(:first)').remove();
					let category = $('#ticketCategory').val();
					$.get('create/category/'+ category, function(response){
						$.each(response.admin, function(key, item){
							$('#ticketAdmin').append($('<option>', { 
								value: item.id,
								text : item.first_name + item.last_name 
							}));
						});
					});
				});
			});
		</script>
@endsection
@extends('layouts.'.Auth::user()->type->name)
 
@section('css')
    <link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/summernote/summernote-bs3.css')}}" />
@endsection


@section('body')

<!-- start: page -->
	<div class="col-md-12">
		<section class="panel-featured panel-featured-success">
			<header class="panel-heading">
				<h1 class="panel-title text-center"> <span class="text-primary">
                     Ticket : </span>{{$teaket->title}}
                </h1>
                <br>
				<div class="row">
					<div class="col-sm-3">
                        <p class="panel-subtitle"> 
                            Creator : <strong>{{$teaket->user->fullName() ?? 'Not Available'}}</strong>
                        </p>
                        <p class="panel-subtitle"> 
                            Created : <strong>{{$teaket->created_at->diffForHumans() ?? 'Not Available'}}</strong>
                        </p>
                    </div>
					<div class="col-sm-3">
						<p class="panel-subtitle"> 
                            Admin : <strong>{{$teaket->admin() ?? 'Not Available'}}</strong>
                        </p>
                    </div>
					<div class="col-sm-3">
                        <p class="panel-subtitle"> 
                            Status : 
                            <span class="label label-warning">
                                {{config('teaket.status')[$teaket->status_id - 1]['name']}}
                            </span>&nbsp;&nbsp;&nbsp;
                            Priority : 
                            <span class="label label-danger">
                                {{config('teaket.priority')[$teaket->priority_id - 1]['name']}}
                            </span>
                        </p>
					</div>
					<div class="col-sm-3">
                        <p class="panel-subtitle "> 
                            @if ($teaket->status_id == 3){{-- check if it has been solved --}}
                                <form 
                                    action="{{route('teaket.close', ['teaket' => $teaket->slug])}}"
                                    method="POST"
                                    id="closeTeaket">
                                    @csrf
                                </form>    
                                <a 
                                    href="{{route('teaket.create')}}" 
                                    onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to Reopen this ticket?')){
                                        document.getElementById('closeTeaket').submit();
                                    }" 
                                    class="btn btn-danger btn-sm pull-right"> 
                                    <i class="fa fa-unlock-alt"></i>  Reopen
                                </a>
                            @else
                                <form 
                                    action="{{route('teaket.close', ['teaket' => $teaket->slug])}}"
                                    method="POST"
                                    id="closeTeaket">
                                    @csrf
                                </form>
                                <a 
                                    href="#"
                                    onclick="event.preventDefault();
                                    if(confirm('Are you sure you want to close this ticket?')){
                                        document.getElementById('closeTeaket').submit();
                                    }" 
                                    class="btn btn-danger btn-sm pull-right"> 
                                    <i class="fa fa-lock"></i>  Close
                                </a> 
                            @endif
                            <a 
                                href="{{route('teaket.create')}}" 
                                style="margin-right:5px;" 
                                class="btn btn-primary btn-sm pull-right"> 
                                <i class="fa fa-plus"></i> New
                            </a> 
                        </p>
                    </div>
				</div>
            </header>
            <div class="panel-body" style="margin-top:5px">
                <h4>{!!$teaket->body!!}</h4>
            </div>
		</section>

        @foreach ($teaket->comments as $comment)
            <div class="panel">
                <div class="panel-heading">
                    @if ($comment->user_id == $teaket->user_id)
                        <p class="panel-title">{{$comment->user->fullName()}}<i class="fa fa-angle-right fa-fw"></i> Admin</p>                    
                    @else
                        <p class="panel-title">{{$comment->user->fullName()}}<i class="fa fa-angle-right fa-fw"></i> {{$teaket->user->fullName()}}</p>                    
                    @endif
                </div>
                <div class="panel-body">
                    <p>{!! $comment->comment !!}</p>
                </div>
                <div class="panel-footer">
                    <p class="m-none"><small>{{$comment->created_at->diffForHumans()}}</small></p>
                </div>
            </div>            
        @endforeach
            
        <section class="panel-featured panel-featured-info" style="margin-top:20px">
            <div class="panel-body">
                <br>			
                <div class="row">
                    <div class="col-md-12">                        
                        <form 
                            action="{{route('teaket.comment.store', ['teaket' => $teaket->slug])}}"
                            method="post"
                            class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
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
                                <div class="col-sm-12">
                                    <button class="btn btn-success btn-block">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- end of instruction table -->
            </div>
            <div class="panel-footer">
            </div>
        </section>
	</div>
<!-- end: page -->

@endsection

@section('js')		
		<!-- Specific Page Vendor -->
        <script src="{{asset('assets/vendor/summernote/summernote.js')}}"></script>
        
        <script type="text/javascript">
                const url = "{{route('teaket.new.comment',['comment' => $teaket->comments->last()->id ?? 0])}}"
                let checkNewComment = setInterval(function() {
                    $.get(url, (data)=>{
                        if (data.status == 200) {
                            if (confirm('Theare\'s a new comment, Please confirm to reload page.')) {
                                location.reload();
                            }
                            else {
                                stopIntervalCheck();
                            }
                        }
                    })
                }, 8000);
                checkNewComment;
                var stopIntervalCheck = function (){
                    clearInterval(checkNewComment); 
                }
        </script>

@endsection

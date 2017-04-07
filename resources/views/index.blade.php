@extends('layout.layouts')

@section('addmessagebtn')
<div class="col-sm-4" id="adddiv">
	<div class="add-message">
		<button type="button" class="btn btn-primary" id="addmessagebtn" data-toggle="modal" data-target="#myModal">Add message</button>
<!-- 		<template id="template1">
			<form method="POST" action="message/post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="addmessage"></label>
						<textarea  name="newmessage" class="form-control"
						 rows="10" cols="15"></textarea>
				
					<br>
				</div>
				<button type="submit" class="btn btn-success">
					post
				</button>
			</form>
		</template> -->
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Please Add Your messages</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="message/post">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="addmessage">Say Something you want!Anything you say is value for us!</label>
								<textarea  name="newmessage" class="form-control"
								rows="3" placeholder="Message..."></textarea>
							</div>
							<button type="submit" class="btn btn-success">
								post
							</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" id="tooltip" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="this button won't do nothing">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('showmessagebtn')

<div class="col-sm-4" id="showdiv">
	<div class="show-message">
		<button type="button" class="btn btn-primary" id="showmessagebtn">
		Show message
		</button>
		<template id="template2"><!-- 只有点击了Show message button 才会出现-->
	@if($messagenum)
		<nav aria-label="...">
			<ul class="pagination">
				<li class="side Previous"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
				@foreach($pagenums as $pagenumid)
				<li id="page{{$pagenumid}}" class="middle" data-page="{{$pagenumid}}"><a href="#">{{$pagenumid}}<span class="sr-only">(current)</span></a></li>
				@endforeach
				<li class="side Next" ><a href="#" aria-label="next"><span aria-hidden="true">&raquo;</span></a></li>
			</ul>
		</nav>
	<div class="t2">
		<h1 id="{{$pageid}}">第{{$pageid}}页,共{{ $messagenum }}条留言</h1>
			<ul class="list-group">
			@foreach($messages as $message)
				<h4><span class="glyphicon glyphicon-user"></span> User@ {{$message->user->name}}</h4>
					<span>{{$message->created_at}}</span>
			
			 <li >
			 	<pre>{{$message->body}}</pre>
			</li>
			
			@endforeach
		</ul>
	</div>
		@else
		<h1>暂时还没有任何留言</h1>
		@endif	
		</template>
	</div>
</div>

@endsection
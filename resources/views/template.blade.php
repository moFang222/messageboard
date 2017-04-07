<div class="t2">
	<h1 id="{{$pageid}}">第{{$pageid}}页,共{{ $messagenum }}条留言</h1>
	<ul class="list-group">
		@foreach($messages as $message)
		<h4><span class="glyphicon glyphicon-user"></span> User@ {{$message->user->name}}</h4>
		<span>{{$message->created_at}}</span>
		<p>
			<li>
				<pre>{{$message->body}}</pre>
			</li>
		</p>
		@endforeach
	</ul>
</div>
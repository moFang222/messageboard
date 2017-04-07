<!DOCTYPE html>
<html>
<head>
	<title>Verify</title>
</head>
<body>
	<form method="post" action="captcha-test">
		{{csrf_field()}}
		<p>{!! captcha_img() !!}</p>
		<p><input type="text" name="captcha" value="{{ old('captcha') }}"></p>
		<p>
		<button type="submit" name="check">Check</button>
		<span><button type="button" id="switchbtn" name="switch">Switch</button></span>
		</p>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</form>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.js"></script>
	<script src="/js/message.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Dropdown</title>
	<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
</head>
<style type="text/css">
	div.dropdown-menu.hide
	{
		display: none;
	}	
</style>
<body>
	<ul class="dropdown-list">
		<li class="top">
		<a href="#" class="dropdown-item" data-toggle="dropdown">
			dd
			</a>
		</li>
		<div class="dropdown-menu hide">
			<li><a href="#" class="dropdown-item">ww</a></li>
			<li><a href="#" class="dropdown-item">ee</a></li>
			<li><a href="#" class="dropdown-item">rr</a></li>
		</div>
	</ul>
	
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
	<script type="text/javascript">
		var $dropdownmenu=$('div.dropdown-menu');
		$('li.top').on('click',function()
		{
			// $dropdownmenu.removeClass('hide');
			$dropdownmenu.slideToggle(2000);
		});
	</script>
</body>
</html>
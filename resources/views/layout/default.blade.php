
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>App Updater</title>

	<!-- Bootstrap core CSS -->
	{!! Html::style('bootstrap/css/bootstrap.min.css') !!}

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	{!! Html::style('css/ie10-viewport-bug-workaround.css') !!}

	<!-- Custom styles for this template -->
	{!! Html::style('css/apk.css') !!}


	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	{!! Html::script('js/ie-emulation-modes-warning.js') !!}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>

	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="{{ action('ApkController@index') }}">Apk Updater</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="{{ action('ApkController@index') }}">Apk</a></li>
			<li><a href="{{ action('TestApkController@index') }}">Test Apk</a></li>			
		  </ul>
		 
		</div><!--/.nav-collapse -->
	  </div>
	</nav>

	<div class="container">
		@include('shared.notifications')
		@yield('content') 

	</div> <!-- /container -->


	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
	{!! Html::script('bootstrap/js/bootstrap.min.js') !!}
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	{!! Html::script('js/ie10-viewport-bug-workaround.js') !!}
  </body>
</html>

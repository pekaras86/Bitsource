<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Bitsource</title>
  
  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional Paper theme -->
  <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <!--Personal css styles-->
  <link rel="stylesheet" href="/bitsource/public/css/bitsource.css">
    <!--Dropzone.css-->
  <link rel="stylesheet" href="/bitsource/public/css/dropzone.css">
    <!-- JQuery UI CSS -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- Tag it! -->
  <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
    <!-- Tag it -->
  <link href="/bitsource/public/css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <!-- Text ext -->
  <link href="/bitsource/public/css/textext.core.css" rel="stylesheet" type="text/css">
  <link href="/bitsource/public/css/textext.plugin.arrow.css" rel="stylesheet" type="text/css">
  <link href="/bitsource/public/css/textext.plugin.autocomplete.css" rel="stylesheet" type="text/css">
  <link href="/bitsource/public/css/textext.plugin.clear.css" rel="stylesheet" type="text/css">
  <link href="/bitsource/public/css/textext.plugin.focus.css" rel="stylesheet" type="text/css">
  <link href="/bitsource/public/css/textext.plugin.prompt.css" rel="stylesheet" type="text/css">
  <link href="/bitsource/public/css/textext.plugin.tags.css" rel="stylesheet" type="text/css">
    <!-- RateYo Star rating -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.css">



</head>
<body>
  <div class="page-wrapper">
   
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
        @if (Auth::guest())
	      <a class="navbar-brand" href="{{ url('/search') }}">Bitsource</a>
        @else
        <a class="navbar-brand" href="{{ url('/home') }}">Bitsource</a>
        @endif
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">
	          <!-- Authentication Links -->
	          @if (Auth::guest())
	              <li class="active"><a href="{{ url('/search') }}">Κεντρική<span class="sr-only">(current)</span></a></li>
	          @else
	              <li class="active"><a href="{{ url('/home') }}">Κεντρική<span class="sr-only">(current)</span></a></li>
	          @endif
	        <li><a href="#">Ιστολόγιο</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Αναζήτηση<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="{{ url('/tasks_list') }}">Projects/Tasks</a></li>
	            <li class="divider"></li>
	            <li><a href="{{ url('/users_list') }}">Freelancers</a></li>
	            <li class="divider"></li>
	            <li><a href="{{ url('/jobs_list') }}">Εργασία</a></li>
	          </ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
		        <!-- Authentication Links -->
		        @if (Auth::guest())
		            <li><a href="{{ url('/login') }}">Σύνδεση</a></li>
		            <li><a href="{{ url('/register') }}">Εγγραφή</a></li>
		        @else
		            <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		                    {{ Auth::user()->uFname }} <span class="caret"></span>
		                </a>

		                <ul class="dropdown-menu" role="menu">
                        <li><a href="/Bitsource/public/profile/{{ Auth::user()->id }}"><i class="fa fa-btn glyphicon glyphicon-user"></i> Προφίλ</a></li>
                        <li><a href="/Bitsource/public/profile/{{ Auth::user()->id }}/edit"><i class="fa fa-btn glyphicon glyphicon-pencil"></i> Επεξεργασία</a></li>
		                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Αποσύνδεση</a></li>
		                </ul>
		            </li>
		        @endif
          </ul>
	    </div>
	  </div>
	</nav>

    @yield('content')

    <footer class="footer">
    	<ul class="footer-links">
    	    <li><a href="{{ url('/contact') }}">Επικοινωνία</a></li>
    		<li><a href="#">Github</a></li>
    		<li><a href="#">Twitter</a></li>
    		<li><a href="#">Facebook</a></li>
    	</ul>
    	<p>Designed and built by @PetrosKrns</p>	
    </footer>
   </div> <!--/page-wrapper-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <!-- JQuery UI -->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> 
    <!-- Tag it! -->
  <script src="/bitsource/public/javascript/tag-it.js" type="text/javascript" charset="utf-8"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!-- Dropzone.js -->
  <script src="/bitsource/public/javascript/dropzone.js"></script>
    <!-- Ajax setup -->
  <script src="/bitsource/public/javascript/ajaxsetup.js"></script>
    <!-- Text ext -->
  <script src="/bitsource/public/javascript/textext.core.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.ajax.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.arrow.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.autocomplete.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.clear.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.filter.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.focus.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.prompt.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.suggestions.js"></script>
  <script src="/bitsource/public/javascript/textext.plugin.tags.js"></script>
    <!-- RateYo Star rating -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.js"></script>

     
    <!-- Here place your custom javascript -->
  @yield('js')

<body>
</html>
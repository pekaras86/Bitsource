<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Bitsource</title>

    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
  <link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
    <!--Personal css styles-->
  <link rel="stylesheet" href="css/bitsource.css">
  
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
	      <a class="navbar-brand" href="#">Bitsource</a>
	    </div>
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="welcome">Κεντρική<span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Ιστολόγιο</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Αναζήτηση<span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="tasks_list">Έργα</a></li>
	            <li class="divider"></li>
	            <li><a href="users_list">Επαγγελματίες</a></li>
	            <li class="divider"></li>
	            <li><a href="jobs_list">Εργασία</a></li>
	          </ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="login">Σύνδεση</a></li>
	        <li><a href="register">Εγγραφή</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

    @yield('content')

    <footer class="footer">
    	<ul class="footer-links">
    	    <li><a href="contact">Επικοινωνία</a></li>
    		<li><a href="#">Github</a></li>
    		<li><a href="#">Twitter</a></li>
    		<li><a href="#">Facebook</a></li>
    	</ul>
    	<p>Designed and built by @PetrosKrns</p>	
    </footer>
   </div> <!--/page-wrapper-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   
<body>
</html>
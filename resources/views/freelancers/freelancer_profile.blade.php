@extends('layouts.master')

@section('content')

<div class="push-freelancer-profile">

	<div class="freelancer-description">
	  <div class="freelancer-description-header">
	  	  <img src="images/karaoglanis_petros.jpg" class="img-responsive img-circle" alt="Responsive image">
	      <h5>Καραογλάνης Πέτρος, Ξάνθη</h5> 
	      <h6>Responsive Web Designer | HTML 5 | CSS3 | Bootstrap | WordPress | Joomla | Drupal | Opencart | Newsletter |</h6> 
	      <h6><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Ξάνθη</h6>
	  </div>  <!--/freelancer-description-header-->
	  <div class="freelancer-description-body">
	  	<h5>Επισκόπηση</h5>
	  	<div>
	  		Hello, I'm a full-stack web developer since 2009. Since 2013 I specialize in python. I have a lot of experience in: </br>
	  		</br>
	  		- PHP (Yii 1/2, Laravel, Slim, WordPress, Joomla); </br>
	  		- JS (jQuery, Angular, React); </br>
	  		- Python, of course (Django, Flask, Tornado) </br>
	  		- HTML/CSS (responsive/adaptive/mobile design) </br>
	  		- Web-servers (nginx, apache, gunicorn) </br>
	  		- Databases (MySQL, Postgres) </br>
	  		- APIs (Zapier, Facebook, Twitter, Instagram, Google and many others) </br>
            </br>
	  		I write readable and maintainable code with unit tests. I can use TDD if you need it. </br>
            </br>  
	  		Also, I'm very familiar with network programming, machine learning and science tools for python like numpy, pandas and scipy. </br>
            </br>
	  		If you have any questions, let me know. Happy to explain. </br>
	  		</br>
	  		<h5>Ικανότητες</h5>
	  		<a href="#">html,</a>
	  		<a href="#">css,</a>
	  		<a href="#">javascript,</a>
	  		<a href="#">php,</a>
	  		<a href="#">jquery,</a>
	  		<a href="#">ajax,</a>
	  		<a href="#">react</a>
	  	</div>
	  </div>
	</div> <!--/freelancer-description-->

	<div class="freelancer-contact">
	    <div id="freelancer-contact-header"></div>
		<button class="btn btn-info btn-lg" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button>
		<h4><span class="glyphicon glyphicon-euro" aria-hidden="true"></span>20/ώρα</h4>
		<img src="images/stars.png" class="img-responsive" alt="Responsive image">
		<a href="#"><h6><b>12 κριτικές</b></h6></a>
    </div>  <!--/freelancer-contact-->

    <div class="freelancer-rating-section">
        <h5>Κριτικές</h5>
        <div class="freelancer-rating">
        	<img src="images/iliadis_antonis.jpg" class="img-responsive img-circle freelancer-rating-photo" alt="Responsive image">
            <a href="#"><h7>Ηλιάδης Αντώνης</h7></a>
            <img src="images/stars.png" class="img-responsive freelancer-rating-stars" alt="Responsive image">
            <a href="#"><h5>Σχεδίαση λογότυπου</h5></a> 
            <p>"Υπέροχη δουλειά υψηλής ποιότητας στον ανάλογο χρόνο!!!"</p>
        </div>
    </div>

  
  	 	
  



</div> <!--/push-freelancer-profile-->

@endsection
@extends('layouts.master')

@section('content')

<div class="freelancers-push">

<div class="freelancer-page-title">
ΕΠΑΓΓΕΛΜΑΤΙΕΣ
</div>

<form class="freelancers-search-form">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Αναζητήστε με βάση το όνομα, τις ικανότητες ή την τοποθεσία" aria-label="...">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">ΑΝΑΖΗΤΗΣΗ</button>
    </span>
  </div><!-- /input-group --> 
</form>

<div class="freelancers-short-main">

<div class="freelancer-short-profile">
  <div class="freelancer-short-avatar">
  	<img src="images/karaoglanis_petros.jpg" class="img-responsive img-circle" alt="Responsive image">
  </div>
  <div class="freelancer-short-info">
  	<h6><a href="user_profile">Καραογλάνης Πέτρος</a></h6>
  	<h6>Responsive Web Designer | HTML 5 | CSS3 | Bootstrap | WordPress | Joomla | Drupal | Opencart | Newsletter |</h6>
  	<div class="freelancer-short-glyphicons">
  		<span class="glyphicon glyphicon-map-marker"></span><span class="space">Ξάνθη</span>
  		<span class="glyphicon glyphicon-thumbs-up"></span><span class="space">28 Κριτικές</span>
  	</div>
  </div>
  <div class="freelancer-short-price-contact">
    <h5>
      <span class="glyphicon glyphicon-euro"></span> 17/ώρα
    </h5>
  	<button class="btn btn-info" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button>
  </div>
</div>

<div class="freelancer-short-profile">
  <div class="freelancer-short-avatar">
    <img src="images/iliadis_antonis.jpg" class="img-responsive img-circle" alt="Responsive image">
  </div>
  <div class="freelancer-short-info">
    <h6><a href="#">Ηλιάδης Αντώνης</a></h6>
    <h6>Successful freelance Telemarketer/lead generator/Sales/property manager/B2B and B2C Contractor</h6>
    <div class="freelancer-short-glyphicons">
      <span class="glyphicon glyphicon-map-marker"></span><span class="space">Αθήνα</span>
      <span class="glyphicon glyphicon-thumbs-up"></span><span class="space">32 Κριτικές</span>
    </div>
  </div>
  <div class="freelancer-short-price-contact">
    <h5>
      <span class="glyphicon glyphicon-euro"></span> 20/ώρα
    </h5>
    <button class="btn btn-info" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button>
  </div>
</div>

</div> <!-- /freelancers-short-main -->

</div> <!-- /freelancers-push -->

@endsection
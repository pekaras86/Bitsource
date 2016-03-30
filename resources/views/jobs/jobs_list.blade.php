@extends('layouts.master')

@section('content')

<div class="push-jobs">

<div class="jobs-page-title">
ΕΡΓΑΣΙΑ
</div>

<form class="jobs-search-form">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Αναζητήστε με βάση τον τίτλο, τις ικανότητες ή την τοποθεσία" aria-label="...">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">ΑΝΑΖΗΤΗΣΗ</button>
    </span>
  </div><!-- /input-group --> 
</form>

<div class="jobs-short-main">

<div class="jobs-short-profile">
  <div class="jobs-short-avatar">
  	<img src="images/pph.png" class="img-responsive img-circle" alt="Responsive image">
  </div>
  <div class="jobs-short-info">
  	<h5><a href="#">Full Stack Developer</a></h5>
  	<h6><a href="#">PeoplePerHour</a></h6>
  	<h6>WEB DEVELOPER έμπειρος ζητείται για μόνιμη εργασία σε ιδιαίτερα αναπτυσσόμενη εταιρεία. Ο υποψήφιος θα συμμετέχει σε ομάδα προγραμματιστών και θα πρέπει να διαθέτει...</h6>
  	<div class="jobs-short-glyphicons">
  		<span class="glyphicon glyphicon-map-marker"></span><span class="space">Αθήνα</span>
  		<span class="glyphicon glyphicon-briefcase"></span><span class="space">Πλήρης Απασχόληση</span>
  	</div>
  </div>
  <div class="jobs-short-price-contact">
    <h5>
      <span class="glyphicon glyphicon-euro"></span> 1.500
    </h5>
  	<button class="btn btn-info" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button>
  </div>
</div>

</div> <!-- /freelancers-short-main -->

</div> <!-- /push-jobs -->

@endsection
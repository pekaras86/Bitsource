@extends('layouts.master')

@section('content')

<div class="push-tasks">

<div class="tasks-page-title">
ΕΡΓΑ
</div>

<form class="tasks-search-form">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Αναζητήστε με βάση το όνομα του εργοδότη ή τις ικανότητες" aria-label="...">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">ΑΝΑΖΗΤΗΣΗ</button>
    </span>
  </div><!-- /input-group --> 
</form>

<div class="tasks-short-main">

<div class="tasks-short-profile">
  <div class="tasks-short-avatar">
  	<img src="images/avocarrot.jpg" class="img-responsive img-circle" alt="Responsive image">
  </div>
  <div class="tasks-short-info">
  	<h5><a href="#">Σχεδίαση λογότυπου</a></h5>
  	<h6><a href="#">Avocarrot</a></h6>
  	<h6>We develop our own facial imaging software but require coordinates of basic facial features to start. We are...</h6>
  	<div class="tasks-short-glyphicons">
  		<span><b>Προσφορές:</b></span><span class="space">8</span>
  		<span><b>M.O Προσφορών:</b></span><span class="space glyphicon glyphicon-euro">32</span>
  	</div>
  </div>
  <div class="tasks-short-price-contact">
    <h5>
      <span class="glyphicon glyphicon-euro"></span>20-50
    </h5>
  	<button class="btn btn-info" type="submit">ΠΡΟΣΦΟΡΑ</button>
  </div>
</div>

</div> <!-- /freelancers-short-main -->

</div> <!-- /push-tasks --> 
@endsection
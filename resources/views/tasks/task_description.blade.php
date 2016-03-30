@extends('layouts.master')

@section('content')

<div class="push-task">

<h5><b>Σχεδίαση λογότυπου</b></h5>

<div class="task-description-main">
	<div class="task-description-header">
		  <div class="task-bids-budget">
			  <div class="task-bids">
			  		<p><b>Προσφορές</b></p>
			  		<p>15</p>
			  </div>
			  <div class="task-average-bids">
			  		<p><b>M.O Προσφορών</b></p>
			  		<p>50</p>
			  </div>
		  	  <div class="task-budget">
		  		    <p><b>Προϋπολογισμός</b></p>
		  		    <p>20 - 120</p>
		  	  </div>
		  </div> <!--/task-bids-budget-->
	  	  <div class="task-dates">
		  	  <span><b>Απομένουν</b></span><br>
		  	  <span>2 ημέρες, 12 ώρες</span>
	  	  </div>
	</div> <!--/task-description-header-->
	<div class="task-description-body">
		<h6><b>Project Description</b></h6>
		<p>Want a script to change and create new files based on source file.</p>
	    <p>I want to change 3 things in the core file and create a new derived zip file. <br>
	    The data to change files will be supplied from database.</p>
	    <p>1. zip file name itself. (Will be provided from db) <br>
	    2. one file named abc.png inside core zip will be replaced by another png. <br>
	    3. one file inside zip "abc.css" change the first line in that file.</p>
	    <p>Everything else will be same as in the core file.</p>
	    <p><b>Σχετικά με τον εργοδότη</b></p>
	    <img src="images/stars-rating.png" class="img-responsive img-circle stars-rating" alt="Responsive image">
	    <p><b>Skills required</b></p>
	    <ul class="task-required-skills">
	    	<li><a href="#">javascript</li>
	    	<li><a href="#">php</li>
	    	<li><a href="#">css</li>
	    	<li><a href="#">html</li>
	    	<li><a href="#">php</li>
	    </ul>
	</div>  <!--/task-description-body-->
</div> <!--/task-description-main-->

<div class="task-place-bid">
  <a href="#" class="btn btn-info">ΠΡΟΣΦΟΡΑ</a>
</div>

<h5 class="total-bids"><b>Συνολικές Προσφορές</b></h5>

<div class="freelancer-bid">
  <div class="freelancer-bid-avatar-stars">
    <div>
        <img src="images/karaoglanis_petros.jpg" class="img-responsive img-circle freelancer-bid-avatar" alt="Responsive image">
    </div>
    <div class="freelancer-bid-stars-rating">
    	 <img src="images/stars-rating.png" class="img-responsive img-circle" alt="Responsive image">
    	 <a href="#">(11 κριτικές)</a>
    </div>	
  </div>
  <div class="freelancer-bid-comments">
    <div>
    	<a href="#">Καραογλάνης Πέτρος</a>
    </div>
  	<div>
  		<b>Σχόλια:</b>
  	</div>
  	<div>
        I am #4 Freelancer on this site and has more than 3 years o writing experience in all fields. I can write articles on your topic too.
        let's discuss.
        I am #4 Freelancer on this site and has more than 3 years o writing experience in all fields. I can write articles on your topic too.
        let's discuss

        Thanks
  	</div>
  </div>
  <div class="freelancer-bid-price">
  	<h5>
  		ΠΡΟΣΦΟΡΑ
  	</h5>
  	<h5>
  		100
  	</h5> 	
  </div>
</div>


	
</div> <!--/push-task-->



@endsection
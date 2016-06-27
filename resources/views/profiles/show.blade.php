@extends('layouts.master')

@section('content')

<div class="push-freelancer-profile">

	<div class="freelancer-description">
	  <div class="freelancer-description-header">
	  	  <img src="/Bitsource/public/images/avatars/{{$user->profile->pAvatar}}" class="img-responsive img-circle" alt="Responsive image">
	      @if (Auth::guest())
	      @elseif(Auth::user()->id === $user->id)
	      <a href="/Bitsource/public/profile/{{$user->profile->uId}}/edit" class="edit-desc-btn btn btn-info btn-xs" role="button">Edit</a>
	      @else
	      @endif
	      <h5>{{$user->uLname}} {{$user->uFname}}</h5> 
	      <h6 class="desc-header-title">{{$user->profile->pTitle}}</h6> 

	      <h6><span class="glyphicon glyphicon-user" aria-hidden="true">{{$user->profile->pCategory}}
          
          @if($user->profile->pLocation === '')
          @else
	      <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>{{$user->profile->pLocation}}  
	      @endif
          
          @if($user->profile->pLocation === '')
          @else
	      <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>{{$user->profile->pTelephone}}</h6>
          @endif
	      
	  </div>  <!--/freelancer-description-header-->
	  <div class="freelancer-description-body">
	  	<h5>Επισκόπηση</h5>
	  	<div class="description-just">
	  		{{$user->profile->pDescription}}
	  	</div>	

         
        @if(count($user->profile->skills) === 0)
        @else 
	  	<div class="desc-skills">
	  		<h5>Ικανότητες</h5>
	  		@foreach($user->profile->skills as $skill) 
              <span class="desc-skills">{{$skill->sName}}</span>
	  		@endforeach
	  	</div>
        @endif
        

        @if(count($user->profile->portfolios) === 0 )
        @else
	  	<div class="desc-port">
	  	    <h5>Portfolio</h5>
	  	    @foreach($user->profile->portfolios as $portfolio) 
	  		  <div>
	  		  	<a href="{{$portfolio->pLink}}">{{$portfolio->pLink}}</a> <br>
	  		  	{{$portfolio->pDescription}} 
	  		  </div>
	  		@endforeach
	  	</div>
        @endif



	  </div> <!--/freelancer-description-body-->
	</div> <!--/freelancer-description-->

	



	<div class="freelancer-contact">
	    <div id="freelancer-contact-header"></div>
		<button class="btn btn-info btn-lg" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button>
		@if ($user->profile->pCategory === 'freelancer')
		  <h4><span class="glyphicon glyphicon-euro" aria-hidden="true"></span>{{$user->profile->pSalary}}/ώρα</h4>
		@elseif ($user->profile->pCategory === 'employee')
		  <h4><b>Εργοδότης</b></h4>
		@else  
		  <h4><span class="glyphicon glyphicon-euro" aria-hidden="true"></span>{{$user->profile->pSalary}}/ώρα</h4>
		@endif  
		@if ($user->profile->pCategory === 'freelancer')
			<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">
			<a href="#"><h6><b>12 κριτικές</b></h6></a>
			<div class="desc-com">(ώς επαγγελματίας)</div>
		@elseif ($user->profile->pCategory === 'employee')
			<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">
			<a href="#"><h6><b>5 κριτικές</b></h6></a>
			<div class="desc-com">(ώς εργοδότης)</div>
		@elseif ($user->profile->pCategory === 'both')
			<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">
			<a href="#"><h6><b>12 κριτικές</b></h6></a>
			<div class="desc-com">(ώς επαγγελματίας)</div>
			<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">
			<a href="#"><h6><b>5 κριτικές</b></h6></a>
			<div class="desc-com">(ώς εργοδότης)</div>
		@endif
    </div>  <!--/freelancer-contact-->

    
    <!-- Comment btn -->
    @if (Auth::guest())
    @else
    <div class="com-desc-btn">
      <button type="button" class="com-btn btn btn-info btn-md" data-toggle="modal" data-target="#CoModal">ΑΞΙΟΛΟΓΗΣΗ</button>
    </div>

    
    <!-- Modal -->
	<div id="CoModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Αξιολόγηση</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
		       <label for="recipient-name" class="control-label">Τίτλος Έργου:</label>
		       <input type="text" class="form-control" id="linkModal" name="modalLink">
		    </div>
		    <div class="form-group">
		        <label for="message-text" class="control-label">Σχόλια:</label>
		        <textarea class="form-control" id="descriptionModal" name="modalDescription"></textarea>
		    </div>
	      </div>
	      <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">ΑΚΥΡΟ</button>
		      <button type="button" class="btn btn-primary" id="addendumPorfolio">ΠΡΟΣΘΗΚΗ</button>
		  </div>
	    </div>

	  </div>
	</div> <!--/end modal -- >
    

    @endif  
	<!-- /Comment btn -->


   <div class="freelancer-rating-section">
        <h5>Κριτικές</h5>
        <div class="freelancer-rating">
        	<img src="/Bitsource/public/images/iliadis_antonis.jpg" class="img-responsive img-circle freelancer-rating-photo" alt="Responsive image">
            <a href="#"><h7>Ηλιάδης Αντώνης</h7></a>
            <img src="/Bitsource/public/images/stars.png" class="img-responsive freelancer-rating-stars" alt="Responsive image">
            <a href="#"><h5>Σχεδίαση λογότυπου</h5></a> 
            <p>"Υπέροχη δουλειά υψηλής ποιότητας στον ανάλογο χρόνο!!!"</p>
        </div>
    </div> <!--end freelancer rating section-->

  
</div> <!--/push-freelancer-profile-->



@endsection
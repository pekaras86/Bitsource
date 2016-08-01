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

		@if(Auth::guest())
		<a href="{{URL::to('login')}}"><button class="btn btn-info btn-lg" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button></a>
		@else
		<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#contact-modal">ΕΠΙΚΟΙΝΩΝΙΑ</button>
		@endif
		
		@if ($user->profile->pCategory === 'freelancer')
		  <h4><span class="glyphicon glyphicon-euro" aria-hidden="true"></span>{{$user->profile->pSalary}}/ώρα</h4>
		@elseif ($user->profile->pCategory === 'employee')
		  <h4><b>Εργοδότης</b></h4>
		@else  
		  <h4><span class="glyphicon glyphicon-euro" aria-hidden="true"></span>{{$user->profile->pSalary}}/ώρα</h4>
		@endif  
		@if ($user->profile->pCategory === 'freelancer')
			<!--<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">-->
			<div id="rateFree"></div>
			<a href="#"><h6><b>{{$count_freelancer_comments}} κριτικές</b></h6></a>
			<div class="desc-com">(ώς επαγγελματίας)</div>
		@elseif ($user->profile->pCategory === 'employee')
			<!--<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">-->
			<div id="rateEmp"></div>
			<a href="#"><h6><b>{{$count_employee_comments}} κριτικές</b></h6></a>
			<div class="desc-com">(ώς εργοδότης)</div>
		@elseif ($user->profile->pCategory === 'both')
			<!--<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">-->
			<div id="rateFree"></div>
			<a href="#"><h6><b>{{$count_freelancer_comments}} κριτικές</b></h6></a>
			<div class="desc-com">(ώς επαγγελματίας)</div>
			<!--<img src="/Bitsource/public/images/stars.png" class="img-responsive" alt="Responsive image">-->
			<div id="rateEmp"></div>
			<a href="#"><h6><b>{{$count_employee_comments}} κριτικές</b></h6></a>
			<div class="desc-com">(ώς εργοδότης)</div>
		@endif
    </div>  <!--/freelancer-contact-->


        <!-- Modal Epikoinwnias -->
	<div id="contact-modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">ΕΠΙΚΟΙΝΩΝΙΑ</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
		       <label for="recipient-name" class="control-label">Παραλήπτης: <b>{{$user->email}}</b></label>
		       
		    </div>
		    <div class="form-group">
		        <label for="message-text" class="control-label">Mήνυμα:</label>
		        <textarea rows="5" class="form-control" id="reviewComment" name="modalDescription"></textarea>
		    </div>
	      </div>
	      <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">ΑΚΥΡΟ</button>
		      <button type="button" class="btn btn-primary">ΑΠΟΣΤΟΛΗ</button>
		  </div>
		  <div class="rating-warning">Τα πεδία <b>'Τίτλος Έργου'</b> και <b>'Σχόλια'</b> είναι υποχρεωτικά!</div>
	    </div>

	  </div>
	</div> <!--/end modal -- >




    
    <!-- Comment btn -->
    @if (Auth::guest())  <!-- Ean einai guest min emfanizeis to button aksiologisi -->
    @else  <!-- Ean einai Auth() emfanise to koumpi aksiologisi -->
    

    @if($user->profile->pCategory == 'freelancer' && Auth::user()->profile->pCategory == 'freelancer')
    <div class="com-desc-btn">
      <button type="button" class="com-btn btn btn-primary btn-md" data-toggle="modal" data-target="#free-free">ΑΞΙΟΛΟΓΗΣΗ</button>
    </div>


    <!-- Modal -->
	<div id="free-free" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5>Προσοχή!!!</h5>
	      </div>
	      <div class="modal-body">
	        <div>Πρέπει να είστε εργοδότης για να αξιολογήσετε ένα freelancer.</div>
	      </div>
	    </div>

	  </div>
	</div> <!--/end modal -- >

    

    @elseif($user->profile->pCategory == 'employee' && Auth::user()->profile->pCategory == 'employee')
    <div class="com-desc-btn">
      <button type="button" class="com-btn btn btn-primary btn-md" data-toggle="modal" data-target="#emp-emp">ΑΞΙΟΛΟΓΗΣΗ</button>
    </div>


    <!-- Modal -->
	<div id="emp-emp" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5>Προσοχή!!!</h5>
	      </div>
	      <div class="modal-body">
	        <div>Πρέπει να είστε freelancer για να αξιολογήσετε ένα εργοδότη.</div>
	      </div>
	    </div>

	  </div>
	</div> <!--/end modal -- >
    

    @else  
    <div class="com-desc-btn">
      <button type="button" class="com-btn btn btn-primary btn-md" data-toggle="modal" data-target="#CoModal">ΑΞΙΟΛΟΓΗΣΗ</button>
    </div>


    @endif  <!-- telos me button aksiologisi -->

    <!-- Modal -->
	<div id="CoModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Αξιολόγηση</h4>
	      </div>
	      <div id="rateYo"></div>
	      <div class="modal-body">
	        <div class="form-group">
		       <label for="recipient-name" class="control-label">Τίτλος Έργου:</label>
		       <input type="text" class="form-control" id="reviewTitle" name="modalLink">
		    </div>
		    <div class="form-group">
		        <label for="message-text" class="control-label">Σχόλια:</label>
		        <textarea class="form-control" id="reviewComment" name="modalDescription"></textarea>
		    </div>
	      </div>
	      <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">ΑΚΥΡΟ</button>
		      <button type="button" class="btn btn-primary" id="addReview">ΠΡΟΣΘΗΚΗ</button>
		  </div>
		  <div class="rating-warning">Τα πεδία <b>'Τίτλος Έργου'</b> και <b>'Σχόλια'</b> είναι υποχρεωτικά!</div>
	    </div>

	  </div>
	</div> <!--/end modal -- >
    

    @endif  <!-- Gia button aksiologisi -->
	<!-- /Comment btn -->

   
   <div class="freelancer-rating-section">
        <h5>Κριτικές</h5>

        @if($user->profile->pCategory === 'both')
        <div class="btn-group btn-group-justified user-cat-com" role="group">
          <a href="#" class="btn btn-primary com-choice com-choice-free">Ως freelancer</a>
          <a href="#" class="btn btn-default com-choice com-choice-emp">Ως εργοδοτης</a>
        </div>
        @else
          <!-- ean o profile owner den einai 'both' min emfanizeis tin epilogi -->
        @endif
        
        

        @if($user->profile->pCategory === 'freelancer')
	        @if($freelancer_comments == null)
	            <div>Δεν υπάρχουν σχόλια</div>
	        @else
		        <div class="freelancer-comment-section-one">
			        @foreach($freelancer_comments as $freelancer_comment)
		                <div class="freelancer-rating">
		        	        <img src="/Bitsource/public/images/avatars/{{$freelancer_comment->pAvatar}}" class="img-responsive img-circle freelancer-rating-photo" alt="Responsive image">
		                    <a href="/Bitsource/public/profile/{{$freelancer_comment->uId}}"><h7>{{$freelancer_comment->uLname}} {{$freelancer_comment->uFname}} </h7></a>
		                    <div class="freelancer-rating-stars">Βαθμολογία: {{$freelancer_comment->userRating}}</div>
		                    <a href="#"><h5>{{$freelancer_comment->rTitle}}</h5></a> 
		                    <p>{{$freelancer_comment->rComment}}</p>
		               </div>
			        @endforeach    
		        </div>  <!--/freelancer-comment-section-->
	        @endif
        

        @elseif ($user->profile->pCategory === 'employee')
            @if($employee_comments == null)
                <div>Δεν υπάρχουν σχόλια</div>
            @else
		        <div class="employee-comment-section-one">
			        @foreach($employee_comments as $employee_comment)
			            <div class="freelancer-rating">
		        	        <img src="/Bitsource/public/images/avatars/{{$employee_comment->pAvatar}}" class="img-responsive img-circle freelancer-rating-photo" alt="Responsive image">
		                    <a href="/Bitsource/public/profile/{{$employee_comment->uId}}"><h7>{{$employee_comment->uLname}} {{$employee_comment->uFname}} </h7></a>
                            <div class="freelancer-rating-stars">Βαθμολογία: {{$employee_comment->userRating}}</div>
		                    <a href="#"><h5>{{$employee_comment->rTitle}}</h5></a> 
		                    <p>{{$employee_comment->rComment}}</p>
		               </div>
			        @endforeach    
		        </div>  <!--/employee-comment-section-->
            @endif

        

        @else  <!--Ean einai both-->

        @if($freelancer_comments == null)
            <div class="freelancer-comment-section">Δεν υπάρχουν σχόλια</div>
        @else
	        <div class="freelancer-comment-section">
		        @foreach($freelancer_comments as $freelancer_comment)    
	                <div class="freelancer-rating">
	        	        <img src="/Bitsource/public/images/avatars/{{$freelancer_comment->pAvatar}}" class="img-responsive img-circle freelancer-rating-photo" alt="Responsive image">
	                    <a href="/Bitsource/public/profile/{{$freelancer_comment->uId}}"><h7>{{$freelancer_comment->uLname}} {{$freelancer_comment->uFname}} </h7></a>
		                <div class="freelancer-rating-stars">Βαθμολογία: {{$freelancer_comment->userRating}}</div>
	                    <a href="#"><h5>{{$freelancer_comment->rTitle}}</h5></a> 
	                    <p>{{$freelancer_comment->rComment}}</p>
	               </div>
		        @endforeach
	        </div>  <!--/freelancer-comment-section-->
        @endif
        
        @if($employee_comments == null)
            <div class="employee-comment-section">Δεν υπάρχουν σχόλια</div>
        @else
	        <div class="employee-comment-section">
		        @foreach($employee_comments as $employee_comment)
		            <div class="freelancer-rating">
	        	        <img src="/Bitsource/public/images/avatars/{{$employee_comment->pAvatar}}" class="img-responsive img-circle freelancer-rating-photo" alt="Responsive image">
	                    <a href="/Bitsource/public/profile/{{$employee_comment->uId}}"><h7>{{$employee_comment->uLname}} {{$employee_comment->uFname}} </h7></a>
		                <div class="freelancer-rating-stars">Βαθμολογία: {{$employee_comment->userRating}}</div>
	                    <a href="#"><h5>{{$employee_comment->rTitle}}</h5></a> 
	                    <p>{{$employee_comment->rComment}}</p>
	               </div>
		        @endforeach
	        </div>  <!--/employee-comment-section-->
        @endif

        @endif

    </div> <!--end freelancer rating section-->
  

</div> <!--/push-freelancer-profile-->



@endsection




@section('js')

<script>

$(document).ready(function () {

  
  @if($user->profile->pCategory == 'freelancer')
  //geniko rating freelancer
  $("#rateFree").rateYo({
    starWidth: "20px",
    readOnly: true,
    rating: {{$avgFreeRating}}
  });
  @endif

  

  @if($user->profile->pCategory == 'employee')
  //geniko rating employee
  $("#rateEmp").rateYo({
    starWidth: "20px",
    readOnly: true,
    rating: {{$avgEmpRating}}
  });
  @endif


  @if($user->profile->pCategory == 'both')
  
  //geniko rating employee
  $("#rateEmp").rateYo({
    starWidth: "20px",
    readOnly: true,
    rating: {{$avgEmpRating}}
  });


  //geniko rating freelancer
  $("#rateFree").rateYo({
    starWidth: "20px",
    readOnly: true,
    rating: {{$avgFreeRating}}
  });


  @endif

  

  // gia ta both buttons
  $(".com-choice").click(function(event) {
    event.preventDefault();
  });  //end click


  //  otan patithei to button ws ergodotis
  $(".com-choice-emp").click(function(){

  	$(this).removeClass("btn btn-default");
  	$(this).addClass("btn btn-primary");

  	$(".com-choice-free").removeClass("btn btn-primary");
  	$(".com-choice-free").addClass("btn btn-default");

  	$(".freelancer-comment-section").css("display", "none");
  	$(".employee-comment-section").css("display", "initial");

  });  //end click

  // otan patithei to button ws epagelmatias
  $(".com-choice-free").click(function(){
    
    $(this).removeClass("btn btn-default");
    $(this).addClass("btn btn-primary");

    $(".com-choice-emp").removeClass("btn btn-primary");
    $(".com-choice-emp").addClass("btn btn-default");

    $(".employee-comment-section").css("display", "none");
    $(".freelancer-comment-section").css("display", "initial");

  });  // end click

  


  

  // stars configuration 
  $("#rateYo").rateYo({
    starWidth: "20px",
    halfStar: true
  });


  
  $('.rating-warning').hide();


@if(Auth::user())  //to rating isxyei mono gia egegramenous xristes

  // send rating
  $("#addReview").click(function () {

  	var $rateYo = $("#rateYo").rateYo();


    
    //elegxos gia to ean exei symplirosei ta ypoxreotika pedia apo ti forma aksiologisis
    if($('#reviewTitle').val() === '' && $('#reviewComment').val() === ''){
    	
    	$('.rating-warning').show();
    
    } else {


    // typos xristi profile (owner of profile)
    @if ($user->profile->pCategory === 'freelancer') 
      var cat = {{ $cat = 1 }}
      //var catId = {{$user->profile->freelancer->id}}
      var catId = {{$user->profile->id}}
    @elseif ($user->profile->pCategory === 'employee') 
	  var cat = {{ $cat = 2 }}
	  //var catId = {{$user->profile->employee->id}}
	  var catId = {{$user->profile->id}}
    @else 
	  if ( $(".freelancer-comment-section").css("display") == 'inline' ) {
	  	var cat   = {{ $cat = 1 }}  //freelancer
	  	//var catId = {{$user->profile->freelancer->id}}
	  	var catId = {{$user->profile->id}}
	  } else {
	  	var cat   = {{ $cat = 2 }}  //employee
	  	//var catId = {{$user->profile->employee->id}}
	  	var catId = {{$user->profile->id}}
	  }
    @endif

    

    //typos xristi (that comments)
    @if (Auth::user()->profile->pCategory === 'freelancer')

      var comId = {{ Auth::user()->profile->id }} 

    @elseif (Auth::user()->profile->pCategory === 'employee')

      var comId = {{ Auth::user()->profile->id }}

    @else

      if ( cat == 1 ) {
        var comId = {{ Auth::user()->profile->id }}   // ean o profileOwner einai freelancer tote o reviewer einai employee     
      } else {
        var comId = {{ Auth::user()->profile->id }}  // ean o profileOwner einai employee tote o reviewer einai freelancer      	
      }

    @endif

     

    $.post('/Bitsource/public/rate',
    	{
    		revTitle     : $('#reviewTitle').val(),    // titlos task pros review
    		revCom       : $('#reviewComment').val(),  // comment gia task pros profile
    		rating       : $rateYo.rateYo("rating"),   // vathmos gia task pros profile
    		userComId    : comId,                      // the user that comments ( freelancer or employee id )
    		userProf     : catId,                      // the user owns the profile ( freelancer or employee id )
    		usCat        : cat                         // katigoria xristi profile
    	},
    	    function(data, status){
    		  console.log("Data: " + data + "\nStatus: " + status)
    	});

     
     $('#CoModal').modal('hide');

  }//end if
    
  });  // end click

@endif  // rating gia eggegramenous xristes



//button aksiologisi minimata
$('#free-free').click(function () {

});

$('#emp-emp').click(function () {

});
  
 




}); // end ready

</script>

@endsection
@extends('layouts.master')

@section('content')

<div class="push-task">

<h5><b>{{$task->tTitle}}</b></h5>

<div class="task-description-main">
	<div class="task-description-header">
		  <div class="task-bids-budget">
			  <div class="task-bids">
			  		<p><b>Προσφορές</b></p>
			  		@if($count_task_comments == '')
			  		<p class="tBudget"><b>-</b></p>
			  		@else
			  		<p class="tBudget"><b>{{$count_task_comments}}</b></p>
			  		@endif
			  </div>
			  <div class="task-average-bids">
			  		<p><b>M.O Προσφορών</b></p>
			  		@if($sumTaskOffers == '')
			  		<p class="tBudget">-</p>
			  		@else
			  		<p class="tBudget"><b>{{$sumTaskOffers}}&#8364;</b></p>
			  		@endif
			  </div>
		  	  <div class="task-budget">
		  		    <p><b>Προϋπολογισμός</b></p>
		  		    <p class="tBudget"><b>{{$task->tBudget}}</b></p>
		  	  </div>
		  </div> <!--/task-bids-budget-->
	  	  <div class="task-dates">
		  	  <span><b>Λήξη</b></span><br>
		  	  <span>{{$task->tEnds}}</span>
	  	  </div>
	</div> <!--/task-description-header-->
	<div class="task-description-body">
		<h6><b>Περιγραφή</b></h6>
		  {{$task->tDescription}}
		<p></p>  
	    <p><b>Σχετικά με τον εργοδότη</b></p>
	    <div style="float:left;" id="rateEmpTask"></div> <a style="display:inline;" href="/Bitsource/public/profile/{{$user_id}}"> ({{$userLname}} {{$userFname}}) </a>
	    

        @if(count($task->skills) === 0)
        @else
        <p></p>
	    <p><b>Ικανότητες</b></p>
	    <ul class="task-required-skills">
	    	@foreach($task->skills as $skill) 
              <span class="desc-skills">{{$skill->sName}}</span>
	  		@endforeach
	    </ul>
	    @endif
	</div>  <!--/task-description-body-->
</div> <!--/task-description-main-->



<!--  Κουμπί προσφοράς -->
@if (Auth::guest())
  <!-- Εάν o χρήστης είναι guest μην εμφανίζεις το κουμπί. -->  
@else  <!-- Εάν ο χρήστης είναι authorized εμφάνισε το κουμπί.  -->
    @if(Auth::user()->profile->pCategory == 'employee')
	<div class="task-place-bid">
	    <button type="button" class="com-btn btn btn-primary btn-md" data-toggle="modal" data-target="#empTask">ΠΡΟΣΦΟΡΑ</button>
	</div>

	<!-- Modal -->
	<div id="empTask" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h5>Προσοχή!!!</h5>
	      </div>
	      <div class="modal-body">
	        <div>Πρέπει να είστε freelancer για να κάνετε μία προσφορά.</div>
	      </div>
	    </div>

	  </div>
	</div> <!--/end modal -- >
	@else
	<div class="task-place-bid">
	    <button type="button" class="com-btn btn btn-primary btn-md" data-toggle="modal" data-target="#empTask">ΠΡΟΣΦΟΡΑ</button>
	</div>

	 <!-- Modal -->
	<div id="empTask" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Προσφορά</h4>
	      </div>
	      <div class="modal-body">
	        <div class="form-group">
		       <label for="recipient-name" class="control-label">Τιμή Προσφοράς:</label>
		       <input type="number" class="form-control" id="offerPrice" name="modalLink">
		    </div>
		    <div class="form-group">
		        <label for="message-text" class="control-label">Σχόλια:</label>
		        <textarea class="form-control" id="offerComment" name="modalDescription"></textarea>
		    </div>
	      </div>
	      <div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal">ΑΚΥΡΟ</button>
		      <button type="button" class="btn btn-primary" id="addΟffer">ΠΡΟΣΘΗΚΗ</button>
		  </div>
		  <div class="rating-warning">Τα πεδία <b>'Τιμή Προσφοράς'</b> και <b>'Σχόλια'</b> είναι υποχρεωτικά!</div>
	    </div>

	  </div>
	</div> <!--/end modal -- >

	@endif <!-- /Auth::user()->profile->pCategory == 'employee' -->
@endif  <!-- /Auth::guest() -->



<h5 class="total-bids"><b>Συνολικές Προσφορές</b></h5>

@foreach ($task_comments as $task_comment)
<div class="freelancer-bid">
  <div class="freelancer-bid-avatar-stars">
    
        <img src="/Bitsource/public/images/avatars/{{$task_comment->pAvatar}}" class="img-responsive img-circle freelancer-bid-avatar" alt="Responsive image">
    	
  </div>
  <div class="freelancer-bid-comments">
    <div>
    	<a href="/Bitsource/public/profile/{{$task_comment->uId}}">{{$task_comment->uLname}} {{$task_comment->uFname}}</a>
    </div>
  	<div>
  		<b>Σχόλια:</b>
  	</div>
  	<div>
        {{$task_comment->mbComment}}
  	</div>
  </div>
  <div class="freelancer-bid-price">
  	<h5>
  		ΠΡΟΣΦΟΡΑ
  	</h5>
  	<h5>
  		<b>{{$task_comment->mbBid}}&#8364;</b>
  	</h5> 	
  </div>
</div>
@endforeach


</div> <!--/push-task-->



@endsection


@section('js')

<script>

$(document).ready(function () {

  
  // αστεράκια - rating στο πεδίο 'Σχετικά με τον εργοδότη'.
  $("#rateEmpTask").rateYo({
    starWidth: "20px",
    readOnly: true,
    rating: {{$avgEmpRating}}
  });  // rateYo

  
  // απόκριψη warning message στο modal.
  $('.rating-warning').hide();


  @if(Auth::user())
  // αποστολή προσφοράς
  $("#addΟffer").click(function () {


  	if($('#offerPrice').val() === '' && $('#offerComment').val() === ''){
    	
    	$('.rating-warning').show();
    
    } else {

    
    $.post('/Bitsource/public/offer',
    	{
    		offerPrice         : $('#offerPrice').val(),    // τιμή προσφοράς.
    		offerComment       : $('#offerComment').val(),  // σχόλιο προσφοράς.
    		userOffers         : {{ Auth::user()->profile->freelancer->id }}, // χρήστης που κάνει προσφορά
    	    taskId             : {{$task->id}} 
    	},
    	    function(data, status){
    		  console.log("Data: " + data + "\nStatus: " + status)
    });



    $('#empTask').modal('hide');


    }


  });  // end click	
  @endif


  }); // end ready

</script>

@endsection
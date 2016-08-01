@extends('layouts.master')

@section('content')

<div class="push-task">

	<div class="btn-group btn-group-justified">
	    @if(Auth::user()->profile->pCategory == 'employee')
	        <a href="#" class="btn btn-default com-choice com-choice-tasks">Projects/Tasks</a>
	        <a href="#" class="btn btn-default com-choice com-choice-jobs">Aγγελιες</a>
	</div>  <!-- /btn-group btn-group-justified -->
	<div class="list-of-tasks">
	<table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Τίτλος</th>
				<th>Έναρξη</th>
				<th>Λήξη</th>
				<th>Διαγραφή</th>
			</tr>
		</thead>
		<tbody>
		@if($tasks == null)
			<tr>
		        <td>Δεν υπάρχουν εγγραφές!</td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		@else  
		    @foreach($tasks as $task)
			<tr>
				<td><a href="/Bitsource/public/project_task/{{$task->id}}">{{$task->tTitle}}</a></td>
				<td>{{$task->created_at}}</td>
				<td>{{$task->tEnds}}</td>
				<td>

				  {!! Form::open(array('route' => array('project_task.destroy', $task->id), 'method' => 'delete' ))!!}
				    <button type="submit">Delete</button>
				  {!! Form::close() !!}

				</td>	
			</tr>
			@endforeach
		@endif	
		</tbody>
	</table>
	</div> <!-- /list-of-tasks -->
	<div class="list-of-jobs">
	    <table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Τίτλος</th>
				<th>Hμ/νία Ανάρτησης</th>
				<th>Εταιρεία</th>
				<th>Διαγραφή</th>
			</tr>
		</thead>
		<tbody>
		@if($ads == null)
			<tr>
		        <td>Δεν υπάρχουν εγγραφές!</td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		@else
		    @foreach($ads as $ad)
			<tr>   
				<td><a href="/Bitsource/public/job/{{$ad->id}}">{{$ad->adTitle}}</a></td>
				<td>{{$ad->created_at}}</td>
				<td>{{$ad->adCompany}}</td>
				<td>
					
                    {!! Form::open(array('route' => array('job.destroy', $ad->id), 'method' => 'delete' ))!!}
				    <button type="submit">Delete</button>
				  {!! Form::close() !!} 

				</td>	
			</tr>
			@endforeach
		@endif	
		</tbody>
	</table>	
	</div> <!-- /list-of-jobs -->
	  @elseif(Auth::user()->profile->pCategory == 'freelancer')
	    <a href="#" class="btn btn-default com-choice com-choice-bids">Προσφορες</a>
	</div>  <!-- /btn-group btn-group-justified -->
    <div class="list-of-bids">
        <table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Τίτλος</th>
				<th>Προσφορά</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@if($bids == null)
			<tr>
		        <td>Δεν υπάρχουν εγγραφές!</td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		@else
		    @foreach($bids as $bid)
			<tr>
				<td><a href="/Bitsource/public/project_task/{{$bid->id}}">{{$bid->tTitle}}</a></td>
				<td>{{$bid->tBestOffer}}</td>
				<td></td>
				<td></td>
			</tr>
			@endforeach
		@endif	
		</tbody>
	</table>	
    </div> <!-- /list-of-bids -->
	  @else
	    <a href="#" class="btn btn-default com-choice com-choice-tasks">Projects/Tasks</a>
	    <a href="#" class="btn btn-default com-choice com-choice-jobs">Aγγελιες</a>
	    <a href="#" class="btn btn-default com-choice com-choice-bids">Προσφορες</a>
	</div>  <!-- /btn-group btn-group-justified -->
	<div class="list-of-tasks">
	    <table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Τίτλος</th>
				<th>Έναρξη</th>
				<th>Λήξη</th>
				<th>Διαγραφή</th>
			</tr>
		</thead>
		<tbody>
		@if($tasks == null)
			<tr>
		        <td>Δεν υπάρχουν εγγραφές!</td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		@else  
		    @foreach($tasks as $task)
			<tr>
				<td><a href="/Bitsource/public/project_task/{{$task->id}}">{{$task->tTitle}}</a></td>
				<td>{{$task->created_at}}</td>
				<td>{{$task->tEnds}}</td>
				<td>
					
                     {!! Form::open(array('route' => array('project_task.destroy', $task->id), 'method' => 'delete' ))!!}
				    <button type="submit">Delete</button>
				  {!! Form::close() !!}


				</td>	
			</tr>
			@endforeach
		@endif	
		</tbody>
	</table>	
	</div> <!-- list-of-tasks -->
	<div class="list-of-jobs">
		<table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Τίτλος</th>
				<th>Hμ/νία Ανάρτησης</th>
				<th>Εταιρεία</th>
				<th>Διαγραφή</th>
			</tr>
		</thead>
		<tbody>
		@if($ads == null)
			<tr>
		        <td>Δεν υπάρχουν εγγραφές!</td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		@else
		    @foreach($ads as $ad)
			<tr>   
				<td><a href="/Bitsource/public/job/{{$ad->id}}">{{$ad->adTitle}}</a></td>
				<td>{{$ad->created_at}}</td>
				<td>{{$ad->adCompany}}</td>
				<td>
					
                      
                       {!! Form::open(array('route' => array('job.destroy', $ad->id), 'method' => 'delete' ))!!}
				    <button type="submit">Delete</button>
				  {!! Form::close() !!} 



				</td>	
			</tr>
			@endforeach
		@endif	
		</tbody>
	</table>
	</div> <!-- /list-of-jobs -->
	<div class="list-of-bids">
	    <table class="table table-striped table-hover ">
		<thead>
			<tr>
				<th>Τίτλος</th>
				<th>Προσφορά</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@if($bids == null)
			<tr>
		        <td>Δεν υπάρχουν εγγραφές!</td>
		        <td></td>
		        <td></td>
		        <td></td>
		    </tr>
		@else
		    @foreach($bids as $bid)
			<tr>
				<td><a href="/Bitsource/public/project_task/{{$bid->id}}">{{$bid->tTitle}}</a></td>
				<td>{{$bid->tBestOffer}}</td>
				<td></td>
				<td></td>
			</tr>
			@endforeach
		@endif	
		</tbody>
	</table>	
	</div> <!-- /list-of-bids -->
	  @endif
	

</div>  <!-- /push-task -->

@endsection


@section('js')
<script>

$(document).ready(function(){

  // prevent και για τα 3 buttons
  $(".com-choice").click(function(event) {
    event.preventDefault();
  });  //end click


  @if(Auth::user()->profile->pCategory == 'employee')
    $(".list-of-jobs").css("display", "none");  //hide αγγελίες
  	$(".list-of-bids").css("display", "none");  //hide προσφορές
  	$(".list-of-tasks").css("display", "initial"); //display tasks (only)
  	$(".com-choice-tasks").addClass("btn btn-primary");  //make button blue
  @endif

  @if(Auth::user()->profile->pCategory == 'freelancer')
  	$(".com-choice-bids").addClass("btn btn-primary");  //make button blue
  @endif

  @if(Auth::user()->profile->pCategory == 'both')
    $(".list-of-jobs").css("display", "none");  //hide αγγελίες
  	$(".list-of-bids").css("display", "none");  //hide προσφορές
  	$(".list-of-tasks").css("display", "initial"); //display tasks (only)
  	$(".com-choice-tasks").addClass("btn btn-primary");  //make button blue
  @endif   	



  //όταν πατηθεί το button projects/tasks
  $(".com-choice-tasks").click(function(){
  	$(this).removeClass("btn btn-default");  //remove white color
  	$(this).addClass("btn btn-primary");  //make button blue

  	$(".com-choice-jobs").removeClass("btn btn-primary");  //remove blue color
  	$(".com-choice-jobs").addClass("btn btn-default");  //make button white

  	$(".com-choice-bids").removeClass("btn btn-primary");  //remove blue color
  	$(".com-choice-bids").addClass("btn btn-default");  //make button white

  	$(".list-of-jobs").css("display", "none");  //hide αγγελίες
  	$(".list-of-bids").css("display", "none");  //hide προσφορές
  	$(".list-of-tasks").css("display", "initial"); //display tasks (only)
  });  //end click


  //όταν πατηθεί το button αγγελίες
  $(".com-choice-jobs").click(function(){
  	$(this).removeClass("btn btn-default");  //remove white color
  	$(this).addClass("btn btn-primary");  //make button blue

  	$(".com-choice-tasks").removeClass("btn btn-primary");  //remove blue color
  	$(".com-choice-tasks").addClass("btn btn-default");  //make button white

  	$(".com-choice-bids").removeClass("btn btn-primary");  //remove blue color
  	$(".com-choice-bids").addClass("btn btn-default");  //make button white

  	$(".list-of-tasks").css("display", "none");
  	$(".list-of-bids").css("display", "none");
  	$(".list-of-jobs").css("display", "initial");
  });  //end click


  //όταν πατηθεί το button προσφορές
  $(".com-choice-bids").click(function(){
  	$(this).removeClass("btn btn-default");  //remove white color
  	$(this).addClass("btn btn-primary");  //make button blue

  	$(".com-choice-tasks").removeClass("btn btn-primary");  //remove blue color
  	$(".com-choice-tasks").addClass("btn btn-default");  //make button white

  	$(".com-choice-jobs").removeClass("btn btn-primary");  //remove blue color
  	$(".com-choice-jobs").addClass("btn btn-default");  //make button white

  	$(".list-of-tasks").css("display", "none");
  	$(".list-of-jobs").css("display", "none");
  	$(".list-of-bids").css("display", "initial");
  });  //end click



}); //end ready

</script>
@endsection
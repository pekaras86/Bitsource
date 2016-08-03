@extends('layouts.master')

@section('content')

<div class="push-tasks">

<div class="tasks-page-title">
PROJECTS/TASKS
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

@foreach($tasks as $task)

<div class="tasks-short-profile">
  <div class="tasks-short-avatar">
  	<img src="/Bitsource/public/images/avatars/{{$task->employee->profile->pAvatar}}" class="task-owner-avatar img-responsive img-circle" alt="Responsive image">
  </div>
  <div class="tasks-short-info">
  	<h5><a href="/Bitsource/public/project_task/{{$task->id}}">{{$task->tTitle}}</a></h5>
  	<h6><a href="/Bitsource/public/profile/{{$task->employee->profile->user->id}}">{{$task->employee->profile->user->uLname}} {{$task->employee->profile->user->uFname}}</a></h6>
  	<h6 style="text-align:justify;">{{str_limit($task->tDescription, 200)}}</h6>
  	<div class="tasks-short-glyphicons">
  		<span><b>Λήξη:</b></span><span class="space"> {{$task->tEnds}}</span>
  	</div>
  </div>
  <div class="tasks-short-price-contact">
    <h6><b><u>Προϋπολογισμός</u></b></h6>
    <h5 style="text-align:center;">
      <b>{{$task->tBudget}}</b>
    </h5>
  </div>
</div>

@endforeach

</div> <!-- /freelancers-short-main -->

<div class="task-keno"></div>

</div> <!-- /push-tasks --> 
@endsection
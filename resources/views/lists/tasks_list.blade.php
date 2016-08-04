@extends('layouts.master')

@section('content')

<div class="push-tasks">

<div class="tasks-page-title">
PROJECTS/TASKS
</div>
    
    <form class="tasks-search2" action="{{ action('TasksListSearchController@show') }}">
        <input type="hidden" class="form-control" name="skills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
        <textarea id="textarea" rows="2" style="width:670px;"></textarea>
        <span class="input-group-btn">
            <button class="btn btn-default" style="margin-left:690px;" type="submit">ΑΝΑΖΗΤΗΣΗ</button>
        </span>
        <div style="color:red;">*Πληκτρολογήστε ικανότητες όπως : css, php, ruby, javascript </div>
    </form>
    

<div class="tasks-short-main">

@if($tasks_search == 0)

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

@endif

@if($tasks_search == 1)

@if($tasks_table == 'Den')
  
  <div style="margin-left:240px;">Δεν υπάρχουν αποτελέσματα!</div>

@else
    @foreach($tasks_table as $task_table)
      <div class="tasks-short-profile">
      <div class="tasks-short-avatar">
        <img src="/Bitsource/public/images/avatars/{{$task_table->employee->profile->pAvatar}}" class="task-owner-avatar img-responsive img-circle" alt="Responsive image">
      </div>
      <div class="tasks-short-info">
        <h5><a href="/Bitsource/public/project_task/{{$task_table->id}}">{{$task_table->tTitle}}</a></h5>
        <h6><a href="/Bitsource/public/profile/{{$task_table->employee->profile->user->id}}">{{$task_table->employee->profile->user->uLname}} {{$task_table->employee->profile->user->uFname}}</a></h6>
        <h6 style="text-align:justify;">{{str_limit($task_table->tDescription, 200)}}</h6>
        <div class="tasks-short-glyphicons">
          <span><b>Λήξη:</b></span><span class="space"> {{$task_table->tEnds}}</span>
        </div>
      </div>
      <div class="tasks-short-price-contact">
        <h6><b><u>Προϋπολογισμός</u></b></h6>
        <h5 style="text-align:center;">
          <b>{{$task_table->tBudget}}</b>
        </h5>
      </div>
    </div>
    @endforeach
@endif
@endif

</div> <!-- /freelancers-short-main -->

<div class="task-keno"></div>

</div> <!-- /push-tasks --> 
@endsection





@section('js')

<script>

$(document).ready(function () {

  // auto complete skills tags
    $('#textarea')
        .textext({
            html : {
               hidden:('<input type="hidden" name="tags" />')
            },
            plugins : 'tags autocomplete filter',
            useSuggestionsToFilter : true
        })
        .bind('getSuggestions', function(e, data)
        {
            var list = [
                    'HTML',
                    'CSS',
                    'Javascript',
                    'PHP',
                    'C#',
                    'Python',
                    'Ruby',
                    'Go',
                    'Node.js',
                    'Ruby on Rails',
                    'Java',
                    'Android',
                    'MySQL',
                    'AngularJS',
                    'React',
                    'jQuery',
                    'Bootstrap',
                    'Foundation',
                    'MongoDB',
                ],
                textext = $(e.target).textext()[0],
                query = (data ? data.query : '') || '';

            $(this).trigger(
                'setSuggestions',
                { result : textext.itemManager().filter(list, query) }
            );
        });

}); //end ready


</script>

@endsection
@extends('layouts.master')

@section('content')
<div class="push-update-profile">


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


	<div>
		<h4>Ανάρτηση Project/Task</h4>
	</div>

    {!! Form::open(array('method' => 'put', 'route' => ['project_task.update', $task->id], 'class' => 'update-profile-page', 'id' => 'faker2', 'files' => true )) !!}
	    
	     <div class="update-title-section">
	    	
              <div class="form-group update-title">
              	  <label for="updateInputTitle"><b>ΤΙΤΛΟΣ</b></label>
              	  <input type="text" name="taskTitle" class="form-control" id="taskTitle" placeholder="π.χ Κατασκευή e-shop" value="{{$task->tTitle}}" > 
              </div>

	     </div> <!--/update-title-section-->


	     <div class="update-user-description-section">
	    	
	    	<div class="form-group">
	    	    <label for="updateInputPhone"><b>ΠΕΡΙΓΡΑΦΗ</b></label>
	    		<textarea class="form-control" id="taskDescription" rows="10" name="taskDescription" placeholder="Περιγράψτε το Project ή Task...">{{$task->tDescription}}</textarea>
	    	</div>
              
	    </div> <!--/update-user-description-section-->


	    <div class="update-name-section">

	      <div class="update-fname">
	        <label for="updateInputFName"><b>ΠΡΟΫΠΟΛΟΓΙΣΜOΣ</b></label>
	        <select class="form-control task_budget" name="taskBudget">
	        @if($task->tBudget == '5 - 50 €')
						<option selected="selected">5 - 50 &#8364</option>
          @else
            <option>5 - 50 &#8364</option>
          @endif

          @if($task->tBudget == '50 - 250 €')
						<option selected="selected">50 - 250 &#8364</option>
          @else
            <option>50 - 250 &#8364</option>
          @endif

          @if($task->tBudget == '250 - 500 €')
						<option selected="selected">250 - 500 &#8364</option>
          @else
            <option>250 - 500 &#8364</option>
          @endif  

          @if($task->tBudget == '500 - 1000 €')
						<option selected="selected">500 - 1000 &#8364</option>
          @else
            <option>500 - 1000 &#8364</option>
          @endif    
					

          </select>
	      </div> <!-- /update-fname -->

	      <div class="form-group update-lname">
	          <label for="updateInputLName"><b>ΛΗΞΗ</b></label>
	          <input type="text" name="taskEnds" class="form-control" id="task_ends" placeholder="Ημ/νία λήξης προσφορών" value="{{$task->tEnds}}">	
	      </div>
	    	
	    </div> <!--/update-name-section-->


	    <div class="update-user-skills-section">
	    	
              <div class="form-group update-user-skills">
              	  <label for="updateInputSkills"><b>IKANOTHTEΣ</b></label>
              	  <input type="hidden" class="form-control" name="skills" id="taskSkills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
                  <textarea id="textarea" class="example" rows="2"></textarea>
              </div>

	    </div> <!--/update-user-skills-section-->
    
        
        <div class="update-user-button">
	        <input type="submit" value="ΑΠΟΘΗΚΕΥΣΗ" class="btn btn-primary btn-lg">
        </div>


    {!! Form::close() !!}

</div> <!-- /push-update-profile -->
@endsection






@section('js')

<script>

$(document).ready(function () {

	$('#textarea')
        .textext({
            html : {
               hidden:('<input type="hidden" name="tags">')
            },
            plugins : 'tags autocomplete',
            useSuggestionsToFilter : true,
            
            tagsItems: [
             
             @foreach($task->skills as $skill) 
              '{{$skill->sName}}',
	  		     @endforeach

            ],
            
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
        });  // end bind

});  // end ready

</script>

@endsection
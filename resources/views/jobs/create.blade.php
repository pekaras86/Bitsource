@extends('layouts.master')

@section('content')

<div class="push-create-job-page">
	



<div class="aggelia-create">


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
		<h4>Ανάρτηση Αγγελίας</h4>
</div>


{!! Form::open(array('route' => 'job.store', 'class' => 'update-profile-page', 'id' => 'faker2', 'files' => true )) !!}
	    
	     <div class="update-title-section">
	    	
              <div class="form-group update-title">
              	  <label for="updateInputTitle"><b>ΤΙΤΛΟΣ</b></label>
              	  <input type="text" name="job-title" class="form-control" id="taskTitle" placeholder="π.χ Web Designer UI/UX Specialist" > 
              </div>

	     </div> <!--/update-title-section-->

       
       <div class="update-name-section">

	      <div class="form-group update-fname">
	          <label for="updateInputFName"><b>ΕTAIΡEIA</b></label>
	          <input type="text" name="company-name" class="form-control" id="updateInputFName" placeholder="Όνομα εταιρείας...">	
	      </div>

	      <div class="update-fname">
	        <label for="updateInputFName"><b>ΑΠΑΣΧΟΛΗΣΗ</b></label>
	        <select class="form-control task_budget" name="job-type">
						<option value="pliris">Πλήρης</option>
						<option value="meriki">Μερική</option>
          </select>
	      </div> <!-- /update-fname -->
	    	
	    </div> <!--/update-name-section-->


	    <div class="update-name-section">

	      <div class="form-group update-fname">
	          <label for="updateInputFName"><b>ΠΟΛΗ</b></label>
	          <input type="text" name="job-city" class="form-control" id="updateInputFName" placeholder="Έδρα Εργασίας...">	
	      </div>

	      <div class="update-fname">
	        <label for="updateInputFName"><b>Επίπεδο Σπουδών:</b></label>
	        <select class="form-control task_budget" name="education">
						<option value="aei">Α.Ε.Ι</option>
						<option value="tei">Τ.Ε.Ι</option>
						<option value="iek">Ι.Ε.Κ</option>
						<option value="akathoristo">Ακαθόριστο</option>
          </select>
	      </div> <!-- /update-fname -->
	    	
	    </div> <!--/update-name-section-->
       

	     <div class="update-user-description-section">
	    	
	    	<div class="form-group">
	    	    <label for="updateInputPhone"><b>ΠΕΡΙΓΡΑΦΗ</b></label>
	    		<textarea class="form-control" id="taskDescription" rows="5" name="job-description" placeholder="Περιγράψτε τη θέση εργασίας..."></textarea>
	    	</div>
              
	    </div> <!--/update-user-description-section-->

	    <div class="update-user-description-section">
	    	
	    	<div class="form-group">
	    	    <label for="updateInputPhone"><b>ΠΑΡΟΧΕΣ</b></label>
	    		<textarea class="form-control" id="taskDescription" rows="5" name="job-provisions" placeholder="Περιγράψτε τις παροχές θέσης εργασίας..."></textarea>
	    	</div>
              
	    </div> <!--/update-user-description-section-->


	    <div class="update-name-section">

	      <div class="form-group update-lname">
	          <label for="updateInputLName"><b>ΙΣΤΟΤΟΠΟΣ</b></label>
	          <input type="text" name="job-website" class="form-control" id="task_ends" placeholder="Iστότοπος εργασίας...">	
	      </div>

	      <div class="form-group update-lname">
	          <label for="updateInputLName"><b>Ε-MAIL</b></label>
	          <input type="text" name="job-email" class="form-control" id="task_ends" placeholder="Ε-mail επικοινωνίας...">	
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


</div> <!-- /aggelia-create -->


</div> <!-- /push-create-job-page -->

@endsection

@section('js')
<script>
  $(document).ready(function(){

  
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
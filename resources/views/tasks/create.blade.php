@extends('layouts.master')

@section('content')


<div class="push-update-profile">


	<div>
		<h4>Ανάρτηση Project/Task</h4>
	</div>

    {!! Form::open(array('route' => 'profile.store', 'class' => 'update-profile-page', 'id' => 'faker2', 'files' => true )) !!}
	    
	     <div class="update-title-section">
	    	
              <div class="form-group update-title">
              	  <label for="updateInputTitle"><b>ΤΙΤΛΟΣ</b></label>
              	  <input type="text" name="title" class="form-control" id="updateInputTitle" placeholder="π.χ Κατασκευή e-shop" > 
              </div>

	     </div> <!--/update-title-section-->


	     <div class="update-user-description-section">
	    	
	    	<div class="form-group">
	    	    <label for="updateInputPhone"><b>ΠΕΡΙΓΡΑΦΗ</b></label>
	    		<textarea class="form-control" id="updateInputDescription" rows="10" name="description" placeholder="Περιγράψτε το Project ή Task..."></textarea>
	    	</div>
              
	    </div> <!--/update-user-description-section-->


	    <div class="update-name-section">

	      <div class="update-fname">
	        <label for="updateInputFName"><b>ΠΡΟΫΠΟΛΟΓΙΣΜOΣ</b></label>
	        <select class="form-control">
						<option>5 - 50 &#8364</option>
						<option>50 - 250 &#8364</option>
						<option>250 - 500 &#8364</option>
						<option>500 - 1000 &#8364</option>
          </select>
	      </div> <!-- /update-fname -->

	      <div class="form-group update-lname">
	          <label for="updateInputLName"><b>ΛΗΞΗ</b></label>
	          <input type="text" name="last-name" class="form-control" id="updateInputLName" placeholder="Ημ/νία λήξης προσφορών">	
	      </div>
	    	
	    </div> <!--/update-name-section-->


	    <div class="update-user-skills-section">
	    	
              <div class="form-group update-user-skills">
              	  <label for="updateInputSkills"><b>IKANOTHTEΣ</b></label>
              	  <input type="hidden" class="form-control" name="skills" id="updateInputSkills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
                  <textarea id="textarea" class="example" rows="2"></textarea>
              </div>

	    </div> <!--/update-user-skills-section-->
    
        
        <div class="update-user-button">
	        <input type="submit" value="ΑΠΟΘΗΚΕΥΣΗ" class="btn btn-primary btn-lg">
        </div>


    {!! Form::close() !!}

    


</div> <!-- /push-update-profile -->









@endsection
@extends('layouts.master')

@section('content')

<div class="push-update-profile">

	<div>
		<h4>Ρυθμίσεις Προφίλ</h4>
	</div>

	<div class="update-profile-page">
    
	    <div class="update-photo-category-section">
	        
	        <div class="update-user-photo">
			    <img src="images/avatar.png" alt="..." class="img-circle default-user-img">
			    <a href="#" class="btn btn-primary btn-xs avatar-btn">ΑΛΛΑΓΗ ΕΙΚΟΝΑΣ</a>	
		    </div>

		    <div class="update-user-category">
			    <fieldset class="user-category-radios">
					<div class="form-group">
				      <label class="col-lg-2 control-label"><b>ΚΑΤΗΓΟΡΙΑ</b></label>
				      <div class="col-lg-10">
				        <div class="radio">
				          <label>
				            <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
				            Επαγγελματίας
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
				            Εργοδότης
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
				            Και τα δύο
				          </label>
				        </div>
				      </div>
				    </div>
			    </fieldset>	
		    </div>

	    </div> <!--/update-photo-category-section-->

	    <div class="update-name-section">

	      <div class="form-group update-fname">
	          <label for="updateInputFName"><b>ONOMA</b></label>
	          <input type="text" class="form-control" id="updateInputFName" placeholder="Όνομα">	
	      </div>

	      <div class="form-group update-lname">
	          <label for="updateInputLName"><b>ΕΠΙΘΕΤΟ</b></label>
	          <input type="text" class="form-control" id="updateInputLName" placeholder="Επίθετο">	
	      </div>
	    	
	    </div> <!--/update-name-section-->

	    <div class="update-title-section">
	    	
              <div class="form-group update-title">
              	  <label for="updateInputTitle"><b>ΤΙΤΛΟΣ ΕΡΓΑΣΙΑΣ</b></label>
              	  <input type="text" class="form-control" id="updateInputTitle" placeholder="π.χ Web Designer ; Mobile Developer..."> 
              </div>

	    </div> <!--/update-title-section-->

	    <div class="update-rate-phone-section">

	      <div class="form-group update-rate">
	          <label for="updateInputRate"><b>ΩΡΟΜΙΣΘΙΟ</b></label>
	          <div class="input-group">
	              <div class="input-group-addon"><span class="update-euro-symbol">€</span></div>
	              <input type="text" class="form-control" id="updateInputRate" placeholder="Ωρομίσθιο">	
	          </div>
	      </div>

	      <div class="form-group update-pnone">
	          <label for="updateInputPhone"><b>ΤΗΛΕΦΩΝΟ ΕΠΙΚΟΙΝΩΝΙΑΣ</b></label>
	          <input type="text" class="form-control" id="updateInputPhone" placeholder="Τηλέφωνο Επικοινωνίας">	
	      </div>
	    	
	    </div> <!--/update-rate-phone-section-->

	    <div class="update-user-description-section">
	    	
	    	<div class="form-group">
	    	    <label for="updateInputPhone"><b>ΠΕΡΙΓΡΑΦΗ</b></label>
	    		<textarea class="form-control" rows="5" placeholder="Περιγράψτε τον εαυτό σας..."></textarea>
	    	</div>
              
	    </div> <!--/update-user-description-section-->

	    <div class="update-user-skills-section">
	    	
              <div class="form-group update-user-skills">
              	  <label for="updateInputSkills"><b>IKANOTHTEΣ</b></label>
              	  <input type="text" class="form-control" id="updateInputSkills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
              </div>

	    </div> <!--/update-user-skills-section-->

	    <div class="update-user-location-section">
	    	
              <div class="form-group update-user-location">
              	  <label for="updateInputLocation"><b>ΠΕΡΙΟΧΗ</b></label>
              	  <input type="text" class="form-control" id="updateInputLocation" placeholder="Περιοχή"> 
              </div>

	    </div> <!--/update-user-skills-section-->
        
        <div class="update-user-button">
	        <a href="#" class="btn btn-primary btn-lg">ΑΠΟΘΗΚΕΥΣΗ</a>
        </div>


	</div> <!--/update-profile-page-->


</div> <!-- /push-update-profile -->

@endsection
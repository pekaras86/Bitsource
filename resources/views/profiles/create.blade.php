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
		<h4>Ρυθμίσεις Προφίλ</h4>
	</div>

    {!! Form::open(array('route' => 'profile.store', 'class' => 'update-profile-page', 'id' => 'faker2', 'files' => true )) !!}
	    
	    <div class="update-photo-category-section">
	        
			<div class="update-user-photo">
				<img src="/bitsource/public/images/avatar.png" alt="..." class="img-circle default-user-img" id="blah">
				<div class="fileUpload btn btn-primary btn-xs">
					<span>ΑΛΛΑΓΗ ΕΙΚΟΝΑΣ</span>
					<input type="file" class="upload" id="imgInp" name="avatar">
				</div>
			</div>

		    <div class="update-user-category">
			    <fieldset class="user-category-radios">
					<div class="form-group">
				      <label class="col-lg-2 control-label"><b>ΚΑΤΗΓΟΡΙΑ</b></label>
				      <div class="col-lg-10">
				        <div class="radio">
				          <label>
				            <input name="category" id="optionsRadios1" value="freelancer" type="radio">
				            Επαγγελματίας
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input name="category" id="optionsRadios2" value="employee" type="radio">
				            Εργοδότης
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input name="category" id="optionsRadios3" value="both" type="radio">
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
	          <input type="text" name="first-name" class="form-control" id="updateInputFName" placeholder="{{ Auth::user()->uFname }}" disabled>	
	      </div>

	      <div class="form-group update-lname">
	          <label for="updateInputLName"><b>ΕΠΙΘΕΤΟ</b></label>
	          <input type="text" name="last-name" class="form-control" id="updateInputLName" placeholder="{{ Auth::user()->uLname }}" disabled>	
	      </div>
	    	
	    </div> <!--/update-name-section-->

	    <div class="update-title-section">
	    	
              <div class="form-group update-title">
              	  <label for="updateInputTitle"><b>ΤΙΤΛΟΣ ΕΡΓΑΣΙΑΣ</b></label>
              	  <input type="text" name="title" class="form-control" id="updateInputTitle" placeholder="π.χ Web Designer ; Mobile Developer..." > 
              </div>

	    </div> <!--/update-title-section-->

	    <div class="update-rate-phone-section">

	      <div class="form-group update-rate">
	          <label for="updateInputRate"><b>ΩΡΟΜΙΣΘΙΟ</b></label>
	          <div class="input-group">
	              <div class="input-group-addon"><span class="update-euro-symbol">€</span></div>
	              <input type="text" name="salary" class="form-control" id="updateInputRate" placeholder="Ωρομίσθιο">	
	          </div>
	      </div>

	      <div class="form-group update-pnone">
	          <label for="updateInputPhone"><b>ΤΗΛΕΦΩΝΟ ΕΠΙΚΟΙΝΩΝΙΑΣ</b></label>
	          <input type="tel" name="telephone" class="form-control" id="updateInputPhone" placeholder="Τηλέφωνο Επικοινωνίας">	
	      </div>
	    	
	    </div> <!--/update-rate-phone-section-->

	    <div class="update-user-description-section">
	    	
	    	<div class="form-group">
	    	    <label for="updateInputPhone"><b>ΠΕΡΙΓΡΑΦΗ</b></label>
	    		<textarea class="form-control" id="updateInputDescription" rows="5" name="description" placeholder="Περιγράψτε τον εαυτό σας..."></textarea>
	    	</div>
              
	    </div> <!--/update-user-description-section-->

	    <div class="update-user-skills-section">
	    	
              <div class="form-group update-user-skills">
              	  <label for="updateInputSkills"><b>IKANOTHTEΣ</b></label>
              	  <input type="hidden" class="form-control" name="skills" id="updateInputSkills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
                  <textarea id="textarea" class="example" rows="2"></textarea>
              </div>

	    </div> <!--/update-user-skills-section-->

	    <div class="update-portfolio-section">
	      
	    <label for="updateInputLocation"><b>PORTFOLIO</b><img src="/bitsource/public/images/add-button-md.png" alt="" id="addPortfolio"></label>  
	    <div class="update-portfolio" id="updatePortfolio">
	      
	      
	      
		
		</div>

        </div> <!--/update-portfolio-section-->

        <!-- Modal -->
		<div id="newModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Προσθήκη Portfolio</h4>
		      </div>
		      <div class="modal-body">
		          <div class="form-group">
		            <label for="recipient-name" class="control-label">Link:</label>
		            <input type="text" class="form-control" id="linkModal" name="modalLink">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="control-label">Περιγραφή:</label>
		            <textarea class="form-control" id="descriptionModal" name="modalDescription"></textarea>
		          </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">ΑΚΥΡΟ</button>
		        <button type="button" class="btn btn-primary" id="addendumPorfolio">ΠΡΟΣΘΗΚΗ</button>
		      </div>
		    </div>

		  </div>
		</div>
		<!-- /Modal -->

	    <div class="update-user-location-section">
	    	
              <div class="form-group update-user-location">
              	  <label for="updateInputLocation"><b>ΠΕΡΙΟΧΗ</b></label>
              	  <input type="text" class="form-control" name="location" id="updateInputLocation" placeholder="Περιοχή"> 
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

// Avatar Preview
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});

// Portfolio
$(document).ready(function () {

	

	$('#addPortfolio').click(function() {  // 'Add Portfolio'
         $('#newModal').modal('show');
	}); // end click

	

	$('#addendumPorfolio').click(function() {  // 'Prosthiki Portfolio'
      
      // piase tis times twn fields
      var link        = $('#linkModal').val();
      var description = $('#descriptionModal').val();
      if (link === '' || description === '') {
        return false;
      }
	  
      //dimiourgise ena neo portfolio
	  var portfolioHTML = '<ul class="new-portfolio">';
	  portfolioHTML    += '<li class="port-li"><a href="#" class="port-link"></a><a href="#" id="removePortfolio">Αφαίρεση</a></li>';
	  portfolioHTML    += '<p class="port-description"></p>';
      portfolioHTML    += '<input type="hidden" name="portLink[]" value="" id="portLinkHidden">';
      portfolioHTML    += '<input type="hidden" name="portDesc[]" value="" id="portDescHidden">';
	  portfolioHTML    += '</ul>';

	  // perna tis times sto neo portfolio
	  var $newPortfolio = $(portfolioHTML);
	  $newPortfolio.find('.port-link').text(link);
	  $newPortfolio.find('.port-link').attr('href', link);
	  $newPortfolio.find('.port-description').text(description);
      $newPortfolio.find('#portLinkHidden').val(link);
      $newPortfolio.find('#portDescHidden').val(description);
	  
      //vale to portfolio stin oura
	  $('.update-portfolio').prepend($newPortfolio);

	  //kleise to modal
	  $('#newModal').modal('hide');

    });  // end click


    
    
    // Remove Portfolio
    $('.update-portfolio').on('click', '#removePortfolio', function(e) {  
      e.preventDefault();
      $(this).parents('.new-portfolio').remove();
    });  //end on



    /* 
    // Transfer text inputs via ajax
    $('form').on('submit', function(e) {
    	
    	e.preventDefault();

		var modalData = {	
			links        : [],
			descriptions : []
		};
      
		$('.new-portfolio').each( function() {
			var link = $(this).find('.port-link').text();
			modalData.links.push(link);

			var description = $(this).find('.port-description').text();  
			modalData.descriptions.push(description);
		});

        var userCategory = $("input[name=category]:checked").val();

    	$.post('/Bitsource/public/profile',
    	  {
    		newLink     : modalData.links,
    		newDesc     : modalData.descriptions,
    		title       : $('#updateInputTitle').val(),
    		salary      : $('#updateInputRate').val(),
    		telephone   : $('#updateInputPhone').val(),
    		skills      : $('#updateInputSkills').val(),
    		location    : $('#updateInputLocation').val(),
    		description : $('#updateInputDescription').val(),
    		category    : userCategory
    	  },
    	 function(data, status){
    		console.log("Data: " + data + "\nStatus: " + status)
    	 });
    });  // end transfer input data via ajax
    */

    
    /*
    // Transfer profile image via ajax
    $('form').on('submit', function(e) {
       
       e.preventDefault();

        $.ajax({
              url         :'/Bitsource/public/profile',
              data        : {
                avatar : new FormData($("#faker2"))
                },
              dataType    : 'json',
              async       : false,
              type        : 'post',
              processData : false,
              contentType : false,
              success     : function(response){
                console.log(response);
              },
            });
     }); // end send image via ajax on submit
     */

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

        

});  //end ready 

</script>

@endsection


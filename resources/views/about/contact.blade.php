@extends('layouts.master')

@section('content')


<div class="push-contact-page">

    <form class="form-horizontal contact-form" action="{{ action('AboutController@store')}}" method="post">
      <fieldset>
        <legend>Επικοινωνήστε μαζί μας</legend>
        <div class="form-group">
          <label for="contactName" class="col-lg-2 control-label">Όνομα</label>
          <div class="col-lg-10">
            <input class="form-control" id="contactName" placeholder="Όνομα" type="text" name="name" required>
          </div>
        </div>
        <div class="form-group">
          <label for="contactMail" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input class="form-control" id="contactMail" placeholder="Email" name="email" type="email" required>
          </div>
        </div>
        <div class="form-group">
        	<label for="contactMessage" class="col-lg-2 control-label">Μήνυμα</label>
        	<div class="col-lg-10">
        	  <textarea class="form-control" rows="3" id="contactMessage" placeholder="Μήνυμα" name="message" type="text" required></textarea>
        	</div>  
        </div>
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">ΑΠΟΣΤΟΛΗ </button>
          </div>
        </div>
      </fieldset>
    </form>

</div> <!-- /push-contact-page -->

@endsection
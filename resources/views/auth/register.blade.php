@extends('layouts.master')

@section('content')

<div class="push-register-page">

<form class="form-horizontal register-form">
  <fieldset>
    <legend>Καλώς ήρθατε στο Bitsource</legend>
    <div class="form-group">
      <label for="inputUserName" class="col-lg-2 control-label">Όνομα Χρήστη</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputUserName" placeholder="Όνομα Χρήστη" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="Email" type="email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Κωδικός</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword" placeholder="Κωδικός" type="password">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Επιβεβαίωση Κωδικού</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword" placeholder="Επιβεβαίωση Κωδικού" type="password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-success">ΕΓΓΡΑΦΗ </button>
      </div>
    </div>
  </fieldset>
</form>

</div> <!-- /push-register-page -->

@endsection
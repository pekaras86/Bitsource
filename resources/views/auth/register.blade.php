@extends('layouts.master')

@section('content')

<div class="push-register-page">

<form class="form-horizontal register-form" action=" auth/register " method="post">
  <fieldset>
    <legend>Καλώς ήρθατε στο Bitsource</legend>
    <div class="form-group">
      <label for="inputUserName" class="col-lg-2 control-label">Όνομα Χρήστη</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputUserName" placeholder="Όνομα Χρήστη" type="text" name="name">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputEmail" placeholder="Email" type="email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Κωδικός</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword" placeholder="Κωδικός" type="password" name="password">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Επιβεβαίωση Κωδικού</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword" placeholder="Επιβεβαίωση Κωδικού" type="password" name="password_confirmation">
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
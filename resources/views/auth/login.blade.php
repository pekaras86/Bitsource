@extends('layouts.master')

@section('content')
<form class="form-horizontal sign-in-form">
  <fieldset>
    <legend>Συνδεθείτε στο λογαριασμό σας</legend>
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
        <div class="checkbox">
          <label>
            <input type="checkbox"> Να με θυμάσαι
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">ΣΥΝΔΕΣΗ </button>
      </div>
    </div>
  </fieldset>
</form>
@endsection
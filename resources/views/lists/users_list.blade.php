@extends('layouts.master')

@section('content')

<div class="freelancers-push">

<div class="freelancer-page-title">
FREELANCERS
</div>

<form class="freelancers-search-form">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Αναζητήστε με βάση το όνομα, τις ικανότητες ή την τοποθεσία" aria-label="...">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">ΑΝΑΖΗΤΗΣΗ</button>
    </span>
  </div><!-- /input-group --> 
</form>

<div class="freelancers-short-main">


@foreach ($profiles as $profile)

    <div class="freelancer-short-profile">
      <div class="freelancer-short-avatar">
        <img src="/Bitsource/public/images/avatars/{{$profile->pAvatar}}" class="free-list img-responsive img-circle" alt="Responsive image">
      </div>
      <div class="freelancer-short-info">
        <h5><a href="/Bitsource/public/profile/{{$profile->id}}">{{$profile->uLname . ' ' . $profile->uFname}}</a></h5>
        <h6>{{$profile->pTitle}}</h6>
        <div class="freelancer-short-glyphicons">
          <span class="glyphicon glyphicon-map-marker"></span><span class="space">{{$profile->pLocation}}</span>
        </div>
      </div>
      <div class="freelancer-short-price-contact">
        <h5>
          <span class="glyphicon glyphicon-euro"></span> {{$profile->pSalary}}/ώρα
        </h5>
        
        @if(Auth::guest())
        <a href="{{URL::to('login')}}"><button class="btn btn-info" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button></a>
        @else
        <button class="btn btn-info" data-toggle="modal" data-target="#free-modal-list">ΕΠΙΚΟΙΝΩΝΙΑ</button>

        <!-- Modal -->
        <div id="free-modal-list" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ΕΠΙΚΟΙΝΩΝΙΑ</h4>
              </div>
                <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="control-label">Mήνυμα:</label>
            <textarea rows="5" class="form-control" id="reviewComment" name="modalDescription"></textarea>
        </div>
        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ΑΚΥΡΟ</button>
                <button type="button" class="btn btn-primary">ΑΠΟΣΤΟΛΗ</button>
              </div>
            </div>

          </div>
        </div>  <!-- /Modal -->
        @endif

        
      </div>
    </div>  



@endforeach


</div> <!-- /freelancers-short-main -->

</div> <!-- /freelancers-push -->

@endsection
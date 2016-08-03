@extends('layouts.master')

@section('content')

<div class="push-jobs">

<div class="jobs-page-title">
ΕΡΓΑΣΙΑ
</div>

<form class="jobs-search-form">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Αναζητήστε με βάση τον τίτλο, τις ικανότητες ή την τοποθεσία" aria-label="...">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">ΑΝΑΖΗΤΗΣΗ</button>
    </span>
  </div><!-- /input-group --> 
</form>

<div class="jobs-short-main">

@foreach($jobs as $job)

<div class="jobs-short-profile">
  <div class="jobs-short-avatar">
  	<img src="/Bitsource/public/images/avatars/{{$job->employee->profile->pAvatar}}" class="task-owner-avatar img-responsive img-circle" alt="Responsive image">
  </div>
  <div class="jobs-short-info">
  	<h5><a href="/Bitsource/public/job/{{$job->id}}">{{$job->adTitle}}</a></h5>
  	<h6><a href="/Bitsource/public/profile/{{$job->employee->profile->user->id}}">{{$job->employee->profile->user->uLname}} {{$job->employee->profile->user->uFname}} </a></h6>
  	<h6 style="text-align:justify;">{{str_limit($job->adDesc, 200)}}</h6>
  	<div class="jobs-short-glyphicons">
  		<span class="glyphicon glyphicon-map-marker"></span><span class="space">{{$job->adCity}}</span>
  		<span class="glyphicon glyphicon-briefcase"></span><span class="space">

      @if($job->adType == 'pliris')
      Πλήρης Απασχόληση</span>
      @else
      Μερική Απασχόληση</span>
      @endif
  	
    </div>
  </div>
  <div class="jobs-short-price-contact">
    @if(Auth::guest())
    <a href="{{URL::to('login')}}"><button style="margin-top:60px;" class="btn btn-info" type="submit">ΕΠΙΚΟΙΝΩΝΙΑ</button></a>
    @else
    <button style="margin-top:60px;" class="btn btn-info" data-toggle="modal" data-target="#job-modal-list">ΕΠΙΚΟΙΝΩΝΙΑ</button>
    
            <!-- Modal -->
        <div id="job-modal-list" class="modal fade" role="dialog">
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

<div class="job-keno" style="height:100px;"></div>

</div> <!-- /push-jobs -->

@endsection
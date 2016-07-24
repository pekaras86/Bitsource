@extends('layouts.master')

@section('content')

<div class="push-job-description">

<div class="job-description-body">
    
    @if(Auth::user())
      @if(Auth::user()->profile->employee->id == $ad->eId)
        <div class="edit-task-btn">
           <a href="/Bitsource/public/job/{{$ad->id}}/edit" class="btn btn-info btn-xs" role="button">Edit</a>
        </div>
      @endif
	@endif

    <h5>{{$ad->adTitle}}</h5>
	<h7>από <a href="http://localhost/Bitsource/public/profile/{{$ad->employee->profile->user->id}}">{{$ad->employee->profile->user->uLname}} {{$ad->employee->profile->user->uFname}}</a><h7>

	<hr>
	<div><span class="job-description-labels">Εταιρεία:</span> <span>{{$ad->adCompany}}</span></div>
	<div><span class="job-description-labels">Ημ/νία Δημοσίευσης:</span> <span>{{$ad->created_at}}</span></div>
	<div><span class="job-description-labels">Απασχόληση:</span> 
    @if($ad->adType == 'pliris')
      <span>Πλήρης</span></div>
    @else
      <span>Μερική</span></div>  
    @endif
	<div><span class="job-description-labels">Πόλη:</span> <span>{{$ad->adCity}}</span></div>
	<div><span class="job-description-labels">Επίπεδο Σπουδών:</span>
    @if($ad->adStudies == 'aei') 
      <span>A.E.I</span></div>
    @elseif($ad->adStudies == 'tei')
      <span>T.E.I</span></div>
    @elseif($ad->adStudies == 'iek')
      <span>I.E.K</span></div>
    @else
      <span>Aκαθόριστο</span></div>
    @endif
    
    <br>

	<h6 class="job-description-labels"><b>Περιγραφή</b></h6>
	<hr>
	<p class="job-just">{{$ad->adDesc}}</p>
    
    <br>

    <h6 class="job-description-labels"><b>Απαραίτητα Προσόντα</b></h6>
    <hr>
    <p class="job-just">
    	{{$ad->adProvisions}}<br>
    </p>

    <br>

    <h6 class="job-description-labels"><b>Στoιχεία επικοινωνίας</b></h6>
    <hr>
    
    <div><span class="job-description-labels">Email:</span> <span>{{$ad->adEmail}}</span></div>
    <div><span class="job-description-labels">Ιστότοπος:</span> <span>{{$ad->adWebsite}}</span> </div>

    <br>
    
    @if(count($ad->skills) === 0)
    @else
    <h6 class="job-description-labels"><b>Ικανότητες</b></h6>
    <hr>
        
        <ul class="task-required-skills">
            @foreach($ad->skills as $skill) 
              <span class="desc-skills">{{$skill->sName}}</span>
            @endforeach
        </ul>
        @endif
</div>  <!--/job-description-body-->
	
</div>  <!--/push-job-description-->

@endsection




 
        
        
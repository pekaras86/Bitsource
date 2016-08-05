@extends('layouts.master')

@section('content')

<div class="freelancers-push">

<div class="freelancer-page-title">
FREELANCERS
</div>

    <form class="tasks-search3" action="{{ action('FreelancersListSearchController@show') }}">
        <input type="hidden" class="form-control" name="skills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
        <textarea id="textarea" rows="2" style="width:670px;"></textarea>
        <span class="input-group-btn">
            <button class="btn btn-default" style="margin-left:690px;" type="submit">ΑΝΑΖΗΤΗΣΗ</button>
        </span>
        <div style="color:red;">*Πληκτρολογήστε ικανότητες όπως : css, php, ruby, javascript </div>
    </form>

<div class="freelancers-short-main">

@if($profiles_search == 0)
@foreach ($profiles as $profile)

    <div class="freelancer-short-profile">
      <div class="freelancer-short-avatar">
        <img src="/Bitsource/public/images/avatars/{{$profile->pAvatar}}" class="free-list img-responsive img-circle" alt="Responsive image">
      </div>
      <div class="freelancer-short-info">
        <h5><a href="/Bitsource/public/profile/{{$profile->user->id}}">{{$profile->user->uLname . ' ' . $profile->user->uFname}}</a></h5>
        <h6>{{$profile->pTitle}}</h6>
        <div class="freelancer-short-glyphicons">
          <span class="glyphicon glyphicon-map-marker"></span><span class="space">{{$profile->pLocation}}</span>
        </div>
        <div>
            Ικανότητες : 
            @foreach($profile->skills as $skill)
              <a href="#">{{$skill->sName}}</a>
            @endforeach
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
@endif



@if($profiles_search == 1)
  
  @if($profiles_table == 'Den')

    <div style="margin-left:240px;">Δεν υπάρχουν αποτελέσματα!</div>

  @else
    
    @foreach ($profiles_table as $profile_table)

    <div class="freelancer-short-profile">
      <div class="freelancer-short-avatar">
        <img src="/Bitsource/public/images/avatars/{{$profile_table->pAvatar}}" class="free-list img-responsive img-circle" alt="Responsive image">
      </div>
      <div class="freelancer-short-info">
        <h5><a href="/Bitsource/public/profile/{{$profile_table->user->id}}">{{$profile_table->user->uLname . ' ' . $profile_table->user->uFname}}</a></h5>
        <h6>{{$profile_table->pTitle}}</h6>
        <div class="freelancer-short-glyphicons">
          <span class="glyphicon glyphicon-map-marker"></span><span class="space">{{$profile_table->pLocation}}</span>
        </div>
        <div>
            Ικανότητες : 
            @foreach($profile_table->skills as $skill)
              <a href="#">{{$skill->sName}}</a>
            @endforeach
        </div>
      </div>
      <div class="freelancer-short-price-contact">
        <h5>
          <span class="glyphicon glyphicon-euro"></span> {{$profile_table->pSalary}}/ώρα
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


  @endif

@endif


</div> <!-- /freelancers-short-main -->

<div style="height:100px;"></div>

</div> <!-- /freelancers-push -->

@endsection



@section('js')

<script>

$(document).ready(function () {

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

}); //end ready


</script>

@endsection
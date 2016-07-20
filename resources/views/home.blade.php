@extends('layouts.master')

@section('content')

<div class="push-home-page">
 
  <div class="home-icons">    
    

    @if(Auth::user()->profile->pCategory == 'employee'))
    <div class="home-icon-1">   
      <a href="/Bitsource/public/project_task/create"><img src="/Bitsource/public/images/project_task.png" class="home-icon"></a>
      <span><b>Ανάρτηση Αγγελίας</b></span>
    </div>
    @else
    <div class="home-icon-1">   
      <a href="#"><img src="/Bitsource/public/images/project_task.png" class="home-icon" id="home-ag" data-toggle="modal" data-target="#myModal"></a>
      <span><b>Ανάρτηση Αγγελίας</b></span>
    </div> 

   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Προσοχή!!!</h4>
      </div>
      <div class="modal-body">
        <p>Μόνο οι εργοδότες μπορούν να αναρτήσουν αγγελίες!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Κλεισιμο</button>
      </div>
    </div>

  </div>
</div>
 
    @endif

    <div class="home-icon-2">   
      <a href="#"><img src="/Bitsource/public/images/aggelies.png" class="home-icon"></a>
      <span><b>Ανάρτηση Project/Task</b></span>
    </div>

    <div class="home-icon-3">   
      <a href="#"><img src="/Bitsource/public/images/oi_anartiseis_mou.png" class="home-icon"></a>
      <span><b>Οι αναρτήσεις μου</b></span>
    </div>
  

  </div>      

</div> <!--/push-home-page-->

@endsection

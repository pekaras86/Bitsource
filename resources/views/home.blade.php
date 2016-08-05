@extends('layouts.master')

@section('content')

<div class="push-home-page">

<div class="home-message"><b>H λίστα αποθηκεύτηκε!</b></div>
 
  <div class="home-icons">    
    

    @if(Auth::user()->profile->pCategory == 'employee' || Auth::user()->profile->pCategory == 'both')
    <div class="home-icon-1">   
      <a href="/Bitsource/public/project_task/create"><img src="/Bitsource/public/images/project_task.png" class="home-icon"></a>
      <span><b>Ανάρτηση Project/Task</b></span>
    </div>
    @else
    <div class="home-icon-1">   
      <a href="#"><img src="/Bitsource/public/images/project_task.png" class="home-icon" id="home-ag" data-toggle="modal" data-target="#myModal"></a>
      <span><b>Ανάρτηση Project/Task</b></span>
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
        <p>Μόνο οι εργοδότες μπορούν να αναρτήσουν αγγελίες Projects/Tasks!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Κλεισιμο</button>
      </div>
    </div>

  </div>
</div>
 
    @endif

    



     @if(Auth::user()->profile->pCategory == 'employee' || Auth::user()->profile->pCategory == 'both')
    <div class="home-icon-2">   
      <a href="/Bitsource/public/job/create"><img src="/Bitsource/public/images/aggelies.png" class="home-icon"></a>
      <span><b>Ανάρτηση Αγγελίας</b></span>
    </div>
    @else
    <div class="home-icon-2">   
      <a href="#"><img src="/Bitsource/public/images/aggelies.png" class="home-icon" data-toggle="modal" data-target="#myModaljob"></a>
      <span><b>Ανάρτηση Αγγελίας</b></span>
    </div>

       <!-- Modal -->
    <div id="myModaljob" class="modal fade" role="dialog">
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
    

    <div class="home-icon-3">   
      <a href="/Bitsource/public/myposts"><img src="/Bitsource/public/images/oi_anartiseis_mou.png" class="home-icon"></a>
      <span><b>Οι λίστες μου</b></span>
    </div>
  
  </div> <!-- /home-icons -->





<div class="to-do-list">

<button type="button" class="todo-btn btn btn-primary btn-sm" id="add-todo" data-toggle="modal" data-target="#add-task">Προσθηκη Εργασιας</button>

    
    <div class="todo-head">
        <h5>Εργασίες σε αναμονη</h5>
        <hr>
        <ul id="todo-list" class="sortlist">
          @foreach($todos as $todo)
            <li class="row a-task"><div class="input-group"><span class="input-group-addon"><input type="checkbox" class="done" aria-label="..."></span><span class="task">{{$todo->task}}</span><span><img class="delete" src="/Bitsource/public/images/remove.png"></span></div><!-- /input-group --></li><!-- /.row -->
          @endforeach
        </ul>
    </div>
    
    <div class="keno">
        
    </div>


    <div id="completed">
        <h5>Completed Tasks</h5>
        <hr>
        <ul id="completed-list" class="sortlist">
          @foreach($completes as $complete)
            <li class="row a-task"><div class="input-group"><span class="input-group-addon"><input type="checkbox" class="done" aria-label="..."></span><span class="task">{{$complete->task}}</span><span><img class="delete" src="/Bitsource/public/images/remove.png"></span></div><!-- /input-group --></li><!-- /.row -->
          @endforeach
        </ul>
   </div>


   <button type="submit" class="save-todo btn btn-primary btn-lg">Αποθηκευση</button>



    

    



    <div id="add-task" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Προσθήκη Task</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
               <label for="recipient-name" class="control-label">Τίτλος:</label>
               <input type="text" class="form-control" id="task" name="task" placeholder="π.χ Σχεδίαση βάσης δεδομένων για το Bitsource.">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Aκυρο</button>
        <button type="button" class="btn btn-primary" id="add-task-btn">Προσθηκη</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
</div>  <!-- /to-do-list -->














</div> <!--/push-home-page-->

@endsection

@section('js')
<script>
  $(document).ready(function(){

  $('#add-task-btn').click(function(){
    
    var taskName = $('#task').val();
    
    if(taskName === ''){
        return false;
    }
    
    var taskHTML = '<li class="row a-task"><div class="input-group"><span class="input-group-addon"><input type="checkbox" class="done" aria-label="..."></span><span class="task"></span><span><img class="delete" src="/Bitsource/public/images/remove.png"></span></div><!-- /input-group --></li><!-- /.row -->';

    var $newTask = $(taskHTML);  // kanw to li object

    $newTask.find('.task').text(taskName); //pairnei to taskName kai to vazei mesa sto .task tou li

    $newTask.hide();
    $('#todo-list').prepend($newTask);  // vale to neo task sti list ul

    $newTask.show('clip',250).effect('highlight',1000); // emfanise to neo task

    $('#add-task').modal('hide');  // kleise to modal

  }); // end click


  $('#todo-list').on('click', '.done', function() {
      var $taskItem = $(this).parents('li');
      $taskItem.slideUp(250, function(){
        var $this = $(this);
        $this.detach();
        $this.removeClass('a-task').addClass('b-task');  //allagi class gia ta completed
        $('#completed-list').prepend($this);
        $this.slideDown();
      });  
  });


  $('.sortlist').sortable({
    connectWith : '.sortlist',
    cursor : 'pointer',
    placeholder : 'ui-state-highlight',
    cancel : '.delete,.done'
  });


  $('.sortlist').on('click', '.delete', function() {
     $(this).parents('li').effect('puff', function() {
       $(this).remove();
     });
  });

  //$('.home-message').hide();

  // αποθήκευση της to-do list
  $('.save-todo').click(function(event){
    
    event.preventDefault();

    var todoData = {
      toDo : [],
      completed : []
    }; 

    $('.a-task').each( function() {
      var task = $(this).find('.task').text();
      todoData.toDo.push(task);
    });  //end each

    $('.b-task').each( function() {
      var task = $(this).find('.task').text();
      todoData.completed.push(task);
    });  //end each

    
    $('.home-message').show();
    $('.home-message').fadeOut(1000);
    
    //αποστολή λίστας με ajax
    $.post('/Bitsource/public/save_todo',
          {
            toDo          : todoData.toDo,
            completed     : todoData.completed,
          },
         function(data, status){
            console.log("Data: " + data + "\nStatus: " + status)
         });


     
    
      
  });  //click

      
    
  });  //end-ready
</script>
@endsection



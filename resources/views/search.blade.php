@extends('layouts.master')
  
    @section('content')

    <div class="home-main-content">

    <form class="hp-form-home" action="#">

        <span class="input-group-addon styled-select-home">
          <select id="selectsearch">
            <option value="category">Κατηγορία</option>
            <option value="tasks">Projects/Tasks</option>
            <option value="freelancers">Freelancers</option>
            <option value="jobs">Εργασία</option>
          </select>
        </span>
        
        <input type="hidden" class="form-control" name="skills" placeholder="Πληκτρολογήστε εδώ για να προσθέσετε..."> 
        <textarea id="textarea" rows="2" style="width:550px;"></textarea>

        <span class="input-group-btn" style="float:right;">
            <button class="btn btn-default home-srch-btn" type="submit" style="float:right; height: 34px; margin-right:25px;">Go!</button>
        </span>

        <div style="color:white; clear:both; margin-left:20px;">*Πληκτρολογήστε ικανότητες όπως : css, php, ruby, javascript </div>

    </form>




    </div>
    
    @endsection

        @section('js')

        <script>


        $(document).ready(function () {
          
          $("#selectsearch").change(function() {
            
            var val = $('#selectsearch').val();
            
            if(val == 'tasks') {

              $(".hp-form-home").attr("action", "{{ action('TasksListSearchController@show') }}");

            } else if(val == 'freelancers') {

              $(".hp-form-home").attr("action", "{{ action('FreelancersListSearchController@show') }}");

            } else if(val == 'jobs') {

              $(".hp-form-home").attr("action", "{{ action('JobsListSearchController@show') }}");

            } else {

              $(".hp-form-home").attr("action", "#");

            }
 
          });

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

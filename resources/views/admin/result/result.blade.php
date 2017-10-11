<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INHS VOTING SYSTEM</title>

    
    <link href="{{URL::to('css/bootstrap.min.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/sb-admin.css')}}" rel="stylesheet">

   
    <link href="{{URL::to('css/plugins/morris.css')}}" rel="stylesheet">

 

<style type="text/css">
    #txt{
        font-size: 48px;
    }
    .form-control {
        white-space: nowrap !important;
    }
</style>

</head>

<body>

    <div id="wrapper">

       
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" data-toggle="modal" data-target="#test">INHS VOTING SYSTEM</a>
            </div>
            
            <ul class="nav navbar-right top-nav">
               
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->fname}} {{Auth::user()->lname}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="sides">
                <ul class="nav navbar-nav side-nav">
                	
                    <li >
                      <a href="{{route('admin_main')}}" ><i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                     <li >
                    	<a href="{{route('system')}}" ><i class="glyphicon glyphicon-volume-up"></i> System Settings</a>
                    </li>
                     <li>
                        <a href="{{route('register')}}"><i class="glyphicon glyphicon-folder-open"></i> Register</a>
                    </li>
                    <li >
                    	<a href="{{route('party')}}"><i class="glyphicon glyphicon-user"></i> Party List</a>
                    </li>
                    <li>
                        <a href="{{route('votes')}}"><i class="glyphicon glyphicon-user"></i> Votes Tally</a>
                    </li>
                    <li class="active">
                        <a href="{{route('admin_result')}}"><i class="glyphicon glyphicon-user"></i> Results</a>
                    </li>
                     <li>
                        <a href="{{route('admin_view_vote_history')}}"><i class="glyphicon glyphicon-th-list"></i>View Vote History</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper">
           
              
         <div class="panel panel-primary">
            <div class="panel-heading">
                  <h3 class="text-center">`Election Result Announcements</h3>              
            </div>

            <div class="panel-body">
            <form action="{{route('admin_result_check')}}" method="POST" id="formResult">
                <div class="col-md-6">
                    
                        <div class="form-group">
                            <label>President</label>
                            <select name="president" class="form-control">
                                <option value="President">President</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vice-President</label>
                            <select name="vice_president" class="form-control">
                                <option value="Vice-President">Vice-President</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Secretary</label>
                            <select name="secretary" class="form-control">
                                <option value="Secretary">Secretary</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Treasurer</label>
                            <select name="treasurer" class="form-control">
                                <option value="Treasurer">Treasurer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Auditor</label>
                            <select name="auditor" class="form-control">
                                <option value="Auditor">Auditor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>P.I.O</label>
                            <select name="pio" class="form-control">
                                <option value="P.I.O">P.I.O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>BUS Mgt</label>
                            <select name="bus" class="form-control">
                                <option value="BUS Mgt">BUS Mgt</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>PEACE KEEPER</label>
                            <select name="peace" class="form-control">
                                <option value="PEACE KEEPER">PEACE KEEPER</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Representative of Grade 7</label>
                            <select name="g7" class="form-control">
                                <option value="Representative of Grade 7">Representative</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Representative of Grade 8</label>
                            <select name="g8" class="form-control">
                                <option value="Representative of Grade 8">Representative</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Representative of Grade 9</label>
                            <select name="g9" class="form-control">
                                <option value="Representative of Grade 9">Representative</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Representative of Grade 10</label>
                            <select name="g10" class="form-control">
                                <option value="Representative of Grade 10">Representative</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Representative of Grade 11</label>
                            <select name="g11" class="form-control">
                                <option value="Representative of Grade 11">Representative</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Representative of Grade 12</label>
                            <select name="g12" class="form-control">
                                <option value="Representative of Grade 12">Representative</option>
                            </select>
                        </div>
                    
                   
                </div>    
                <div class="col-md-6">
                    
              @if($pres->count() > 0)
                   <div class="alert alert-danger">President</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($pres as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>
                  
                  <textarea name="w_president" class="form-control" id="w_president">
                   @foreach($pres as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                    {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                  </textarea>
                </ul>

                  <div class="alert alert-danger">Vice-President</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($vice as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                  <textarea name="w_vice" class="form-control" id="w_vice">
                   @foreach($vice as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                   </textarea>
                </ul>

                 <div class="alert alert-danger">Secretary</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($secretary as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                  <textarea name="w_secretary" class="form-control" id="w_secretary">
                   @foreach($secretary as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                  </textarea>
                </ul>

                <div class="alert alert-danger">Treasurer</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($treasurer as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>
                  <textarea name="w_treasurer" class="form-control" id="w_treasurer">
                   @foreach($treasurer as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                  </textarea>
                </ul>

                <div class="alert alert-danger">Auditor</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($auditor as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>
                  <textarea name="w_auditor"  class="form-control" id="w_auditor">
                   @foreach($auditor as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                  </textarea>
                </ul>

                <div class="alert alert-danger">P.I.O</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($pio as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>
                  <textarea name="w_pio" class="form-control" id="w_pio">
                   @foreach($pio as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                  </textarea>
                </ul>

                 <div class="alert alert-danger">BUS Mgt.</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($bus as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php 
natsort($arr);
$arr = array_values($arr);

$count = count($arr) - 1
                ?>
                <textarea name="w_bus" class="form-control" id="w_bus">
                   @foreach($bus as $pre)
                    @if($pre->vote($pre->user_id) == $arr[$count] || $pre->vote($pre->user_id) == $arr[$count - 1])
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endforeach
                  </textarea>
                </ul>

                 <div class="alert alert-danger">PEACE KEEPER</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($peace as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                            <?php 

natsort($arr);
$arr = array_values($arr);

$count = count($arr) - 1;



                ?>
                <textarea name="w_peace" class="form-control" id="w_peace">
                  @foreach($peace as $key => $pre)
                   @if($pre->vote($pre->user_id) == $arr[$count]  || $pre->vote($pre->user_id) == $arr[$count - 1])
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                 
                    @endif
                   
                  @endforeach  

                  </textarea>
                </ul>

                <div class="alert alert-danger">Representative Grade 7</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 7)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>
                <textarea name="w_g7" class="form-control" id="w_g7">
                 @foreach($reps as $pre)
                  @if($pre->user->grade == 7)

                    @if($pre->vote($pre->user_id) == $max)
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endif
                @endforeach
                </textarea>

                <div class="alert alert-danger">Representative Grade 8</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 8)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max = @max($arr); ?>
                <textarea name="w_g8" class="form-control" id="w_g8">
                 @foreach($reps as $pre)
                  @if($pre->user->grade == 8)
                     @if($pre->vote($pre->user_id) == $max)
                      {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endif
                @endforeach
               
                 </textarea>

                <div class="alert alert-danger">Representative Grade 9</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 9)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>
                <textarea name="w_g9" class="form-control" id="w_g9">
                 @foreach($reps as $pre)
                  @if($pre->user->grade == 9)
                    @if($pre->vote($pre->user_id) == $max)
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endif
                @endforeach
                 </textarea>

                <div class="alert alert-danger">Representative Grade 10</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 10)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>
                <textarea name="w_g10" class="form-control" id="w_g10">
                 @foreach($reps as $pre)
                  @if($pre->user->grade == 10)
                    @if($pre->vote($pre->user_id) == $max)
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endif
                @endforeach
                </textarea>

                <div class="alert alert-danger">Representative Grade 11</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 11)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>
                 <textarea name="w_g11" class="form-control" id="w_g11">
                 @foreach($reps as $pre)
                  @if($pre->user->grade == 11)
                     @if($pre->vote($pre->user_id) == $max)
                      {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endif
                @endforeach
                 </textarea>


                <div class="alert alert-danger">Representative Grade 12</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 12)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>
                <textarea name="w_g12" class="form-control" id="w_g12">
                 @foreach($reps as $pre)
                  @if($pre->user->grade == 12)
                     @if($pre->vote($pre->user_id) == $max)
                     {{$pre->user->fname}}.{{$pre->user->lname}}/
                    @endif
                  @endif
                @endforeach
                </textarea>
                @else
                  <h1>Election Not Yet Start</h1>
                @endif
              </ul>


             
                </div>  
                {{csrf_field()}}
                <button type="button" class="btn btn-success btn-block" id="submitBtn">SUBMIT</button>
            </form>
            </div>
        </div>

               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     

        </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script>
    
 
<script type="text/javascript">
   @if(Session::has('ok'))
    swal("Good job!", "Election Result has been submitted successfully!", "success");
   @endif

   $(document).ready(function(){
        var output = $("#w_president").val();
        output = output.replace(/\s/g, "");
        $("#w_president").val(output);

        var output = $("#w_vice").val();
        output = output.replace(/\s/g, "");
        $("#w_vice").val(output);

        var output = $("#w_secretary").val();
        output = output.replace(/\s/g, "");
        $("#w_secretary").val(output);

        var output = $("#w_treasurer").val();
        output = output.replace(/\s/g, "");
        $("#w_treasurer").val(output);

         var output = $("#w_auditor").val();
        output = output.replace(/\s/g, "");
        $("#w_auditor").val(output);

         var output = $("#w_pio").val();
        output = output.replace(/\s/g, "");
        $("#w_pio").val(output);

         var output = $("#w_bus").val();
        output = output.replace(/\s/g, "");
        $("#w_bus").val(output);

         var output = $("#w_peace").val();
        output = output.replace(/\s/g, "");
        $("#w_peace").val(output);

        var output = $("#w_g7").val();
        output = output.replace(/\s/g, "");
        $("#w_g7").val(output);

        var output = $("#w_g8").val();
        output = output.replace(/\s/g, "");
        $("#w_g8").val(output);

        var output = $("#w_g9").val();
        output = output.replace(/\s/g, "");
        $("#w_g9").val(output);

        var output = $("#w_g10").val();
        output = output.replace(/\s/g, "");
        $("#w_g10").val(output);

        var output = $("#w_g11").val();
        output = output.replace(/\s/g, "");
        $("#w_g11").val(output);

        var output = $("#w_g12").val();
        output = output.replace(/\s/g, "");
        $("#w_g12").val(output);


        $("#submitBtn").click(function(){
           swal({
                  title: "Are you sure?",
                  text: "You want to submitted the Election results?",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $("#formResult").submit();
                  } else {
                    swal("Submitting Election results has been cancel!"); 
                  }
                });    
        });
   });


   
</script>
    
 

</body>

</html>

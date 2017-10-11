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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->fname}} {{Auth::user()->lname}} <b class="caret"></b></a>
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
                    <li>
                      <a href="{{route('party')}}"><i class="glyphicon glyphicon-user"></i> Party List</a>
                    </li>
                    <li class="active">
                        <a href="{{route('votes')}}"><i class="glyphicon glyphicon-user"></i> Votes Tally</a>
                    </li>
                    <li>
                        <a href="{{route('admin_result')}}"><i class="glyphicon glyphicon-user"></i> Results</a>
                    </li>
                     <li>
                        <a href="{{route('admin_view_vote_history')}}"><i class="glyphicon glyphicon-th-list"></i>View Vote History</a>
                    </li>
                    
                </ul>
            </div>
           
        </nav>

        <div id="page-wrapper" class="container">
           <div class="row">
             <button id="printMe" class="btn bnt-default" style="margin-left: 30px"><i class="glyphicon glyphicon-print"></i></button>
           </div>

           

            <div class="col-md-6">
            @if($pres->count() > 0)
              <div class="alert alert-success">President</div>
                <ul class="list-group">
                @foreach($pres as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>

               <div class="alert alert-success">Vice-President</div>
                <ul class="list-group">
                @foreach($vice as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}} </span></li>
                @endforeach
              </ul>

              <div class="alert alert-success">Secretary</div>
                <ul class="list-group">
                @foreach($secretary as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>
           

            <div class="alert alert-success">Treasurer</div>
                <ul class="list-group">
                @foreach($treasurer as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>
           

            <div class="alert alert-success">Auiditor</div>
                <ul class="list-group">
                @foreach($auditor as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>
          

            <div class="alert alert-success">P.I.O</div>
                <ul class="list-group">
                @foreach($pio as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>
           

               <div class="alert alert-success">BUS MGT</div>
                <ul class="list-group">
                @foreach($bus as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>

               <div class="alert alert-success">PEACE KEEPER</div>
                <ul class="list-group">
                @foreach($peace as $pre)
                <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                @endforeach
              </ul>

              <div class="alert alert-success">Representative Grade 7</div>
                <ul class="list-group">
                @foreach($reps as $pre)
                  @if($pre->user->grade == 7)
                    <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                  @endif
                @endforeach
              </ul>

              <div class="alert alert-success">Representative Grade 8</div>
                <ul class="list-group">
                @foreach($reps as $pre)
                  @if($pre->user->grade == 8)
                    <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                  @endif
                @endforeach
              </ul>

              <div class="alert alert-success">Representative Grade 9</div>
                <ul class="list-group">
                @foreach($reps as $pre)
                  @if($pre->user->grade == 9)
                    <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                  @endif
                @endforeach
              </ul>

               <div class="alert alert-success">Representative Grade 10</div>
                <ul class="list-group">
                @foreach($reps as $pre)
                  @if($pre->user->grade == 10)
                    <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                  @endif
                @endforeach
              </ul>

               <div class="alert alert-success">Representative Grade 11</div>
                <ul class="list-group">
                @foreach($reps as $pre)
                  @if($pre->user->grade == 11)
                    <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                  @endif
                @endforeach
              </ul>

               <div class="alert alert-success">Representative Grade 12</div>
                <ul class="list-group">
                @foreach($reps as $pre)
                  @if($pre->user->grade == 12)
                    <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                  @endif
                @endforeach
              </ul>
              @else
                <h1>Election Not Yet Start</h1>
              @endif
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

                   @foreach($pres as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endforeach
                </ul>

                  <div class="alert alert-danger">Vice-President</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($vice as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                   @foreach($vice as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endforeach
                </ul>

                 <div class="alert alert-danger">Secretary</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($secretary as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                   @foreach($secretary as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endforeach
                </ul>

                <div class="alert alert-danger">Treasurer</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($treasurer as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                   @foreach($treasurer as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endforeach
                </ul>

                <div class="alert alert-danger">Auditor</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($auditor as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                   @foreach($auditor as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endforeach
                </ul>

                <div class="alert alert-danger">P.I.O</div>
                  <ul class="list-group">
                  <?php $arr = array();?>
                  @foreach($pio as $pre)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endforeach
                  <?php $max =  @max($arr); ?>

                   @foreach($pio as $pre)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endforeach
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

                   @foreach($bus as $pre)
                    @if($pre->vote($pre->user_id) == $arr[$count] || $pre->vote($pre->user_id) == $arr[$count - 1])
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>
                    @endif
                  @endforeach
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

                  @foreach($peace as $key => $pre)
                   @if($pre->vote($pre->user_id) == $arr[$count]  || $pre->vote($pre->user_id) == $arr[$count - 1])
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$pre->vote($pre->user_id)}}</span></li>

                 
                    @endif
                   
                  @endforeach  


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

                 @foreach($reps as $pre)
                  @if($pre->user->grade == 7)

                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endif
                @endforeach

                <div class="alert alert-danger">Representative Grade 8</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 8)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max = @max($arr); ?>

                 @foreach($reps as $pre)
                  @if($pre->user->grade == 8)
                     @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endif
                @endforeach

                <div class="alert alert-danger">Representative Grade 9</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 9)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>

                 @foreach($reps as $pre)
                  @if($pre->user->grade == 9)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endif
                @endforeach

                <div class="alert alert-danger">Representative Grade 10</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 10)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>

                 @foreach($reps as $pre)
                  @if($pre->user->grade == 10)
                    @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endif
                @endforeach

                <div class="alert alert-danger">Representative Grade 11</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 11)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>

                 @foreach($reps as $pre)
                  @if($pre->user->grade == 11)
                     @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endif
                @endforeach


                <div class="alert alert-danger">Representative Grade 12</div>
                <ul class="list-group">
                <?php $arr = array();?>
                @foreach($reps as $pre)
                  @if($pre->user->grade == 12)
                    <?php array_push($arr, $pre->win($pre->user_id)); ?>
                  @endif
                @endforeach
                <?php $max =  @max($arr); ?>

                 @foreach($reps as $pre)
                  @if($pre->user->grade == 12)
                     @if($pre->vote($pre->user_id) == $max)
                      <li class="list-group-item">{{$pre->user->fname}} {{$pre->user->lname}} <span class="pull-right">{{$max}}</span></li>
                    @endif
                  @endif
                @endforeach

                @else
                  <h1>Election Not Yet Start</h1>
                @endif
              </ul>


             </div>

             
            

            

           
            </div>
        </div>      
                    

      

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
 
    <script type="text/javascript">
     $(document).ready(function(){

        $("#printMe").click(function(){
          window.print();
        })
     });
    </script>
</body>

</html>
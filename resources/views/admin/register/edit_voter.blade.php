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
                     <li class="active">
                        <a href="{{route('register')}}"><i class="glyphicon glyphicon-folder-open"></i> Register</a>
                    </li>
                    <li>
                    	<a href="{{route('party')}}"><i class="glyphicon glyphicon-user"></i> Party List</a>
                    </li>
                    <li>
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

        <div id="page-wrapper">
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="{{route('register')}}">Add Voters</a></li>
              <li role="presentation"><a href="{{route('candidates')}}">Add Candidates</a></li>
             <li role="presentation" class="active"><a href="{{route('voter_list')}}">Voter List</a></li>
             <li role="presentation"><a href="{{route('candidate_list')}}">Candidates List</a></li>
            </ul>

             @if(Session::has('update'))
                        <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p class="text-center"><strong>{{Session::get('update')}}</strong></p>
                        </div>
                    @endif
              
           <div class="panel panel-default">
               <div class="panel-heading">
                   
               </div>
               <div class="panel-body">
                   <form action="{{route('voter_update_check', ['id'=> $voter->id])}}" method="POST">
                      <div class="col-md-6">
                           <div class="form-group">
                               <label>Student I.D</label>
                               <input type="number" name="class_id" class="form-control" value="{{$voter->class_id}}" maxlength="12">
                           </div>
                           <div class="form-group">
                               <label>First Name</label>
                               <input type="text" name="fname" class="form-control" value="{{$voter->fname}}">
                           </div>
                           <div class="form-group">
                               <label>Middle Name</label>
                               <input type="text" name="mname" class="form-control" value="{{$voter->mname}}">
                           </div>
                           <div class="form-group">
                               <label>Last Name</label>
                               <input type="text" name="lname" class="form-control" value="{{$voter->lname}}">
                           </div>


                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                               <label>Grade</label>
                               <input type="number" name="grade" class="form-control" value="{{$voter->grade}}" maxlength="1">
                           </div>
                           <div class="form-group">
                               <label>Section</label>
                               <input type="text" name="section" class="form-control" value="{{$voter->section}}" maxlength="20">
                           </div>
                           <div class="form-group">
                               <label>Email</label>
                               <input type="email" name="email" class="form-control" value="{{$voter->email}}" maxlength="50">
                           </div>
                           
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                    {{csrf_field()}}
                    </form>
               </div>
               <div class="panel-footer"></div>
           </div>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

    
 

</body>

</html>

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
              <li role="presentation" class="active"><a href="{{route('candidates')}}">Add Candidates</a></li>
             <li role="presentation"><a href="{{route('voter_list')}}">Voter List</a></li>
             <li role="presentation"><a href="{{route('candidate_list')}}">Candidates List</a></li>
            </ul>
              
         <div class="panel panel-primary">
            <div class="panel-heading">
                  <h2 class="text-center">Candidate Registration Form</h2>              
            </div>

            <div class="panel-body">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                 @if(Session::has('err'))
                    <div class="alert alert-danger">{{Session::get('err')}}</div>
                @endif

                <h3 class="text-center">Name: {{$find->fname}} {{$find->lname}}</h3>
                <h3 class="text-center">Grade: {{$find->grade}}</h3>
                <form action="{{route('new_candidates', ['id'=> $find->id])}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Party List</label>
                        <select name="party" class="form-control {{$errors->has('party') ? 'has-error': ''}}">
                            @foreach($party as $morley)
                                <option value="{{$morley->id}}">{{$morley->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{$errors->has('position') ? 'has-error': ''}}">
                        <label>Position</label>
                        <select name="position" class="form-control">
                            @foreach($position as $pos)
                                <option value="{{$pos->id}}">{{$pos->position}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{$errors->has('image') ? 'has-error': ''}}">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </form>
                
            </div>
        </div>
            
         
                      
                    

        </div>
           

        </div>
       
      
    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
</body>

</html>

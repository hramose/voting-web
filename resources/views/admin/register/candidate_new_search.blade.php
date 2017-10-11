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
                  <h2 class="text-center">List of possible Candidates</h2>              
            </div>

            <div class="panel-body">
               <table class="table">
                   <thead>
                       <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>

                   </thead>
                   <tbody>
                       @if($list->count() > 0)
                            @foreach($list as $morls)
                                <tr>
                                    <td>{{$morls->class_id}}</td>
                                    <td>{{$morls->fname}} {{$morls->lname}}</td>
                                    <td>{{$morls->grade}}</td>
                                    <td>{{$morls->section}}</td>
                                    <td>{{$morls->email}}</td>
                                    <td>
                                        <a href="{{route('admin_voter_for_candidacy', ['id'=> $morls->id])}}" class="btn btn-primary btn-xs">Run for Candidacy</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h3 class="text-center">NO USER FOUND</h3>
                        @endif
                   </tbody>
               </table>
            </div>
        </div>
            
         
                      
                    

        </div>
           

        </div>
       
      
    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
</body>

</html>

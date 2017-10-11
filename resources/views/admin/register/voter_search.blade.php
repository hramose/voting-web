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

             @if(Session::has('delete'))
                        <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <p class="text-center"><strong>{{Session::get('delete')}}</strong></p>
                        </div>
                    @endif
             <div class="col-md-3">
                 <form action="{{route('voter_list_search')}}" method="POST">
                     <div class="form-group {{$errors->has('search') ? 'has-error': ''}}">
                        <label>Search: </label>
                         <input type="text" name="search" class="form-control">
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-default">Go</button>
                         {{csrf_field()}}
                     </div>
                 </form> 
             </div>
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
                    @foreach($voters as $voter)
                        <tr>
                            <td>{{$voter->class_id}}</td>
                            <td>{{$voter->fname}} {{$voter->mname}} {{$voter->lname}}</td>
                            <td>{{$voter->grade}}</td>
                            <td>{{$voter->section}}</td>
                            <td>{{$voter->email}}</td>
                             <td>
                                <a href="{{route('voter_edit', ['id'=> $voter->id])}}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                                <form action="{{route('voter_delete', ['id'=> $voter->id])}}" method="GET" id="formDel{{$voter->id}}">
                                    <button type="button" value="{{$voter->id}}" class="btn btn-danger btn-xs delMe">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           

        </div>
       
       

    </div>
   

   
    <script src="{{URL::to('js/jquery.js')}}"></script>

    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
 
<script type="text/javascript">
    $(document).ready(function(){
        $(".delMe").click(function(){
            var id_to_del = $(this).attr("value");

            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!" + id_to_del,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success", 
                });
                $("#formDel" + id_to_del).submit();
              } 
            });
        });
       
    });
</script>
    
 

</body>

</html>

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
              <li role="presentation" class="active"><a href="{{route('register')}}">Add Voters</a></li>
              <li role="presentation"><a href="{{route('candidates')}}">Add Candidates</a></li>
             <li role="presentation"><a href="{{route('voter_list')}}">Voter List</a></li>
             <li role="presentation"><a href="{{route('candidate_list')}}">Candidates List</a></li>
            </ul>
              
         <div class="panel panel-primary">
            <div class="panel-heading">
                  <h2 class="text-center">Voter's Registration Form</h2>              
            </div>

            <div class="panel-body">
                 
                 <div class="col-md-6">
                     <form action="{{route('new_voters')}}" method="POST" id="regForm">
                         <div class="form-group {{$errors->has('class_id') ? 'has-error': ''}}">
                             <label>ID</label>
                             <input type="number" name="class_id" class="form-control">
                             @if($errors->has('class_id'))
                                <i class="help-block">{{$errors->first('class_id')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                             <label>Password</label>
                             <input type="password" name="password" class="form-control">
                             @if($errors->has('password'))
                                <i class="help-block">{{$errors->first('password')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('fname') ? 'has-error': ''}}">
                             <label>First Name</label>
                             <input type="text" name="fname" class="form-control">
                             @if($errors->has('fname'))
                                <i class="help-block">{{$errors->first('fname')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('mname') ? 'has-error': ''}}">
                             <label>Middle Name</label>
                             <input type="text" name="mname" class="form-control">
                             @if($errors->has('mname'))
                                <i class="help-block">{{$errors->first('mname')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('lname') ? 'has-error': ''}}">
                             <label>Last Name</label>
                             <input type="text" name="lname" class="form-control">
                             @if($errors->has('lname'))
                                <i class="help-block">{{$errors->first('lname')}}</i>
                             @endif
                         </div>

                         

                         
                           
                           {{csrf_field()}}
                           <button type="button" class="btn btn-primary delMe">SUBMIT</button> 
                           <button type="button" class="btn btn-default clearMe">CLEAR</button> 
                      
                 </div>

                 <div class="col-md-6">
                      <div class="form-group {{$errors->has('grade') ? 'has-error': ''}}">
                             <label>Grade</label>
                             <select name="grade" class="form-control">
                                 <option value="">Select Grade</option>
                                 <option value="7">7</option>
                                 <option value="8">8</option>
                                 <option value="9">9</option>
                                 <option value="10">10</option>
                                 <option value="11">11</option>
                                 <option value="12">12</option>
                                

                             </select>
                              @if($errors->has('grade'))
                                <i class="help-block">{{$errors->first('grade')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('section') ? 'has-error': ''}}">
                             <label>Section</label>
                             <input type="text" name="section" class="form-control">
                              @if($errors->has('section'))
                                <i class="help-block">{{$errors->first('section')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                             <label>Email</label>
                             <input type="email" name="email" class="form-control">
                              @if($errors->has('email'))
                                <i class="help-block">{{$errors->first('email')}}</i>
                             @endif
                         </div>

                         </form>
                 </div>   
            </div>
        </div>
            
         
                      
                    

        </div>
           

        </div>
       
       

    </div>


    <script src="{{URL::to('js/jquery.js')}}"></script>    
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/sweet.js')}}"></script>
   

    
 
<script type="text/javascript">
    $(document).ready(function(){
        $(".delMe").click(function(){
            var id_to_del = $(this).attr("value");

            swal({
              title: "Are you sure?",
              text: "You want to add the new voter?" ,
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Yehey! New Voter has been successfully added.", {
                  icon: "success", 
                });
                $("#regForm").submit();
              } 
            });
        });

        $(".clearMe").click(function(){
            $(".form-control").val("");
        });
       
    });
</script>
    


</body>

</html>

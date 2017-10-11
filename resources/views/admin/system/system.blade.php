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
                     <li class="active">
                    	<a href="{{route('system')}}" ><i class="glyphicon glyphicon-volume-up"></i> System Settings</a>
                    </li>
                     <li>
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
              <li role="presentation" class="active"><a href="{{route('system')}}">Account Magement</a></li>
              <li role="presentation"><a href="{{route('backup')}}">Back-up</a></li>
             
            </ul>
              
         <div class="panel panel-primary">
            <div class="panel-heading">
                 <h3 class="text-center">User List</h3>             
            </div>

            <div class="panel-body">
                  <div class="col-md-4">
                    @if(Session::has('success'))
                      <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p class="text-center"><strong>{{Session::get('success')}}</strong></p>
                      </div>
                    @endif
                     @if(Session::has('delete'))
                      <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p class="text-center"><strong>{{Session::get('delete')}}</strong></p>
                      </div>
                    @endif
                      <form action="{{route('new_admin')}}" method="POST">
                         <div class="form-group {{$errors->has('class_id') ? 'has-error': ''}}">
                             <label>ID</label>
                             <input type="number" name="class_id" class="form-control" maxlength="20">
                             @if($errors->has('class_id'))
                              <i class="help-block">{{$errors->first('class_id')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('fname') ? 'has-error': ''}}">
                             <label>First Name</label>
                             <input type="text" name="fname" class="form-control" maxlength="20">
                              @if($errors->has('fname'))
                              <i class="help-block">{{$errors->first('fname')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('mname') ? 'has-error': ''}}">
                             <label>Middle Name</label>
                             <input type="text" name="mname" class="form-control" maxlength="20">
                              @if($errors->has('mname'))
                              <i class="help-block">{{$errors->first('mname')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('lname') ? 'has-error': ''}}">
                             <label>Last Name</label>
                             <input type="text" name="lname" class="form-control" maxlength="20">
                              @if($errors->has('lname'))
                              <i class="help-block">{{$errors->first('lname')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                             <label>Email</label>
                             <input type="email" name="email" class="form-control" maxlength="40">
                              @if($errors->has('email'))
                              <i class="help-block">{{$errors->first('email')}}</i>
                             @endif
                         </div>

                          <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                             <label>Password</label>
                             <input type="password" name="password" class="form-control" maxlength="12">
                              @if($errors->has('password'))
                              <i class="help-block">{{$errors->first('password')}}</i>
                             @endif
                         </div>
                           
                           {{csrf_field()}}
                           <button type="submit" class="btn btn-primary btn-block">SUBMIT</button> 
                      </form>
                  </div>  
                   <div class="col-md-8">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Action</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($user as $me)
                              <tr>
                                <td>{{$me->class_id}}</td>
                                <td>{{$me->fname}} {{$me->lname}}</td>
                                <td>{{$me->email}}</td>
                                <td>
                                  
                                   <form action="{{route('delete_admin', ['id'=> $me->id])}}" method="get" id="formDel{{$me->class_id}}">
                                     <button type="button" value="{{$me->class_id}}" class="btn btn-danger btn-xs delMe">Delete</button>
                                   </form>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
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
              text: "You want to delete administrator account?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Gotcha! administrator account has been successfully deleted.", {
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

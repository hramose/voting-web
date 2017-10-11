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
                    <li class="active">
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
           
              
         <div class="panel panel-primary">
            <div class="panel-heading">
                  <h3 class="text-center">Election Party Search Result: {{$search}}</h3>              
            </div>

            <div class="panel-body">
                
                <div class="col-md-12">
                    <div class="row">
                     <button id="printMe" class="btn bnt-default " style="margin-left: 30px"><i class="glyphicon glyphicon-print"></i></button>
                   </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Party Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($party as $part)
                               <tr>
                                   <td><a href="{{route('admin_party_show_candidate', ['id'=> $part->id])}}">{{$part->name}}</a></td>
                                   <td>
                                        <form action="{{route('party_delete', ['id'=> $part->id])}}" method="get" id="formDel{{$part->id}}">
                                            <button type="button" class="btn btn-danger btn-xs delMe" value="{{$part->id}}">Delete</button>
                                            {{csrf_field()}}
                                            <a href="{{route('party_edit', ['id'=> $part->id])}}" class="btn btn-info btn-xs">Edit</a>
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
              title: "Warning!",
              text: "Are you sure you want to delete the existing party?",
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
 $(document).ready(function(){

        $("#printMe").click(function(){
          window.print();
        })
     });
</script>
    
 

</body>

</html>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Social Network">
    <meta name="author" content="Joel Field">

    <title>Social Network</title>
  
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/social.css" rel="stylesheet">

   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"  href={{{ url("home") }}}>Social Network</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
               <li> <a class ="navbar-fixed-top"> 
               {{ Form::open(array('method' =>'GET','url'=>action('UserController@search'))) }}
            
                  {{ Form::label('Search Users' ) }}
                  {{ Form::text('fullname') }}
                  {{$errors->first('name') }}
                  {{{Session::get('search_status')}}}
                  </br>
                  
                  {{Form::close() }}
               </a> </li>
               <li><a class="navbar-fixed-top" href = {{{ url("update") }}}>Update Account</a></li>
              <li><a class="navbar-static-top" href= {{{ url("friends") }}}>Friends</a></li>
              <li><a class="navbar-fixed-top" href = {{{ url("login") }}}>Login</a></li>
            
               <li><a class="navbar-fixed-top" href = {{{ url("logout") }}}>Logout</a></li>
              <li><a class="navbar-fixed-top" href = {{{ url("profile") }}}>My Profile</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main body-->
     
      <div class='row'>
        
          <div class='col-lg-3'>
          @yield('friends')          
          </div>
          
          <div class='col-lg-6'>
          @yield('content')
          
          </div>

          <div class='col-lg-3'>
              
                  
                 
                </br>
                </br>
                @yield ('posting')
                
               
                    
                
                
          </div>
      </div>
  </body>
</html>
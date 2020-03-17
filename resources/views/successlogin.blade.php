@extends('layout.master')

@section('content')
<!DOCTYPE html>
<html>
 <head>
  <title>Admin Only</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .headertekst
    {
  text-align:center;
  width:100%;
    }
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 class="headertekst"></h3><br />

   @if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block">
     <strong>Welcome {{ Auth::user()->email }}</strong>
     <br />
     <a href="{{ url('/main/logout') }}" class="btn btn-danger">Logout</a>
    </div>
    
    <h2 class="headertekst">Manage Animes</h2>
    <div class="headertekst">
    <ul>
        <li>
          <a href="{{ route ('anime.index') }}" class="active">Create Or Edit Data</a>
        </li>
    </ul>
    </div>
    </body>
</html>

   @else
    <script>window.location = "/main";</script>
   @endif
   
   <br />
  </div>
 </body>
</html>

@endsection
@extends('layout.master')

@section('content')
<style type="text/css">
.headertekst{text-align:center;width:100%;}
.button3 {background-color: #f44336;} /* Red */
</style>
@if(isset(Auth::user()->email))
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 class="headertekst">Create Anime Data</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
  <div  align="right">
    <a href="{{ url('/main/logout') }}" class="btn btn-danger">Logout</a>
  </div>
         <br />
     <br />
  <form method="post" action="{{url('anime')}}" encrypt="multipart/from-data">
   {{csrf_field()}}
   <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Enter Anime Name" />
   </div>
   <div class="form-group">
   <select type="text" name="category" class="form-control">
          <option value="">--Please choose Category--</option>
          <option value="Action">Action</option>
          <option value="Adventure">Adventure</option>
          <option value="Fantasy">Fantasy</option>
          <option value="Drama">Drama</option>
          <option value="Game">Game</option>
          <option value="Magic">Magic</option>
        </select>
   </div>
   <div class="form-group">
   <input type="text" name="summary" class="form-control" placeholder="Enter summary" />
   </div>
   <div class="form-group">
        <div class="custom-file">
            <input type="file"  name="image" id="image"  />
            <label >choose file</label>
        </div>
   </div>
   @else
    <script>window.location = "/main";</script>
   @endif
   <div class="form-group">
     <a href="{{ route('anime.index') }}" class="btn btn-warning">Cancel</a>
    <input type="submit" name="store_anime" value="Save" class="btn btn-success" />
   </div>
  </form>
 </div>
</div>

@endsection
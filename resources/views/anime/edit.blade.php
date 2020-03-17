@extends('layout.master')

@section('content')
@if(isset(Auth::user()->email))

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Edit Record</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <div  align="right">
    <a href="{{ url('/main/logout') }}" class="btn btn-danger">Logout</a>
  </div>
    <br />
  <br />
  <form method="post" action="{{action('AnimeController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="name" class="form-control" value="{{$animes->name}}" placeholder="Enter Anime Name" />
   </div>
   <div class="form-group">
    <input type="text" name="category" class="form-control" value="{{$animes->category}}" placeholder="Enter Category" />
   </div>
   <div class="form-group">
    <input type="text" name="summary" class="form-control" value="{{$animes->summary}}" placeholder="Enter summary" />
   </div>
   <div class="form-group">
   <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30"><input type="file" name="image" value="{{$animes->image}}"></td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">jpg, png, gif</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
   </div>
   <div class="form-group">
       <a href="{{ route('anime.index') }}" class="btn btn-warning">Cancel</a>
       <input type="submit" class="btn btn-primary" value="Edit" />
   </div>
  </form>
 </div>
</div>
@else
    <script>window.location = "/main";</script>
@endif
@endsection

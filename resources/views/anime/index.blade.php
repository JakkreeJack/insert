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
  <h1 style="text-align:center;">Anime Data</h1>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <div  align="right">
    <a href="{{ url('/main/logout') }}" class="btn btn-danger">Logout</a>
    <a href="{{route('anime.create')}}" class="btn btn-primary">Add</a>
  </div>
         <br />
     <br />
  </div>
  <table class="table table-bordered table-striped">
     <tr>
        <th width="10%">Name</th>
        <th width="5%">Category</th>
        <th width="60%">Synopsis</th>
        <th width="10%">image</th>
        <th width="5%">Edit</th>
        <th width="5%">Delete</th>
     </tr>
   @foreach($animes ?? '' as $row)
   <tr>
        <td>{{$row['name']}}</td>
        <td>{{$row['category']}}</td>
        <td>{{$row['summary']}}</td>
        <td>{{$row['image']}}</td>
        <td><a href="{{action('AnimeController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
    <td>
     <form method="post" class="delete_form" action="{{action('AnimeController@destroy', $row['id'])}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE" />
        <button type="submit" class="btn btn-danger">Delete</button>
     </form>
    </td>
   </tr>
   @endforeach
  </table>
  {!! $animes ?? ''->links() !!}
 </div>
</div>
@else
    <script>window.location = "/main";</script>
@endif
<script>
    $(document).ready(function(){
    $('.delete_form').on('submit', function(){
        if(confirm("Are you sure you want to delete it?"))
        {
            return true;
        }else{
            return false;
        }
    });
});
    </script>
@endsection

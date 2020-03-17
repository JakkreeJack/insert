@extends('layout.master')

@section('content')
<style type="text/css">
.headertekst{text-align:center;width:100%;}
.button3 {background-color: #f44336;} /* Red */
</style>
<div class="row">
 <div class="col-md-12">
  <br />
  <h1 style="text-align:center;">Review Anime Action</h1>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  </div>
  <table class="table table-bordered table-striped">
     <tr>
        <th width="10%">Name</th>
        <th width="5%">Category</th>
        <th width="60%">Synopsis</th>
        <th width="10%">image</th>
     </tr>
   @foreach($animes as $row)
   <tr>
        <td>{{$row['name']}}</td>
        <td>{{$row['category']}}</td>
        <td>{{$row['summary']}}</td>
        <td>{{$row['image']}}</td>
   </tr>
   @endforeach
  </table>
  {!! $animes->links() !!}
 </div>
</div>
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

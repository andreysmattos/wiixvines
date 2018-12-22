@extends('painel.layouts.painel')
@section('title', '')
@section("background", 'background-color:#f6f7f2;')
@section('content')
<div class="container page-wrapper chiller-theme toggled">
<div class="row" style="margin:0;">
 @include('painel.components.sidebar-panel-dev')
 {{-- @include('painel.components.model-sidebar-panel-dev') --}}
        
        <!-- sidebar-wrapper  -->
        <main class="page-content col-xl-8 col-md-12 col-sm-12">
            <div class="container-fluid">

                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-header">
                                Vines Studio
                            </div>

                <div class="bg-light border">
                <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">#</th>      
      <th scope="col">Thumbnail</th>
      <th scope="col">Title</th>
      <th scope="col">Views</th>
      <th scope="col">Comments</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @if($nothing == 0)
    @foreach($data as $value)

    <?php
    $q = explode('=', $value->link);
        ?>
    
        <tr>
         <th scope="row">{{$i}}</th>
         <th scope="row">
          @if($ditem != $value->id)                    
          @if($value->type =='0')
       <form action="{{route('setDefault')}}" method="POST">
        {{csrf_field()}}
      <input type="hidden" value="{{$value->id}}" name="id">
      <button type="submit" class="btn btn-outline-success">Set Default</button>
      </form>
      @else
      <button type="submit" class="btn btn-danger" disabled>Forbidden</button>
      @endif
      @else
      <button type="submit" class="btn btn-success" disabled>Active</button>                  
      @endif
    </th>
          <td>
            @if($value->type == '0')
                                            <img class="rounded border" src="/images/uploads/{{$value->link}}" alt="" width="75px" height="50px">
                                            @else
                                            <?php $q = explode('=', $value->link);?>
                                        <img class="rounded border" src="http://img.youtube.com/vi/{{ $q[1] }}/hqdefault.jpg" alt="" width="75px" height="50px">
                                        @endif

            




          </td>
          <td>{{$value->title}}</td>
          <td>{{$value->view}}</td>
          <td>{{$value->comments}}</td>
          <td><a href="edit/{{$value->id}}"><button type="button" class="btn btn-danger rounded">Edit</button></a>              </td><td><form action="{{route('deleteVine')}}" method="POST">
        {{csrf_field()}}
      <input type="hidden" value="{{$value->id}}" name="id">
      <button type="submit" class="btn btn-warning rounded" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
      </form></td>

        </tr>
    
    
<?php $i++; ?>
 @endforeach
@else

<tr>
    <th colspan="5" class="text-center">Nothing here...</th>
    
</tr>
@endif
  </tbody>
</table>
</div>
<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
@endsection
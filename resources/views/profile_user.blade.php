@extends('layouts.master_channel')

@section('bg_color', '')
@section('ch_color', '')
<?php 
$bg_header = "";
$ch_name_color = "";
$ch_desc_color = "";

$title_color = "";
$subtitle_color = "";

$text_color = "";
$hr_color ="";

?>



@section('col-padrao', 'col-lg-12')

@section('feed_vines')
@endsection

@section('loop_vines')
<div class="col-md-12" align="center">
  <div class="card border col-md-12" style="width: 18rem;">
  <img class="card-img-top" src="/images/no-exit.png" alt="Card image cap">
  <div class="card-body">
    <h1 class="card-title font-weight-bold">{{$usernick}}</h1>
    <p class="card-text">This user no have channel or does not exist.</p>
  </div>
</div>
</div>


  @endsection
  @section('footer')

  @endsection
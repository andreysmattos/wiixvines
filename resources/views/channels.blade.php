@extends('layouts.master')


@section('main_content')

<div class="container pl-5 pr-5">

<div class="row">
@if(count($channels) > 0)

  @foreach($channels as $value)

    <div class="mb-3" style="max-width: 100px;margin-left: 10px;">

              <div class="card rounded bg-transparent border-0">
                  <a href="/{{$value->name}}">


                  @if($value->image)

                  <img class="card-img-top img-responsive rounded-circle" src="/images/profile-images/{{$value->image}}" style="max-width: 100px;height: auto;" >

                  @else

                  <img class="card-img-top img-responsive rounded-circle" src="/images/profile-images/default.png" style="max-width: 100px;height: auto;">

                  @endif
                    <div class="card-title" style="text-align: center;margin-bottom: 0px;font-weight: 600;">
                      {{$value->name}}
                      <br>
                    </div>
                      <small style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;line-height: 120%;text-align: center;">
                      {{$value->description}}
                    </small>
                    </a>

                    </div>


                  




              </div>
      </div>

 



  

  @endforeach
  @else
  Não achamos nenhum canal :(
  @endif
  </div>
  <div class="row col-12">

    {{ $channels->render("pagination::bootstrap-4") }}

  </div>



  @endsection

  @section('footer')



  @endsection
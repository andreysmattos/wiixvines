@extends('admin-panel.layout.basetemplate')
@section('menu')
        <div class="sidebar">
        
            <nav class="sidebar-nav" id="sidebar">
 <ul class="nav">
                    <li class="nav-title">Dashboard</li>

                    <li class="nav-item">
                        <a href="/admin" class="nav-link active">
                            <i class="fas fa-tachometer-alt"></i> Sumary
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/reports" class="nav-link">
                            <i class="fab fa-angellist"></i> Reports 
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/comments" class="nav-link">
                            <i class="fas fa-address-book"></i> Comments
                        </a>
                    </li>


                

                   
                </ul>
            </nav>
        </div>
@endsection
@section('page')
<div class="row">
                    
                    </div>
          <!-- /.card -->
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-outline-secondary">
            <div class="card-header">
              Reports
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
    <tr>
      <th scope="col">Nº</th>
      <th scope="col">From</th>
      <th scope="col">PageTitle</th>
      <th scope="col">Channel Name</th>
      <th scope="col">Report Title</th>
      <th scope="col">Report Message</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
                        @foreach($reports as $value)
                        
                            <tr>
                                <td>{{$value->id}}</th>
                                <td>{{$value->from_user_id}}</td>
                                <td>{{$value->page_title}}</td>
                                <td>{{$value->channel_name}}</td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->message}}</td>
                                <td><a href="/{{$value->channel_name}}/{{$value->page_id}}" target="_blank"><button type="button" class="btn btn-primary">Check</button></a></td>
                            </tr>
                        
                        @endforeach
                </table>
               
                <a href="vines"><p class="text-center text-primary font-weight-bold">See all</p></a>
            </div>
          </div>
</div>
        <div class="col-md-4">
                        <div class="card">
            
            <div class="card-header border-bottom">
              Latest registered
            </div>
            <div class="card-body" id="fast-interaction">
                <table class="table">
                    <thead>
                        <th>Nick</th>
                        <th></th>
                        <th>Channel</th>
                    </thead>
                    <tbody>
                @foreach($last as $lasted)
                    <tr><td>{{$lasted->nick}}</td><td>as</td><td>{{$lasted->channel_name}}</td></tr>
                @endforeach
                    </tbody>
                    </table>
                </div>
                
                                

            


        </div>
</div>


@endsection
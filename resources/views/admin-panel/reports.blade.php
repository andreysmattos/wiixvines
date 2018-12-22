@extends('admin-panel.layout.basetemplate')
@section('menu')
        <div class="sidebar">
        
            <nav class="sidebar-nav" id="sidebar">
                <ul class="nav">
                    <li class="nav-title">Dashboard</li>

                    <li class="nav-item">
                        <a href="/admin" class="nav-link">
                            <i class="fas fa-tachometer-alt"></i> Sumary
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/reports" class="nav-link active">
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
          <!-- /.card -->
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-outline-secondary">
            <div class="card-header">
              Reports
            </div>
            @if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

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
                                <td>
                                  <form action="{{url('/admin/delete-post')}}" method="POST">
                                    {{csrf_field()}}
                                  <input type="hidden" name="page_id" value="{{$value->page_id}}">                                
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar este post?');">Delete Post</button>
                                  </form> 
                                </td>
                            </tr>
                        
                        @endforeach
                </table>
            </div>
          </div>
</div>
      
@endsection
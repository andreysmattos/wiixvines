@extends('painel.layouts.painel')
@section('title', 'Enviar Foto')
@section("background", 'background-color:#f6f7f2;')
@section('content')
<div class="container page-wrapper chiller-theme toggled">
<div class="row" style="margin:0;">

 @include('painel.components.sidebar-panel-dev')
    @include('painel.components.model-sidebar-panel-dev')
        
        <!-- sidebar-wrapper  -->
        <main class="page-content col-xl-8 col-md-12 col-sm-12">

<script type="text/javascript">
         function isYoutubeVideo(url)
        {
  var v = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
  return (url.match(v)) ? RegExp.$1 : false;
        }

    $(document).ready(function(){

        $('#yblink').keyup(function(){

            var value = $(this).val();
            var urlvideo = "https://www.youtube.com/"+value;
             isYoutubeVideo(urlvideo)
            if(isYoutubeVideo(urlvideo) == false){
                $('#linkerror').text('Invalid youtube link!');
                return false;
                }else if(isYoutubeVideo(urlvideo) != false){

                $('#linkerror').text('Good Link!');
                return true;
                }
          })



    });

    function validaForm(frm) {                
                var vserver = frm.server.value;

               //World valida
                if(empty(server)){
                    $("#worlderro").html('Choose the server.');
                    return false;
                }
                if(vserver == '1'){
                    $("#worlderro").html('Choose the server.');
                    return false;
                }
                if(vserver == 'Select the server'){
                    $("#worlderro").html('Choose the server.');
                    return false;
                }


    }
</script>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card" style="background-color: transparent;">
                            <div class="card-header" style="font-size:1.4em;font-weight:600;background-color: transparent;">
                                Upload Vine 
                            </div>
                              @if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif
                                
                                
                                        @if(session()->has('msgkeycode'))
                                        <div class="alert alert-danger rounded">
                                            {{session()->get('msgkeycode')}}<br />
                                        </div>
                                         {{session()->forget('msgkeycode')}}
                                        @endif

                            <div class="card-body">
    
                                <div class="row">

                                    <div class="col-md-12">

{{Form::open(['route' => 'photoInsert', 'files' => true])}}

                                        <div class="form-group">
                                            <label for="title" class="form-control-label">Title</label>
                                            <input id="title" name="title" value="{{old('title')}}" maxlength="50" minlength="3" class="form-control" autocomplet='off' required>
                                            <div id="titleerro" class="text-danger pl-3 font-weight-light"></div>
                                        </div>
                                    </div>
                                   </div>      
                             <div class="row mb-2">
                                 <div class="col-md-12" id="ybform">
                                    <div class="form-group">
                                    <label for="yblink">Photo: *Max size: 3MB</label>
                                        <div class="input-group">
                                            
                                                {{Form::file('link', ['required'])}}
                                    
                                        </div>
                                        <span class="text-danger" id="linkerror"></span>
                                        </div>
                                        
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="worldselect">Server:</label>
                            <select class="form-control" id="worldselect" name="server" required>
                                <option disabled selected value>Select the server</option>
                                                      
                                        @for($i=1; $i < $countj; $i++)
                                                                                    
                                                <option value="{{$json[0]->worlds[$i]}}">{{$json[0]->worlds[$i]}}</option>
                                        @endfor
                                            </select>

                                        </div>
                                        <div id="worlderro" class="text-danger pl-3 font-weight-light"></div>
                                </div>




                                </div>
                                
                                   <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                 <div class="input-group">

    <label for="desc">Description:</label>
  </div> <textarea class="form-control" aria-label="Description" id="desc" name="description" maxlength="200" rows="5">{{old('description')}}</textarea>
  

<div id="descerro" class="text-danger pl-3 font-weight-light"></div>
</div>
</div>
</div>

                                                        <button type="submit" class="rounded cursor_pointer btn btn-danger float-right font-weight-bold">Upload</button>
                             {{Form::close()}}

            </div>
        </div>
    </div>
</div>
@endsection
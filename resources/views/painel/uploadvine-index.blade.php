@extends('layouts.master')
@section('loop_vines')
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



    })

    function validaForm(frm) {
                var vlink = frm.link.value;
                var vserver = frm.server.value;

                var valuelink = $('#yblink').val();
                var urlvideo = "https://www.youtube.com/"+valuelink; //Substitua pela URL do seu vídeo
                
                if(link == ''){
                    $("#linkerror").html('You need put a valid youtube link.');
                    return false;
                }
                if (isYoutubeVideo(urlvideo) == false){
                    $("#linkerror").html('Invalid youtube link.');
                    return false;
                }



                //World valida
                if(empty(server)){
                    $("#worlderro").html('Choose the server.');
                    return false;
                }


    }
</script>
<script>
    $(window).on('load',function(){
        $('#uploadModal').modal('show');

 });
</script>

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Upload Vine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

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


<form method="POST" action="{{route('vines.store')}}" onsubmit="return validaForm(this);">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="title" class="form-control-label">Title</label>
                                            <input id="title" name="title" value="{{old('title')}}" class="form-control" autocomplet='off' required>
                                            <div id="titleerro" class="text-danger pl-3 font-weight-light"></div>
                                        </div>
                                         

                                    <div class="form-group">
                                    <label for="yblink">Youtube Link:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                 <span class="input-group-text" id="fm">www.youtube.com/</span>
                                             </div>
        <input type="text" placeholder="watch?v=OpAaLT_PTCU" class="form-control" id="yblink" name="link" required maxlength="30" minlength="10">
                                    
                                        </div>
                                        <span class="text-danger" id="linkerror"></span>
                                    </div>


                            <div class="row">
                                <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="worldselect">Server:</label>
                            <select class="form-control" id="worldselect" name="server" required>
                                <option>Select server</option>
                                                      
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
                                            <label for="multi-select">Game mode</label>
                                            <select id="multi-select" class="form-control" multiple="" name="playmode" required>
                                                <option value="0">PvP - Player vs Player</option>
                                                <option value="1">PvM - Player of Monster</option>
                                                <option value="2">Quests</option>
                                            </select>
                                        </div>
                                    </div>                              
                               
                    
                                 </div>
                                   <div class="row">
                                    <div class="col-md-12">  
                                        <div class="form-group">
                                 <div class="input-group">

    <label for="desc">Description:</label>
  </div> <textarea class="form-control" aria-label="With textarea" id="desc" name="description" maxlength="200" rows="5">{{old('description')}}</textarea>
  

<div id="descerro" class="text-danger pl-3 font-weight-light"></div>
</div>
</div>
</div>

                                <div class="row mb-2">
                                 <div class="col-md-12" id="ybform">
                                    <label for="fm">Your keycode:</label>
                                     <div class="input-group">
                                    <input type="text" value="{{$keycode}}" class="form-control" name='keycode' readonly>
                                     </div>
                        <p class="text-danger"><b><i>Remember to enter the keycode in the video description.</p>
                                </div>
                                
                            </div>
                                 <button type="submit" class="form-control rounded cursor_pointer btn btn-info btn-outline-info border border-info font-weight-bold">Upload</button>
                            <a href="/">
                                 <button type="button" class="mt-2 form-control rounded cursor_pointer btn btn-secondary btn-outline-secondary border border-secondary font-weight-bold">Back</button>
                                 </a>
                             </form>
    </div>
  </div>
</div>


          
            </div>
        </div>
    </div>
</div>
@endsection
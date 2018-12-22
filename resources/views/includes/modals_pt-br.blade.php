 @if(Auth::check() && auth::user()->channel_name == null && (session()->has('errorch') || (isset ($errors) && count($errors) > 0)))

    <script type="text/javascript">
$(window).on('load',function(){
        $('#exampleModal').modal('show');

 });
    </script>
    <script>$(document).ready(function(){
    
$("#recipient-name").keyup(function(){
var titleval = $("#recipient-name").val();
$("#keycode").val(titleval);
});
$()

});</script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title font-weight-bold text-center" id="exampleModalLabel">Bem-vindo ao TibiaVines! 😜 </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="form-group">
        <div class="font-weight-bold">
        Começe criando seu canal, 
        <div class="clearfix"></div>
        <small class="text-muted">curta, comente ou sigua quem quiser!</small>
      </div>
      </div>
        

    {{Form::open(['route' => 'channel.store', 'files' => true])}}
    
        {{ csrf_field() }}

              @if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif
  <div class="form-row">
  <div class="form-group">
    <div class="input-group">
          
    <img src="/images/profile-images/default.png" width="128px" id="blah" height="128px;" class="border rounded-circle float-left mr-3 mb-2" alt="Profile image">
    

    </div>
  </div>                                    


          <div class="form-group col-md-8">
           <input type="text" class="form-control mb-2" placeholder="Channel name" name="name" id="recipient-name" autocomplete="off" required value="{{ old('name') }}" maxlength="30" minlength="4">

            <textarea name="description" autocomplete="off" placeholder="Description" maxlength="200" class="form-control" rows="3" id="desc" cols="3" id="recipient-name" style="resize: none;">{{ old('description') }}</textarea>
            </div>
                                
   </div>
<div class="custom-file col-md-5">
  {{Form::file('link', array('id' => 'logo'))}}
   {{-- {{Form::file('link', array('id' => 'logo', 'class' => 'custom-file-input'))}} --}}
   <label for="logo" class="custom-file-label text-truncate">Escolher avatar...</label>
</div>



                  <input type="text" hidden class="form-control" id="keycode" name="keycode" autocomplete='off' required maxlength="15" minlength="4" readonly>

             
          
                        <div class="form-group mt-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="terms" value="1" required> I agree the <a href="#" id="terms_use">terms of use</a>
                                    </label>
                                </div>
                                <textarea id="rules" class="form-control" style="display:none;" rows="10" disabled>1: We only accept vines from the owner of the same.
2: Offensive or third-party names are not allowed in 'Name', 'Description', 'Thumbmail', 'Title' of the channel or vine.
3: To add a video in your channel it is necessary to have the 'Keycode' shown above in the description.
4: As of the creation of the channel you will make your 'Nick' public, and can be displayed by anyone who wants to visit your channel.
5: TibiaVines is a platform especially dedicated to Tibia, so we do not accept anything that does not have a direct relation to the game.
6: You can only enable your channel for rewards after having at least one vine with one thousand (1000) vizualizações.
7: We check IP history by channel periodically, thus not being allowed to connect to another login without authorization.
8: We will never ask for personal data for our users.
9: Never enter your account or game password in any field.
-------------
If you do not agree or do not want to follow any of these rules, please do not continue the operation.
            </textarea>
                                   
                                </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-vines">Criar Canal</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{session()->forget('errorch')}}
@endif


{{-- MODAL ERROR --}}
{{-- MODAL ERROR --}}
{{-- MODAL ERROR --}}

@if(session()->has('back_msg'))

    <script type="text/javascript">
$(window).on('load',function(){
        $('#exampleModal').modal('show');

 });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Huh...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      {{session()->get('back_msg')}}
    </div>
  </div>
</div>
</div>
{{session()->forget('back_msg')}}
@endif



{{-- MODAL BACK --}}

@if(session()->has('welcome'))

    <script type="text/javascript">
$(window).on('load',function(){
        $('#welcomeModal').modal('show');

 });
    </script>

    <div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Aee, canal criado!! 👊</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        O que vc acha de começar postando uma foto? <a href="/user/upload-photo">Clique aqui</a> e te levo lá! ;-)
    </div>
  </div>
</div>
</div>
{{session()->forget('welcome')}}
@endif

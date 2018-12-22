@extends('layouts.master_channel')
@section('title', 'Create Channel')
@section('channel_menu', 'active')


@section('col-padrao', 'col-lg-12')

@section('feed_vines')
@endsection

@section('loop_vines')
<div class="col-md-12 rounded py-3 text-left justify-content-center d-flex" id="post-data"> 
<script>$(document).ready(function(){
    
$("#recipient-name").keyup(function(){
var titleval = $("#recipient-name").val();
$("#keycode").val(titleval);
});
$()

});</script>
<!--inicio do modal -->
                        <div class="card col-md-10">
                            <div class="card-header bg-light">
                                Create Channel
                            </div>
                            <div class="card-body">
    
                                <div class="row">

                                    <div class="col-md-12" align="left">

    <form method="POST" action="{{ route('channel.store') }}">
        {{ csrf_field() }}
              @if( isset ($errors) && count($errors) > 0)
              <div class="alert alert-danger rounded">
                @foreach($errors->all() as $error)
                {{$error}}<br />
                @endforeach
              </div>
              @endif

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control col-md-12" name="name" id="recipient-name" autocomplete="off" required value="{{old('name')}}" placeholder="{{auth::user()->nick}}" maxlength="25" minlength="4">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">KeyCode:</label>
            <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="fm">TibiaVines.com/</span>
                  </div>
                  <input type="text" class="form-control" id="keycode" name="keycode" autocomplete='off' required maxlength="15" minlength="4"  value="{{old('name')}}" readonly>

                </div>
          </div>
          <div class="form-group">
            <label for="rules" class="col-form-label">Terms of use:</label>
            <textarea id="rules" class="form-control" rows="16" disabled>1: We only accept vines from the owner of the same.
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
           <p class="text-danger">* By clicking 'Create Channel' you agree to the terms of use.</p>
        </div>
          
        
      
        <a href="/">
        <button type="button" class="btn btn-secondary closemodal" data-dismiss="modal">Back</button></a>
        <div class="float-right form-group">
        <button type="submit" class="btn btn-info">Create Channel</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection
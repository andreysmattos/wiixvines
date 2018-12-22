  $(document).ready(function(){

     $('#searchAll').keyup(function(){
      $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchAll')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});
});


  $('#servers').change(function(){
      $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchSv')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});
 


  });


    $('#preferences').change(function(){
      $value=$(this).val();
      $search = $('#searchAll').val();
      $server = $('#servers').val();
      $mode = $('#radioplaymode input[name=playmode]').val();
      $type = $('#pvptype input[name=pvptype]').val();

 
$.ajax({
 
type : 'get',
 
url : '{{route('preferences')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});
 


  });


  $('#radioplaymode input[name=playmode]').click(function(){

        $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchMode')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});

});
 
    $('#pvptype input[name=pvptype]').click(function(){

        $value=$(this).val();
 
$.ajax({
 
type : 'get',
 
url : '{{route('searchType')}}',
 
data:{'search':$value},
 
success:function(data){
 
$('#loopvines').html(data);
 
}
 
});

});

 });


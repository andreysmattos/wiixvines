<script>
  $(document).ready(function(){

var cont = 0;

$( "#img-like" ).click(function(){  
if(cont == 0)
{
cont += 1;
}
else
{
b();
cont = 0;
}
})

function b(){


}

});
</script>
<script type="text/javascript">
$(function() {
    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');   
    });   
});
</script>

   <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
<script>
  function loading(){
     $('#load').css('display','none');
     $('#tudo_page').css('opacity','1');
   }
</script>

</script>
  <!-- jsDeliver -->
<script src="/jquery.lazy-master/jquery.lazy.min.js"></script>
<script>
  $(function(){

  $("img.lazy").lazy();
  $("img.lazy-fade").lazy({


  effect: "fadeIn",
          effectTime: 1000,
          threshold : 100
          });
  });

 </script>
 <script>
   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>
<script type="text/javascript">
$(document).ready(function(){
var pageid = $('#post_id').val();                      
        $.ajax({
            url: '{{ route('checkLike') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
              if(data == 'true')
              {
                $('.unlike-button').show();
              }
              if(data == 'false')
              {
                $('.like-button').show();
              }        
             }
        });

      $('#like-button').click(function(){
          var pageid = $('#post_id').val(); 

    if (  $( this ).css( "transform" ) == 'none' ){
        $(this).css("transform","rotate(360deg)");
    } else {
        $(this).css("transform","" );
    }

            $.ajax({
            url: '{{ route('like') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
                  $('.num_likes').html(data);                      
                  $('.like-button').hide();
                  $('.unlike-button').show();
            }            
          })

        });

        $('#unlike-button').click(function(){

          var pageid = $('#post_id').val();                      
        $.ajax({
            url: '{{ route('unlike') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
              $('.num_likes').html(data);
                $('#unlike-button').hide();  
                $('#like-button').show();
                   
                                
            }            
        })
      
      });

         }) 
           
 </script>
           <script type="text/javascript">
    $(document).ready(function(){


     $("#myText").emojioneArea({
      });

      var emojiElt = $("#watch-comment").emojioneArea({
        events: {
      keyup: function(editor, event) {
        // catches everything but enter
        if (event.which == 13) {
          
          insertComment();         
        }
      }
    },
         pickerPosition: "top",
        tonesStyle: "radio",
        autocomplete: false,
        inline: true,
        });

     $( "#insert_comment" ).click(function(e) {
              insertComment();
            });


        function insertComment(){

 
            var pageid = $('#page_id').val();
            var comment = $("#watch-comment").data("emojioneArea").getText();  

        $.ajax({
            url: '{{ route('insertComment') }}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "page_id": pageid,
                "comment": comment
            }, 
            success: function (data) {
                $('#erromsg').html(''); 
                $('#comments-show').html(data);
                $("#watch-comment").data("emojioneArea").setText('');
                                
            },
        complete: function() {
            
        },
            error: function (data) {
              $('#erromsg').html("Insufficient characters or too repetitive try.");
              
           }
        });
        }

        


        });


    $(document).on('click', '.delete', function(e){
        e.preventDefault()
        var id = $(this).attr('id');
        target = $(this);

        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url: '{{ route('commentDelete') }}',
            type: 'get',
            data: {
                "id": id
            }, 
                success:function(data)
                {                    
                    $('#cm'+id).remove();                
                    $('#comments-show').DataTable().ajax.reload();
                },
                error: function(data)
                {
                  console.log(data);
                }
            })
        }
        else
        {
            return false;
        }
    }); 
</script>
<script type="text/javascript">

$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
        /* Check the location of each desired element */
        $('li').each( function(i){
            
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });
    
});


      </script>
  <script type="text/javascript">
$(document).ready(function(){
var pageid = $('#actualpage_id').val();                      
        $.ajax({
            url: '{{ route('checkFollow') }}',
            type: 'get',
            data: {
                "pageid": pageid
            }, 
             success: function (data) {
                if(data == 'followed'){
                  $('.unfollow-button').show();
                }
                if(data == 'no'){
                  $('.follow-button').show();
                }     

                                
            }
             })
        });
</script>
<script type="text/javascript">
$(document).ready(function(){
 $('.follow-button').click(function(){
  var pageid = $('#actualpage_id').val();                      
        $.ajax({
            url: '{{ route('joinFollow') }}',
            type: 'get',
            data: {
                "searchid": pageid
            }, 
             success: function (data) {
              if(data == 'allOk'){
              $('.follow-button').hide();
              $('.unfollow-button').show();
            }
                                
            }
             });


     });

  $('.unfollow-button').click(function(){
        var pageid = $('#actualpage_id').val();                               
        $.ajax({
            url: '{{ route('delFollow') }}',
            type: 'get',
            data: {
                "searchid": pageid
            }, 
             success: function (data) {
              if(data == 'allOk'){
              $('.unfollow-button').hide();              
              $('.follow-button').show(); 
              }    
                                
            },
            error: function(data){
              console.log(data);
            }

             });

        });   

        });
      </script>
      <script>

$(document).ready(function(){
    $('#toggle_inter').click(function(e){
      e.preventDefault();

      $('.inter-sidebar').toggle(function() {
        $('.inter-sidebar').animate({       
        }, "slow");
    });

      $('.hide-inter').toggle();
      $('.show-inter').toggle();
      

    })


})
</script>
<script>
function aboutme(x) {
    $(x).toggle(function() {
        $(x).animate({
            width: '600px'
        }, "slow");
    }, function() {
        $(x).animate({
            width: '40px'
        }, "slow");
    });
};
        
 </script>

 {{-- FUNCTIONS WIIX --}}


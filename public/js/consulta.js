$(document).ready(function(){
	$('#tiles').empty(); //Limpando a tabela
	$.ajax({
		type:'post',		//Definimos o método HTTP usado
		dataType: 'json',	//Definimos o tipo de retorno
		url: '.../php/getDados.php',//Definindo o arquivo onde serão buscados os dados
		success: function(dados){
			for(var i=0;dados.length>i;i++){
				//Adicionando registros retornados na tabela
				$('#tiles').append('<a href=watch.php?v='+dados[i].id+'><li><img src="http://img.youtube.com/vi/'+dados[i].link'/hqdefault.jpg" ><div class="post-info"><div class="post-basic-info"><h3><a href="#" class="text-info font-weight-normal">'+dados[i].title+'</a></h3><span><a href="#" class="text-dark text-capitalize"><i class="fas fa-globe-americas"></i>'+dados[i].world+'</a></span><p class="font-weight-normal">'+dados[i].desc+'</p></div><div class="post-info-rate-share"><v class="rateit"><i class="ml-2 fas fa-eye"></i>'+dados[i].viewer+'</div><div class="post-share"><span class="text-capitalize"><img src="images/wiix.png" alt="" class="rounded-circle bg-info mt-1 btn-outline-info" width="10"><?= $videochannel;  ?></span></div><div class="clear"> </div></div></div></li></a>"');
			}}}

});
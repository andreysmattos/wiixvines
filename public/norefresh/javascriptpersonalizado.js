$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#worldtype").click(function () {
		
		var worldtype = $(this).val();
		
		//Verificar se há algo digitado
		if(worldtype != ''){
			var dados = {
				palavra : worldtype
			}		
			$.post('busca.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$("#tiles").html(retorna);
			});
		}else{
			$("#tiles").html('');
		}		
	});
});

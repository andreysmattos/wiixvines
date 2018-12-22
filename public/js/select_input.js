					$(document).ready(function () {
	 							
			$.getJSON('/js/type_worlds.json', function (data) {
				var items = [];
				var options = '';	


				$.each(data, function (key, val) {
					options += '<option value="' + val.nome + '">' + val.nome + '</option>';
				});

				$("#pvptype").html(options);				
				
				$("#pvptype").change(function () {				
				
					var options_worlds = '';
					var str = "";					
					
					$("#pvptype option:selected").each(function () {
						str += $(this).text();
					});

					
					$.each(data, function (key, val) {
						if(val.nome == str) {							
							$.each(val.worlds, function (key_city, val_city) {
								options_worlds += '<option value="' + val_city + '">' + val_city + '</option>';
							});							
						}
					});

					$("#worldtype").html(options_worlds);
					
				}).change();		
			
			});
		

   
   $('#pvptype').on('change', function() {
      var pvptype = $(this).val();
		
		//Verificar se há algo digitado
		if(pvptype != ''){
			var dados = {
				palavra : pvptype
			}		
			$.post('norefresh/busca-pvp.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}else{
			$(".innercontnt").html('');
		}		




   $("#worldtype").change(function(){ 
      var worldtype = $(this).val();
		
		//Verificar se há algo digitado
		if(worldtype != ''){
			var dados = {
				palavra : worldtype
			}		
			$.post('norefresh/busca-world.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}else{
			$(".innercontnt").html('');
		}		

   });


         $("#modetype").change(function(){ 
      var modetype = $(this).val();
		
		//Verificar se há algo digitado
		if(worldtype != ''){
			var dados = {
				palavra : modetype
			}		
			$.post('norefresh/busca-mode.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}else{
			$(".innercontnt").html('');
		}		

   });



     $("#search_all").keyup(function(){ 
      var search = $(this).val();
		
		//Verificar se há algo digitado
		if(search != ''){
			var dados = {
				palavra : search
			}

			
			$.post('norefresh/busca_all.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}else{
			var dados = {
				palavra : search
			}
			$.post('norefresh/busca_no.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}		

   });





});


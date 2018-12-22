var $ = jQuery.noConflict();
				$(function() {
					$('#activator').click(function(){
						document.getElementById('box').style.display = 'block';
						$('#box').animate({'top':'0px'},500);
					});
					$('#boxclose').click(function(){
					$('#box').animate({'top':'-700px'},500);
					});
				});
				$(document).ready(function(){
				//Hide (Collapse) the toggle containers on load
				$(".toggle_container").hide(); 
				//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
				$(".trigger").click(function(){
					$(this).toggleClass("active").next().slideToggle("slow");
						return false; //Prevent the browser jump to the link anchor
				});
									
			});

	$(document).ready(function () {
	 								

			$.getJSON('../type_worlds.json', function (data) {
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
			

			$("#worldtype").change(function(){ 
      var worldtype = $(this).val();
		
		//Verificar se há algo digitado
		if(worldtype != ''){
			var dados = {
				palavra : worldtype
			}		
			$.post('../norefresh/busca-world.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}else{
			$(".innercontnt").html('');
		}		

   });
      $("#pvptype").change(function(){ 
      var pvptype = $(this).val();
		
		//Verificar se há algo digitado
		if(pvptype != ''){
			var dados = {
				palavra : pvptype
			}		
			$.post('../norefresh/busca-pvp.php', dados, function(retorna){
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
			$.post('../norefresh/busca-mode.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".innercontnt").html(retorna);
			});
		}else{
			$(".innercontnt").html('');
		}		

   });
         });

   
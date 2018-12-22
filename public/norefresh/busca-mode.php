 <script type="text/javascript">
		    (function ($){
		      var $tiles = $('#tiles'),
		          $handler = $('li', $tiles),
		          $main = $('#main'),
		          $window = $(window),
		          $document = $(document),
		          options = {
		            autoResize: true, // This will auto-update the layout when the browser window is resized.
		            container: $main, // Optional, used for some extra CSS styling
		            offset: 20, // Optional, the distance between grid items
		            itemWidth:280 // Optional, the width of a grid item
		          };
		      /**
		       * Reinitializes the wookmark handler after all images have loaded
		       */
		      function applyLayout() {
		        $tiles.imagesLoaded(function() {
		          // Destroy the old handler
		          if ($handler.wookmarkInstance) {
		            $handler.wookmarkInstance.clear();
		          }
		
		          // Create a new layout handler.
		          $handler = $('li', $tiles);
		          $handler.wookmark(options);
		        });
		      }
		      /**
		       * When scrolled all the way to the bottom, add more tiles
		       */

		
		      // Call the layout function for the first time
		      applyLayout();
		
		      // Capture scroll event.
		      $window.bind('scroll.wookmark', onScroll);
		    })(jQuery);
		  </script>
<?php
	//Incluir a conexão com banco de dados
include_once('../php/conn.php');
	
	//Recuperar o valor da palavra
	$cursos = $_POST['palavra'];
	if($cursos == 'All'){
		$cursos = '';
	}
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT * FROM vines WHERE playmode LIKE '%$cursos%'";
	$resultado_cursos = mysqli_query($mysqli, $cursos);
	
	if(mysqli_num_rows($resultado_cursos) <= 0){
		echo "<center><span class='border-info border pl-3 pr-3 pt-2 pb-2 bg-light font-weight-bold text-dark'>Nenhum vine encontrado...</span></center>";
	}else{
		while($rows = mysqli_fetch_assoc($resultado_cursos)){
												  ?>

				<a href="watch.php?v=<?= $rows['id'] ?>">
			        <li>
			        	<img src="https://img.youtube.com/vi/<?= $rows['link'] ?>/hqdefault.jpg" >
			        	<div class="post-info">
			        		<div class="post-basic-info">
				        		<h3><a href="#" class="text-info font-weight-normal"><?= $rows['title']; ?></a></h3>

				        		<span><a href="#" class="text-dark text-capitalize"><i class="fas fa-globe-americas"></i> <?= $rows['world'];  ?></a></span>
				        		<p class="font-weight-normal"><?= $rows['desc'];  ?></p>
			        		</div>

			        		<div class="post-info-rate-share">		        			
			        				<div class="rateit">
			        						<i class="ml-2 fas fa-eye"></i> <?= $view['totalvisit']; ?>
			        				</div>
			        				</a>
			        				<div class="post-share">     			        	
			        				<span class="text-capitalize">
			        					<img src="images/wiix.png" alt="" class="rounded-circle bg-info mt-1 btn-outline-info" width="10"><?= $rows['channel'];  ?>
			        				</span>
			        			</div>
			        			<div class="clear"> </div>
			        		</div>
			        	</div>
			        </li>
			        
			  <?php
			
		}

	}
?>


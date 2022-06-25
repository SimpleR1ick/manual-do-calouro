<?php
//Iniciar  Sessão
session_start();

//se existe a sessão mensagem criada
if(isset($_SESSION['mensagem'])): 
?>
	
 <script>
   //Mensagem de alerta javascript do materialize
	window.onload = function(){
		  M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
		
		
	};
</script>

<?php 	
endif;
session_unset(); //limpar a sessão
?>
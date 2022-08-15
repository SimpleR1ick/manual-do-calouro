<?php
//Conexão
include_once '../includes/connect.php';

//Header
include_once 'crud_header.php';

//Select com o id que veio da URL
if (isset($_GET['id'])) {
	$id = pg_escape_string(CONNECT, $_GET['id']);

	$sql = "SELECT * FROM usuario WHERE id_usuario = '$id'";

	$resultado = pg_query(CONNECT, $sql);
	$dados = pg_fetch_all($resultado);
}
?>

<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Editar usuario </h3>
		<form action="crud_update.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados[0]['id_usuario']; ?>">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome" value="<?php echo $dados[0]['nom_usuario']; ?>">
				<label for="nome"> Nome </label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="email" id="email" value="<?php echo $dados[0]['email']; ?>">
				<label for="email"> Email </label>
			</div>

			<button type="submit" name="btn-editar" class="btn">Atualizar</button>
			<!--<a href="crud_index.php" type="submit" class="btn green"> Lista de usuarios </button>-->
		</form>
	</div>
</div>

<?php include_once 'crud_footer.php'; ?>
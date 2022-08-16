<?php
//Conexão
include_once '../includes/connect.php';

//Header
include_once 'crud_header.php';

//Mensagem
include_once 'mensagem.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3 ">
		<h3 class="light"> Usuarios </h3>
		<table class="striped">
			<thead>
				<tr>
					<th>ID:</th>
					<th>Nome:</th>
					<th>Email:</th>
				</tr>
			</thead>

			<tbody>
				<?php
				$sql = "SELECT id_usuario, nom_usuario, email FROM usuario ORDER BY id_usuario";
				$result = pg_query(CONNECT, $sql);

				if (pg_num_rows($result) == 0) {
					?>
						<tr>
							<td>-</td>
							<td>-</td>
							<td>-</td>
							<td>-</td>
						</tr>	
				<?php
				} else {
					while ($dados = pg_fetch_array($result)) { 
					?>
						<tr>
							<td><?php echo $dados['id_usuario']; ?></td>
							<td><?php echo $dados['nom_usuario']; ?></td>
							<td><?php echo $dados['email']; ?></td>
							<td><a href="crud_editar.php?id=<?php echo $dados['id_usuario']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a> </td>

							<td><a href="#modal<?php echo $dados['id_usuario']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a> </td>

							<!-- Modal Structure deletar -->
							<div id="modal<?php echo $dados['id_usuario']; ?>" class="modal">
								<div class="modal-content">
									<h3>Atenção!</h3>
									<p>Deseja excluir esse usuario?</p>
								</div>

								<div class="modal-footer">
									<form action="crud_delete.php" method="POST">
										<input type="hidden" name="id" value="<?php echo $dados['id_usuario']; ?>">
										<button type="submit" name="btn-deletar" class="btn red"> Sim, quero deletar </button>
										<a href="#!" class="modal-close waves-effect waves-green btn-flat"> Cancelar </a>
									</form>
								</div>
							</div>
						</tr>
					<?php 
					}
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<?php include_once 'crud_footer.php'; ?>
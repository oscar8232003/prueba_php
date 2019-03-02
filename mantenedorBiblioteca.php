<!DOCTYPE html>
<html>
<head>
	<!--BOOTSTRAP 4-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Tarea</title>
	<script src="js/validacion.js"></script>
</head>
<body>
	<?php 
	$mysqli = new mysqli('localhost','root','','biblioteca');
	if (!$mysqli){
		echo "Algo anda mal";
	}


	if(isset($_POST["Agregar"])){
	$t = $_POST["titulo"];
	$a = $_POST["autor"];
	$e = $_POST["editorial"];
	$i = $_POST["isbn"];
	
	$agregar = $mysqli-> query("insert into libros (titulo,autor,editorial,isbn) values('$t','$a', '$e', '$i')");
	}

	if(isset($_GET['identificador'])){
		$identificador = $_GET['identificador'];
		$borrar = $mysqli->query("delete from libros where id=$identificador");
	}


	?>
	 <div class="container">
		<form onsubmit="return validar()" class="row justify-content-center mb-5" action="mantenedorBiblioteca.php" method="POST">
			<div class="col-12 mb-5">
				<h2 class="text-center mt-3">Registro de libros</h2>
			</div>

			<div class="col-12 col-md-6">
			  <div class="form-group">
			    <label for="titulo">Titulo</label>
			    <input type="text" class="form-control" id="titulo" placeholder="Ingrese el titulo" name="titulo">
			    <div class="invalid-feedback">
			    	<p id="titulo-invalid"></p>
			    </div>
			    <div class="valid-feedback">
			    	<p id="titulo-valid">Correcto</p>
			    </div>
			  </div>
			</div>
			
			<div class="col-12 col-md-6">
			  <div class="form-group">
			    <label for="autor">Autor</label>
			    <input type="text" class="form-control" id="autor" placeholder="Ingrese el autor" name="autor">
			    <div class="invalid-feedback">
			    	<p id="autor-invalid">autor</p>
			    </div>
			    <div class="valid-feedback">
			    	<p id="autor-valid">Correcto</p>
			    </div>
			  </div>
			</div>

			<div class="col-12 col-md-6">
			  <div class="form-group">
			    <label for="editorial">Editorial</label>
			    <input type="text" class="form-control " id="editorial" placeholder="Ingrese la editorial" name="editorial">
			    <div class="invalid-feedback">
			    	<p id="editorial-invalid"></p>
			    </div>
			    <div class="valid-feedback">
			    	<p id="editorial-valid">Correcto</p>
			    </div>
			  </div>
			</div>

			<div class="col-12 col-md-6">
			  <div class="form-group">
			    <label for="isbn">Isbn</label>
			    <div class="input-group">
			        <input type="text" class="form-control" id="isbn" placeholder="Ingrese el isbn" name="isbn">
			        <div class="invalid-feedback">
			    		<p id="isbn-invalid"></p>
			    	</div>
				    <div class="valid-feedback">
				    	<p id="isbn-valid">Correcto</p>
				    </div>
			    </div>			
			  </div>
			</div>

					
			<div class="col-6 col-md-3 text-center">
				<input type="submit" class="btn btn-primary mt-3" name="Agregar" value="Agregar">
				<input type="reset" class="btn btn-secondary mt-3" name="Borrar" value="Borrar">
			</div>

		</form>


		<div class="row">
			<div class="col-12 mt-5">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Titulo</th>
				      <th scope="col">Autor</th>
				      <th scope="col">Editorial</th>
				      <th scope="col">ISBN</th>
				      <th scope="col">Eliminar</th>
				    </tr>
				  </thead>
				  <tbody>
				   <?php 
					$consulta_lista = $mysqli->query("select id,titulo,autor,editorial,isbn from libros");
					foreach ($consulta_lista as $libros) {
					?>
					<tr>
						<td><?php echo $libros['id'] ?></td>
						<td><?php echo $libros['titulo'] ?></td>
						<td><?php echo $libros['autor'] ?></td>
						<td><?php echo $libros['editorial'] ?></td>
						<td><?php echo $libros['isbn'] ?></td>
						<td><a href="mantenedorBiblioteca.php?identificador=<?php echo $libros['id']; ?>"><button class="btn btn-danger">Eliminar</button></a></td>
					</tr>
					<?php } ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<!--JQUERY-->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<!--POPPERS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<!--BOOTSTRAP 4-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
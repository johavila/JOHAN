
<h1 style="text-align: center;">Registro</h1>
<form action="datosPaciente.php" method="post"> 
	<fieldset class="container">
		<legend>Informacion Personal</legend>
		<div class="form-group">
			<label>Fecha y lugar de nacimiento (*)</label>
			<div class="form-group">
				<input type="date" name="fechaNacimiento" placeholder="Fecha de nacimiento" class="form-control" required="">	
			</div>
			<div class="form-group">
				<!--<h4 class="col-md-3">Lugar de nacimiento</h4>-->
				<div class="form-group">
					<h5 class="col-md-3">Departamento:</h5>
					<select name="dptoNacimiento" id="dptosNacimiento" class="form-control" onchange="cargarMunicipios(this.value, 'municipioNacimiento')"></select>	
				</div>
				<div class="form-group">
					<h5 class="col-md-3">Municipio:</h5>
					<select name="municipioNacimiento" id="municipioNacimiento" class="form-control">
						<option value="0">--Elija una opcion--</option>
					</select>	
				</div>
			</div>
		</div>
		<div class="form-group">
			<label>Primer Apellido (*)</label>
			<input type="text" name="primerApellido" placeholder="Primer Apellido" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Segundo Apellido (*)</label>
			<input type="text" name="segundoApellido" placeholder="Segundo Apellido" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Primer Nombre (*)</label>
			<input type="text" name="primerNombre" placeholder="Primer Nombre" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Segundo Nombre (*)</label>
			<input type="text" name="segundoNombre" placeholder="Segundo Nombre" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Documento de Identificacion (*)</label>
			<input type="text" name="cc" placeholder="Identificacion" class="form-control" required="form-control">
		</div>
		<div class="form-group">
			<label>E-mail (*)</label>
			<input type="email" name="email" placeholder="Correo Electronico" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Direccion (*)</label>
			<input type="text" name="direccion" placeholder="Direccion" class="form-control" required="">
		</div>
		<div class="form-group">
			<label>Sexo (*)</label><br>
			<input type="radio" name="sexo" value="Hombre" checked="" class="radio-inline">Hombre
			<input type="radio" name="sexo" value="Mujer" class="radio-inline">Mujer
		</div>
		<div class="form-group">
			<label>Estado Civil (*)</label>
			<select name="estadoCivil" class="form-control">
				<option selected="" value="0">--Elija una opcion--</option>
				<option value="1">Soltero/a</option>
				<option value="2">Casado/a</option>
				<option value="3">Viudo/a</option>
				<option value="4">Divorsiado/a</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Estrato (*)</label>
			<input type="number" name="estrato" placeholder="Estrato" class="form-control" required="" max="6" min="1">
		</div>
		<div class="form-group">
			<label>Ubicación</label>
			<div class="form-group">
				<p class="col-md-3">Departamento:</p>
				<select name="dptos" id="dptos" class="form-control" onchange="cargarMunicipios(this.value, 'municipios')"></select>			
			</div>
			<div class="form-group">
				<p class="col-md-3">Municipio:</p>
				<select name="municipios" id="municipios" class="form-control">
					<option value="0">--Elija una opcion--</option>
				</select>			
			</div>
		</div>
		<div class="form-group">
			<label>Telefonos</label><br>
			<div class="input-group">
				<input type="text" name="telefonoFijo" id="telFijo" placeholder="Telefono Fijo" class="form-control">
				<span class="input-group-addon">-</span>
				<input type="text" name="telefonoCel" id="telCelular" placeholder="Telefono Celular (*)" required="" class="form-control">
				<span class="input-group-addon">-</span>
				<input type="text" name="otroTelefono" id="telOpcional" placeholder="Otro telefono" class="form-control">
			</div>
		</div>			
		<input type="submit" name="btnEnviar" value="Enviar" class="btn btn-primary col-md-2">
	</fieldset>
</form>

<script src="/../js/jquery.js"></script>
<script src="/../js/bootstrap.min.js"></script>
<script type="text/javascript" src="/../js/ajax.js"></script>
<script type="text/javascript">
	window.onload = function(){
		var id, nombre;
		var html = "<option value='0'>--Elija una opcion--</option>"; 
		var select1 = document.getElementById('dptosNacimiento');
		var select2 = document.getElementById('dptos');
		ajax("/../controller/repositorio_informacion.php","departamentos", 1, null, function(xml){
			if(xml!=null){
                var departamento = xml.getElementsByTagName('departamento');
                for (var i = 0; i < departamento.length; i++) {
                	id = departamento[i].getElementsByTagName('id')[0].innerHTML;
                	nombre = departamento[i].getElementsByTagName('nombre')[0].innerHTML;
                	html+="<option value='"+id+"'>"+nombre+"</option>\n";
                }
        	}
            select1.innerHTML=html;
            select2.innerHTML=html;
        });
	}

	function cargarMunicipios(idDepar, idSelec){
		var select = document.getElementById(idSelec);
		var id, nombre;
		var data = "municipios=&idDepar="+idDepar;
		var html = "<option value='0'>--Elija una opcion--</option>";
		ajax("/../controller/repositorio_informacion.php",data, 1, null, function(xml){
            if(xml!=null){
            	var municipio = xml.getElementsByTagName('municipio');
                for (var i = 0; i < municipio.length; i++) {
                	id = municipio[i].getElementsByTagName('id')[0].innerHTML;
                	nombre = municipio[i].getElementsByTagName('nombre')[0].innerHTML;
                	html+="<option value='"+id+"'>"+nombre+"</option>\n";
                }
            }
            select.innerHTML=html;
        });
	}
	
</script>
	
<?php
require 'modelo_database.php';
date_default_timezone_set("America/Buenos_Aires");

function conectarse(){
	$user = "root";	
	$pass = "";
	/*$user = "grupo_8";
	$pass = "Qyd03i1b9ia3p1T6";*/
	$cn = new PDO("mysql:dbname=grupo8;host=localhost",$user,$pass);
	return $cn;
}
function obtenerAlumno($id){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno a WHERE a.id = :id");
		$query->bindParam(":id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array[0];
	    }
	    else {
	    	throw new Exception("No existe el alumno", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
            die('Error conectando con la base de datos: ' . $e->getMessage());
	}	
}
function totalComisiones($id){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT SUM(c.monto)as monto,c.monto as montoIndividual,c.anio,c.mes,c.comisionCobrador,c.tipo FROM pago p inner join cuota c on p.idCuota = c.id Where p.idCobrador = :id group by c.anio, c.mes");
		$query->bindParam(":id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay cuotas cobradas por este gestor", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function obtenerDireccion(){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno Where id = 1");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array[0];
	    }
	    else {
	    	throw new Exception("No hay direccion del alumno", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function buscarIngresosAPI($year){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT SUM(c.monto) as monto, c.mes - 1 as mes from pago p inner join cuota c on p.idCuota=c.id WHERE c.anio=:year GROUP BY c.mes");
		$query->bindParam(":year",$year);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array) > 0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay ingresos en este mes", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function ingresosTotales(){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT SUM(c.monto) as monto from pago p inner join cuota c on p.idCuota=c.id");
		$query->bindParam(":id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array[0]["monto"];
	    }
	    else {
	    	throw new Exception("No hay cuotas cobradas por este gestor", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function ingresosCuota(){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT SUM(c.monto) as monto from pago p inner join cuota c on p.idCuota=c.id where c.tipo='cuota'");
		$query->bindParam(":id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array[0]["monto"];
	    }
	    else {
	    	throw new Exception("No hay cuotas cobradas por este gestor", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function ingresosMatricula(){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT SUM(c.monto) as monto from pago p inner join cuota c on p.idCuota=c.id where c.tipo='matricula'");
		$query->bindParam(":id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array[0]["monto"];
	    }
	    else {
	    	throw new Exception("No hay cuotas cobradas por este gestor", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function comisionesUsuario($id,$inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT SUM(c.monto) as monto,c.monto as montoIndividual,c.anio,c.mes,c.comisionCobrador,c.tipo FROM pago p inner join cuota c on p.idCuota = c.id Where p.idCobrador = :id group by c.anio, c.mes LIMIT ".$inicio.",".$fin);
		$query->bindParam(":id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay cuotas cobradas por este gestor", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalUsuariosGestion(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario WHERE rol='gestion' and habilitado=1");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay usuarios que sean gestores", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	 die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerUsuariosGestores($inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario WHERE rol='gestion' and habilitado=1 LIMIT ".$inicio.",".$fin);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay usuarios que sean gestores", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function registrar($usuario,$password,$rol,$mail){

	try
	{
		$habilitado = 1;
		$cn = conectarse();
		$existe = verificarUsuario($usuario);
		//Internamente valido que no este registrado
		//Si lo está, levanto una excepción
		if (!$existe){
			$query = $cn->prepare("INSERT INTO usuario (username,password,email,rol,habilitado) VALUES (:user, :pass, :mail, :rol, :habilitado)");
			$query->bindParam(':user',$usuario);
			$query->bindParam(':pass',$password);
			$query->bindParam(':mail',$mail);
			$query->bindParam(':rol',$rol);
			$query->bindParam(':habilitado',$habilitado);
			if($query->execute()){
				return true;
			}
			else {
				return false;
			}
		}
		else {
			//Acá la levanto
			throw new Exception("El usuario ya se encuentra registrado", 1);
			
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function iniciarSesion($usuario,$password){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario WHERE username=? and password=? and habilitado=1");
		$query->execute(array($usuario,$password));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("Password o usuario incorrecto", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
    
}

function obtenerUsuarios($inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("select u.username,u.email,u.rol,u.habilitado,r.username as responsable from usuario u left join responsable r on u.username = r.username LIMIT ".$inicio.",".$fin."");
		$query->execute();
		//$array = array();
		/*while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }*/
	    $cn = null;
	    return $query->fetchAll();
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalUsuarios(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return count($array);
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function usuariosSinResponsable($inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("select * from usuario where username not in(select r.username from usuario u inner join responsable r on u.username = r.username) LIMIT ".$inicio.",".$fin."");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalUsuariosSinResponsable(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("select * from usuario where username not in(select r.username from usuario u inner join responsable r on u.username = r.username)");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return count($array);
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function rolConsulta($rol){
	if($rol == "consulta"){
		return true;
	}else{
		return false;
	}
}
//

function obtenerAlumnosConMatriculaPagaDeUnResponsable($idResponsable,$inicio,$fin){
try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable r INNER JOIN responsablealumno ra on r.id = ra.idResponsable INNER JOIN alumno a on a.id = ra.idAlumno INNER JOIN pago p on p.idAlumno = a.id inner join cuota c on p.idCuota = c.id WHERE r.id = :idResponsable and c.tipo='matricula' LIMIT ".$inicio.",".$fin."");
		$query->bindParam(":idResponsable",$idResponsable);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay alumnos con matricula paga de este responsable", 1);	    	
	    }
	}
catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalAlumnosConMatriculaPagaDeUnResponsable($idResponsable){
try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable r INNER JOIN responsablealumno ra on r.id = ra.idResponsable INNER JOIN alumno a on a.id = ra.idAlumno INNER JOIN pago p on p.idAlumno = a.id inner join cuota c on p.idCuota = c.id WHERE r.id = :idResponsable and c.tipo='matricula'");
		$query->bindParam(":idResponsable",$idResponsable);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay alumnos con matricula paga de este responsable", 1);	    	
	    }
	}
catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerCuotasPoBporAoM($id,$inicio,$fin){
//ver
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsablealumno ra inner join alumno a on ra.idAlumno = a.id inner join pago p on p.idAlumno = a.id inner join cuota c on p.idCuota = c.id WHERE ra.idResponsable = :id order by c.anio, c.mes LIMIT ".$inicio.",".$fin."");
		$query->bindParam(':id',$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay cuotas pagas por ningun alumno", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotasPoBporAoM($id){
//ver
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsablealumno ra inner join alumno a on ra.idAlumno = a.id inner join pago p on p.idAlumno = a.id inner join cuota c on p.idCuota = c.id WHERE ra.idResponsable = :id order by c.anio, c.mes");
		$query->bindParam(':id',$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay cuotas pagas por ningun alumno", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerCuotasImpagasPorAoM($idResponsable,$inicio,$fin){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota c join alumno a inner join responsablealumno ra on a.id = ra.idAlumno where ra.idResponsable = :idResponsable and not exists (select * from pago p where p.idCuota = c.id and p.idAlumno = a.id) order by c.anio,c.mes asc LIMIT ".$inicio.",".$fin."");
		$query->bindParam(":idResponsable",$idResponsable);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay alumnos con cuotas impagas", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotasImpagasPorAoM($idResponsable){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota c join alumno a inner join responsablealumno ra on a.id = ra.idAlumno where ra.idResponsable = :idResponsable and not exists (select * from pago p where p.idCuota = c.id and p.idAlumno = a.id) order by c.anio,c.mes asc");
		$query->bindParam(":idResponsable",$idResponsable);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay alumnos con cuotas impagas", 1);	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}


function esResponsable($idUser){
//ver
try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable WHERE username= :user");
		$query->bindParam(":user",$idUser);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("Este usuario no es responsable", 1);	    	
	    }
	}
catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
	
}

function obtenerUsuariosResponsables(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario u INNER JOIN responsable r ON u.username = r.username WHERE r.username is not NULL");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;	
	    }
	    else {
	    	throw new Exception("No hay usuarios relacionados a un responsable", 1);
	    	
	    }
	    
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerResponsablesDeAlumnosSinUsuario($inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT r.id,r.nombre,r.apellido,r.tipo,r.fechaNacimiento FROM responsable r INNER JOIN responsablealumno ra on r.id = ra.idResponsable WHERE username is NULL GROUP BY r.id LIMIT ".$inicio.",".$fin."");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay responsables de alumnos sin usuarios asignados.", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalResponsablesDeAlumnosSinUsuario(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT r.id,r.nombre,r.apellido,r.tipo,r.fechaNacimiento FROM responsable r INNER JOIN responsablealumno ra on r.id = ra.idResponsable WHERE username is NULL GROUP BY r.id");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay responsables de alumnos sin usuarios asignados.", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function verificarUsuario($usuario){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario WHERE username=?");
		$query->execute(array($usuario));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return count($array);
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function modificarMail($mail,$user){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare('UPDATE usuario SET email= :email WHERE username= :user');
		$query->bindParam(':email',$mail);
		$query->bindParam(':user',$user);
		if($query->execute()){
			return true;
		}
		else {
			return false;
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function modificarRol($user,$rol){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare('UPDATE usuario SET rol= :rol WHERE username= :user');
		$query->bindParam(':rol',$rol);
		$query->bindParam(':user',$user);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Falló al intentar cambiar el rol a un usuario", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function agregarResponsable($apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion,$user){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("INSERT INTO responsable (apellido,nombre,tipo,fechaNacimiento,sexo,mail,telefono,direccion,username) VALUES (:apellido, :nombre, :tipo, :fechaNac, :sexo, :mail, :tel, :direccion, :user)");
		$query->bindParam(':apellido',$apellido);
		$query->bindParam(':nombre',$nombre);
		$query->bindParam(':tipo',$tipo);
		$query->bindParam(':fechaNac',$fechaNac);
		$query->bindParam(':sexo',$sexo);
		$query->bindParam(':mail',$mail);
		$query->bindParam(':tel',$tel);
		$query->bindParam(':direccion',$direccion);
		$query->bindParam(':user',$user);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Falló la operación de agregar un responsable", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerIdentificadorResponsable($mail){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable WHERE mail=?");
		$query->execute(array($mail));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerIdentificadorUsuario($user){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario WHERE username=?");
		$query->execute(array($user));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function agregarResponsableUsuario($id,$idResponsable){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("INSERT INTO responsableusuario (idUsuario,idResponsable) VALUES (:idUser, :idResp)");
		$query->bindParam(':idUser',$id);
		$query->bindParam(':idResp',$idResponsable);
		if($query->execute()){
			return true;
		}
		else {
			return false;
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function modificarPass($usuario,$pass){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare('UPDATE usuario SET password=? WHERE username=?');
		$query->bindParam(1,$pass);
		$query->bindParam(2,$usuario);
		$row = $query->execute();
		//$cn = null;
	    return $row;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function verificarPass($usuario,$passAct){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM usuario WHERE username=? and password=?");
		$query->bindParam(1,$usuario);
		$query->bindParam(2,$passAct);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return count($array);
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}

}

function eliminarUsuario($user,$valor){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare('UPDATE usuario SET habilitado= :valor WHERE username= :user');
		$query->bindParam(':valor',$valor);
		$query->bindParam(':user',$user);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Error al habilitar/deshabilitar un usuario", 1);
		}
	}
	catch(PDOException $e)
	{
		die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}
        
function agregarAlumno($dni,$apellido,$nombre,$fechaNac,$sexo,$mail,$direccion,$fechaIngreso,$latitud,$longitud){

    try{
	$cn = conectarse();
	$query = $cn->prepare("INSERT INTO alumno (numeroDocumento,apellido,nombre,fechaNacimiento,sexo,mail,direccion,fechaIngreso,latitud,longitud) VALUES (:dni, :apellido, :nombre, :fechaNac, :sexo, :mail, :direccion, :fechaIngreso, :latitud, :longitud)");
	$query->bindParam(':dni',$dni);
	$query->bindParam(':apellido',$apellido);
	$query->bindParam(':nombre',$nombre);
	$query->bindParam(':fechaNac',$fechaNac);
	$query->bindParam(':sexo',$sexo);
        $query->bindParam(':mail',$mail);
        $query->bindParam(':direccion',$direccion);
        $query->bindParam(':fechaIngreso',$fechaIngreso);
        $query->bindParam(':latitud',$latitud);
        $query->bindParam(':longitud',$longitud);
	if($query->execute()){
		return true;
	}
	else {
		throw new Exception("El alumno no se pudo agregar, el DNI ingresado ya existe en el sistema.", 1);
	}
    } 
    catch(PDOException $e)
    {
        die('Error conectando con la base de datos: ' . $e->getMessage());
    }
}

function deshabilitarAlumno($idAlumno){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare('UPDATE alumno SET valido= FALSE WHERE id= :id');
		$query->bindParam(':id',$idAlumno);
		if($query->execute()){
			return true;
		}
		else {
                    throw new Exception("El alumno no pudo ser deshabilitado.", 1);
                }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerAlumnos($inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno LIMIT ".$inicio.",".$fin."");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay alumnos", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalAlumnos(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay alumnos", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalAlumnosResponsable($id){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno a INNER JOIN responsablealumno ra on a.id = ra.idAlumno WHERE ra.idResponsable = :id");
		$query->bindParam(':id',$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay alumnos para el responsable", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerAlumnosResponsable($id,$inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno a INNER JOIN responsablealumno ra on a.id = ra.idAlumno WHERE ra.idResponsable = :id LIMIT ".$inicio.",".$fin."");
		$query->bindParam("id",$id);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay alumnos para el responsable", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function eliminarResponsable($user){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE responsable SET username=null WHERE username= :user");
		$query->bindParam(":user",$user);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El responsable no pudo ser agreado. Verificar los datos ingresados.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function eliminarResponsableDB($user){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("DELETE FROM responsable WHERE id= :user");
		$query->bindParam(":user",$user);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El responsable no pudo ser agreado. Verificar los datos ingresados.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function eliminarResponsable2($idResponsable){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare('DELETE FROM responsable WHERE id= :id');
		$query->bindParam(':id',$idResponsable);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El responsable no pudo ser eliminado. Compruebe que el responsable no esté asociado a ningún alumno y vuelva a intentar.",1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerResponsableUsuario($usuario){
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable WHERE username=?");
		$query->execute(array($usuario));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("Falló al obtener el responsable del usuario", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function modificarResponsable($user,$apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion){

	try
	{
		
		$cn = conectarse();
		$query = $cn->prepare("UPDATE responsable SET apellido= :apellido,nombre= :nombre,tipo= :tipo,fechaNacimiento= :fechaNac,sexo= :sexo,mail= :mail,telefono= :tel,direccion= :direccion,username= :user WHERE username= :user");
		$query->bindParam(':apellido',$apellido);
		$query->bindParam(':nombre',$nombre);
		$query->bindParam(':tipo',$tipo);
		$query->bindParam(':fechaNac',$fechaNac);
		$query->bindParam(':sexo',$sexo);
		$query->bindParam(':mail',$mail);
		$query->bindParam(':tel',$tel);
		$query->bindParam(':direccion',$direccion);
		$query->bindParam(':user',$user);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El responsable no pudo ser modificado.  los datos ingresados.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function agregarUsuarioAResponsable($username,$id){

		$cn = conectarse();
		$responsable = obtenerResponsableConId($id);
		$query = $cn->prepare("UPDATE responsable SET apellido= :apellido,nombre= :nombre,tipo= :tipo,fechaNacimiento= :fechaNac,sexo= :sexo,mail= :mail,telefono= :tel,direccion= :direccion, username= :user WHERE id= :id");
		$query->bindParam(':apellido',$responsable[0]["apellido"]);
		$query->bindParam(':nombre',$responsable[0]["nombre"]);
		$query->bindParam(':tipo',$responsable[0]["tipo"]);
		$query->bindParam(':fechaNac',$responsable[0]["fechaNac"]);
		$query->bindParam(':sexo',$responsable[0]["sexo"]);
		$query->bindParam(':mail',$responsable[0]["mail"]);
		$query->bindParam(':tel',$responsable[0]["telefono"]);
		$query->bindParam(':direccion',$responsable[0]["direccion"]);
		$query->bindParam(':user',$username);
		$query->bindParam(':id',$id);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Error al asociar al responsable con el usuario", 1);
		}
}

function modificarResponsableDeAlumno($idResponsable,$apellido,$nombre,$tipo,$fechaNac,$sexo,$mail,$tel,$direccion){

	try
	{
		
		$cn = conectarse();
		$query = $cn->prepare("UPDATE responsable SET apellido= :apellido,nombre= :nombre,tipo= :tipo,fechaNacimiento= :fechaNac,sexo= :sexo,mail= :mail,telefono= :tel,direccion= :direccion WHERE id= :id");
		$query->bindParam(':id',$idResponsable);
                $query->bindParam(':apellido',$apellido);
		$query->bindParam(':nombre',$nombre);
		$query->bindParam(':tipo',$tipo);
		$query->bindParam(':fechaNac',$fechaNac);
		$query->bindParam(':sexo',$sexo);
		$query->bindParam(':mail',$mail);
		$query->bindParam(':tel',$tel);
		$query->bindParam(':direccion',$direccion);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El responsable no pudo ser modificado correctamente.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerResponsableConId($idResponsable){
    
    try {
        $cn = conectarse();
        $query = $cn->prepare("SELECT * FROM responsable WHERE id=:idResponsable");
        $query->bindParam(':idResponsable', $idResponsable);
        $query->execute();
        return $query->fetchAll();
    } catch (PDOException $e) {
        
        die('Error conectando con la base de datos: ' . $e->getMessage());
        
    }
}

function buscarCuotasImpagasAPI($idAlumno,$year){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota WHERE anio=:year and id not in (select c.id from pago p inner join cuota c on c.id = p.idCuota inner join alumno a on p.idAlumno = a.id where a.numeroDocumento= :idAlumno)GROUP BY anio,mes,tipo ORDER BY anio,mes,tipo ASC")or die("Error");
		$query->bindParam(':idAlumno',$idAlumno);
		$query->bindParam(':year',$year);
		$query->execute();
		$array = array();
		$array = $query->fetchAll();
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function buscarCuotasImpagasParaUnAlumno($idAlumno,$inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota WHERE id not in (select c.id from pago p inner join cuota c on c.id = p.idCuota where p.idAlumno= :idAlumno)GROUP BY anio,mes,tipo ORDER BY anio,mes,tipo ASC LIMIT ".$inicio.",".$fin."")or die("Error");
		$query->bindParam(':idAlumno',$idAlumno);
		$query->execute();
		$array = array();
		$array = $query->fetchAll();
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function cuotasImpagas($inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota c join alumno a where c.tipo = 'cuota' and not exists (select * from pago p where p.idCuota = c.id and p.idAlumno = a.id) order by c.anio,c.mes asc LIMIT ".$inicio.",".$fin."");		
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay cuotas impagas", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotasImpagasListado(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota c join alumno a where c.tipo = 'cuota' and not exists (select * from pago p where p.idCuota = c.id and p.idAlumno = a.id) order by c.anio,c.mes asc");		
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay cuotas impagas", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotasImpagas($idAlumno){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota WHERE id not in (select c.id from pago p inner join cuota c on c.id = p.idCuota where p.idAlumno= :idAlumno)GROUP BY anio,mes,tipo ORDER BY anio,mes,tipo ASC")or die("Error");
		$query->bindParam(':idAlumno',$idAlumno);
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("El alumno no debe ninguna cuota", 1);	    	
	    }
	    
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function buscarCuotasPagasAPI($idAlumno,$year){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT c.mes, c.monto, p.fecha FROM pago p INNER JOIN cuota c on p.idCuota = c.id INNER JOIN alumno a ON p.idAlumno = a.id WHERE a.numeroDocumento=? and c.anio=? GROUP BY anio,mes,tipo ORDER BY anio,mes,tipo ASC ");
		$query->execute(array($idAlumno,$year));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if(count($array)){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No tiene cuotas pagas", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function buscarCuotasPagas($idAlumno,$inicio,$fin){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM pago p INNER JOIN cuota c on p.idCuota = c.id WHERE idAlumno=? GROUP BY anio,mes,tipo ORDER BY anio,mes,tipo ASC LIMIT ".$inicio.",".$fin."");
		$query->execute(array($idAlumno));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if(count($array)){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No tiene cuotas pagas", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotasPagas($idAlumno){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM pago p INNER JOIN cuota c on p.idCuota = c.id WHERE idAlumno=? GROUP BY anio,mes,tipo ORDER BY anio,mes,tipo ASC");
		$query->execute(array($idAlumno));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if(count($array)){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No tiene cuotas pagas", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function buscarIdentificadorAlumno($dni){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno WHERE numeroDocumento=?");
		$query->execute(array($dni));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["id"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerCuota($idCuota){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota WHERE id=?");
		$query->execute(array($idCuota));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function proximaCuota($idAlumno){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota WHERE id not in (select c.id from pago p inner join cuota c on c.id = p.idCuota where p.idAlumno= ?)GROUP BY anio,mes,tipo ORDER BY anio,mes asc");
		$query->execute(array($idAlumno));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array[0];	
	    }
	    else {
	    	throw new Exception("No debe cuotas", 1);
	    	
	    }
	    
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function pagarCuota($idCuota,$idAlumno,$id){

	try{
		$fecha = date("Y-m-d");
		$cn = conectarse();
		$cuotaAPagar = obtenerCuota($idCuota);		
		$proxCuota = proximaCuota($idAlumno);

		if(($cuotaAPagar["anio"] == $proxCuota["anio"])and($cuotaAPagar["mes"] == $proxCuota["mes"])){
			$query = $cn->prepare("INSERT INTO pago (idAlumno,idCuota,fecha,becado,fechaAlta,fechaActualizado,idCobrador) VALUES (:idAlumno, :idCuota, :fecha, 0, :fecha, :fecha,:id)");
			$query->bindParam(':idAlumno',$idAlumno);
			$query->bindParam(':idCuota',$idCuota);
			$query->bindParam(':fecha',$fecha);
			$query->bindParam(":id",$id);
			if($query->execute()){
				return true;
			}
			else {
				return false;
			}
		}		
		else {
			throw new Exception("Tiene cuotas pendientes anteriores a esta cuota. Por favor cancele las cuotas anteriores", 1);
			
		}
		
    } 
    catch(PDOException $e)
    {
        die('Error conectando con la base de datos: ' . $e->getMessage());
    }
}

function becarCuota($idCuota,$idAlumno,$id){

	try{
		$fecha = date("Y-m-d");
		$cn = conectarse();
		$cuotaAPagar = obtenerCuota($idCuota);		
		$proxCuota = proximaCuota($idAlumno);

		if(($cuotaAPagar["anio"] == $proxCuota["anio"])and($cuotaAPagar["mes"] == $proxCuota["mes"])){
			$query = $cn->prepare("INSERT INTO pago (idAlumno,idCuota,fecha,becado,fechaAlta,fechaActualizado,idCobrador) VALUES (:idAlumno, :idCuota, :fecha, 1, :fecha, :fecha, :id)");
			$query->bindParam(':idAlumno',$idAlumno);
			$query->bindParam(':idCuota',$idCuota);
			$query->bindParam(':fecha',$fecha);
			$query->bindParam(":id",$id);
			if($query->execute()){
				return true;
			}
			else {
				throw new Exception("La cuota no pudo ser becada.", 1);
			}
		}		
		else {
			throw new Exception("Tiene cuotas pendientes anteriores a esta cuota. Por favor cancele las cuotas anteriores", 1);
			
		}
    } 
    catch(PDOException $e)
    {
        die('Error conectando con la base de datos: ' . $e->getMessage());
    }
}

function obtenerAlumnoConId($idAlumno){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM alumno WHERE id=?");
		$query->execute(array($idAlumno));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function modificarAlumno($idAlumno,$dni,$apellido,$nombre,$fechaNac,$sexo,$mail,$direccion,$fechaIngreso,$latitud,$longitud){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE alumno SET numeroDocumento= :dni,apellido= :apellido, sexo = :sexo, nombre= :nombre,fechaNacimiento= :fechaNac,mail= :mail,direccion= :direccion,fechaIngreso = :fechaIngreso, latitud = :latitud, longitud = :longitud  WHERE id= :id");
		$query->bindParam(':id',$idAlumno);
		$query->bindParam(':dni',$dni);
		$query->bindParam(':apellido',$apellido);
		$query->bindParam(':nombre',$nombre);
                $query->bindParam(':sexo',$sexo);
		$query->bindParam(':fechaNac',$fechaNac);
		$query->bindParam(':mail',$mail);
		$query->bindParam(':direccion',$direccion);
		$query->bindParam(':fechaIngreso',$fechaIngreso);
                $query->bindParam(':latitud',$latitud);
                $query->bindParam(':longitud',$longitud);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El alumno no pudo ser modificado.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function verificarSitioHabilitado(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM configuracion WHERE valorTextual='habilitado'");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["valorNumerico"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function deshabilitarSitio(){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorNumerico=0 WHERE valorTextual= 'habilitado'");
		if($query->execute()){
			return true;
		}
		else {
			return false;
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function habilitarSitio(){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorNumerico=1 WHERE valorTextual= 'habilitado'");
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El sitio no pudo ser habilitado.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function verMensajeDeshabilitado(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM configuracion WHERE valorNumerico=404");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["valorTextual"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function establecerMensajeDeshabilitado($msj){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorTextual= :msj WHERE valorNumerico= 404");
		$query->bindParam(':msj',$msj);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El mensaje no pudo ser establecido.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function cantidadPaginacionSitio(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM configuracion WHERE valorTextual='paginacion'");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["valorNumerico"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function establecerPaginacion($pag){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorNumerico= :pag WHERE valorTextual= 'paginacion'");
		$query->bindParam(':pag',$pag);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Hubo un error al tratar de establecer la paginación.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerInformacionTitulo(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM configuracion WHERE clave=4");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["valorTextual"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerInformacionMail(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM configuracion WHERE clave=5");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["valorTextual"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerInformacionTelefono(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM configuracion WHERE clave=6");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array[0]["valorTextual"];
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function establecerInformacionTitulo($tit){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorTextual= :tit WHERE clave= 4");
		$query->bindParam(':tit',$tit);
		if($query->execute()){
			return true;
		}
		else {
			return false;
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function establecerInformacionMail($mail){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorTextual= :mail WHERE clave= 5");
		$query->bindParam(':mail',$mail);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Hubo un error al tratar de establecer la información de mail.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function establecerInformacionTelefono($tel){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("UPDATE configuracion SET valorTextual= :tel WHERE clave= 6");
		$query->bindParam(':tel',$tel);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Hubo un error al tratar de establecer la información de teléfono.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerResponsablesQueNoSeanDe($idAlumno){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT DISTINCT(id), tipo, apellido, nombre, fechaNacimiento, sexo, mail, telefono, direccion, username FROM responsable WHERE id NOT IN (SELECT idResponsable FROM responsablealumno WHERE idAlumno= :idAlumno)");
                $query->bindParam(':idAlumno', $idAlumno);
                $query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;	
	    }
	    else {
	    	throw new Exception("No hay responsables", 1);
	    	
	    }
	    
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function asignarAlumnoResponsable($idAlumno,$idResponsable){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("INSERT INTO responsablealumno (idAlumno,idResponsable) VALUES (:idAlumno, :idResponsable)");
		$query->bindParam(':idResponsable',$idResponsable);
                $query->bindParam(':idAlumno',$idAlumno);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Falló al asignar el responsable al alumno", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function habilitarAlumno($idAlumno){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare('UPDATE alumno SET valido= TRUE WHERE id= :id');
		$query->bindParam(':id',$idAlumno);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("El alumno no pudo ser habilitado.", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}


function obtenerResponsablesDe($idAlumno){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable r INNER JOIN responsablealumno ra on r.id = ra.idResponsable WHERE idAlumno = :idAlumno ");
                $query->bindParam(':idAlumno', $idAlumno);
                $query->execute();
                $array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){ 
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay responsables de este alumno", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerResponsables($inicio,$fin){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable LIMIT ".$inicio.",".$fin."");
                $query->execute();
                $array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay responsables", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalResponsables(){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM responsable");
                $query->execute();
                $array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return count($array);
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}
//

function alumnosConMatriculaPaga($inicio,$fin){
try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM pago p INNER JOIN cuota c ON p.idCuota = c.id INNER JOIN alumno a on p.idAlumno = a.id WHERE c.tipo='matricula' LIMIT ".$inicio.",".$fin."");
		$query->execute(array());
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return $array;
	    }
	    else {
	    	throw new Exception("No hay alumnos que hayan pagado la matricula", 1);	    	
	    }
	}
catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
	
}

function totalAlumnosConMatriculaPaga(){
try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM pago p INNER JOIN cuota c ON p.idCuota = c.id INNER JOIN alumno a on p.idAlumno = a.id WHERE c.tipo='matricula'");
		$query->execute(array());
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;

	    if (count($array)>0){
	    	return count($array);
	    }
	    else {
	    	throw new Exception("No hay alumnos que hayan pagado la matricula", 1);	    	
	    }
	}
catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
	
}

function eliminarAlumnoResponsable($idAlumno,$idResponsable){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("DELETE FROM responsablealumno WHERE idAlumno=:idAlumno AND idResponsable=:idResponsable");
		$query->bindParam(':idResponsable',$idResponsable);
                $query->bindParam(':idAlumno',$idAlumno);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Falló al eliminar el responsable", 1);
			;
		}
        }
    catch(PDOException $e){
		throw new Exception("El responsable posee alumnos a cargo. No puede ser eliminado", 1);
    }
}
        
function cuotasPagadasOBecadas($inicio,$fin){
//ver
	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota c INNER JOIN pago p on c.id = p.idCuota INNER JOIN alumno a on p.idAlumno = a.id WHERE c.tipo = 'cuota' order by c.anio,c.mes ASC LIMIT ".$inicio.",".$fin."");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotasPagadas(){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota c INNER JOIN pago p on c.id = p.idCuota INNER JOIN alumno a on p.idAlumno = a.id WHERE c.tipo = 'cuota' ORDER BY c.anio,c.mes ASC ");
		$query->execute();
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    if (count($array)>0){
	    	return (count($array));
	    }
	    else {
	    	throw new Exception("No hay cuotas pagas", 1);
	    	
	    }
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function agregarCuota($anio,$mes,$monto,$tipo,$comisionCobrador,$cantCuotas){
    try
	{
		$cn = conectarse();
                $cn ->beginTransaction();
		$query = $cn->prepare("INSERT INTO cuota (anio,mes,monto,tipo,comisionCobrador) VALUES (:anio, :mes, :monto, :tipo, :comisionCobrador)");
                $anio_actual = $anio;
                $mes_actual= $mes;
                for ($i = 1; $i<=$cantCuotas; $i++){
             
                    $query->bindParam(':anio',$anio_actual);
                    $query->bindParam(':mes',$mes_actual);
                    $query->bindParam(':monto',$monto);
                    $query->bindParam(':tipo',$tipo);
                    $query->bindParam(':comisionCobrador',$comisionCobrador);
                    
                    if($query->execute()) {
                    }
                    else {
                            $cn->rollBack();
                            throw new Exception("Hubo un error al intentar agregar la(s) cuota(s).", 1);
                    }
                    
                    $mes_actual= ($mes_actual % 12) +1;
                    if ($mes_actual == 1){
                        $anio_actual++;
                    }
                
                }
                
                $cn->commit();
                
                return true;
	}
	catch(PDOException $e)
	{
            $cn->rollBack();
	  die('Error conectando con la base de datos: ' . $e->getMessage());
          
	}
}

function obtenerCuotas($inicio,$fin){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota LIMIT ".$inicio.",".$fin."");
                $query->execute();
                return $query->fetchAll();	
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function totalCuotas(){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota");
        $query->execute();        	
        return count($query->fetchAll());
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function eliminarCuota($idCuota){
    try
	{
		$cn = conectarse();
		$query = $cn->prepare('DELETE FROM cuota WHERE id=:id');
		$query->bindParam(':id',$idCuota);
		if($query->execute()){
			return true;
		}
		else {
			throw new Exception("Error al intentar eliminar una cuota", 1);
		}
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function obtenerCuotaConId($idCuota){

	try
	{
		$cn = conectarse();
		$query = $cn->prepare("SELECT * FROM cuota WHERE id=?");
		$query->execute(array($idCuota));
		$array = array();
		while($row = $query->fetch())
		{
			 array_push($array,$row);
	    }
	    $cn = null;
	    return $array;
	}
	catch(PDOException $e)
	{
	  die('Error conectando con la base de datos: ' . $e->getMessage());
	}
}

function editarCuota($idCuota,$anio,$mes,$tipoCuota,$monto,$comisionCobrador){
    try{
        $cn = conectarse();
        $query = $cn ->prepare("UPDATE cuota SET anio= :anio, mes= :mes, tipo=:tipoCuota, monto=:monto, comisionCobrador=:comision WHERE id=:idCuota");
        $query ->bindParam(':idCuota', $idCuota);
        $query ->bindParam(':anio', $anio);
        $query ->bindParam(':mes', $mes);
        $query ->bindParam(':tipoCuota', $tipoCuota);
        $query ->bindParam(':monto', $monto);
        $query ->bindParam(':comision', $comisionCobrador);
        if ($query->execute()){
            return true;
        } else{
            throw new Exception("Hubo un error al editar la cuota!",1);
        }
    } catch (Exception $e) {
        die('Error conectando con la base de datos: ' . $e->getMessage());
    }
}

?>
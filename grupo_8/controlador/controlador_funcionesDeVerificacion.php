<?php

function verificarCamposAlumno($dni,$apellido,$nombre,$fechaNac,$sexo,$mail,$direccion,$fechaIngreso, $latitud, $longitud){
    if (($dni=="") || ($apellido=="") || (!preg_match('!^([a-zA-Z]|[ ñÑáéíóúÁÉÍÓÚ])+$!',$apellido)) || ($nombre=="") || (!preg_match('!^([a-zA-Z]|[ ñÑáéíóúÁÉÍÓÚ])+$!',$nombre)) || ($fechaNac=="") || ($sexo=="") || (!preg_match('!^[M|F]$!',$sexo)) || (!filter_var($mail,FILTER_VALIDATE_EMAIL)) || ($direccion="") || ($fechaIngreso=="") || (!filter_var($latitud,FILTER_VALIDATE_FLOAT)) || (!filter_var($longitud,FILTER_VALIDATE_FLOAT))){
        return false;
    } else {
        return true;
    }
}

function verificarCamposResponsable($apellidoTutor,$nombreTutor,$tipoParentezco,$fechaNac,$sexo,$mail,$tel,$direccion){
    if (($apellidoTutor=="") || (!preg_match('!^([a-zA-Z]|[ ñÑáéíóúÁÉÍÓÚ])+$!',$apellidoTutor)) || ($nombreTutor=="") || (!preg_match('!^([a-zA-Z]|[ ñÑáéíóúÁÉÍÓÚ])+$!',$nombreTutor)) || ($tipoParentezco=="") || (!preg_match('!^((padre)|(madre)|(tutor))$!',$tipoParentezco)) || ($fechaNac=="") || ($sexo=="") || (!preg_match('!^[M|F]$!',$sexo)) || ($mail=="")  || (!filter_var($mail,FILTER_VALIDATE_EMAIL)) || ($tel=="") || (!preg_match('!^[0-9]*$!',$tel)) ||  ($direccion=="") ){
        return false;
    } else {
        return true;
    }
}

function verificarCamposUsuario($user, $pass, $mail, $rol){
    if (($user=="") || ($pass=="") || (!filter_var($mail,FILTER_VALIDATE_EMAIL)) || (!preg_match('!^((0)|(1)|(2))$!',$rol))){
        return false;
    } else {
        return true;
    }
}

function verificarCamposCambiarRol($user, $rol){
    if (($user=="") || (!preg_match('!^((0)|(1)|(2))$!',$rol))){
        return false;
    } else {
        return true;
    }
}

function verificarCamposResponsableUsuario($user,$apellidoTutor,$nombreTutor,$tipoParentezco,$fechaNac,$sexo,$mail,$tel,$direccion){
    if (($user=="")||($apellidoTutor=="") || (!preg_match('!^([a-zA-Z]|[ ñÑáéíóúÁÉÍÓÚ])+$!',$apellidoTutor)) || ($nombreTutor=="") || (!preg_match('!^([a-zA-Z]|[ ñÑáéíóúÁÉÍÓÚ])+$!',$nombreTutor)) || ($tipoParentezco=="") || (!preg_match('!^((padre)|(madre)|(tutor))$!',$tipoParentezco)) || ($fechaNac=="") || ($sexo=="") || (!preg_match('!^[M|F]$!',$sexo)) || ($mail=="")  || (!filter_var($mail,FILTER_VALIDATE_EMAIL)) || ($tel=="") || (!preg_match('!^[0-9]*$!',$tel)) ||  ($direccion=="") ){
        return false;
    } else {
        return true;
    }
}

function verificarCamposCuota($anioCuota,$mes,$monto,$tipoCuota,$comisionCobrador,$cantCuotas){
    if (($anioCuota=="")|| (!preg_match('!^[0-9]*$!',$anioCuota)) || ($mes=="") || (!preg_match('!^((1)|(2)|(3)|(4)|(5)|(6)|(7)|(8)|(9)|(10)|(11)|(12))$!',$mes)) || ($monto=="") || (!preg_match('!^[0-9]*$!',$monto)) || ($tipoCuota=="") ||(!preg_match('!^((matricula)|(mensual))$!',$tipoCuota)) || ($comisionCobrador=="") || (!preg_match('!^[0-9]*$!',$comisionCobrador))|| (!preg_match('!^[0-9]*$!',$cantCuotas)) || $cantCuotas<1){
        return false;
    } else {
        return true;
    }
}

function verificarCamposInformacion($tit,$mail,$tel){
    if (($tit=="") || ($mail=="") || (!filter_var($mail,FILTER_VALIDATE_EMAIL)) || ($tel=="")){
        return false;
    } else {
        return true;
    }
}

function verificarCamposPaginacion($pag){
    if (($pag=="") || (!preg_match('!^[0-9]*$!',$anioCuota))){
        return false;
    } else {
        return true;
    }
}

function verificarCamposMensajeDeshabilitado($msj){
    if (($msj=="")){
        return false;
    } else {
        return true;
    }
}
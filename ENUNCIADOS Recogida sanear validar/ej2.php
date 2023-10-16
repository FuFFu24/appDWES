<?php

    $texto = $_REQUEST['Nombre'];
print "<p>";
        if(isset($texto) && !is_numeric($texto) && !empty($texto)){
            print 'El nombre es: '.htmlspecialchars(trim(strip_tags($texto)),ENT_QUOTES,"utf-8");
        }else{
            print "<p>El nombre introducido es incorrecto o esta vacio</p>";
        }
        print "</p>";
        $contraseña = $_REQUEST['Contraseña'];
print "<p>";
        if(!mb_strlen($contraseña) < 5){
            print 'La contraseña es: '.htmlspecialchars(trim(strip_tags($contraseña)),ENT_QUOTES,"utf-8");
        }else{
            print "Los caracteres de la cadena son menores de 5";
        }
print "</p>";
        $estudios = $_REQUEST['Educacion'];
        print "<p>";
        switch ($estudios) {
            case $estudios == "Sin estudios":
                print htmlspecialchars(trim(strip_tags($estudios)),ENT_QUOTES,"utf-8");
                break;

            case $estudios == "ESO";
            print htmlspecialchars(trim(strip_tags($estudios)),ENT_QUOTES,"utf-8");
            break;
            case $estudios == "Bachillerato":
                print htmlspecialchars(trim(strip_tags($estudios)),ENT_QUOTES,"utf-8");
                break;

            case $estudios == "FP";
            print htmlspecialchars(trim(strip_tags($estudios)),ENT_QUOTES,"utf-8");
            break;

            case $estudios == "Universitario":
                print htmlspecialchars(trim(strip_tags($estudios)),ENT_QUOTES,"utf-8");
                break;

            case $estudios == "Otros";
            print htmlspecialchars(trim(strip_tags($estudios)),ENT_QUOTES,"utf-8");
            break;                                    
            default:
                print htmlspecialchars(trim(strip_tags("No tiene estudios")),ENT_QUOTES,"utf-8");
                break;
        }
        print "</p>";

        if(isset($_REQUEST['Nacionalidad']) =="Hispana"){
            print htmlspecialchars(trim(strip_tags($_REQUEST['Nacionalidad'])),ENT_QUOTES,"utf-8");
        }else if(isset($_REQUEST['Nacionalidad']) =="Sajona"){
            print htmlspecialchars(trim(strip_tags($_REQUEST['Nacionalidad'])),ENT_QUOTES,"utf-8");
        }else if(isset($_REQUEST['Nacionalidad']) =="Otro"){
            print htmlspecialchars(trim(strip_tags($_REQUEST['Nacionalidad'])),ENT_QUOTES,"utf-8");
        }

        if(isset($_REQUEST['Ingles']) == "Ingles"){
            print "<p>".htmlspecialchars(trim(strip_tags($_REQUEST['Ingles'])),ENT_QUOTES,"utf-8")."</p>";
        }
        if(isset($_REQUEST['Castellano']) == "Castellano"){
            print "<p>".htmlspecialchars(trim(strip_tags($_REQUEST['Castellano'])),ENT_QUOTES,"utf-8")."</p>";
        }
        if(isset($_REQUEST['Frances']) == "Frances"){
            print "<p>".htmlspecialchars(trim(strip_tags($_REQUEST['Frances'])),ENT_QUOTES,"utf-8")."</p>";
        }
        if(isset($_REQUEST['Aleman']) == "Aleman"){
            print "<p>".htmlspecialchars(trim(strip_tags($_REQUEST['Aleman'])),ENT_QUOTES,"utf-8")."</p>";
        }

        if(preg_match('/^[a-zA-Z0-9.*%]+@gmail\.com$/',$_REQUEST['email'])){
            print "<p>".htmlspecialchars(trim(strip_tags($_REQUEST['email'])),ENT_QUOTES,"utf-8")."</p>";
        }else{
            print "El email no esta con caracteres aceptados";
        }
        if(preg_match('/^www\/\/www\[a-zA-Z0-9]\.com$/',$_REQUEST['url'])){
            print "<p>".htmlspecialchars(trim(strip_tags($_REQUEST['url'])),ENT_QUOTES,"utf-8")."</p>";
        }else{
        print "<p>La url no es aceptada</p>";
        }
?>
<p><a href="ej2.html">Volver al formulario</a></p>
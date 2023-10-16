<?php
        print "<p>Estos son los datos introducidos</p>";
    print "<ul>";
    if(!empty($_REQUEST['textoBusqueda'])){
        print "<li>Texto de busqueda ". $_REQUEST['textoBusqueda']."</li>";
    }else{
        print "<li>No ha introducido nada</li>";
    }

    if(!empty($_REQUEST['Canciones']) == "Titulos de la cancion"){
        print "<li>Buscar por ".htmlspecialchars(trim(strip_tags($_REQUEST['Canciones'])),ENT_QUOTES,"utf-8")."</li>";
    }else if(!empty($_REQUEST['Canciones']) == "Nombres de album"){
        print "<li>Buscar por ".htmlspecialchars(trim(strip_tags($_REQUEST['Canciones'])),ENT_QUOTES,"utf-8")."</li>";
    }else if(!empty($_REQUEST['Canciones']) == "Ambos Campos"){
        print "<li>Buscar por".htmlspecialchars(trim(strip_tags($_REQUEST['Canciones'])),ENT_QUOTES,"utf-8")."</li>";
    }else{
        print "<li>No ha seleccionado ningun radio boton</li>";
    }
    print "<li>";

        switch ($_REQUEST['Genero musical']) {
            case ($_REQUEST['Genero musical'] == "Todos"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Acustica"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Banda sonora"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Blues"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Electronica"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Folk"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Jazz"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "New Age"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Pop"):
                print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                break;
            case ($_REQUEST['Genero musical'] == "Rock"):
            print "Genero: ".htmlspecialchars(trim(strip_tags($_REQUEST['Genero musical'])),ENT_QUOTES,"utf-8");
                 break;
            default:
                print "No le gusta nada";
                break;
        }

    print "</li>";

    print "</ul>";

?>
<p><a href="ej3.html">Volver al formulario</a></p>

<?php
print "<p>";
        if(preg_match('/^[A-Z]{1}[a-z -]{3,12}+$/',$_REQUEST['Nombre'])){
            print htmlspecialchars(trim(strip_tags("<p>El nombre es ".$_REQUEST['Nombre']."</p>")),ENT_QUOTES, 'utf-8') ;
        }else if($_REQUEST['Nombre'] > 12 || $_REQUEST['Nombre'] < 3 && $_REQUEST['Nombre']>0){
            print htmlspecialchars(trim(strip_tags("<p>Tiene menos de 3 caracteres o mas que 12</p>")),ENT_QUOTES,'utf-8');
        }else{
            print htmlspecialchars(trim(strip_tags("<p> No ha introducido nombre o la primera letra letra no es mayuscula</p>")),ENT_QUOTES,'utf-8');
        }
print "</p>";
    print "<p>";
    if(preg_match('/^[A-Z]{1}[A-Z -]{3,12}+$/',$_REQUEST['Apellido'])){
        print htmlspecialchars(trim(strip_tags("<p>El apellido es ".$_REQUEST['Apellido']."</p>")),ENT_QUOTES, 'utf-8') ;
    }else if($_REQUEST['Apellido'] > 12 || $_REQUEST['Apellido'] < 3 && $_REQUEST['Apellido']>0){
        print htmlspecialchars(trim(strip_tags("<p>Tiene menos de 3 caracteres o mas que 12</p>")),ENT_QUOTES,'utf-8');
    }else{
        print htmlspecialchars(trim(strip_tags("<p> No ha introducido apellido</p>")),ENT_QUOTES,'utf-8') ;
    }
print "</p>";

    print "<p>";

    if(preg_match('/^[a-zA-Z0-9 -]$/',$_REQUEST['Direccion'])){
        print htmlspecialchars(trim(strip_tags("<p>La direccion es ".$_REQUEST['Direccion']."</p>")),ENT_QUOTES,'utf-8');
    }else{
        print "La direccion esta mal";
    }
    print "</p>";

        print "<p>";

            if(isset($_REQUEST['Castellano'])){
                print htmlspecialchars(trim(strip_tags("<p>Habla Castellano</p>")),ENT_QUOTES,'utf-8');
            }
            if(isset($_REQUEST['Rumano'])){
                print htmlspecialchars(trim(strip_tags("<p>Habla Rumano</p>")),ENT_QUOTES,'utf-8');
            }
            if(isset($_REQUEST['Ingles'])){
                print htmlspecialchars(trim(strip_tags("<p>Habla Ingles</p>")),ENT_QUOTES,'utf-8');
            }
            if(isset($_REQUEST['Frances'])){
                print htmlspecialchars(trim(strip_tags("<p>Habla Frances</p>")),ENT_QUOTES,'utf-8');
            }

        print "</p>";

    print "<p>";

            if(isset($_REQUEST['Genero'])){
                print htmlspecialchars(trim(strip_tags("<p>Es de genero ".$_REQUEST['Genero']."</p>")),ENT_QUOTES,'utf-8');
            }
    print "</p>";

    print "<p>";

    if(preg_match('/^[a-zA-Z0-9-&%]+@gmail\.com$/',$_REQUEST['Correo'])){
        print htmlspecialchars(trim(strip_tags("<p> Su correo es ".$_REQUEST['Correo']."</p>")),ENT_QUOTES,'utf-8');
    }else{
        print htmlspecialchars(trim(strip_tags("<p>Formato de correo invalido</p>")),ENT_QUOTES,'utf-8');
    }
    print "</p>";

    print "<p>";
        if(isset($_REQUEST['Estudios'])){
            print htmlspecialchars(trim(strip_tags("<p>Sus estudios son ".$_REQUEST['Estudios']."</p>")),ENT_QUOTES,'utf-8');
        }
    print "</p>";

    print "<p>";
        if(!empty($_REQUEST['descripcion'])){
            print htmlspecialchars(trim(strip_tags("<p>La descripcion es: ".$_REQUEST['descripcion']."</p>")),ENT_QUOTES,'utf-8');
        }else{
            print htmlspecialchars(trim(strip_tags("<p>No ha escrito nada en la descripcion</p>")),ENT_QUOTES,'utf-8');
        }
    print "</p>";
    ?>
<p><a href="ej4.html">Volver al formulario</a></p>
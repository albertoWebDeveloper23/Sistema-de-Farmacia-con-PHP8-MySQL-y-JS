<?php 

    include_once "../modelo/Presentacion.php";

    $presentacion = new Presentacion();

    if ($_POST["funcion"] == "crear") {
        $nombre = $_POST["nombre_presentacion"];
        $presentacion -> crear($nombre);
    }

    if ($_POST["funcion"] == "editar") {
        $nombre = $_POST["nombre_presentacion"];
        $id_editado = $_POST["id_editado"];
        $presentacion -> editar($id_editado, $nombre);
    }

    if ($_POST["funcion"] == "buscar") { 
        $presentacion -> buscar();
        $json = array();
        foreach ($presentacion -> objetos as $objeto) {
            $json[] = array(
                "id" => $objeto -> id_presentacion,
                "nombre" => $objeto -> nombre,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    if ($_POST["funcion"] == "borrar") {
        $id = $_POST["id"];
        $presentacion -> borrar($id);
    }

    /* Petición que se realiza desde Producto.js para rellenar un select con nombres de presentación */
    if ($_POST["funcion"] == "rellenar_presentaciones") {

        $presentacion -> rellenar_presentaciones();

        $json = array();

        foreach ($presentacion -> objetos as $objeto) {
            $json[] = array(
                "id" => $objeto -> id_presentacion,
                "nombre" => $objeto -> nombre
            );
        }

        $jsonstring = json_encode($json);

        echo $jsonstring;
        
    }
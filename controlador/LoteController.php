<?php 

    include_once "../modelo/Lote.php";

    $lote = new Lote();

    if ($_POST["funcion"] == "crear") {
        $id_producto = $_POST["id_producto"];
        $proveedor = $_POST["proveedor"];
        $stock = $_POST["stock"];
        $vencimiento = $_POST["vencimiento"];
        $lote -> crear($id_producto, $proveedor, $stock, $vencimiento);
    }
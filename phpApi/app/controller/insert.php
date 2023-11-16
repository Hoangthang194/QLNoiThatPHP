<?php 
    session_start();
    require_once "../model/productModel.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Title = $_POST["Title"];
        $Material = $_POST["Material"];
        $Des = $_POST["Des"];
        $TypeProduct = $_POST["TypeProduct"];
        $TypeRoom = $_POST["TypeRoom"];
        $Price = $_POST["Priceold"];
        $Saleoff = $_POST["SaleOff"];
        $Acreage = $_POST["Acreage"];
        $State = $_POST["state"];
        $Images = $_POST["images"];
        $product = new Product($Title,
        $Material,
        $Des,
        $TypeProduct,
        $TypeRoom,
        $Price,
        $Saleoff,
        $Acreage,
        $State,
        $Images);
        $product->InsertProduct();
        echo "Thêm thành công"; 
    }
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $conn= new mysqli('localhost', 'root', '',"scandiwebaddproduct",8111) 
                    or die( "Connection Failed:" .mysqli_error());
        if(isset($_POST['sku']) && isset($_POST['name']) &&isset($_POST['price']) &&
            isset($_POST['selection']) && (isset($_POST['size']) || (isset($_POST['height']) &&
            isset($_POST['width']) &&isset($_POST['length'])) || isset($_POST['weight']))) {
            
            $sku= $_POST['sku'];
            $name= $_POST['name'];
            $price= $_POST['price'];
            $type= $_POST['selection'];
            echo $_POST['selection'];
            if($_POST['selection']=="DVD") {
                $size= $_POST['size'];
            } else {
                $size= '';
            }
            if($_POST['selection']=="FURNITURE") {
                $height= $_POST['height'];
                $width= $_POST['width'];
                $length= $_POST['length'];
            } else {
                $height= "";
                $width= "";
                $length= "";
            }
            if($_POST['selection']=="BOOK") {
                $weight= $_POST['weight'];
            } else {
                $weight= '';
            }
            $sql= "INSERT INTO `products` (`SKU`, `Name`, `Price`, `Type`,
                                `Size`, `Height`, `Width`, `Length`,`Weight`) 
                    VALUES ('$sku', '$name', '$price', '$type','$size', '$height', '$width', '$length', '$weight')";

            $query = mysqli_query($conn,$sql);
            if($query){
                header("Location: {$_SERVER['HTTP_REFERER']}", TRUE, 301);
                exit();
            } else {
                echo "Error Occurred";
            }
        }
    }
?>
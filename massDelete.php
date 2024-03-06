<?php
        $conn= new mysqli('localhost', 'root', '',"scandiwebaddproduct",8111);
        if(!empty($_POST['check_list'])) { 
            foreach($_POST['check_list'] as $check) {
                $sql = "DELETE FROM products WHERE id=$check"; 
                if ($conn->query($sql) === TRUE) {
                }
            }
        }
        
        $conn->close();
        header("Location: {$_SERVER['HTTP_REFERER']}", TRUE, 301);
        exit();
?>
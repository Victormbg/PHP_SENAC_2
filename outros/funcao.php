<?php
    if(isset($_POST["num"])){
        echo $_POST["num"];
        echo "<br>";

        $num = $_POST["num"];

        if($num % 2 == 0){
            echo "O numero informado e par";
        }else{
            echo "O numero informado e impar";
        }
    }
?>

<?php

    $connection = mysqli_connect(
        'localhost', 'root', '', 'alitas'
    );

    if(isset($_GET['num_mesa'])) {
        # echo $_POST['name'] . ', ' . $_POST['description'];
        $num_mesa = $_GET['num_mesa'];
        $usuario= $_GET['usuario'];
        $productos = $_GET['productos'];
        $total=$_GET['total'];



        $query = "INSERT into comanda(num_mesa,nom_usuario, productos,total) VALUES ('$num_mesa','$usuario','$productos','$total')";
        $result = mysqli_query($connection, $query);

        echo "Task Added Successfully";

    }

#    echo json_encode($_POST);

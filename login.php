<?php
    if (isset($_POST["usuario"]) ){  
        $conexion=mysqli_connect("localhost","root","","atm");
        mysqli_set_charset($conexion,"utf8");

        $email = $_POST['usuario'];

        $sqlCliente = "select idCliente, nombre, apellido, telefono, email, direccion FROM clientes WHERE email = '$email'";
        $resulCliente = mysqli_query($conexion,$sqlCliente);	

        $sqlAdmin = "select idPeon, nombre, apellido, telefono, email, categoria FROM peones WHERE '$email' = 'antoniotorres11@gmail.com'";
        $resulAdmin = mysqli_query($conexion,$sqlAdmin);

        if ($filaAdmin=mysqli_fetch_assoc($resulAdmin)){
            session_start();
            $_SESSION['usuario'] = $usu;
            header("Location: administrador/index.html");	
        }elseif($filaCliente=mysqli_fetch_assoc($resulCliente)){
            session_start();
            $_SESSION['usuario'] = $usu;
            header("Location: cliente/cliente.html");	
        }else{
            header("Location: identificate.html");
            return false;
        }
    }
?> 
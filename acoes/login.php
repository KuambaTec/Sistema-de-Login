<?php
    require("conexao.php");

    if (isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null) {
        $resultado = $conexao -> prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $resultado -> execute(array($_POST["email"], $_POST["senha"]));

        if($resultado -> rowCount()){
            $usuario = $resultado -> fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($usuario["nome"], $usuario["adm"]);

            echo "<script>window.location = '../dashboard.php'</script>";
        }else {
            echo "<script>window.location = '../index.php'</script>";
        }
    }else{
        echo "<script>window.location = '../index.php'</script>";
    }
?>
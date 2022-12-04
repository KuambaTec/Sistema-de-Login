<?php
    
    session_start();
    
    if(isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])){
        require("acoes/conexao.php");
        $adm = $_SESSION["usuario"][1];
        $nome = $_SESSION["usuario"][0];
    }else {
        echo "<script>window.location = 'login.php'</script>";
    }
?>

<html lang="pt-pt">
<head>
  
    <title>dashboard - <?php echo $nome?></title>
</head>
<body>
    <?php if($adm):?>
        <table width="30%">
            <thead>
                <tr style="font-weight: bold">
                    <td>Id</td>
                    <td>Email</td>
                    <td>Senha</td>
                    <td>Nome</td>
                    <td>Adm</td>
                </tr>
            </thead>
            
            <thead>
                <tr>
                    <?php
                        $resultado = $conexao -> prepare("SELECT * FROM usuarios");
                        $resultado -> execute();

                        $users = $resultado -> fetchAll(PDO::FETCH_ASSOC);

                        for ($i=0; $i < sizeof($users); $i++):
                            $useratual = $users[$i];
                            
                    ?>
                    
                    <td><?php echo $useratual["id_usuario"]?></td>
                    <td><?php echo $useratual["email"]?></td>
                    <td><?php echo $useratual["senha"]?></td>
                    <td><?php echo $useratual["nome"]?></td>
                    <td><?php echo $useratual["adm"]?></td>
                    
                   
                </tr>
                 <?php endfor;?>
            </thead>
        </table>
    <?php endif;?>
    <a href="acoes/logout.php">Sair</a>
</body>
</html>
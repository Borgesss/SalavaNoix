<?php
        $host = "localhost";
        $user = "root";
        $pass = "";
        $banco = "fotos";
        $conecta = new mysqli($host,$user,$pass,$banco);
    if($conecta->connect_error){
        die("conexão falhou:".$conecta->connect_error."<br>");
    }
    mysqli_select_db($conecta,$banco) or die(mysqli_error());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="POST">
            <table border="0">
                <tr>
                    <td>
                        ID:<input type="text" name="login" size="10">
                        Senha:<input type="password" name="senha" size="10">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="enviar" value="Enviar"><br>
                        Cadastre-se <a style="color: blue" href="cadastro.php">aqui.</a>
                    </td>
                </tr>
            </table>
        </form>
 <?php
 
        
?>
    </body>
</html>

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
        <form action="valida_cadastro.php" method="POST">
        <table align="center" border="0">
            <tr>
                <td>
                    Nome: <input type="text" name="nome" size="20">
                </td>
            </tr>
            <tr>
                <td>
                    E-mail:<input type="text" name="email" placeholder="nome@provedor.com" size="20">
                </td>
            </tr>
            <tr>
                <td>
                    Senha: <input type="password" name="senha" placeholder="No minimo 5 caracteres" size="20">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" name="enviar" value="Cadstrar">
                    <input type="reset" name="limpar" value="Apagar">
                </td>
            </tr>
        </table>
        </form>
        <?php
            
           
        ?>
    </body>
</html>

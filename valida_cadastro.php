<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $inserir = 0;
            $nome=$_POST["nome"];
            if(strlen($nome)=== 0 || strlen($nome) < 10){
                echo"nome incorreto<br/>\n";
                $inserir=+1;
            }
            
            $email=$_POST["email"];
            $domain=strstr($email,'@',true);
            if(strlen($email)==0 || (!strstr($email,'@') || (strlen($email)<8))){
                echo"e-mail invalido<br/>\n";
                $inserir=+1;
            }
            
            $senha=$_POST["senha"];
            if(strlen($senha) < 5){
                echo"O campo senha deve conter no minimo 8 carecteres<br>\n";
                $inserir=+1;
            }
            
        ?>
    </body>
</html>

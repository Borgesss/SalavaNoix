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
        $msg = false;
        if(isset($_FILES['arquivo'])){
            $extensao = strtolower(substr($_FILES['arquivo']['name'],-4));
            $novo_nome = (time()).$extensao;
            $diretorio = "upload/";
            
            move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
            
            $sql_code = "INSERT INTO arquivo(codigo, arquivo, data) VALUES (null, '$novo_nome', NOW())";
            $sql2 = mysqli_query($conecta,$sql_code);
          if($sql2){
              $msg = "Arquivo enviado com sucesso!";
              echo"";
          }
          else {
            $msg = "Falha ao enviar arquivo";
        }
     
     $sql3 = mysqli_query($conecta,"SELECT arquvo FROM arquivo WHERE codigo='2'");
     echo $sql3;
     if(mysqli_num_rows($sql3)){
         $resutado = mysqli_fetch_row($sql3);
         $diretorio .= $resultado[0];
     }
   }  
     
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro imagem</title>
    </head>
    <body>
        <?php if($msg != false) echo"<p> $msg </p>"; ?>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            Arquivo: <input type="file" required name="arquivo">
            <input type="submit" value="Salvar">
        </form>
        <img id="foto" src="<?php echo $diretorio; ?>">
    </body>
</html>

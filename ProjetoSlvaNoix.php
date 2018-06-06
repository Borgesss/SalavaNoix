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
        <?php 
        if(isset($_POST['imagens'])){
          $pasta = 'imagens';
          $permitido = array('image/jpg','image/jpeg','image/pjpeg');//tipos de imagens aceitas
          
          $img = $_FILES['img'];//pegar as imagens enviadas
          $tmp = $img['tmp_name'];//pega o destino da iamgem
          $name = $img['name'];//pega o nome da imagem
          $type = $img['type'];//pega  o tupo da imagem
          
          require ('funcao.php');//função que faz o upload
          
          if(!empty($name) && in_array($type, $permitido)){
              $nome = 'downsmaster-'.md5(uniqid(rand(), true)).'.jpg';
              upload($tmp,$nome,500,$imagens2);
              echo"Salvo com sucesso";
          }
          else{
              echo"Tipo de arquivo invalido, envie jpeg";
          }
          
          
          
        }
        
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            Arquivo: <input type="file" required name="arquivo">
            <input type="submit" value="Salvar">
        </form>
    </body>
</html>

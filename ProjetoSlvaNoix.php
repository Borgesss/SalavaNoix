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
        if(isset($_POST['upload'])){
          $pasta = 'upload';
          $permitido = array('image/jpg','image/jpeg','image/pjpeg');//tipos de imagens aceitas
          
          $img = $_FILES['img']; //pegar as imagens enviadas
          $contarimg = conunt($img['name']);
          require ('funcao.php'); //função que faz o upload
          for($i = 0; $i < $contarimg; $i++){
          $tmp = $img['tmp_name'][$i]; //pega o destino da iamgem
          $name = $img['name'][$i]; //pega o nome da imagem
          $type = $img['type'][$i]; //pega  o tupo da imagem
          
          if(!empty($name) && in_array($type, $permitido)){
              $nome = 'downsmaster-'.md5(uniqid(rand(), true)).'.jpg';
              upload($tmp,$nome,500,$imagens2);
              $cadastrarimg = mysqli_query("INSERT INTO arquivo (arquivo) VALUES ('$Iimg')");
              echo"Salvo com sucesso";
          }
          else{
              echo"Tipo de arquivo invalido, envie jpeg";
          }
        } 
          
          
        }
        
        ?>
        <form action="ProjetoSlvaNoix.php" method="POST" enctype="multipart/form-data">
            Arquivo: <input type="file" required name="img[]"/><br>
            <input type="submit" value="Salvar">
        </form>
    </body>
</html>

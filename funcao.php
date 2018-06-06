<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        function upload($tmp,$nome,$largura,$pasta){
            $img = imagecreate($tmp);
            $x = imagesx($img);
            $y = magesy($img);
            $altura = ($largura * $y) / $x;
            
            $nova = imagecratetruecolor($largura, $altura);//cria uma nova imagem redimencionada em '0', com a cor verdadeira
            imagecopyresampled($nova, $img, 0,0,0,0, $lagura, $altura, $x, $y);
            imagejpeg($nova,"$imagens2/$nome");
            imagedestroy($nova);//destroi a nova imagem após enviada 
            imagedestroy($img);
            
            return($nome);
            
        }
        ?>
    </body>
</html>

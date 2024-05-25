<?php
function redimencionarImagemJPG($imagem, $largura, $altura)
{
// Cria um identificador para nova imagem
$imagem_original = imagecreatefromjpeg($imagem);

// Salva o tamanho antigo da imagem
list($largura_antiga, $altura_antiga) = getimagesize($imagem);


// Cria uma nova imagem com o tamanho indicado
// Esta imagem servirá de base para a imagem a ser reduzida
$imagem_tmp = imagecreatetruecolor($largura, $altura);

// Faz a interpolação da imagem base com a imagem original
imagecopyresampled($imagem_tmp, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_antiga, $altura_antiga);

// Salva a nova imagem
$resultado = imagejpeg($imagem_tmp, 'imagem_nova.jpg');

// Libera memoria
imagedestroy($imagem_original);
imagedestroy($imagem_tmp);

if($resultado)
{
return 'Imagem Reduzida';
}
else
{
return 'Erro!';
}
}

echo redimencionarImagemJPG('imagem_teste.jpg', 300, 144);



?>
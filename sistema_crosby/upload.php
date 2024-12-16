<?php
// Diretório para armazenar as imagens
$targetDir = "images/";

// Verifica se o diretório existe, caso contrário, cria-o
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$uploadedFiles = [];
$errors = [];

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagens'])) {
    $files = $_FILES['imagens'];

    foreach ($files['tmp_name'] as $index => $tmpName) {
        $fileName = basename($files['name'][$index]);
        $targetFilePath = $targetDir . $fileName;

        // Verifica se o arquivo é uma imagem válida
        if (getimagesize($tmpName) !== false) {
            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $uploadedFiles[] = $targetFilePath;
            } else {
                $errors[] = "Erro ao fazer upload do arquivo: " . $fileName;
            }
        } else {
            $errors[] = "O arquivo " . $fileName . " não é uma imagem válida.";
        }
    }
}

// Retorna o caminho das imagens ou erro
if (empty($errors)) {
    echo json_encode(['success' => true, 'files' => $uploadedFiles]);
} else {
    echo json_encode(['success' => false, 'errors' => $errors]);
}
?>

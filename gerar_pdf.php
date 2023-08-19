<?php
require 'dompdf/autoload.inc.php'; // Carrega o autoload do DomPDF

use Dompdf\Dompdf;
use Dompdf\Options;

// Criação de uma instância do Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('tempDir', sys_get_temp_dir());
$dompdf = new Dompdf($options);

// Definição do conteúdo do PDF
$html = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Exemplo de PDF com DomPDF</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 10px;
    }
    h1 {
        font-size: 18px;
        text-align: left;
    }
    p {
        font-size: 14px;
        margin-bottom: 10px;
    }
    .produtos {
        font-size: 12px;
    }
</style>

</head>
<body>
    <strong><p>Meu Primeiro PDF com DomPDF</p></strong>
    <p>Este é um exemplo simples de </p> 
    <p>como gerar um PDF usando o </p>
    <p>DomPDF.</p>
</body>
</html>
";

// Carregamento do HTML no Dompdf
$dompdf->loadHtml($html);

// Renderização do PDF
$dompdf->render();

// Saída do PDF para o navegador como download
$dompdf->stream("exemplo.pdf", ["Attachment" => false]);
?>

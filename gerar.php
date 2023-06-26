<?php
require_once('TCPDF/tcpdf.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Militar = $_POST['militar'];
    $Motorista = $_POST['motorista'];
    $Chefe = $_POST['chefe'];
    $Viatura = $_POST['viatura'];
    $Destino = $_POST['destino'];
    $Observacao = $_POST['observacao'];
    $dataAtual = date('d/m/Y');
    $imagePath = 'assets/img/simbolo.jpg';
    $imageWidth = 30;
    $imageHeight = 30;



    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();
    $pdfWidth = $pdf->GetPageWidth();
    $imageX = ($pdfWidth - $imageWidth) / 2;
    $currentY = $pdf->GetY();
    $pdf->Image($imagePath, $imageX, $currentY, $imageWidth, $imageHeight);

    $newY = $currentY + $imageHeight + 10;

    // Define a nova posição Y
    $pdf->SetY($newY);

    // Define a nova posição Y
    $pdf->SetY($newY);
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->SetFont('helvetica', 'b', 12);
    $pdf->SetY($pdf->GetY() - 5); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->Cell(0, -5, 'EXÉRCITO BRASILEIRO', 0, 1, 'C');
    $pdf->SetY($pdf->GetY() - 10); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->Cell(0, 0, 'MINISTÉRIO DA DEFESA', 0, 1, 'C');
    $pdf->SetY($pdf->GetY() +4); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->Cell(0, 0, 'GRÁFICA DO EXÉRCITO', 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetY($pdf->GetY() + 1); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->SetFont('helvetica', 'b', 12);
    $pdf->Cell(0, 10, 'LIBERAÇÃO DE VIATURA', 0, 1, 'C');

    // Criação da tabela com duas colunas

    // Calcula a posição X para centralizar a tabela
    $tableWidth = 160; // Largura total da tabela (80 + 80)
    $pageWidth = $pdf->GetPageWidth();
    $tableX = ($pageWidth - $tableWidth) / 2;

    // Define a posição X da tabela
    $pdf->SetX($tableX);
    $pdf->SetFont('helvetica', 12);
    $pdf->Cell(80, 10, 'DATA: ' . $dataAtual, 1, 0, 'C');
    $pdf->Cell(80, 10, 'MOTORISTA: ' . $Motorista, 1, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'SOLICITANTE:', 1, 0, 'C');
    $pdf->Cell(80, 10, $Militar, 1, 1, 'C');
    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'ASSINATURA: ', 1, 0, 'C');
    $pdf->Cell(80, 10, "", 1, 1, 'C');
    

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'CHEFE DE VIATURA: ', 1, 0, 'C');
    $pdf->Cell(80, 10, $Chefe, 1, 1, 'C');
    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'ASSINATURA: ', 1, 0, 'C');
    $pdf->Cell(80, 10, "", 1, 1, 'C');
    

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'TIPO DE VIATURA: ', 1, 0, 'C');
    $pdf->Cell(80, 10, $Viatura, 1, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'DESTINO:', 1, 0, 'C');
    $pdf->MultiCell(80, 10, $Destino, 1, 'C');

    $pdf->SetX($tableX);
    $pdf->Cell(80, 10, 'OBSERVAÇÃO:', 1, 0, 'C');
    $pdf->MultiCell(80, 10, $Observacao, 1, 'C');

    $pdf->SetY($pdf->GetY() + 15); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->SetX($tableX);
    $pdf->Cell(0, 3, '________________________________________', 0, 1, 'C');
    $pdf->SetX($tableX);
    $pdf->Cell(0, 7, 'CLÁUDIO HENRIQUE VALLE DE SOUSA - Maj', 0, 1, 'C');
    $pdf->SetX($tableX);
    $pdf->Cell(0, 7, 'Fiscal Administrativo da Gráfica do Exército', 0, 1, 'C');

    $pdf->SetY($pdf->GetY() + 15); // Ajuste o valor '-10' para mover o texto para cima
    $pdf->SetX($tableX);
    $pdf->Cell(0, 3, '________________________________________', 0, 1, 'C');
    $pdf->SetX($tableX);
    $pdf->Cell(0, 7, 'AUTORIZAÇÃO DO CHEFE DA GARAGEM', 0, 1, 'C');

    $pdf->Output('ficha_viatura.pdf', 'I');
}

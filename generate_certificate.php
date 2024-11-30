<?php

require('fpdf/fpdf.php'); 


class PDF extends FPDF {
 
    function generateCertificate($nomineeName, $categoryName) {
        $this->AddPage('P', 'A4');
        $date = date("d.m.Y");

        $imagePath = 'Images/certificate_background.png'; 

        $pageWidth = $this->GetPageWidth();
        $pageHeight = $this->GetPageHeight();

        $this->Image($imagePath, 0, 0, $pageWidth, $pageHeight);
       
        $this->SetTextColor(42, 186, 224);

        $this->SetXY(8, 130); 
        $this->SetFont('Times', 'I', 50);
        $this->MultiCell(200, 10, $nomineeName, 0, 'C');

        $this->SetXY(8, 155); 
        $this->SetFont('Courier', 'B', 24);
        $this->MultiCell(200, 10, $categoryName, 0, 'C');

        $this->SetXY(28, 249); 
        $this->SetFont('Courier', '', 18);
        $this->MultiCell(0, 10, $nomineeName, 0, 'L');

        $this->SetXY(85, 265); 
        $this->SetFont('Courier', '', 18);
        $this->MultiCell(0, 10, $date, 0, 'L');
    }
}

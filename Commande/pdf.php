<?php
    require_once '../dbaccess.php';
    require_once './commandeClass.php';
    require_once '../Produits/produitClass.php';
    $c= new Commande();
    $pr = new Product();
    $c->setReference($_GET['id']);
    $res=$c->selectOne11();
    $rowCount=$c->selectRow();

    require_once('../Fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10,"Facture de commande",1,20,'C');
    
    for($i=0; $i<$rowCount; $i++){ 
        $pr->setReference($res[$i]->comProduit_id);
        $resP = $pr->selectOne3();
        $quantite = $res[$i]->comProduit_qt;
        $prixVente = $resP->produitPrix_v;
        $prix = $quantite * $prixVente;
        $pdf->Cell(0,10,"Client:".$res[$i]->commandeClient_num,1,1,'L');
        $pdf->Cell(0,10,"N° commande:".$res[$i]->commandeId,1,1,'L');
        $pdf->Cell(0,10,"Libelle du produit:".$res[$i]->comProduit_id,1,1,'L');
        $pdf->Cell(0,10,"Quantite du produit:".$res[$i]->comProduit_qt,1,1,'L');
        $pdf->Cell(0,10,"Prix:". $prix,1,1,'L');
    }
    $pdf->Output('D','filename.pdf');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
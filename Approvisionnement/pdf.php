<?php
    require_once '../dbaccess.php';
    require_once './approvisionClass.php';
    require_once '../Produits/produitClass.php';
    $c = new Approvision();
    $pr = new Product();
    $c->setReference($_GET['id']);
    $res=$c->selectOne11();
    $rowCount=$c->selectRow();

    require_once('../Fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);
    $pdf->Cell(0,10,"Facture d'approvisionnement",1,20,'C');

    for($i=0; $i<$rowCount; $i++){
        $pr->setReference($res[$i]->ajoutProduit_num);
        $resP = $pr->selectOne3();
        $quantite = $res[$i]->ajoutProduit_qt;
        $prixAchat = $resP->produitPrix_a;
        $prix = $quantite * $prixAchat;
        $pdf->Cell(0,10,"Fournisseur:".$res[$i]->appFournisseur_num,1,1,'L');
        $pdf->Cell(0,10,"N° approvisionnement:".$res[$i]->appId,1,1,'L');
        $pdf->Cell(0,10,"Libelle du produit:".$res[$i]->ajoutProduit_num ,1,1,'L');
        $pdf->Cell(0,10,"Quantite du produit:".$res[$i]->ajoutProduit_qt,1,1,'L');
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
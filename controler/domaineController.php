<?php
require_once('domaineModel.php');

if (isset($_POST['add_pdf'])) {
    $pdfFilePath = 'path_to_pdf_file';
    $domaineModel = new DomaineModel();
    $domaineModel->addPdf($pdfFilePath);
}

if (isset($_POST['delete_pdf'])) {
    $pdfId = $_POST['pdf_id'];
    $domaineModel = new DomaineModel();
    $domaineModel->deletePdf($pdfId);
}

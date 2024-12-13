<?php
require_once('db.php'); // Inclut le fichier de connexion à la base de données

class DomaineModel {
    public function addPdf($pdfFilePath) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO domaines (pdf_path) VALUES (?)");
        $stmt->bind_param("s", $pdfFilePath);
        $stmt->execute();
        $stmt->close();
    }

    public function deletePdf($pdfId) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM domaines WHERE id = ?");
        $stmt->bind_param("i", $pdfId);
        $stmt->execute();
        $stmt->close();
    }
}

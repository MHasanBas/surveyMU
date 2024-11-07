<?php
class Kategori
{
    private $conn;
    private $table_name = "m_kategori";
    public $kategori_id;
    public $kategori_nama;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getKategori()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function updateKategori()
    {
        $query = "UPDATE " . $this->table_name . " SET kategori_nama = :kategori_nama WHERE kategori_id = :kategori_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kategori_id', $this->kategori_id);
        $stmt->bindParam(':kategori_nama', $this->kategori_nama);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

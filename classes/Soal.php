<?php
class Soal
{
    private $conn;
    private $table_name = "m_survey_soal";
    public $soal_id;
    public $soal_nama;
    public $soal_jenis;
    public $updatekategori_id;
    public $no_urut;
    

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function updateSoal(){
        $query = "UPDATE " . $this->table_name . " SET soal_nama = :soal_nama, soal_jenis = :soal_jenis, no_urut = :no_urut, kategori_id = :kategori_id WHERE soal_id = :soal_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':soal_id', $this->soal_id);
        $stmt->bindParam(':soal_nama', $this->soal_nama);
        $stmt->bindParam(':soal_jenis', $this->soal_jenis);
        $stmt->bindParam(':no_urut', $this->no_urut);
        $stmt->bindParam(':kategori_id', $this->updatekategori_id);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function deleteSoal(){
        $query = "DELETE FROM " . $this->table_name . " WHERE soal_id = :soal_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':soal_id', $this->soal_id);
    
        if($stmt->execute()){
            return true;
        }
        return false;
    }
}

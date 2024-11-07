<?php
class Jawaban
{
    private $conn;
    private $table_m_survey_soal = "m_survey_soal";
    private $table_responden_dosen = "t_jawaban_dosen";
    private $table_responden_mahasiswa = "t_jawaban_mahasiswa";
    private $table_responden_tendik = "t_jawaban_tendik";
    private $table_responden_alumni = "t_jawaban_alumni";
    private $table_responden_industri = "t_jawaban_industri";
    private $table_responden_orangtua = "t_jawaban_ortu";
    // Jawaban properties
    public $survey_id;
    public $soal_id;
    public $jawaban;
    public $responden;
    public $responden_id;
    public $kategori_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function storeJawaban()
    {
        if ($this->responden == "Mahasiswa") {
            $query = "INSERT INTO " . $this->table_responden_mahasiswa . " (responden_mahasiswa_id, soal_id, jawaban) VALUES (:responden_mahasiswa_id, :soal_id, :jawaban)";
            $stmt = $this->conn->prepare($query);
            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->soal_id = htmlspecialchars(strip_tags($this->soal_id));
            $this->jawaban = htmlspecialchars(strip_tags($this->jawaban));
            $stmt->bindParam(':responden_mahasiswa_id', $this->responden_id);
            $stmt->bindParam(':soal_id', $this->soal_id);
            $stmt->bindParam(':jawaban', $this->jawaban);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->responden == "Dosen") {
            $query = "INSERT INTO " . $this->table_responden_dosen . " (responden_dosen_id, soal_id, jawaban) VALUES (:responden_dosen_id, :soal_id, :jawaban)";
            $stmt = $this->conn->prepare($query);
            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->soal_id = htmlspecialchars(strip_tags($this->soal_id));
            $this->jawaban = htmlspecialchars(strip_tags($this->jawaban));
            $stmt->bindParam(':responden_dosen_id', $this->responden_id);
            $stmt->bindParam(':soal_id', $this->soal_id);
            $stmt->bindParam(':jawaban', $this->jawaban);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->responden == "Tendik") {
            $query = "INSERT INTO " . $this->table_responden_tendik . " (responden_tendik_id, soal_id, jawaban) VALUES (:responden_tendik_id, :soal_id, :jawaban)";
            $stmt = $this->conn->prepare($query);
            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->soal_id = htmlspecialchars(strip_tags($this->soal_id));
            $this->jawaban = htmlspecialchars(strip_tags($this->jawaban));
            $stmt->bindParam(':responden_tendik_id', $this->responden_id);
            $stmt->bindParam(':soal_id', $this->soal_id);
            $stmt->bindParam(':jawaban', $this->jawaban);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->responden == "Alumni") {
            $query = "INSERT INTO " . $this->table_responden_alumni . " (responden_alumni_id, soal_id, jawaban) VALUES (:responden_alumni_id, :soal_id, :jawaban)";
            $stmt = $this->conn->prepare($query);
            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->soal_id = htmlspecialchars(strip_tags($this->soal_id));
            $this->jawaban = htmlspecialchars(strip_tags($this->jawaban));
            $stmt->bindParam(':responden_alumni_id', $this->responden_id);
            $stmt->bindParam(':soal_id', $this->soal_id);
            $stmt->bindParam(':jawaban', $this->jawaban);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->responden == "Industri") {
            $query = "INSERT INTO " . $this->table_responden_industri . " (responden_industri_id, soal_id, jawaban) VALUES (:responden_industri_id, :soal_id, :jawaban)";
            $stmt = $this->conn->prepare($query);
            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->soal_id = htmlspecialchars(strip_tags($this->soal_id));
            $this->jawaban = htmlspecialchars(strip_tags($this->jawaban));
            $stmt->bindParam(':responden_industri_id', $this->responden_id);
            $stmt->bindParam(':soal_id', $this->soal_id);
            $stmt->bindParam(':jawaban', $this->jawaban);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->responden == "Orangtua") {
            $query = "INSERT INTO " . $this->table_responden_orangtua . " (responden_ortu_id, soal_id, jawaban) VALUES (:responden_ortu_id, :soal_id, :jawaban)";
            $stmt = $this->conn->prepare($query);
            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->soal_id = htmlspecialchars(strip_tags($this->soal_id));
            $this->jawaban = htmlspecialchars(strip_tags($this->jawaban));
            $stmt->bindParam(':responden_ortu_id', $this->responden_id);
            $stmt->bindParam(':soal_id', $this->soal_id);
            $stmt->bindParam(':jawaban', $this->jawaban);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
    }

    public function getJawaban()
    {
        if ($this->responden == "Mahasiswa") {
            $query = "
            SELECT {$this->table_responden_mahasiswa}.*, {$this->table_m_survey_soal}.soal_id, {$this->table_m_survey_soal}.soal_nama
            FROM {$this->table_responden_mahasiswa}
            INNER JOIN {$this->table_m_survey_soal} ON {$this->table_responden_mahasiswa}.soal_id = {$this->table_m_survey_soal}.soal_id
            WHERE {$this->table_m_survey_soal}.kategori_id = :kategori_id
            AND {$this->table_responden_mahasiswa}.responden_mahasiswa_id = :responden_id
            ";
            $stmt = $this->conn->prepare($query);

            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));

            $stmt->bindParam(':responden_id', $this->responden_id);
            $stmt->bindParam(':kategori_id', $this->kategori_id);

            $stmt->execute();
            return $stmt;
        } else if ($this->responden == "Dosen") {
            $query = "
            SELECT {$this->table_responden_dosen}.*, {$this->table_m_survey_soal}.soal_id, {$this->table_m_survey_soal}.soal_nama
            FROM {$this->table_responden_dosen}
            INNER JOIN {$this->table_m_survey_soal} ON {$this->table_responden_dosen}.soal_id = {$this->table_m_survey_soal}.soal_id
            WHERE {$this->table_m_survey_soal}.kategori_id = :kategori_id
            AND {$this->table_responden_dosen}.responden_dosen_id = :responden_id
            ";
            $stmt = $this->conn->prepare($query);

            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));

            $stmt->bindParam(':responden_id', $this->responden_id);
            $stmt->bindParam(':kategori_id', $this->kategori_id);

            $stmt->execute();
            return $stmt;
        } else if ($this->responden == "Tendik") {
            $query = "
            SELECT {$this->table_responden_tendik}.*, {$this->table_m_survey_soal}.soal_id, {$this->table_m_survey_soal}.soal_nama
            FROM {$this->table_responden_tendik}
            INNER JOIN {$this->table_m_survey_soal} ON {$this->table_responden_tendik}.soal_id = {$this->table_m_survey_soal}.soal_id
            WHERE {$this->table_m_survey_soal}.kategori_id = :kategori_id
            AND {$this->table_responden_tendik}.responden_tendik_id = :responden_id
            ";
            $stmt = $this->conn->prepare($query);

            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));

            $stmt->bindParam(':responden_id', $this->responden_id);
            $stmt->bindParam(':kategori_id', $this->kategori_id);

            $stmt->execute();
            return $stmt;
        } else if ($this->responden == "Alumni") {
            $query = "
            SELECT {$this->table_responden_alumni}.*, {$this->table_m_survey_soal}.soal_id, {$this->table_m_survey_soal}.soal_nama
            FROM {$this->table_responden_alumni}
            INNER JOIN {$this->table_m_survey_soal} ON {$this->table_responden_alumni}.soal_id = {$this->table_m_survey_soal}.soal_id
            WHERE {$this->table_m_survey_soal}.kategori_id = :kategori_id
            AND {$this->table_responden_alumni}.responden_alumni_id = :responden_id
            ";
            $stmt = $this->conn->prepare($query);

            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));

            $stmt->bindParam(':responden_id', $this->responden_id);
            $stmt->bindParam(':kategori_id', $this->kategori_id);

            $stmt->execute();
            return $stmt;
        } else if ($this->responden == "Industri") {
            $query = "
            SELECT {$this->table_responden_industri}.*, {$this->table_m_survey_soal}.soal_id, {$this->table_m_survey_soal}.soal_nama
            FROM {$this->table_responden_industri}
            INNER JOIN {$this->table_m_survey_soal} ON {$this->table_responden_industri}.soal_id = {$this->table_m_survey_soal}.soal_id
            WHERE {$this->table_m_survey_soal}.kategori_id = :kategori_id
            AND {$this->table_responden_industri}.responden_industri_id	 = :responden_id
            ";
            $stmt = $this->conn->prepare($query);

            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));

            $stmt->bindParam(':responden_id', $this->responden_id);
            $stmt->bindParam(':kategori_id', $this->kategori_id);

            $stmt->execute();
            return $stmt;
        } else if ($this->responden == "Ortu") {
            $query = "
            SELECT {$this->table_responden_orangtua}.*, {$this->table_m_survey_soal}.soal_id, {$this->table_m_survey_soal}.soal_nama
            FROM {$this->table_responden_orangtua}
            INNER JOIN {$this->table_m_survey_soal} ON {$this->table_responden_orangtua}.soal_id = {$this->table_m_survey_soal}.soal_id
            WHERE {$this->table_m_survey_soal}.kategori_id = :kategori_id
            AND {$this->table_responden_orangtua}.responden_ortu_id = :responden_id
            ";
            $stmt = $this->conn->prepare($query);

            $this->responden_id = htmlspecialchars(strip_tags($this->responden_id));
            $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));

            $stmt->bindParam(':responden_id', $this->responden_id);
            $stmt->bindParam(':kategori_id', $this->kategori_id);

            $stmt->execute();
            return $stmt;
        }
    }

    public function getAllJawaban()
    {
        $query = "SELECT 't_jawaban_dosen' AS tabel_sumber, responden_dosen_id AS responden_id, soal_id, jawaban FROM t_jawaban_dosen
        UNION ALL
        SELECT 't_jawaban_mahasiswa' AS tabel_sumber, responden_mahasiswa_id AS responden_id, soal_id, jawaban FROM t_jawaban_mahasiswa
        UNION ALL
        SELECT 't_jawaban_tendik' AS tabel_sumber, responden_tendik_id AS responden_id, soal_id, jawaban FROM t_jawaban_tendik
        UNION ALL
        SELECT 't_jawaban_alumni' AS tabel_sumber, responden_alumni_id AS responden_id, soal_id, jawaban FROM t_jawaban_alumni
        UNION ALL
        SELECT 't_jawaban_industri' AS tabel_sumber, responden_industri_id AS responden_id, soal_id, jawaban FROM t_jawaban_industri
        UNION ALL
        SELECT 't_jawaban_ortu' AS tabel_sumber, responden_ortu_id AS responden_id, soal_id, jawaban FROM t_jawaban_ortu;        
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getJawabanByKategori()
    {
        $query = "SELECT
        't_jawaban_dosen' AS tabel_sumber,
        jd.responden_dosen_id AS responden_id,
        jd.soal_id,
        jd.jawaban
    FROM
        t_jawaban_dosen jd
    INNER JOIN
        m_survey_soal ms ON jd.soal_id = ms.soal_id
    WHERE
        ms.kategori_id = :kategori_id
    
    UNION ALL
    
    SELECT
        't_jawaban_mahasiswa' AS tabel_sumber,
        jm.responden_mahasiswa_id AS responden_id,
        jm.soal_id,
        jm.jawaban
    FROM
        t_jawaban_mahasiswa jm
    INNER JOIN
        m_survey_soal ms ON jm.soal_id = ms.soal_id
    WHERE
        ms.kategori_id = :kategori_id
    
    UNION ALL
    
    SELECT
        't_jawaban_tendik' AS tabel_sumber,
        jt.responden_tendik_id AS responden_id,
        jt.soal_id,
        jt.jawaban
    FROM
        t_jawaban_tendik jt
    INNER JOIN
        m_survey_soal ms ON jt.soal_id = ms.soal_id
    WHERE
        ms.kategori_id = :kategori_id
    
    UNION ALL
    
    SELECT
        't_jawaban_alumni' AS tabel_sumber,
        ja.responden_alumni_id AS responden_id,
        ja.soal_id,
        ja.jawaban
    FROM
        t_jawaban_alumni ja
    INNER JOIN
        m_survey_soal ms ON ja.soal_id = ms.soal_id
    WHERE
        ms.kategori_id = :kategori_id
    
    UNION ALL
    
    SELECT
        't_jawaban_industri' AS tabel_sumber,
        ji.responden_industri_id AS responden_id,
        ji.soal_id,
        ji.jawaban
    FROM
        t_jawaban_industri ji
    INNER JOIN
        m_survey_soal ms ON ji.soal_id = ms.soal_id
    WHERE
        ms.kategori_id = :kategori_id
    
    UNION ALL
    
    SELECT
        't_jawaban_ortu' AS tabel_sumber,
        jo.responden_ortu_id AS responden_id,
        jo.soal_id,
        jo.jawaban
    FROM
        t_jawaban_ortu jo
    INNER JOIN
        m_survey_soal ms ON jo.soal_id = ms.soal_id
    WHERE
        ms.kategori_id = :kategori_id;
    
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kategori_id', $this->kategori_id);
        $stmt->execute();
        return $stmt;
    }
}

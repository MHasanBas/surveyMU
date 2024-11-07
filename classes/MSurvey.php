<?php
class MSurvey
{
    private $conn;
    private $table_name = "m_survey";
    private $table_name2 = "m_survey_soal";
    private $table_responden_dosen = "t_reponden_dosen";
    private $table_responden_mahasiswa = "t_reponden_mahasiswa";
    private $table_responden_tendik = "t_reponden_tendik";
    private $table_responden_alumni = "t_responden_alumni";
    private $table_responden_industri = "t_responden_industri";
    private $table_responden_orangtua = "t_responden_ortu";
    // MSurvey properties
    public $user_id;
    public $survey_jenis;
    public $survey_tanggal;
    // MSurveySoal properties
    public $no_urut;
    public $soal_jenis;
    public $kategori_id;
    public $soal_nama;
    // Responden properties mahaasiswa
    public $survey_id;
    public $nim;
    public $nama;
    public $prodi;
    public $email;
    public $no_hp;
    public $tahun_masuk;
    public $date;
    // Responden alumni
    public $responden_nim;
    public $responden_tanggal;
    public $responden_nama;
    public $responden_prodi;
    public $responden_email;
    public $responden_hp;
    public $tahun_lulus;
    // Responden orangtua
    public $responden_jk;
    public $responden_umur;
    public $responden_pendidikan;
    public $responden_pekerjaan;
    public $responden_penghasilan;
    public $mahasiswa_nim;
    public $mahasiswa_nama;
    public $mahasiswa_prodi;
    // Responden dosen
    public $responden_nip;
    public $responden_unit;
    // Responden tendik
    public $responden_nopeg;
    // Responden industri
    public $responden_jabatan;
    public $responden_perusahaan;
    public $responden_kota;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function storeMSurvey()
    {
        $query = "INSERT INTO " . $this->table_name . " (user_id, survey_jenis, survey_tanggal) VALUES (:user_id, :survey_jenis, :survey_tanggal)";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->survey_jenis = htmlspecialchars(strip_tags($this->survey_jenis));
        $this->survey_tanggal = date('Y-m-d H:i:s');
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':survey_jenis', $this->survey_jenis);
        $stmt->bindParam(':survey_tanggal', $this->survey_tanggal);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function storeResponden()
    {
        if ($this->survey_jenis == "Mahasiswa") {
            $query = "INSERT INTO " . $this->table_responden_mahasiswa . " (survey_id, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_masuk,responden_tanggal) VALUES (:survey_id, :nim, :nama, :prodi, :email, :no_hp, :tahun_masuk, :date)";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $this->nim = htmlspecialchars(strip_tags($this->nim));
            $this->nama = htmlspecialchars(strip_tags($this->nama));
            $this->prodi = htmlspecialchars(strip_tags($this->prodi));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->no_hp = htmlspecialchars(strip_tags($this->no_hp));
            $this->tahun_masuk = htmlspecialchars(strip_tags($this->tahun_masuk));
            $this->date = date('Y-m-d H:i:s');
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->bindParam(':nim', $this->nim);
            $stmt->bindParam(':nama', $this->nama);
            $stmt->bindParam(':prodi', $this->prodi);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':no_hp', $this->no_hp);
            $stmt->bindParam(':tahun_masuk', $this->tahun_masuk);
            $stmt->bindParam(':date', $this->date);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->survey_jenis == "Dosen") {
            $query = "INSERT INTO " . $this->table_responden_dosen . " (survey_id, responden_nip, responden_nama, responden_unit) VALUES (:survey_id, :responden_nip, :responden_nama, :responden_unit)";
            $stmt = $this->conn->prepare($query);
            $this->responden_tanggal = date('Y-m-d H:i:s');
            $this->responden_nip = htmlspecialchars(strip_tags($this->responden_nip));
            $this->responden_nama = htmlspecialchars(strip_tags($this->responden_nama));
            $this->responden_unit = htmlspecialchars(strip_tags($this->responden_unit));
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->bindParam(':responden_nip', $this->responden_nip);
            $stmt->bindParam(':responden_nama', $this->responden_nama);
            $stmt->bindParam(':responden_unit', $this->responden_unit);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->survey_jenis == "Tendik") {
            $query = "INSERT INTO " . $this->table_responden_tendik . " (survey_id, responden_nopeg, responden_nama, responden_unit) VALUES (:survey_id, :responden_nopeg, :responden_nama, :responden_unit)";
            $stmt = $this->conn->prepare($query);
            $this->responden_tanggal = date('Y-m-d H:i:s');
            $this->responden_nopeg = htmlspecialchars(strip_tags($this->responden_nopeg));
            $this->responden_nama = htmlspecialchars(strip_tags($this->responden_nama));
            $this->responden_unit = htmlspecialchars(strip_tags($this->responden_unit));
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->bindParam(':responden_nopeg', $this->responden_nopeg);
            $stmt->bindParam(':responden_nama', $this->responden_nama);
            $stmt->bindParam(':responden_unit', $this->responden_unit);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->survey_jenis == "Alumni") {
            $query = "INSERT INTO " . $this->table_responden_alumni . " (survey_id, responden_nim, responden_tanggal, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus) VALUES (:survey_id, :responden_nim, :responden_tanggal, :responden_nama, :responden_prodi, :responden_email, :responden_hp, :tahun_lulus)";
            $stmt = $this->conn->prepare($query);
            $this->responden_tanggal = date('Y-m-d H:i:s');
            $this->responden_nim = htmlspecialchars(strip_tags($this->responden_nim));
            $this->responden_nama = htmlspecialchars(strip_tags($this->responden_nama));
            $this->responden_prodi = htmlspecialchars(strip_tags($this->responden_prodi));
            $this->responden_email = htmlspecialchars(strip_tags($this->responden_email));
            $this->responden_hp = htmlspecialchars(strip_tags($this->responden_hp));
            $this->tahun_lulus = htmlspecialchars(strip_tags($this->tahun_lulus));
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->bindParam(':responden_nim', $this->responden_nim);
            $stmt->bindParam(':responden_tanggal', $this->responden_tanggal);
            $stmt->bindParam(':responden_nama', $this->responden_nama);
            $stmt->bindParam(':responden_prodi', $this->responden_prodi);
            $stmt->bindParam(':responden_email', $this->responden_email);
            $stmt->bindParam(':responden_hp', $this->responden_hp);
            $stmt->bindParam(':tahun_lulus', $this->tahun_lulus);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->survey_jenis == "Industri") {
            $query = "INSERT INTO " . $this->table_responden_industri . " (survey_id, responden_nama, responden_jabatan, responden_perusahaan, responden_kota) VALUES (:survey_id, :responden_nama, :responden_jabatan, :responden_perusahaan, :responden_kota)";
            $stmt = $this->conn->prepare($query);
            $this->responden_tanggal = date('Y-m-d H:i:s');
            $this->responden_nama = htmlspecialchars(strip_tags($this->responden_nama));
            $this->responden_jabatan = htmlspecialchars(strip_tags($this->responden_jabatan));
            $this->responden_perusahaan = htmlspecialchars(strip_tags($this->responden_perusahaan));
            $this->responden_kota = htmlspecialchars(strip_tags($this->responden_kota));
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->bindParam(':responden_nama', $this->responden_nama);
            $stmt->bindParam(':responden_jabatan', $this->responden_jabatan);
            $stmt->bindParam(':responden_perusahaan', $this->responden_perusahaan);
            $stmt->bindParam(':responden_kota', $this->responden_kota);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } else if ($this->survey_jenis == "Ortu") {
            $query = "INSERT INTO " . $this->table_responden_orangtua . " (survey_id, responden_nama, responden_jk, responden_umur, responden_pendidikan, responden_pekerjaan, responden_penghasilan, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi) VALUES (:survey_id, :responden_nama, :responden_jk, :responden_umur, :responden_pendidikan, :responden_pekerjaan, :responden_penghasilan, :mahasiswa_nim, :mahasiswa_nama, :mahasiswa_prodi)";
            $stmt = $this->conn->prepare($query);
            $this->responden_tanggal = date('Y-m-d H:i:s');
            $this->responden_nama = htmlspecialchars(strip_tags($this->responden_nama));
            $this->responden_jk = htmlspecialchars(strip_tags($this->responden_jk));
            $this->responden_umur = htmlspecialchars(strip_tags($this->responden_umur));
            $this->responden_pendidikan = htmlspecialchars(strip_tags($this->responden_pendidikan));
            $this->responden_pekerjaan = htmlspecialchars(strip_tags($this->responden_pekerjaan));
            $this->responden_penghasilan = htmlspecialchars(strip_tags($this->responden_penghasilan));
            $this->mahasiswa_nim = htmlspecialchars(strip_tags($this->mahasiswa_nim));
            $this->mahasiswa_nama = htmlspecialchars(strip_tags($this->mahasiswa_nama));
            $this->mahasiswa_prodi = htmlspecialchars(strip_tags($this->mahasiswa_prodi));
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->bindParam(':responden_nama', $this->responden_nama);
            $stmt->bindParam(':responden_jk', $this->responden_jk);
            $stmt->bindParam(':responden_umur', $this->responden_umur);
            $stmt->bindParam(':responden_pendidikan', $this->responden_pendidikan);
            $stmt->bindParam(':responden_pekerjaan', $this->responden_pekerjaan);
            $stmt->bindParam(':responden_penghasilan', $this->responden_penghasilan);
            $stmt->bindParam(':mahasiswa_nim', $this->mahasiswa_nim);
            $stmt->bindParam(':mahasiswa_nama', $this->mahasiswa_nama);
            $stmt->bindParam(':mahasiswa_prodi', $this->mahasiswa_prodi);
            if ($stmt->execute()) {
                return true;
            }
        }
    }

    public function getMSurvey()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();

        return $stmt;
    }

    public function isAlreadyResponden()
    {
        if ($this->survey_jenis == "Mahasiswa") {
            $query = "SELECT * FROM " . $this->table_responden_mahasiswa . " WHERE survey_id = :survey_id";
        } else if ($this->survey_jenis == "Dosen") {
            $query = "SELECT * FROM " . $this->table_responden_dosen . " WHERE survey_id = :survey_id";
        } else if ($this->survey_jenis == "Tendik") {
            $query = "SELECT * FROM " . $this->table_responden_tendik . " WHERE survey_id = :survey_id";
        } else if ($this->survey_jenis == "Alumni") {
            $query = "SELECT * FROM " . $this->table_responden_alumni . " WHERE survey_id = :survey_id";
        } else if ($this->survey_jenis == "Industri") {
            $query = "SELECT * FROM " . $this->table_responden_industri . " WHERE survey_id = :survey_id";
        } else if ($this->survey_jenis == "Ortu") {
            $query = "SELECT * FROM " . $this->table_responden_orangtua . " WHERE survey_id = :survey_id";
        }
        $stmt = $this->conn->prepare($query);
        $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
        $stmt->bindParam(':survey_id', $this->survey_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function getSoal()
    {
        $query = "SELECT * FROM " . $this->table_name2 . " WHERE kategori_id = :kategori_id ORDER BY no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));
        $stmt->bindParam(':kategori_id', $this->kategori_id);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function getSoalById($id)
    {
        $query = "SELECT m.*, k.kategori_nama 
        FROM " . $this->table_name2 . " m
        INNER JOIN m_kategori k ON m.kategori_id = k.kategori_id
        WHERE m.kategori_id = :kategori_id
        ORDER BY m.no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $this->kategori_id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(':kategori_id', $this->kategori_id);

        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function storeSoal()
    {
        $query = "INSERT INTO " . $this->table_name2 . " (no_urut, soal_jenis, kategori_id, soal_nama) VALUES (:no_urut, :soal_jenis, :kategori_id, :soal_nama)";
        $stmt = $this->conn->prepare($query);
        $this->no_urut = htmlspecialchars(strip_tags($this->no_urut));
        $this->soal_jenis = htmlspecialchars(strip_tags($this->soal_jenis));
        $this->kategori_id = htmlspecialchars(strip_tags($this->kategori_id));
        $this->soal_nama = htmlspecialchars(strip_tags($this->soal_nama));
        $stmt->bindParam(':no_urut', $this->no_urut);
        $stmt->bindParam(':soal_jenis', $this->soal_jenis);
        $stmt->bindParam(':kategori_id', $this->kategori_id);
        $stmt->bindParam(':soal_nama', $this->soal_nama);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getSurveyId()
    {
        $query = "SELECT survey_id FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getTResponden()
    {
        if ($this->survey_jenis == "Mahasiswa") {
            $query = "SELECT responden_mahasiswa_id FROM " . $this->table_responden_mahasiswa . " WHERE survey_id = :survey_id";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]["responden_mahasiswa_id"];
        } else if ($this->survey_jenis == "Dosen") {
            $query = "SELECT responden_dosen_id FROM " . $this->table_responden_dosen . " WHERE survey_id = :survey_id";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]["responden_dosen_id"];
        } else if ($this->survey_jenis == "Tendik") {
            $query = "SELECT responden_tendik_id FROM " . $this->table_responden_tendik . " WHERE survey_id = :survey_id";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]["responden_tendik_id"];
        } else if ($this->survey_jenis == "Alumni") {
            $query = "SELECT responden_alumni_id FROM " . $this->table_responden_alumni . " WHERE survey_id = :survey_id";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]["responden_alumni_id"];
        } else if ($this->survey_jenis == "Industri") {
            $query = "SELECT * FROM " . $this->table_responden_industri . " WHERE survey_id = :survey_id";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]["responden_industri_id"];
        } else if ($this->survey_jenis == "Ortu") {
            $query = "SELECT * FROM " . $this->table_responden_orangtua . " WHERE survey_id = :survey_id";
            $stmt = $this->conn->prepare($query);
            $this->survey_id = htmlspecialchars(strip_tags($this->survey_id));
            $stmt->bindParam(':survey_id', $this->survey_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result[0]["responden_ortu_id"];
        }
    }
}

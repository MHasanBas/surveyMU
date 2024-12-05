<?php
class User
{
    private $conn;
    private $table_name = "m_user";

    public $id;
    public $username;
    public $password;
    public $user_id;
    public $role;
    public $nama;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register()
    {
        // Query untuk insert data user
        $query = "INSERT INTO " . $this->table_name . " (username, password, nama, role) 
                  VALUES (:username, :password, :nama, :role)";
        $stmt = $this->conn->prepare($query);

        // Validasi dan sanitasi input
        $this->username = htmlspecialchars(strip_tags($this->username ?? ''));
        $this->password = password_hash($this->password ?? '', PASSWORD_BCRYPT);
        $this->nama = htmlspecialchars(strip_tags($this->nama ?? ''));
        $this->role = 2; // Role default, misalnya 2 untuk "user biasa"

        // Bind parameter ke query
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':role', $this->role);

        // Eksekusi query dan return hasil
        if ($stmt->execute()) {
            return true;
        }

        // Debug error jika query gagal
        echo "Error: " . $stmt->errorInfo()[2];
        return false;
    }

    // Method untuk mengecek apakah user adalah admin
    public function isAdmin($user_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cek apakah role user adalah admin
        if ($row['role'] === 'admin') {
            $_SESSION['role'] = 'Admin';
            $_SESSION['name'] = $row['nama'];
            return true;
        }

        // Jika bukan admin, set sebagai user biasa
        $_SESSION['role'] = 'User';
        $_SESSION['name'] = $row['nama'];
        return false;
    }

    // Method untuk login user
    public function login()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();

        // Cek apakah username ditemukan
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verifikasi password
            if (password_verify($this->password, $row['password'])) {
                $this->id = $row['user_id'];
                $this->nama = $row['nama'];
                $this->role = $row['role'];
                return true;
            }
        }

        // Jika gagal login
        return false;
    }

    // Method untuk mendapatkan semua data user
    public function getAllUsers()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk menambah user baru
    public function addUser()
    {
        $query = "INSERT INTO " . $this->table_name . " (role, nama, username, password) 
                  VALUES (:role, :nama, :username, :password)";
        $stmt = $this->conn->prepare($query);

        // Amankan input
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        // Bind parameter
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }

        // Debug error jika gagal
        echo "Error: " . $stmt->errorInfo()[2];
        return false;
    }

    // Method untuk mengupdate user
    public function updateUser()
    {
        $query = "UPDATE " . $this->table_name . " 
                  SET role = :role, nama = :nama, username = :username, password = :password 
                  WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);

        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }

        echo "Error: " . $stmt->errorInfo()[2];
        return false;
    }

    // Method untuk menghapus user
    public function deleteUser()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }

        echo "Error: " . $stmt->errorInfo()[2];
        return false;
    }
    public function isAlreadyAssigned() {
        $query = "SELECT * FROM m_survey WHERE user_id = :user_id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
    
        // Mengembalikan true jika sudah ada survei yang ditetapkan
        return $stmt->rowCount() > 0;
    }
    
}

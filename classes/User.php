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
        $query = "INSERT INTO " . $this->table_name . " (username, password,nama,role) VALUES (:username, :password, :nama, 'user')";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':nama', $this->username);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function isAdmin($user_id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['role'] == '1') {
            $_SESSION['role'] = 'Admin';
            $_SESSION['name'] = $row['nama'];
            return true;
        }
        $_SESSION['role'] = 'User';
        $_SESSION['name'] = $row['nama'];
        return false;
    }

    public function isAlreadyAssigned()
    {
        $query = "SELECT * FROM m_survey" . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function login()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->password, $row['password'])) {
                $this->id = $row['user_id'];
                $this->nama = $row['nama'];
                $this->role = $row['role'];
                return true;
            }
        }
        return false;
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function addUser()
    {
        $query = "INSERT INTO " . $this->table_name . " (role, nama, username, password) VALUES (:role, :nama, :username, :password)";
        $stmt = $this->conn->prepare($query);
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateUser()
    {
        $query = "UPDATE " . $this->table_name . " SET role = :role, nama = :nama, username = :username, password = :password WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteUser()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}

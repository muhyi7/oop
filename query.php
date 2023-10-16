<?php
class crud extends koneksi
{
    public function lihatData()
    {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function insertData($email, $pass, $name)
    {
        try {
            $sql = "INSERT INTO user_detail(user_email, user_password, user_fullname, level) VALUES (:email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);

            if ($result->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editData($id, $email, $pass, $name)
    {
        try {
            $sql = "UPDATE user_detail SET user_email = :email, user_password = :pass, user_fullname = :name WHERE id = :id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $id);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);

            if ($result->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function hapusData($id)
    {
        try {
            $sql = "DELETE FROM user_detail WHERE id = :id";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":id", $id);

            if ($result->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Fungsi untuk mengatur session
    public function setSession($user_fullname, $user_level)
    {
        $_SESSION['user_fullname'] = $user_fullname;
        $_SESSION['user_level'] = $user_level;
    }

    // Fungsi untuk menghapus session
    public function unsetSession()
    {
        session_unset();
        session_destroy();
    }

    // Fungsi untuk mengatur cookie
    public function setCookie($user_fullname, $user_level)
    {
        setcookie('user_fullname', $user_fullname, time() + 3600, '/');
        setcookie('user_level', $user_level, time() + 3600, '/');
    }

    // Fungsi untuk menghapus cookie
    public function unsetCookie()
    {
        setcookie('user_fullname', '', time() - 3600, '/');
        setcookie('user_level', '', time() - 3600, '/');
    }
}

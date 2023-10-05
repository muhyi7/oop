<?php
class crud extends koneksi
{
    public function lihatData()
    {
        $sql ="SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }
    public function insertData($email, $pass, $name)
    {
        try
        {
            $sql="INSERT INTO user_detail(user_email, user_password, user_fullname, level) VALUES (:email, :pass, :name, 2)";
            $result=$this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
    public function editData($id, $email, $pass, $name)
{
    try
    {
        $sql = "UPDATE user_detail SET user_email = :email, user_password = :pass, user_fullname = :name WHERE id = :id";
        $result = $this->koneksi->prepare($sql);
        $result->bindParam(":id", $id);
        $result->bindParam(":email", $email);
        $result->bindParam(":pass", $pass);
        $result->bindParam(":name", $name);
        $result->execute();
        return true;
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        return false;
    }
}

}
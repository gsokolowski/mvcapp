<?php


// user belongs to category
class User extends Model {

    public $id;
    public $category_id;
    public $name;
    public $nationality;
    public $age;

    protected $db;

    // you should setters and getters here for each property so yoo will not need to pass params through postUser()
    // you would be able to set them in controller and then get them here as $this->name, $this->nationality etc.

    public function getAllUsers() {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " select * from users ";
        //echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute(array());
        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
        //return json_encode($data);
    }

    public function getUserByName($name) {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = " select * from users where name like ?";
        echo $sql;
        $query = $this->db->prepare($sql);
        $query->execute(array($name));
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
        //return json_encode($data);
    }


    public function storeUser($category_id, $name, $nationality, $age) {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (category_id, name, nationality, age ) values(?, ?, ?, ?)";
        echo $sql;
        $query = $this->db->prepare($sql);
        return $query->execute(array($category_id, $name, $nationality, $age));

    }

    public function storeUserArray($data) {

        echo '<br />';
        echo '<br />';
        var_dump($data);
        echo '<br />';
        echo '<br />';

        echo sizeof($data);

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (category_id, name, nationality, age ) values(?, ?, ?, ?)";
        echo $sql;
        $query = $this->db->prepare($sql);

        foreach($data as $row) {
            $response = $query->execute(array($row['category_id'], $row['name'], $row['nationality'], $row['age']));
        }

        if($response) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($data) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from users where id = ?";
        $query = $this->db->prepare($sql);
        $query->execute(array($data['id']));

    }


    public function updateUser($data) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE users set category_id = ?, name = ?, nationality = ?, age = ? WHERE id = ?";
        var_dump($data);
        $query = $this->db->prepare($sql);
        $response = $query->execute(array($data['category_id'], $data['name'], $data['nationality'], $data['age'], $data['id']));


    }
}
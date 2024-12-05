<?php
require_once('connection.php');
class Role{
    private $role_id;
    private $role_name;

    public function __construct($role_id, $role_name){
        $this->role_id = $role_id;
        $this->role_name = $role_name;
    }

    public function getRoleId(){
        return $this->role_id;
    }
    public function getRoleName(){
        return $this->role_name;
    }

    // function to get all roles
    public static function getAllRoles(){
        $roleList = [];
        $db = DB::getInstance();
        $query = 'SELECT * FROM roles';
        $result = $db->query($query);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $role = new Role($row['role_id'], $row['role_name']);
                $roleList[] = $role;
            }
        }
        return $roleList;
    }

    // get role by id
    public static function getRoleById($role_id){
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM roles WHERE role_id = ?');
        $stmt->bind_param('i', $role_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $role = new Role($row['role_id'], $row['role_name']);
        return $role;
    }
}
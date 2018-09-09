<?php
require CORE_PATH . 'BaseModel.php';
class User extends BaseModel {
	public function login($email, $password) {
        $query = $this->db->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = :email");
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        $query = null;
        if(isset($user['id']) && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['loggedIn'] = true;
            return true;
        }
        else {
            return false;
        }
	}
    public function logout() {
        $_SESSION = array();
        session_destroy();
    }
}

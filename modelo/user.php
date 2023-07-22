<?php
require("modelo/bd.php");

class User extends bd{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->conexion()->prepare('SELECT * FROM usuarios WHERE nombres = :user AND clave = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->conexion()->prepare('SELECT * FROM usuarios WHERE nombres = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
}

?>
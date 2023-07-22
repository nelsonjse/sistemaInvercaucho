<?php
class bd {

    // DESARROLLO

	private $ip = "localhost";      
    private $bd = "invercauchos";
    private $usuario = "root";
    private $contrasena = "";

    // PRODUCION

    // private $ip = "localhost";
    // private $bd = "id20254606_invercauchos";
    // private $usuario = "id20254606_admin";
    // private $contrasena = "K&SMsxaa{ctknm11";
   
    function conexion(){
        try{
            $pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd."",$this->usuario,$this->contrasena);
            $pdo->exec("set names utf8");
            return $pdo;
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }    

        
    
}
    
?>






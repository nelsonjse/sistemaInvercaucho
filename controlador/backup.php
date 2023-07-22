<?php

require("vista/accesorios/vista.php");
require("vista/accesorios/error.php");
require("vista/accesorios/confirm.php");

function backup(){ 

    vista("Respaldos/backup", [
        "values" => "",
        "texto" => "",
    ]);



    // include("modelo/connet.php");    

    // $ruta=BACKUP_PATH;
    // if(is_dir($ruta)){
    //     if($aux=opendir($ruta)){
    //         while(($archivo = readdir($aux)) !== false){
    //             if($archivo!="."&&$archivo!=".."){
    //                 $nombrearchivo=str_replace(".sql", "", $archivo);
    //                 $nombrearchivo=str_replace("-", ":", $nombrearchivo);
    //                 $ruta_completa=$ruta.$archivo;
    //                 if(is_dir($ruta_completa)){
    //                 }else{ 
    //                     echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
    //                 }
    //             }
    //         }
    //         closedir($aux);
    //     }
    // }else{
    //     echo $ruta." No es ruta válida";
    // }
    
   }

function respaldar(){
    
include("modelo/connet.php");


$day=date("d");
$mont=date("m");
$year=date("Y");
$hora=date("H-i-s");
$fecha=$day.'_'.$mont.'_'.$year;
$DataBASE=$fecha."_(".$hora."_hrs).sql";
$tables=array();

$result=SGBD::sql('SHOW TABLES');

if($result){
    while($row=mysqli_fetch_row($result)){
       $tables[] = $row[0];
    }
    $sql='SET FOREIGN_KEY_CHECKS=0;'."\n\n";
    $sql.='CREATE DATABASE IF NOT EXISTS '.BD.";\n\n";
    $sql.='USE '.BD.";\n\n";;
    foreach($tables as $table){
        $result=SGBD::sql('SELECT * FROM '.$table);
        if($result){
            $numFields=mysqli_num_fields($result);
            $sql.='DROP TABLE IF EXISTS '.$table.';';
            $row2=mysqli_fetch_row(SGBD::sql('SHOW CREATE TABLE '.$table));
            $sql.="\n\n".$row2[1].";\n\n";
            for ($i=0; $i < $numFields; $i++){
                while($row=mysqli_fetch_row($result)){
                    $sql.='INSERT INTO '.$table.' VALUES(';
                    for($j=0; $j<$numFields; $j++){
                        $row[$j]=addslashes($row[$j]);
                        $row[$j]=str_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])){
                            $sql .= '"'.$row[$j].'"' ;
                        }
                        else{
                            $sql.= '""';
                        }
                        if ($j < ($numFields-1)){
                            $sql .= ',';
                        }
                    }
                    $sql.= ");\n";
                }
            }
            $sql.="\n\n\n";
        }else{
            $error=1;
        }
    }
    if($error==1){
        $mensaje = "errorCopia";
        error($mensaje);
        
    }else{
        chmod(BACKUP_PATH, 0777);
        $sql.='SET FOREIGN_KEY_CHECKS=1;';
        $handle=fopen(BACKUP_PATH.$DataBASE,'w+');
        if(fwrite($handle, $sql)){
            fclose($handle);
            $mensaje = "copia";
            confirmar($mensaje);
        }else{
            $mensaje = "errorCopia";
            error($mensaje);
        }
    }
}else{
    $mensaje = "errorCopia";
    error($mensaje);
}
return mysqli_free_result($result);

}

    function restaurar(){
        include("modelo/connet.php");
        
        $restorePoint=SGBD::limpiarCadena($_POST['restorePoint']);
        $sql=explode(";",file_get_contents($restorePoint));
        $totalErrors=0;
        set_time_limit (60);
        $con=mysqli_connect(SERVER, USER, PASS, BD);
        $con->query("SET FOREIGN_KEY_CHECKS=0");
        for($i = 0; $i < (count($sql)-1); $i++){
            if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
        }
        $con->query("SET FOREIGN_KEY_CHECKS=1");
        $con->close();
        if($totalErrors<=0){
            echo "Restauración completada con éxito";
        }else{
            echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
        }

        //////

        

    }

//    function respaldar(){
//     $db_host = 'localhost'; //Host del Servidor MySQL
// 	$db_name = 'invercauchos'; //Nombre de la Base de datos
// 	$db_user = 'root'; //Usuario de MySQL
// 	$db_pass = 'password'; //Password de Usuario MySQ

//     $pdo = new PDO("mysql:host=".$db_host.";dbname=".$db_name."",$db_user,$db_pass);
//             $pdo->exec("set names utf8");
            
	
// 	$fecha = date("Ymd-His"); //Obtenemos la fecha y hora para identificar el respaldo

// 	// Construimos el nombre de archivo SQL Ejemplo: mibase_20170101-081120.sql
// 	$salida_sql = 'vista/backup/'.$db_name.'_'.$fecha.'.sql'; 
	
// 	//Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
// 	$dump = "mysqldump --h$db_host -u$db_user -p$db_pass --opt $db_name > $salida_sql";
// 	system($dump, $output); //Ejecutamos el comando para respaldo
//    }

?>
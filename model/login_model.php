<?php
include_once 'connect_data.php';
include_once 'login.php';


class login_model extends login{
    private $link;
    public function OpenConnect() {
        $ConDat = new connect_data();
        try {
            $this->link=new mysqli($ConDat->host, $ConDat->userbbdd,$ConDat->passbbdd,$ConDat->ddbbname);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8");
    }
    public function CloseConnect() {
        mysqli_close($this->link);
    }
    
    //metodo para recuperar todos los usuarios
    public function setList() {
        session_start();
        $this->OpenConnect(); 
        $nombre=$this->nombre;
        $contrasena=$this->contrasena;
        $sql = "select * from usuarios 
        where nombre = '$nombre' and contrasena ='$contrasena'";
        $result = $this->link->query($sql);
        if (mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $_SESSION['nombreUser']=$nombre;
            $_SESSION['contrasenaUser']=$contrasena;
            $_SESSION['permisos']=$row['permisos'];
            $_SESSION['id']=$row['id'];
            
            return true;
        }else{            
            return false; 
        }
        mysqli_free_result($result);
        $this->CloseConnect();
       // return $respuesta;
    }

    public function registrar() {
        $this->OpenConnect();
        $nombre=$this->nombre;
        $contrasena=$this->contrasena;

        $sql = "select * from usuarios 
        where nombre = '$nombre' ";
        $result = $this->link->query($sql);
        if (mysqli_num_rows($result)==1) {
            return false;
        }else{      
            $sql2 = "insert into usuarios (nombre,contrasena,permisos)                        
            values('$nombre','$contrasena',0);";
            $this->link->query($sql2);
            if ($this->link->affected_rows==1) {
                    return "el usuario se ha insertado con exito. Num de inserts: ".$this->link->affected_rows;
            }
            else {
                return"Fallo al registro nuevo : (".$this->link->errno.")".$this->link->error;
                
            }
            return true; 
        }  
        $this->CloseConnect();
    }
}

?>
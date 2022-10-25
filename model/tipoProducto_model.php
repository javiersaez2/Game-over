<?php
include_once 'connect_data.php';
include_once 'tipoProducto.php';

class tipoProducto_model extends tipoProducto {
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
    
    //metodo para recuperar todos los tipo Producto
    public function setList() {
        $this->OpenConnect(); 
        $sql = "select * from tipo_producto";
        $result = $this->link->query($sql);
        $list = array(); 
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new = new tipoProducto();
            $new ->id=$row['id'];
            $new ->nombre=$row['nombre'];
            array_push($list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }
    
    
}

?>
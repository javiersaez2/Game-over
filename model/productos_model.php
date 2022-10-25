<?php
include_once 'connect_data.php';
include_once 'productos.php';
include_once 'textos.php';

class productos_model extends productos{
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
    
    //metodo para recuperar todos los productos
    public function setList() {
        $this->OpenConnect(); 
        $sql = "select * from productos p 
        join textos t 
        on t.id_producto = p.id
        and t.idioma = 1;";
        $result = $this->link->query($sql);
        $list = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new = new productos();
            $new ->id=$row['id'];
            $new ->stock=$row['stock'];
            $new ->precio=$row['precio'];
            $new ->foto=$row['foto'];
            $new ->valoracion=$row['valoracion'];
            $new ->idTipo=$row['id_tipo'];
            $new ->titulo=$row['titulo'];
            array_push($list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }

    //metodo para recuperar todos los productos con titulo y idioma 1
    public function setListId() {
        $this->OpenConnect(); 
        $sql = "select * 
        from productos p 
        join textos t 
        on t.id_producto = p.id
        and t.idioma = 1;";
        $result = $this->link->query($sql);
        $list = array();   
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $new = new productos();
            $new ->id=$row['id'];
            $new ->stock=$row['stock'];
            $new ->precio=$row['precio'];
            $new ->foto=$row['foto'];
            $new ->valoracion=$row['valoracion'];
            $new ->idTipo=$row['id_tipo'];
            $new ->titulo=$row['titulo'];
           
            array_push($list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }
     
}

?>
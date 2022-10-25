<?php
include_once 'connect_data.php';
include_once 'idiomas.php';

class idiomas_model extends idiomas {
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
    
    //metodo para recuperar todos los idiomas
    public function setList() {
        $this->OpenConnect(); 
        $sql = "select * from idiomas";
        $result = $this->link->query($sql);
        $list = array();
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $new = new idiomas();
            $new ->id=$row['id'];
            $new ->idioma=$row['idioma'];
            array_push($list, $new);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $list;
    }   
}

?>
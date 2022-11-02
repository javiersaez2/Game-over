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
    public function setList($id_idioma = "1") {
        $this->OpenConnect(); 
        $sql = "select p.* , t.titulo from productos p 
        join textos t 
        on t.id_producto = p.id
        and t.idioma = $id_idioma;";
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
    public function setListId($id_idioma = "1") {
        $this->OpenConnect(); 
        $sql = "select p.* , t.titulo
        from productos p 
        join textos t 
        on t.id_producto = p.id
        and t.idioma = $id_idioma;";
        
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
     //metodo para Delete
    public function delete() {
        $this->OpenConnect();
        $id = $this->id;
       
        $sql = "delete productos, textos
                FROM productos
                JOIN textos 
                ON productos.id = textos.id_producto
                WHERE productos.id = $id";
        
        $this->link->query($sql);
        
        if ($this->link->affected_rows==1) {
            return true;
        }
        else {
            return false;
            
        }
        $this->CloseConnect();
    }

    public function getProduct($id, $id_idioma = 1) {
        $this->OpenConnect(); 
        $sql = "select p.id as 'id_producto', p.stock, p.precio, p.foto, p.valoracion, 
        p.id_tipo, t.descripcion, t.titulo
        from productos p, textos t
        WHERE t.id_producto = p.id
        and t.idioma = $id_idioma
        and p.id = $id";


        $result = $this->link->query($sql);
        $list = array();   
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
           //$new = new productos();
            $this ->id=$row['id_producto'];
            $this ->stock=$row['stock'];
            $this ->precio=$row['precio'];
            $this ->foto=$row['foto'];
            $this ->valoracion=$row['valoracion'];
            $this ->idTipo=$row['id_tipo'];
            //$this ->tipo=$row['tipo'];
            $this ->titulo=$row['titulo'];
            $this ->descripcion=$row['descripcion'];
           
            array_push($list, $this);
        
        mysqli_free_result($result);
        $this->CloseConnect();
        return $this;
    }

    public function update_producto() {
        $this->OpenConnect();

        $sql = "UPDATE productos SET stock = '$this->stock', precio = '$this->precio', foto = '$this->foto', valoracion = '$this->valoracion', id_tipo = '$this->idTipo' WHERE id = '$this->id'";

        $this->link->query($sql);
        $result = FALSE;

        if ($this->link->affected_rows!=-1) {
            $sql_textos = "UPDATE textos SET titulo = '$this->titulo', descripcion = '$this->descripcion' WHERE id_producto = '$this->id' AND idioma = '1'";
    
            $this->link->query($sql_textos);
            $result = $sql_textos;
            if ($this->link->affected_rows!=-1) {
                $result = TRUE;
            }
        }
        $this->CloseConnect();

        return $result;
    }

    public function insert() {
        $this->OpenConnect();
        $titulo = $this->titulo;
        $stock=$this->stock;
        $precio=$this->precio;
        $foto=$this->foto;
        $valoracion=$this->valoracion;
        $descripcion=$this->descripcion;
        $tipoProducto=$this->tipoProducto;
        
        $sql1 = "insert into productos (stock,precio,foto,valoracion,id_tipo)                        
                values($stock,$precio,'$foto',$valoracion,$tipoProducto);";

       
        
        $this->link->query($sql1);
        

        
        if ($this->link->affected_rows==1) {
            $id = $this->link->insert_id;

            $sql2 = "insert into textos (titulo,descripcion,id_producto,idioma)                    
            values('$titulo','$descripcion',$id,1);";
    
            $this->link->query($sql2);
            if ($this->link->affected_rows==1) {
                return "el producto se ha insertado con exito. Num de inserts: ".$this->link->affected_rows;
            }
        }
        else {
            return"Fallo al insertar el producto nuevo : (".$this->link->errno.")".$this->link->error;
            
        }


        
        $this->CloseConnect();
    }
    
}
    


?>
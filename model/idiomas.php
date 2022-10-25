<?php
class idiomas{
    
    public $id;
    public $idioma;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idioma
     */ 
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set the value of idioma
     *
     * @return  self
     */ 
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }
}

?>
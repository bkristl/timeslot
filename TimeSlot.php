<?php 
    
class TimeSlot {
    
    public $offset,
    $length, $id, $free;
    
    public function __construct($offset,$length, $free=false){
        $this->offset = $offset;
        $this->length = $length;
        $this->free = $free;
    }
    
    /**
     * @param mixed $free
     */
    public function setBusy()
    {
        $this->free = false;
        return $this;
    }
    
    /**
     * @param mixed $free
     */
    public function setFree()
    {
        $this->free = true;
        return $this;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }
    
    
}

?>
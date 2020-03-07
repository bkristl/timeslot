<?php 

class TimeSlotStorage{
    public $storage = [];
    public $free = [];
    public $min = null;
    public $max = null;
    public function __construct ($min,$max){
        $this->min = $min;
        $this->max = $max;
    }
    public function addData($data){
        foreach($data as $timeslot){
            $this->add(new TimeSlot(...$timeslot));
        }
    }
    
    public function add(TimeSlot $item){
        $this->storage[] = $item;
        usort($this->storage, function ($a,$b) {
            return ($a->offset > ($b->offset + $b->length));
        });
        return $this;
    }
    
    public function getFree(){
        $this->free = [];
        $last = new TimeSlot(0,0);
        
        foreach($this->storage as $next){
            $offset = $last->offset + $last->length;
            $length = $next->offset - ($last->offset + $last->length);

            if($length > 0){ $this->free[] = new TimeSlot($offset,$length, true); }
            
            $last->offset = $next->offset;
            $last->length = $next->length;
        }
        
        $offset = $last->offset + $last->length;
        if($offset <= $this->max){
            $length = $this->max - $offset + 1 ;
            
            if($length > 0){ $this->free[] = new TimeSlot($offset,$length, true); }
        }
        
        return $this->free;
    }
    
    public function getBusy(){
        return $this->storage;
    }
    
    public function getBusyLength(){
        return $this->_getLength($this->storage);
    }
    
    public function getFreeLength(): int{
        return $this->_getLength($this->free);
    }
    
    private function _getLength(array $data):int{
        $length = 0;
        foreach($data as $timeslot){
            $length += $timeslot->length;
        }
        return $length;
    }
}

?>
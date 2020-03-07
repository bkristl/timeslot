<?php 
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

    function debug($data){
        echo json_encode($data).PHP_EOL;
    }

    function debugTimeSlotStorage($data, $nl=false){
        
        foreach($data as $timeslot){
            echo $timeslot->offset.','.$timeslot->length.' ';
        }
        echo ($nl)?PHP_EOL.PHP_EOL:PHP_EOL;
    }

?>
<?php 

include('bootstrap.php');

$A = new TimeSlotStorage(0,18);
$A->addData([[0,1],[3,2],[7,3],[11,1],[14,1],[18,1]]);

$B = new TimeSlotStorage(0,18);
$B->addData([[1,3],[6,1],[8,2],[12,1],[14,4]]);

$C = new TimeSlotStorage(0,18);
$C->addData([[0,5],[7,3],[11,5],[17,2]]);


debugTimeSlotStorage($A->getBusy());
debug($A->getBusyLength(),true);
debugTimeSlotStorage($A->getFree(),true);
debug($A->getFreeLength(),true);

debugTimeSlotStorage($B->getBusy());
debugTimeSlotStorage($B->getFree(),true);

debugTimeSlotStorage($C->getBusy());
debugTimeSlotStorage($C->getFree(),true);
?>
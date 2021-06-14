<?php

$fintime=strtotime('2021-07-03 00:00:00');
$now=strtotime(date('Y-m-d H:m:s'));
$diff=$fintime-$now;

//echo date('d:H:m:s',$diff);

//while ($diff>0){
//    echo date('d:H:m:s',$diff);
//}
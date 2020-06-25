<?php
// $encrypt = new examsubjectcontroller();
// $e = $encrypt->my_encrypt($data, $key);


// Use preg_split() function
$string = "10####4####SOAD####2019-07-18";
$str_arr = preg_split ("/\####/", $string);
print_r($str_arr);

// use of explode
$string = "10####4####SOAD####2019-07-18";
$str_arr = explode ("####", $string);
$a=print_r($str_arr);
// echo $a;
?>

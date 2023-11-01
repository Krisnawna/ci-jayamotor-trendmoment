<?php 
function format_uang($nil = 0, $matauang = 'Rp')
{
    $nil = $nil == '' ? 0 : $nil;
    return "$matauang " . number_format($nil, 0, ',', '.');
}
 ?>
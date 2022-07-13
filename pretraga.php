<?php

$id = $_GET['idKategorije'];
include("db.php");
$db= new MysqliDb('localhost','root','','artists');

$izvodjac=$db->rawQuery('select * from izvodjac i join zanr d on i.idZanra = d.idZanra join kategorija t on i.idKategorije= t.idKategorije where t.idKategorije = '.$id);




 ?>
<?php
include ("db.php");
$db= new MysqliDb('localhost','root','','artists');

$id=$_GET['id'];
$db->where('idIzvodjaca',$id);
$db->delete('izvodjac');
header("Location:index.php");
 ?>
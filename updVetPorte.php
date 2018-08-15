<?php
session_start();
require_once ("class/db.class.php");
require_once ("lib/fonctions.php");
$db = new Db();

$db->query("UPDATE vetement SET porte = (porte+1)%2 where id = ".$_POST['id'].";");

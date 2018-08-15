<?php

session_start();
require_once ("class/db.class.php");
require_once ("lib/fonctions.php");
travaux();
$db = new Db();

$db->query("SELECT * FROM vetement order by id;");
$tab = $db->fetch_array();

$imgs ='';
foreach ($tab as $k => $v) {
	$imgs .= '<img src="'.$v['img_path'].'" id="vet'.$v['id'].'" style="position:absolute;top:'.$v['y'].'px;left:'.$v['x'].'px;'.(($v['porte']==1)?'display:block;':'display:none;').'"   />';
}
echo $imgs;?>

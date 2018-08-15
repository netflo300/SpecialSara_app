<?php
session_start();
require_once ("class/db.class.php");
require_once ("lib/fonctions.php");
travaux();
$db = new Db();
entete("Accueil");
include ("header.php");




$db->query("SELECT * FROM vetement order by id;");
$tab = $db->fetch_array();

$imgs ='';
foreach ($tab as $k => $v) {
	$imgs .= '<img src="'.$v['img_path'].'" id="vet'.$v['id'].'" style="position:absolute;top:'.$v['y'].'px;left:'.$v['x'].'px;'.(($v['porte']==1)?'display:block;':'display:none;').'"   />';
}


?>
<div id="content">
</div>
<script type="text/javascript">
function display_img(id) {
	if(document.getElementById("vet"+id).style.display =='none') {
		document.getElementById("vet"+id).style.display = '';
	} else {
		document.getElementById("vet"+id).style.display = 'none';
	}
}


var counter = 10;
var intervalId = null;
function finish() {
  clearInterval(intervalId);
}
function bip() {
        auto_reload();
}
function start(){
  intervalId = setInterval(bip, 1000);
}	

start();
</script>
<?php 
footer();
?>

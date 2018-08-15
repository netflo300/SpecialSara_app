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
echo'<table>';
foreach ($tab as $k => $v) {
	echo'<tr><td><input type="checkbox" onclick="display_img('.$v['id'].');" '.(($v['porte']==1)?'checked="checked"':'').'  id="check_'.$v['id'].'" ></td><td><label for="check_'.$v['id'].'">'.$v['libelle'].'</label></td></tr>';
	$imgs .= '<img src="'.$v['img_path'].'" id="vet'.$v['id'].'" style="position:absolute;top:'.$v['y'].'px;left:'.$v['x'].'px;'.(($v['porte']==1)?'display:block;':'display:none;').'"   />';
}
echo'</table>';


?>
<div id="content">
<?php echo $imgs;?>
</div>
<script type="text/javascript">
function display_img(id) {
	if(document.getElementById("vet"+id).style.display =='none') {
		document.getElementById("vet"+id).style.display = '';
	} else {
		document.getElementById("vet"+id).style.display = 'none';
	}
	ajax("updVetPorte.php","id="+id,"");
}


</script>
<?php 
footer();
?>

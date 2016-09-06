<h1>Скрипт сбора данных</h1>
<?
require_once 'php/cdb.php';

$work_id = $_GET['work_id']; //ID записи в таблице
//print $do.$montaj_nik.$mat_name.$creator_nik.$works_id;
conndb();
$sql="DELETE FROM `mur_ntv`.`montaj` WHERE `montaj`.`id` = '$work_id'"; 
mysqli_query($dbc,$sql);
mysqli_close($dbc);
unset($_GET);

header("Location: ".$_SERVER['SERVER_NAME']."/video");

?>
<h1><a href="<? echo $_SERVER['SERVER_NAME']."/video"?>">Запись Удалена</a></h1>
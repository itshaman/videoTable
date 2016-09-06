<h1>Скрипт сбора данных</h1>
<?
require_once 'php/cdb.php';

//собираем данныйе формы
$do = $_POST['do'];
$montaj_nik = $_POST['montaj_nik']; //id монтажера
$mat_name = $_POST['mat_name']; //Имя сюжета
$creator_nik = $_POST['creator_nik']; // id журналиста
$works_id = $_POST['works_id']; //ID записи в таблице
//print $do.$montaj_nik.$mat_name.$creator_nik.$works_id;
conndb();
if (isset($do) and $do=='stage1' and isset($creator_nik) and $creator_nik!='0'){
	//Заносим данные первой ступени Автор, Материал, Дата
	//print $do;
	if(isset($montaj_nik) and $montaj_nik!='0'){
		print $montaj_nik.$creator_nik;
		$sql="INSERT INTO `mur_ntv`.`montaj` (`id`, `montaj_nik`, `jurn_nik`, `mat_name`, `date_mat`) VALUES (NULL, '$montaj_nik', '$creator_nik', '$mat_name', NOW()) ";
	}else{
	$sql="INSERT INTO `mur_ntv`.`montaj` (`jurn_nik`, `mat_name`, `date_mat`) VALUES ('$creator_nik', '$mat_name',    NOW()) ";
	
	}
}
if (isset($do) and $do=='stage2' and $montaj_nik!='0'){
	//Заносим данные второй ступени Исполнитель
	//print $do;
	$sql = "UPDATE `mur_ntv`.`montaj` SET `montaj_nik` = '$montaj_nik', `mat_name` = '$mat_name' WHERE `id` = '$works_id'";
}
if (isset($do) and $do=='stage3'){
	//Монтажер приступил к работе заносим время старта
	//print $do;
	$sql = "UPDATE `mur_ntv`.`montaj` SET `date_start` = NOW(), `mat_name` = '$mat_name' WHERE `id` = '$works_id'";
}
if (isset($do) and $do=='stage4'){
	//Монтажер ЗАКОНЧИЛ монтаж к работе заносим время сокончания
	print $do;
	$sql = "UPDATE `mur_ntv`.`montaj` SET `date_end` = NOW(), `mat_name` = '$mat_name' WHERE `id` = '$works_id'";
}

print $do;
	
	
//print $do;
 conndb();
if ($do=='insert'){
$sql = "INSERT INTO `mur_ntv`.`montaj` (`id`, `montaj_nik`, `jurn_nik`, `mat_name`, `date_start`, `date_end`) VALUES (NULL, '$montaj_nik', '$creator_nik', '$mat_name', NOW(), NULL)";
	print"Работа добавлена. Постановщик".$creator_nik." Взялся делать ".$montaj_nik." Наименование - ".$mat_name.".";
}

if ($do=='update'){
	
	$sql = "UPDATE `mur_ntv`.`montaj` SET `date_end` = NOW() WHERE `id` = '$works_id'";
	print"Работа завершена";
} 
mysqli_query($dbc,$sql);
mysqli_close($dbc);
unset($_POST);
header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
<h1><a href="<? echo $_SERVER['SERVER_NAME']."/video"?>">Запись Добавлена</a></h1>
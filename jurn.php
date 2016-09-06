<?
require_once 'php/cdb.php';
require_once 'php/head.php';
?>
<div id="video">
<h1><a href='/video/index.php'><< На главную >></a></h1>
<?
$who = $_GET['who'];
conndb();
$sql = "SELECT * FROM `montaj` WHERE montaj_nik='$who' OR jurn_nik='$who' ORDER BY `id` DESC";
//$sql = "SELECT montaj.id, montaj_id, jurn_id, nik, mat_name, date_start, date_end FROM `montaj`, `users` WHERE montaj.montaj_id=users.id ORDER BY `montaj`.`id` DESC";
$result = mysqli_query($dbc,$sql);
echo "<h2>Сюжеты $who</h2>";
while($works = mysqli_fetch_array($result)) {
	//Выводим дату удобоваримо
		$time_mat = strtotime($works['date_mat']);
		$mnt_mat_d = date("d.m.Y", $time_mat);
		$mnt_mat_h = date ("H:i",$time_mat);
		$time_st = strtotime($works['date_start']);
		$mnt_st_d = date("d.m.Y", $time_st);
		$mnt_st_h = date ("H:i",$time_st);
		$time_en = strtotime($works['date_end']);
		$mnt_en_d = date("d.m.Y", $time_en);
		$mnt_en_h = date ("H:i",$time_en);
print("
			<div class='event stage4'>
					<form id='update_work_".$works['id']."' method='post' action='insert_work.php'>
						<input form='update_work_".$works['id']."' type='hidden' value='".$works['id']."' name='works_id'>
						<input form='update_work_".$works['id']."' type='hidden' name='do' value='stage4'>
					<div class='date'>
						<p class='small_red'>".$mnt_st_d."</p><p>".$mnt_st_h."</p>
						<p class='small_green'>".$mnt_en_d."</p><p>".$mnt_en_h."</p>
					</div>
			<div class='event_info'>
				<h4>Автор <a href='jurn.php/?who=".$works['jurn_nik']."'>".$works['jurn_nik']."</a> сдал монтажный план ".$mnt_mat_d." ".$mnt_mat_h."</h4> 
				<h2>".$works['mat_name']."</h2>	
				<h4 style='color:red'><a href='#'>".$works['montaj_nik']."</a></h4>
			</div>
			<div class='act'>
				<img src='/video/img/finish.png' width='50	' />
			<div class='clear'></div>
			</div>
					</form>
			</div>
			");
}




?>
</div>
<?
require_once 'php/footer.php';
?>
<?
conndb();
$sql = "SELECT * FROM `montaj` WHERE `date_end` is NOT NULL ORDER BY `date_end` DESC";
//$sql = "SELECT montaj.id, montaj_id, jurn_id, nik, mat_name, date_start, date_end FROM `montaj`, `users` WHERE montaj.montaj_id=users.id ORDER BY `montaj`.`id` DESC";
$result = mysqli_query($dbc,$sql);
echo "<h2>Готовые материалы</h2>";

?>
<?
while($works = mysqli_fetch_array($result)) {
		$time_mat = strtotime($works['date_mat']);
		$mnt_mat_d = date("d.m.Y", $time_mat);
		$mnt_mat_h = date ("H:i",$time_mat);
		
		$time_st = strtotime($works['date_start']);
		$mnt_st_d = date("d.m.Y", $time_st);
		$mnt_st_h = date ("H:i",$time_st);
		
		$time_en = strtotime($works['date_end']);
		$mnt_en_d = date("d.m.Y", $time_en);
		$mnt_en_h = date ("H:i",$time_en);
if($works['date_start']!=NULL and $works['date_end']!=NULL and !empty($works['montaj_nik'])){
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
		<h2><input readonly='readonly' form='update_work_".$works['id']."' name='mat_name' value='".$works['mat_name']."' /></h2>

		<h4 style='color:red'><a href='jurn.php/?who=".$works['montaj_nik']."'>".$works['montaj_nik']."</a></h4>
		</div>
		<div class='act'>
			<img src='/video/img/finish.png' width='52' height='52' />
			<a href=\"edit_work_form.php?work_id=".$works['id']."\"><img width=24px src='/video/img/edit.gif' /></a>
		<div class='clear'></div>
		</div>
		</form>
		</div>
			");
}

	//print".";
	}
	
	//print("<div class='clear' />"); 
?>



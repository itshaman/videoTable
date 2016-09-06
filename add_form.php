<h3><a href="#" id="add_wlink">Добавить запись</a></h3>
<form id="add_work" method="post" action="insert_work.php">
<input type='hidden' name='do' value='stage1'>
		<label for="creator_nik">Автор материала:</label>
			<?
					$select_cr = "<select name='creator_nik' id='creator_nik'><option value='0'></option>";
					conndb();
					//$sql = "SELECT nik FROM `users` WHERE `creator`=1 AND `worknow`='1' ORDER BY `id` ASC ";
					$sql = "SELECT nik FROM `users` WHERE `func_id`=2 AND `worknow`='1' ORDER BY `id` ASC ";
					$result = mysqli_query($dbc,$sql);
					while($user = mysqli_fetch_array($result)) {
						$select_cr.="<option value='".$user['nik']."'>".$user['nik']."</option>";
					}
					$select_cr.="</select>";
					print $select_cr;
			?>
			<label for="creator_nik">Монтажер</label>
			<?
					$select_mnj = "<select name='montaj_nik' id='montaj_nik'><option value='0'></option>";
					//print $select_mnj;
					conndb();
					//$sql = "SELECT nik FROM `users` WHERE `workas` LIKE 'Видеоинженер' AND `worknow`='1' ORDER BY `id` ASC ";
					$sql = "SELECT nik FROM `users` WHERE `func_id`=3 AND `worknow`='1' ORDER BY `id` ASC ";
					$result = mysqli_query($dbc,$sql);
					while($user = mysqli_fetch_array($result)) {
										$select_mnj.="<option value='".$user['nik']."'>".$user['nik']."</option>";
					}
					$select_mnj.="</select>";
					print $select_mnj;
			?>
		<input type='text' placeholder="Наименование сюжета" name="mat_name" />
		<input type="submit" value="Старт" /> 
</form>
<hr />
<?
//echo $select;
?>



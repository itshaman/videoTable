<?php 
require_once 'php/cdb.php';
require_once 'php/head.php';
conndb();
//$work_id = '726';

conndb();
if(isset($_GET['work_id'])) $work_id = $_GET['work_id'];
$sql = "SELECT * FROM `montaj` WHERE `id`= '$work_id';";
$result = mysqli_query($dbc,$sql);
$vid_info = mysqli_fetch_assoc($result);
echo "<pre>";
print_r ($vid_info); //Вывод инфы для разработки
mysqli_close($dbc);
echo "</pre>";
?>
<h2>Редактор Материала № <?php echo $work_id; ?></h2>
<form id="edit_work" method="post" action="update_work.php">
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
			<?
					conndb();
					$sql = "SELECT mat_name FROM `montaj` WHERE `id`= '$work_id';";
					$result = mysqli_query($dbc,$sql);
					$mat_name = mysqli_fetch_assoc($result);
					print_r ($mat_name);
					?>
		<input type='text' value="<?php echo "$mat_name";?>" name="mat_name" />
		<input type="submit" value="Старт" /> 
</form>

<form id="delete_work" method="GET" action="delete_work.php">
<input type="hidden" name="work_id" value="<?php echo $work_id; ?>" />
<input style="font-size:40px; background:red; border-radius:15px; padding:10px; margin:20px auto; "type="submit" value="УДАЛИТЬ" />
</form>
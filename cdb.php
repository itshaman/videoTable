<?
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'SoS911MuRn+v');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'mur_ntv');
function conndb(){
	global $dbc;
	$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$dbc) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	
}
if (!mysqli_set_charset($dbc, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($dbc));
} else {
//    printf("Текущий набор символов: %s\n", mysqli_character_set_name($dbc));
	return $dbc;
}

  }

?>
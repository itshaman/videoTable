<?
require_once 'php/cdb.php';
require_once 'php/head.php';
?>
<div id="video">
	<h1><a href="/video">Монитор Активности Отдела Видеомонтажа</a></h1>
	<? 
	require_once 'add_form.php';
	require_once 'see_nwork.php';
	require_once 'see_work.php';
	?>
</div>
<?
require_once 'php/footer.php';
?>
<script>
$(function(){
	$('#add_wlink').click(function(){
		
		//alert ("Tada");
		$('form#add_work').css({"display":"block"});
	});
	$("#video input[readonly='readonly']").dblclick(function(){
		$(this).removeAttr('readonly');
		$(this).focus();
		//alert("Tada");
		//$('form#add_work').css({"display":"block"});
	});
	
});

</script>
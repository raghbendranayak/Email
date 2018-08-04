<?php
ob_start();
session_start();
if(!isset($_SESSION['username']))
header('Location: index.php');
//echo "<strong>Well Come :".$_SESSION['username']."</strong>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
	var BASE_PATH="<?php echo BASE_DOMAIN_ADMIN?>";
</script>
<?php include('include/inc_metadata.php')?>
<?php include('include/config.php')?>
<?php include("include/inc_start_session.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("includes/dbconnection.php");
	$query =mysqli_query($con,"SELECT * FROM tblservices WHERE sid = '" . $_POST["townid"] . "'");
?>
	<option value="">Select Service</option>
<?php
	while($rs=mysqli_fetch_assoc($query)) {
?>
	<option value="<?php echo $rs["ID"];?>"><?php echo $rs["ServiceName"]; ?></option>
<?php

}
?>
</body>
</html>
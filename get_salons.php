<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("includes/dbconnection.php");
	$query =mysqli_query($con,"SELECT * FROM tblsalons WHERE did = '" . $_POST["countryid"] . "'");
?>
	<option value="">Select Salon</option>
<?php
	while($rs=mysqli_fetch_assoc($query)) {
?>
	<option value="<?php echo $rs["id"];?>"><?php echo $rs["salon"]; ?></option>
<?php

}
?>
</body>
</html>
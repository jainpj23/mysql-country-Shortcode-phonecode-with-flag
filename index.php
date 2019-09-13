<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<table border="1">
	<tr>
		<th>Id</th>
		<th>Country Name</th>
		<th>Country Code</th>
		<th>Phone Code</th>
		<th>Flag</th>
	</tr>
<?php 
$sql = "SELECT * FROM country";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
	<td><?php echo $row["id"]; ?></td>
	<td><?php echo $row["country_name"]; ?></td>
	<td><?php echo $row["country_code"]; ?></td>
	<td><?php echo $row["phonecode"]; ?></td>

	<td>
        <?php $flag_name=strtolower($row["country_code"]).'.png'; ?>
		<img src="flags/<?php echo $flag_name; ?>" style="width: 50px;"></td>
</tr>
<?php
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>
</body>
</html>
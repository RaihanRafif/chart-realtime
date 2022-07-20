<?php
include("connection.php");
?>
<table class="table" id="myTable">
	<?php
	$query = mysqli_query($db, "SELECT * FROM cpu_temperature");
	while ($row = mysqli_fetch_array($query)) {

		$time = $row['time'];
		$temperature = $row['temperature'];
	?>
		<tbody style="display:none">
			<tr>
				<td><?php echo $time; ?></td>
				<td><?php echo $temperature; ?></td>
			</tr>
		</tbody>
	<?php 	} ?>
</table>
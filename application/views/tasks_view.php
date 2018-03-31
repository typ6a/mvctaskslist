<h3 align="center">ЗАДАЧИ</h3>
<p>
<table class="table">
<thead>
	<tr>
		<td>Задача</td>
		<td>Имя</td>
		<td>Email</td>
		<td>Статус</td>
	</tr>
</thead>
<tbody>
<?php
	foreach($data as $row)
	{
		if ($row['status'] == 'done') {
		 	$status = 'checked="checked"';
		}
		elseif ($row['status'] == 'do') {
		 	$status = '';
		 } 
		echo '
		<tr>
			<td>'.$row['Task'].'</td>
			<td>'.$row['UserName'].'</td>
			<td>'.$row['UserEmail'].'</td>
			<td><div class="form-check"><input class="form-check-input" type="checkbox" ' . $status . ' disabled></div></td>
		</tr>';
	}
	
?>

</table>
</p>


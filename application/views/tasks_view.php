<h3 align="center">ЗАДАЧИ</h3>
<p>
<table class="table">
<thead>
	<tr>
		<td>Задача</td>
		<td>Имя</td>
		<td>Email</td>
		<td>Дата создания</td>
		<td>Статус</td>
		<td>id</td>
	</tr>
</thead>
<tbody>
<?php
pre($data);
if ($data['status'] == 1) {
		 	$status = 'checked="checked"';
		}
		elseif ($data['status'] == 0) {
		 	$status = '';
		} 
echo '
		<tr>
			<td>'.$data['description'].'</td>
			<td>'.$data['username'].'</td>
			<td>'.$data['email'].'</td>
			<td>'.$data['created_at'].'</td>
			<td><div class="form-check"><input class="form-check-input" type="checkbox" ' . $status . ' disabled></div></td>
			<td>'.$data['id'].'</td>
		</tr>';
	
	
?>

</table>
</p>
<button type="button" class="btn btn-light"><a href="/tasks/add">Добавить</a></button>


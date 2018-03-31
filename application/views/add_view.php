<h3 align="center">CREATE NEW TASK</h3>
<form>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="username" class="form-control" id="" placeholder="Enter your name">
  </div>
  <div class="form-group">
    <label>Task</label>
    <textarea class="form-control" id="" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Picture upload</label>
    <input type="file" class="form-control-file" id="">
  </div>
  <button type="submit" class="btn btn-light"><a href="/">Preview</button>
  <button type="submit" class="btn btn-light"><a href="/">Submit</button>
</form>



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
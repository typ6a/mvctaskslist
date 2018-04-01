<h3 align="center">TASKS</h3>
<p>
<table class="table">
<thead>
	<tr>
		<td>Task</td>
		<td>Name</td>
		<td>Email</td>
		<td>Date</td>
		<td>Status</td>
		<td>id</td>
	</tr>
</thead>
<tbody>

<?php foreach ($data['tasks'] as $task) : ?>
	<tr>
		<td><?= $task['description'] ?></td>
		<td><? echo $task['username'] ?></td>
		<td><?= $task['email'] ?></td>
		<td><?= date('Y-m-d H:i:s', $task['created_at']) ?></td>
		<td><div class="form-check"><input class="form-check-input" type="checkbox" <?= ((int) $task['status'] === 1) ? 'checked' : '' ?> disabled></div></td>
		<td><?= $task['id'] ?></td>
	</tr>
<?php endforeach; ?>

	<tr>
		<td colspan="6">
			<?php $page = 1; while ($page <= $data['total_pages']) { ?>
				<a href="http://mvc.localhost/tasks/index/?page=<?= $page ?>"><span><?= $page ?></span>&nbsp;</a>
			<?php $page++; 
			} ?>
		</td>
	</tr>

</table>
</p>
<button type="button" class="btn btn-light"><a href="/tasks/add">Add task</a></button>


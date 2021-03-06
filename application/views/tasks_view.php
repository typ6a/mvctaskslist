<h3 align="center">TASKS</h3>
<p>
	<table class="table">
		<thead>
			<tr>
				<td>Picture</td>
				<td>Task</td>
				<td><span class="glyphicon glyphicon-sort"></span><a href="<?= base_url('tasks/index/?page=' . $data['current_page'] . '&sortby=username&sortdir=' . ($data['sortdir'] == 'asc' ? 'desc' : 'asc')); ?>"> Username</a></td>
				<td><span class="glyphicon glyphicon-sort"></span><a href="<?= base_url('tasks/index/?page=' . $data['current_page'] . '&sortby=email&sortdir=' . ($data['sortdir'] == 'asc' ? 'desc' : 'asc')); ?>"> Email</a></td>
				<td>Date</td>
				<td><span class="glyphicon glyphicon-sort"></span><a href="<?= base_url('tasks/index/?page=' . $data['current_page'] . '&sortby=status&sortdir=' . ($data['sortdir'] == 'asc' ? 'desc' : 'asc')); ?>"> Status</a></td>
				<td>id</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data['tasks'] as $task) : ?>
			<?php if(isAdmin()): ?>
			<form method="POST" action="<?= base_url('tasks/update') ?>">
				<input type="hidden" name="id" value="<?= $task['id'] ?>" />
				<?php endif; ?>
				<tr>
					<td>
						<?php if (!empty($task['filename'])): ?>
					<img src="/images/<?= $task['filename'] ?>" height="320" alt="noimage"></td>
					<?php else:?>
				<img src="/images/noimage.png" height="320" alt="noimage"></td>
				<?php endif; ?>
				<?php if(isAdmin()): ?>
				<td><input name="description" type="text" class="form-control" placeholder="Task" value="<?= $task['description'] ?>"></td>
				<?php else: ?>
				<td><?= $task['description'] ?></td>
				<?php endif; ?>
				<td><?= $task['username'] ?></td>
				<td><?= $task['email'] ?></td>
				<td><?= date('Y-m-d H:i:s', $task['created_at']) ?></td>
				<?php if(isAdmin()): ?>
				<td>
					<div class="form-check">
						<input class="form-check-input" name="status" type="checkbox" <?= ((int) $task['status'] === 1) ? 'checked' : '' ?>>
					</div>
				</td>
				<?php else: ?>
				<td><div class="form-check"><input class="form-check-input" type="checkbox" <?= ((int) $task['status'] === 1) ? 'checked' : '' ?> disabled></div></td>
				<?php endif; ?>
				<td><?= $task['id'] ?></td>
				<?php if(isAdmin()): ?>
				<td><input type="submit" value="Save"></td>
				<?php endif; ?>
			</tr>
			<?php if(isAdmin()): ?>
		</form>
		<?php endif; ?>
		<?php endforeach; ?>
		<tr>
			<td colspan="7">
				Pages:&nbsp;
				<?php $page = 1; while ($page <= $data['total_pages']) { ?>
				<?php if ($page != $data['current_page']) :?>
				<a href="<?= base_url('tasks/index/?page=' . $page . '&sortby=' . $data['sortby'] . '&sortdir=' . $data['sortdir']); ?>"><span><?= $page ?></span>&nbsp;</a>
				<?php else: ?>
				<span><?= $page ?></span>
				<?php endif; ?>
				<?php $page++; } ?>
			</td>
		</tr>
	</table>
	<button type="button" class="btn btn-light"><a href="/tasks/add">Add task</a></button>
</p>
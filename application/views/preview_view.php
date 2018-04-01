<?= pre(__DIR__)?>

<div class="card" style="width: 25rem;">
  <img class="card-img-top" src="..." alt="task picture">
  <div class="card-body">
    <h5 class="card-title">NEW TASK PREVIEW</h5>
    <p class="card-text">Name: <?= $data['name']?></p>
    <p class="card-text">Email: <?= $data['email']?></p>
    <p class="card-text">Task: <?= $data['description']?></p>
  <form method="POST" action="http://mvc.localhost/tasks/preview">
    <button type="submit" class="btn btn-light">Add</button>
  </form>
  </div>
</div>

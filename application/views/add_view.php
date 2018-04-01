<h3 align="center">CREATE NEW TASK</h3>
<?= pre(__DIR__)?>
<div>
<form method="POST" action="http://mvc.localhost/tasks/save">
  <div class="form-group">
    <label>Email</label>
    <input name="email" type="email" class="form-control" id="" placeholder="Enter email" />
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label>Username</label>
    <input name="username" type="username" class="form-control" id="" placeholder="Enter your name">
  </div>
  <div class="form-group">
    <label>Task</label>
    <textarea name="description" class="form-control" id="" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label>Picture upload</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input type="file" class="form-control-file" value="Send File" id="">
  </div>
  <input type="submit" value="Add">
</form>
  

<form method="POST" action="http://mvc.localhost/tasks/preview">
  <button type="submit" class="btn btn-light">Preview</button>
</form>
</div>
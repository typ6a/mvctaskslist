<h3 align="center">CREATE NEW TASK</h3>
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
    <textarea name="text" class="form-control" id="" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Picture upload</label>
    <input type="file" class="form-control-file" id="">
  </div>
  <button type="submit" class="btn btn-light"><a href="/">Preview</button>
  <input type="submit" value="">
</form>
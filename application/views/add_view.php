<h3 align="center">CREATE NEW TASK</h3>
<div>
    <form method="POST" action="http://mvc.localhost/tasks/save" enctype="multipart/form-data">
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control" id="" placeholder="Enter email" value="sadasd@asdd.asd" />
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input name="username" type="username" class="form-control" id="" placeholder="Enter your name" value="asdads">
        </div>
        <div class="form-group">
            <label>Task</label>
            <textarea name="description" class="form-control" id="" rows="3">asdasdsd</textarea>
        </div>
        <div class="form-group">
            <label>Picture upload</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" />
            <input type="file" name="image" class="form-control-file" value="Send File" id="uploadFiile" />
            <img id="preview_image" src="#" alt="your image" />
        </div>
        <button type="submit" class="btn btn-light" value="Add">Add</button>
    </form>
    
    <button class="btn btn-light" onclick="readURL();">Preview</button>
  
</div>

<script type="text/javascript">

    function readURL() {
        var input = $('#uploadFiile')[0];
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_image')
                .attr('src', e.target.result)
                .width(320);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
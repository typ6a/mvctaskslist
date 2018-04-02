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
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000000" id="uploadFiile" />
            <input type="file" name="image" class="form-control-file" value="Send File" id="">
            <img id="blah" src="#" alt="your image" />
        </div>
        <button type="submit" class="btn btn-light" value="Add">Add</button>
    </form>
    
    <button class="btn btn-light" onclick="readURL(this);">Preview</button>
  
</div>

<script type="text/javascript">
   function readURL() {

        $('#uploadFiile').change(function(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                  alert($('#blah').length);
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(240);
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
        
        $('#uploadFiile').trigger('change');


    }

</script>
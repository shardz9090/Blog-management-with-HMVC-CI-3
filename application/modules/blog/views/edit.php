<div class="container mt-5">
    <h2>Edit Blog</h2>
    <?php echo form_open_multipart('blog/Blogops/update') ?>
    <input type="hidden" name="bid" value="<?php echo $blog['bid']; ?>">
    <div class="form-group">
        <label for="b_title">Blog Title</label>
        <input type="text" class="form-control" id="b_title" name="b_title" value="<?php echo $blog['b_title']; ?>">
    </div>
    <div class="form-label-group">
        <select class="form-control" id="visibility" name="visibility">
            <option value="" disabled selected>Visibility</option>
            <option value="0">Public</option>
            <option value="1">Only Me</option>
        </select>

    </div>
    <div class="form-label-group">
        <label for="b_description">Your Blog</label>
        <input type="hidden" id="b_description" name="b_description">
        <div id="editor" style="height: 300px; border: 1px solid #ccc;"><?php echo $blog['b_description']; ?></div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 300,
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar_mode: 'floating',
        toolbar: 'undo redo | bold italic underline | bullist numlist | link image',
        setup: function(editor) {
            editor.on('change', function() {
                // Update the hidden input field with the content of the editor
                document.getElementById('b_description').value = editor.getContent();
            });
        }
    });
</script>
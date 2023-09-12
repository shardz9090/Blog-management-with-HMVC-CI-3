<!-- blog section -->
<div class="container-fluid overflow-hidden py-5 px-lg-0">
  <div class="container contact-page py-5 px-lg-0">
    <div class="row g-5 mx-lg-0">
      <div class="col-md-6 contact-form wow fadeIn" data-wow-delay="0.1s">
        <h1 class="mb-4">Post Your Blog Here</h1>
        <p class="mb-4"> Please fill the boxes accordingly.</p>
        <div class="bg-light p-3">
          <?php echo form_open_multipart('blog/Blogops/blog', array('id' => 'blogForm')); ?>
          <div class="row g-3">
            <div class="col-md-12">
              <div class="form-floating">
                <label for="b_title">Blog Title</label>
                <input type="text" class="form-control" name="b_title" id="b_title" placeholder="Title of blog">
              </div>
              <?php echo form_error('b_title'); ?></br>
            </div>
            <div class="col-md-12">
              <div class="form-label-group">
                <label for="b_image">Photo</label>
                <input type="file" id="b_image" name="b_image" class="form-control"></br>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <select class="form-control" id="visibility" name="visibility">
                  <option value="" disabled selected>Visibility</option>
                  <option value="0">Public</option>
                  <option value="1">Only Me</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-label-group">
                <label for="b_description">Your Blog</label>
                <input type="hidden" id="b_description" name="b_description">
                <div id="editor" style="height: 300px; border: 1px solid #ccc;"></div>
              </div>
              <?php echo form_error('b_description'); ?></br>
            </div>
            <div class="col-6">
              <button class="btn btn-primary w-100 py-3" type="submit">Submit blog</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- end blog section -->

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

<script>
  $(document).ready(function() {
    $('#blogForm').submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(response) {
          if (response.success) {
            Swal.fire({
              icon: "success",
              title: "Blog Posted!",
              text: response.message,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = "<?php echo base_url(); ?>";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Empty blocks.",
              text: response.message,
              confirmButtonColor: "#d33",
              confirmButtonText: "OK"
            });
          }
        }
      });
    });
  });
</script>
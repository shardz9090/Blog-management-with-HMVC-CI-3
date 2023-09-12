<div class="container mt-5">
    <h2>Manage Blogs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Blog Title</th>
                <th>Username</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($blogs as $blog) { ?>
                <tr>
                    <td><?php echo $blog->b_title; ?></td>
                    <td><?php echo $blog->uname; ?></td>
                    <td><a href="<?php echo base_url('edit_blog/' . $blog->bid); ?>">Edit</a></td>
                    <td><a href="<?php echo base_url('delete_blog/' . $blog->bid); ?>" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
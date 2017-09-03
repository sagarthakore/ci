<h2><?php echo $post['title']; ?></h2>
<span class="label label-default"><?php echo $post['created_at']; ?></span>

<hr>
<table width="100%">
    <tr>
        <td width="70%">
            <div class="post-body blog-content">
                <?php echo $post['body']; ?>
            </div>
        </td>
        <td width="30%">
            <div align="center"><img style="width: 200px; margin: 5px" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>"></div>
        </td>
    </tr>
</table>
<div  style="margin-bottom: 20px" align="center">
    <table>
        <tr>
            <td>
                <a class="btn btn-xs btn-default pull-left inline-block" style="margin-right: 5px;" href="<?php echo base_url();?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
            </td>
            <td>
                <?php echo form_open('/posts/delete/'.$post['id']); ?>
                <input type="submit" value="Delete" class="btn btn-xs btn-danger pull-right inline-block">
                </form>
            </td>
        </tr>
    </table>
</div>
<hr>
<h3>Add Comments</h3>
<div class="comments-form">
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div>
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div>
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div>
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<br>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
	


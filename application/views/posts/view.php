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
<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
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
<?php endif; ?>
<hr>
<div class="comments-area">
    <h3>Comments</h3>
    <?php if($comments) : ?>
        <?php foreach($comments as $comment) : ?>
            <div>
                <p><span class="text-primary"><strong><?php echo $comment['name']; ?></strong></span><br/><?php echo $comment['body']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="alert alert-warning">
            <p align="center">No Comments Entered</p>
        </div>
    <?php endif; ?>
</div>
<hr>
<h3>Add Comments</h3>
<?php echo validation_errors(); ?>
<div class="comments-form">
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<br>
	<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
	


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
            <div align="center"><img style="width: 200px; margin: 5px"
                                     src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
            </div>
        </td>
    </tr>
</table>
<?php if ($this->session->userdata('user_id') == $post['user_id']): ?>
    <div style="margin-bottom: 20px" align="center">
        <table>
            <tr>
                <td>
                    <a class="btn btn-xs btn-default pull-left inline-block" style="margin-right: 5px;"
                       href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
                </td>
                <td>
                    <?php echo form_open('/posts/delete/' . $post['id']); ?>
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
    <?php if ($comments) : ?>
        <?php foreach ($comments as $comment) : ?>
            <div class="comment-block">
                <div class="row">
                    <div class="col-md-10">
                        <span class="text-primary"><strong><?php echo $comment['name']; ?></strong></span>
                        <br/><?php echo $comment['body']; ?>
                    </div>
                    <div class="col-md-2">
                        <?php if ($this->session->userdata('email') == $comment['email']): ?>
                            <?php echo form_open('/comments/delete/' . $comment['id']); ?>
                            <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
                            <input type="submit" value="Delete" class="btn btn-xs btn-danger">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
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
<?php if ($this->session->userdata('logged_in')): ?>
    <?php echo validation_errors(); ?>
    <div class="comments-form">
        <?php echo form_open('comments/create/' . $post['id']); ?>
        <div class="form-group">
            <textarea name="body" class="form-control" placeholder="Enter Comments"></textarea>
        </div>
        <input type="hidden" name="name" value="<?php echo $this->session->userdata('name') ?>">
        <input type="hidden" name="email" value="<?php echo $this->session->userdata('email') ?>">
        <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
        <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
<?php else : ?>
    <div class="comments-form-loggedout">
        <p class="alert alert-warning" align="center">You must be signed in to comment. Click <a class="alert-link" href="<?php echo base_url(); ?>users/login">here</a> to sign in.</p>
    </div>
<?php endif; ?>


	


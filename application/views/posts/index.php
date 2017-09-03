<h2><?= $title ?></h2>
<hr>
<?php foreach($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<div class="row">
		<div class="col-md-2">
		<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" class="post-thumb thumbnail">
		</div>
		<div class="col-md-10">
			<span class="label label-default"><?php echo $post['created_at']; ?></span>
			<span class="label label-info"><strong><?php echo $post['name']; ?></strong></span><br />
			<div class="preview-body"><?php echo word_limiter($post['body'], 70); ?></div>
			<div><a class="" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></div>
		</div>
	</div>
	<hr>
<?php endforeach;?>

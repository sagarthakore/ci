<html>
	<head>
		<title>ci</title>
		<link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">
	    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css"> -->
	    <script src="http://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    </head>
		<body>
		<nav class = "navbar navbar-default">
			<div class = "container">
				<div class = "navbar-header">
					<a class = "navbar-brand" href="<?php echo base_url(); ?>">ci</a>
				</div>
				<div id="navbar">
					<ul class = "nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url(); ?>about">About</a></li>
                        <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
                        <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url(); ?>posts/create">Create Post</a>
					</li>
                        <li>
                            <a href="<?php echo base_url(); ?>categories/create">Create Category</a>
                        </li>
					</ul>
				</div>
			</div>
		</nav>

		<div class = "container">
<html>
<head>
    <title>ci</title>
    <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.css"> -->
    <script src="http://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">ci</a>
        </div>
        <div id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url(); ?>about">About</a></li>
                <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
                <?php if($this->session->userdata('admin')) : ?>
                <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php if(!$this->session->userdata('logged_in')): ?>
                    <li>
                        <a href="<?php echo base_url(); ?>users/login">Login</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>users/register">Register</a>
                    </li>

                <?php endif; ?>
                <?php if($this->session->userdata('logged_in')): ?>
                    <li>
                        <a href="<?php echo base_url(); ?>posts/create">Create Post</a>
                    </li>
<!--                    <li>-->
<!--                        <a href="--><?php //echo base_url(); ?><!--categories/create">Create Category</a>-->
<!--                    </li>-->
                    <li>
                        <a href="<?php echo base_url(); ?>users/logout">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <!-- Flash Messages -->
    <div class="row">
        <div class="flash-messages col-md-4 col-md-offset-4">
            <?php if($this->session->flashdata('user_registered')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('user_registered').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('post_created')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('post_created').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('post_updated')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('post_updated').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('category_created')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('category_created').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('category_deleted')): ?>
                <?php echo '<p class="alert alert-danger" align="center">'.$this->session->flashdata('category_deleted').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('post_deleted')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('post_deleted').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('login_failed')): ?>
                <?php echo '<p class="alert alert-danger" align="center">'.$this->session->flashdata('login_failed').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('user_loggedin')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
            <?php endif; ?>
            <?php if($this->session->flashdata('user_loggedout')): ?>
                <?php echo '<p class="alert alert-success" align="center">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
            <?php endif; ?>
        </div>
    </div>


<h2><?= $title; ?></h2>
<hr>
<div class="categories-container">
    <ul class="list-group">
        <?php foreach($categories as $category) : ?>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
                    </div>
                    <div class="col-md-8">
                        <?php echo form_open('/categories/delete/'.$category['id']); ?>
                        <input type="submit" value="Delete" class="btn btn-xs btn-danger pull-right">
                        </form>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
        <li class="list-group-item" style="text-align: center">
            <a class="btn btn-xs btn-success" href="<?php echo base_url(); ?>categories/create"><span class="glyphicon glyphicon-plus"></span> Add New</a>
        </li>
    </ul>
</div>

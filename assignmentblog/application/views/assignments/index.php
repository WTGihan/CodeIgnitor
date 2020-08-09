<!-- <h2> <?= $title ?></h2> -->
<hr>

<?php foreach ($assignments as $post) :?>
	<h1><?php echo $post['title']; ?></h1>
	<div class="row">
		<div class="col-md-3">
			<img class="post-thumb"src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?> ">
			<hr>
		</div>
		<div class="col-md-9">
			<small class="post-date">Posted on:<?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong> </small><br>
			<?php echo word_limiter($post['body'],60); ?>
			<br>
			<br>
			<p><a class="btn btn-default" href="<?php echo site_url('/assignments/'.$post['slug']); ?>">Read More</a></p>
			<hr>
		</div>
	</div>
<?php endforeach; ?>
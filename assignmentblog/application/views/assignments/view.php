 <h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on:<?php echo $post['created_at']; ?></small>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?> ">
<div class="post-body">
	<?php echo $post['body'] ; ?>
</div>

<?php if($this->session->userdata('user_id')== $post['user_id']): ?>
	<hr>
	<a class="btn btn-default pull-left" href="<?php echo base_url(); ?>assignments/edit/<?php echo $post['slug']; ?>">Edit</a>
	<?php echo form_open('/assignments/delete/'.$post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
	</form>	
<?php endif; ?>
	

<?php if(isset($req->p) && $req->p == 'resources'): ?>
	
	<div class="row res-card-row">
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
			<?php if($post->file != null): ?>
			<div class="col-md-4 text-center ">				
	        	<?php echo $__env->make('vendor.social-network.pages.resources.resource_card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		    </div>
		    <?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

<?php else: ?>
	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if($loop->first): ?><div class="row res-card-row"><?php endif; ?>
			<div class="col-md-12">
				<?php if($post->post_type == 'Resources'): ?>
				    <?php echo $__env->make('vendor.social-network.ajax.load_social_resource', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<?php else: ?>
				    <?php echo $__env->make('vendor.social-network.ajax.load_social_post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endif; ?>
		    </div>
		<?php if($loop->last): ?></div><?php endif; ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>


<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/vendor/social-network/ajax/load_posts.blade.php ENDPATH**/ ?>
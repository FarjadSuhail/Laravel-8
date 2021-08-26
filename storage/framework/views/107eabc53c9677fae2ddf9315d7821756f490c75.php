

<?php $__env->startSection('content'); ?>

<title>My blog</title>

    <article>
       
        <?= $post; ?>
        
        
        

        

    </article>


    <a href="/">Go Back!</a>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Farjad suhail\Desktop\laravel\projectone\resources\views/post.blade.php ENDPATH**/ ?>



<?php $__env->startSection('banner'); ?>
    <h1>Testing banner</h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

    

    <article class="<?php echo e($loop->odd ? 'foobar' : ''); ?>">

        

        <h1>
            <a href="/posts/<?= $post->slug; ?>">
                <?php echo $post->title; ?>

            </a>    
        </h1>
        
        
        <div>
            <?php echo $post->excerpt; ?>

        </div>
        
    </article>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Farjad suhail\Desktop\laravel\projectone\resources\views/posts.blade.php ENDPATH**/ ?>
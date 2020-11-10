<?php $__env->startSection('title', 'users'); ?>

<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($user->id); ?></p>
        <p><?php echo e($user->username); ?></p>
        <p><?php echo e($user->first_name); ?></p>
        <p><?php echo e($user->last_name); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.content');
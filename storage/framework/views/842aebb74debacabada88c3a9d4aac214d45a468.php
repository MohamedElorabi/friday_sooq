
<?php $__env->startSection('content'); ?>
        <!-- followers-page-start -->
        <section class="followers-page">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">المتابعون</h4>
                </div>
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="follow-card shadow-sm">
                            <a href="<?php echo e(route('site.user.show',$user->id)); ?>" class="user-img image-cover sameHeight">
                                <img src="<?php echo e($user->image); ?>">
                            </a>
                            <div class="content">
                                <a href="<?php echo e(route('site.user.show',$user->id)); ?>" class="name">
                                    <h5><?php echo e($user->name); ?></h5>
                                </a>
                                <p class="date"><i class="fal fa-calendar-alt"></i><?php echo e($user->created_at); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-area">
                        <div class="icon">
                            <img src="<?php echo e(asset('wb/imgs/no-users.png')); ?>" alt="no-users">
                        </div>
                        <h4 class="title">لا يوجد متابعون</h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo e($users->links()); ?>

        </section>
        <!-- followers-page-end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/user/followers.blade.php ENDPATH**/ ?>
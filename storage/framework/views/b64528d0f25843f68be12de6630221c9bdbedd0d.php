
<?php $__env->startSection('content'); ?>
  <!-- featured-ads-start -->
        <section class="featured-ads">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">نتايج البحث</h4>
                </div>
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-6">
                        <div class="ad-card featured shadow-sm">
                            <a href="<?php echo e(route('ad.show',$ad->slug)); ?>" class="ad-img image-cover sameWidth">
                                <?php if($ad->special == true): ?><small class="featured-badge"><?php echo e(__('site.Featured_AD')); ?></small><?php endif; ?>
                                <img src="<?php echo e($ad->image); ?>">
                            </a>
                            <div class="content">
                                <div class="card-hd">
                                    <a href="<?php echo e(route('ad.show',$ad->slug)); ?>" class="title">
                                        <h5><?php echo e($ad->name); ?></h5>
                                    </a>
                                    <div class="categs-date">
                                        <div class="categs">
                                            <p><?php echo e($ad->category_name); ?></p>
                                        </div>
                                        <small class="date"><?php echo e($ad->active_at); ?></small>
                                    </div>
                                </div>
                                <div class="card-ftr">
                                    <h5 class="price"><?php if($ad->price != 0 || $ad->price != null): ?><?php echo e($ad->price); ?> <?php echo e($ad->country_currency); ?> <?php else: ?> <?php echo e(__('site.Ask_Seller')); ?> <?php endif; ?></h5>
                                    <ul class="ctrls">
                                        <li>
                                            <button class="ctrl-btn like-btn <?php if($ad->Favoried == true): ?> active <?php endif; ?>" data-href="<?php echo e(route('toggle_like',$ad->id)); ?>">
                                                <img src="<?php echo e(asset('wb/icons/heart-white-r.svg')); ?>" class="icon-img">
                                            </button>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('ad.show',$ad->slug)); ?>#comments" class="ctrl-btn">
                                                <img src="<?php echo e(asset('wb/icons/comment-white-r.svg')); ?>" class="icon-img">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('ad.show',$ad->slug)); ?>" class="user ctrl-btn image-cover">
                                                <img src="<?php echo e($ad->user_image); ?>">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-area">
                                <div class="icon">
                                    <img src="http://badalsale.com/wb/imgs/no-ads.png" alt="no-ads">
                                </div>
                                <h4 class="title">لا يوجد اعلانات</h4>
                            </div> 
                    <?php endif; ?>
                </div>
            </div>
            <?php echo e($ads->links()); ?>

        </section>
        <!-- featured-ads-end -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/search.blade.php ENDPATH**/ ?>
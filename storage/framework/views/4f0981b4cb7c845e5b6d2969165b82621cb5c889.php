<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- ad-details-page-start -->
    <div class="ad-details-page">
        <section class="ad-details" id="marginForNav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slogan-right white-card">
                            
                            <div class="ad-images">
                                <?php if($ad->special == true): ?>
                                    <div class="featured-ribbon">
                                        <div class="ribbon">
                                            إعلان مميز
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="ad-img-carousel owl-carousel owl-theme" id="sameHeight">
                                    <?php $__empty_1 = true; $__currentLoopData = $ad->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="item image-cover customSmHeight">
                                            <a href="<?php echo e($image->image); ?>" class="image-cover customSmHeight"
                                                data-fancybox="gallery">
                                                <img src="<?php echo e($image->image); ?>" alt="ad-img">
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="details-bar">
                                <p class="time"><i class="far fa-clock"></i><?php echo e($ad->active_at); ?></p>
                                <div class="divider"></div>
                                <p class="watches"><i class="far fa-eye"></i><span><?php echo e($ad->views); ?>

                                        <?php echo e(__('site.views')); ?></span></p>
                                <div class="divider"></div>
                                <p class="camera"><i class="fas fa-camera"></i><?php echo e(count($ad->images)); ?></p>
                            </div>
                            <div class="title-price">
                                <h5><?php echo e($ad->name); ?></h5>
                                <h4><?php echo e($ad->price); ?> <?php echo e($ad->country_currency); ?></h4>
                            </div>
                            <div class="description">
                                <h5><?php echo e(__('site.description')); ?></h5>
                                <p>
                                    <?php echo e($ad->desc); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="slogan-left">
                            <a href="<?php echo e(route('site.user.show', ['id' => $ad->user->id])); ?>" class="user white-card">
                                <div class="image">
                                    <img src="<?php echo e($ad->user->image); ?>" alt="<?php echo e($ad->user->name); ?>">

                                </div>
                                <p><?php echo e($ad->user->name); ?></p>
                            </a>

                            <div class="options white-card nav-bottom" id="adOptions">

                                <?php if($ad->mobile != null): ?>
                                    <a href="https://wa.me/+965<?php echo e($ad->mobile); ?>" target="_blank"
                                        data-bs-dismiss="offcanvas" id="modalLink" data-value="whatsapp" class="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        واتساب
                                    </a>
                                <?php else: ?>
                                    <a href="https://wa.me/+965<?php echo e($ad->mobile); ?>" target="_blank"
                                        data-bs-dismiss="offcanvas" id="modalLink" data-value="whatsapp" class="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        واتساب
                                    </a>
                                <?php endif; ?>

                                <a href="tel:<?php echo e($ad->call); ?>" class="call">
                                    <i class="fas fa-phone-alt"></i>
                                    اتصال
                                </a>


                                <a href="#" class="favourite <?php if($ad->Favoried == true): ?> active <?php endif; ?>"
                                    data-href="<?php echo e(route('toggle_like', $ad->id)); ?>">
                                    <i class="far fa-heart"></i>
                                    تفضيل
                                </a>
                            </div>


                            <div class="more-options white-card">
                                <ul>

                                    <li class="chat">
                                        <p>ابدا المحادثة</p> <a href="#">ارسال</a>
                                    </li>
                                    <li class="sms">
                                        <p>ارسال رسالة نصية</p> <a href="">ارسال</a>
                                    </li>
                                    <li class="report">
                                        <p>التبليغ عن الاعلان</p><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">تبليغ</a>

                                    </li>
                                </ul>
                            </div>


                            <?php if($bannerOne): ?>
                                <!-- ad-banner-start -->
                                <section class="ad-banner">
                                    <div class="container">
                                        <div class="ad-field">
                                            <?php if($bannerOne->code == null): ?>
                                                <a href="<?php echo e($bannerOne->link); ?>" class="stretched-link"></a>
                                                <img src="<?php echo e($bannerOne->image); ?>" alt="<?php echo e($bannerOne->title); ?>">
                                            <?php else: ?>
                                                <?php echo $bannerOne->code; ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </section>
                                <!-- ad-banner-end -->
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="white-card">
                            <div class="comments section-div shadow-sm">
                                <h5 class="ad-subtitle"><?php echo e(__('site.comments')); ?></h5>
                                <ul>
                                    <?php $__empty_1 = true; $__currentLoopData = $ad->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li class="comment">
                                            <div class="image image-cover sameHeight">
                                                <img src="<?php echo e($comment->user->image); ?>" alt="user">
                                            </div>
                                            <div class="text">
                                                <h6 class="name"><?php echo e($comment->user->name); ?></h6>
                                                <p class="comment-text">
                                                    <?php echo e($comment->comment); ?>

                                                </p>
                                            </div>
                                            <div class="dropdown comment-options">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <?php if(Auth::user() && Auth::user()->id == $comment->user_id): ?>
                                                            <form method="post"
                                                                action="<?php echo e(route('ad.comment.delete', $comment->id)); ?>">
                                                                <?php echo method_field('delete'); ?>
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="fal fa-trash-alt"></i>
                                                                    حذف التعليق
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </li>
                                                    </a>
                                                    <li>
                                                        <?php if(Auth::user() && Auth::user()->id != $comment->user_id): ?>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                <i class="fal fa-bug"></i>
                                                                ابلاغ
                                                            </a>
                                                        <?php endif; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="empty-area">
                                            <img src="<?php echo e(asset('wb/imgs/no-comments.svg')); ?>" alt="no-ads">
                                            <p class="mb-0 h5">لا يوجد تعليقات الان كن اول من يضع تعليق</p>
                                        </div>
                                    <?php endif; ?>
                                </ul>
                                <?php if(auth()->guard()->check()): ?>
                                    <form action="<?php echo e(route('ad.comment.store')); ?>" method="post" class="add-comment">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="ad_id" value="<?php echo e($ad->id); ?>">
                                        <h5 class="ad-subtitle">اضف تعليقك</h5>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control input-1" id="comment" name="comment"
                                                placeholder="اكتب تعليقك">
                                        </div>
                                        <button type="submit" class="btn-1"><i class="fal fa-paper-plane"></i>
                                            ارسال</button>
                                    </form>
                                <?php endif; ?>
                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="login-first">
                                        <p class="text-danger">يرجى تسجيل الدخول حتى تتمكن من كتابة تعليق</p>
                                        <a href="<?php echo e(route('login')); ?>" class="btn-1">
                                            تسجيل الدخول
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ad-details-page-end -->

    <!-- user-call-offcanvas -->
    <div class="offcanvas user-call-offcanvas offcanvas-bottom" tabindex="-1" id="userCall"
        aria-labelledby="userCallLabel">
        <div class="offcanvas-header">
            <div class="container">
                <div class="row">
                    <div class="col-8 d-flex align-items-center">
                        <h5 class="offcanvas-title" id="userCallLabel">معلومات الاتصال</h5>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="container">
                <ul>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#phoneModal"
                            data-bs-dismiss="offcanvas" id="modalLink" data-value="call">
                            <img src="<?php echo e(asset('wb/icons/phone-r.svg')); ?>" class="icon-img">
                            <p>اتصال</p>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#chatModal" data-bs-dismiss="offcanvas"
                            id="modalLink" data-value="downloadApp"><img src="<?php echo e(asset('wb/icons/message-r.svg')); ?>"
                                class="icon-img">
                            <p>محادثة</p>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <?php if($ad->mobile != null): ?>
                            <a href="https://wa.me/+965<?php echo e($ad->mobile); ?>" target="_blank" data-bs-dismiss="offcanvas"
                                id="modalLink" data-value="whatsapp">
                                <img src="<?php echo e(asset('wb/icons/phone-r.svg')); ?>" class="icon-img">
                                <p>whatsapp</p>
                                <i class="fal fa-chevron-left"></i>
                            </a>
                        <?php else: ?>
                            <a href="https://wa.me/+965<?php echo e($ad->user->mobile); ?>" target="_blank"
                                data-bs-dismiss="offcanvas" id="modalLink" data-value="whatsapp">
                                <img src="<?php echo e(asset('wb/icons/phone-r.svg')); ?>" class="icon-img">
                                <p>whatsapp</p>
                                <i class="fal fa-chevron-left"></i>
                            </a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <a href="sms:123456"><img src="<?php echo e(asset('wb/icons/categories-r.svg')); ?>" class="icon-img">
                            <p>رسالة نصية</p>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-one fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo e(__('site.report')); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('report.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="type" value="ad">

                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><?php echo e(__('site.report_text')); ?>:</label>
                            <textarea class="form-control" name="report" id="message-text"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-1"><?php echo e(__('site.Save')); ?></button>
                            <button type="button" class="btn-2" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modals-start -->
    <!-- main-modal -->
    
    <!-- modals-end -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        $('.ad-img-carousel').owlCarousel({
            rtl: true,
            nav: false,
            items: 1,
            margin: 0
        })

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // like-ad-and-unlike
        $('body').on('click', '.favourite', function(e) {
            //   alert(1232);
            e.preventDefault();
            <?php if(!auth()->user()): ?>
                window.location.href = "<?php echo e(route('login')); ?>";
                return;
            <?php endif; ?>
            var thislike = $(this);
            $.ajax({
                url: thislike.data('href'),
                method: "GET",
                success: function(data) {
                    console.log(data)
                    if (data.like) {
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/ads/show.blade.php ENDPATH**/ ?>
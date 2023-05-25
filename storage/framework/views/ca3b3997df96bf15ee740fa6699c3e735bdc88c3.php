

<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="loyalty-program.html"><small>برنامج الولاء</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>اكسب نقاط</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="loyalty-program-page earn-points link-details">
        <div class="container">
            <div class="current-level">
                <img src="<?php echo e(asset('wb/imgs/member-layer.svg')); ?>" alt="current-level" class="level-img">
                <div class="text">
                    <h5>انت الان عضو ذهبى</h5>
                    <a href="#">حركة النقود</a>
                </div>
            </div>
            <div class="levels-progress">
                <div class="levels">
                    <div class="level">
                        <div class="image">
                            <img src="<?php echo e(asset('wb/imgs/bronze.svg')); ?>" alt="bronze">
                        </div>
                        <h6 class="name">برونزى</h6>
                    </div>
                    <div class="level">
                        <div class="image">
                            <img src="<?php echo e(asset('wb/imgs/silver.svg')); ?>" alt="silver">
                        </div>
                        <h6 class="name">فضى</h6>
                    </div>
                    <div class="level">
                        <div class="image">
                            <img src="<?php echo e(asset('wb/imgs/golden.svg')); ?>" alt="golden">
                        </div>
                        <h6 class="name">ذهبى</h6>
                    </div>
                    <div class="level">
                        <div class="image">
                            <img src="<?php echo e(asset('wb/imgs/platinium.svg')); ?>" alt="platinium">
                        </div>
                        <h6 class="name">بلاتينى</h6>
                    </div>
                </div>
                <div class="checks-progress" id="checkProgress">
                    <div class="checks">
                        <div class="check-icon" id="step"></div>
                        <div class="check-icon" id="step"></div>
                        <div class="check-icon" id="step"></div>
                        <div class="check-icon" id="step"></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" id="stepsProgress" role="progressbar" aria-valuenow="5000"
                            aria-valuemin="0" aria-valuemax="20000"></div>
                    </div>
                </div>
                <small class="notice">عند استبدالك للنقاط لن يؤثر على حصولك على المستوى التالي.</small>
            </div>

            <div class="white-card how-earning-work">
                <h5 class="details-title">كيف يعمل؟</h5>
                <ul>
                    <li>
                        <i class="fas fa-star icon sameHeight"></i>
                        <p class="text">
                            على كل 1 دينار تنفقه تحصل على 20 نقطة
                            ويختلف على حسب المستويات أعلاه.
                        </p>
                    </li>
                    <li>
                        <i class="fas fa-gift icon sameHeight"></i>
                        <p class="text">
                            استبدل النقاط مع أفضل العروض الحصرية.
                        </p>
                    </li>
                    <li>
                        <i class="fas fa-crown icon sameHeight"></i>
                        <p class="text">
                            أكسب المزيد من النقاط لرفع المستوى
                            وكسب أكثر، وكذلك لفتح المزيد من المزايا.
                        </p>
                    </li>
                </ul>
            </div>
            <div class="white-card faq">
                <h5 class="details-title">الاسئلة الشائعة</h5>
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="accordion-item question-accordion">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    - <?php echo e($question->name); ?> ؟
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php echo e($question->answer); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('custom-scripts'); ?>
    <script>
        let checkProgress = document.querySelectorAll("#checkProgress");

        for (let i = 0; i < $(checkProgress).length; i++) {
            let bar = $(checkProgress[i]).find("#stepsProgress"),
                maxVal = $(bar).attr('aria-valuemax'),
                currentVal = $(bar).attr('aria-valuenow'),
                maxNum = parseInt(maxVal),
                currentNum = parseInt(currentVal),
                currentValPercent = Math.round(100 * (currentNum / maxNum));
            $(bar).css("cssText", `width: ${currentValPercent}%`)
            if (currentValPercent >= 0 && currentValPercent < 33) {
                $(checkProgress[i]).find("#step:nth-of-type(1)").addClass("active").prevAll().addClass("active");
            } else if (currentValPercent >= 33 && currentValPercent < 67) {
                $(checkProgress[i]).find("#step:nth-of-type(2)").addClass("active").prevAll().addClass("active");
            } else if (currentValPercent >= 67 && currentValPercent < script 100) {
                $(checkProgress[i]).find("#step:nth-of-type(3)").addClass("active").prevAll().addClass("active");
            } else {
                $(checkProgress[i]).find("#step:nth-of-type(4)").addClass("active").prevAll().addClass("active");
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/loyalty_program/earn_points.blade.php ENDPATH**/ ?>
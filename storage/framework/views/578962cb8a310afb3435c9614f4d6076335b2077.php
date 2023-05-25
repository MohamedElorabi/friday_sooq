
<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="my-ads.html"><small>اعلاناتى</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الاحصائيات</h4>
                </li>
            </ol>
        </div>
    </nav>




    <section class="statistics-page">
        <div class="container">
            <input class="flatpickr date-input" type="text" placeholder="قم بتحديد التاريخ" data-id="datetime"
                readonly="readonly">
            <div class="progress-circle"></div>
            <h4 class="title">اجمالى المشاهدات</h4>
            <a href="<?php echo e(route('ad.statistics.details', $ad->id)); ?>" class="btn-1 mb-5">التفاصيل</a>
            <div class="more-info">
                <div class="row">
                    <div class="col-md-6">
                        <div class="white-card">
                            <p class="title">إجمالي المشاهدات الشهرية</p>
                            <h4 class="num"><?php echo e($ad->views * 30); ?></h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-card">
                            <p class="title">إجمالي المشاهدات الاسبوعية</p>
                            <h4 class="num"><?php echo e($ad->views * 7); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="<?php echo e(asset('wb/js/jquery.circle-progress.min.js')); ?>"></script>
    <script>
        $(".flatpickr").flatpickr({
            altInput: true,
            mode: "range",
            dateFormat: "d-m-Y",
            position: "auto center",
            defaultDate: 'today',
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ['sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri'],
                    longhand: ['السبت', 'الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة'],
                },
                months: {
                    shorthand: ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                    longhand: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر',
                        'اكتوبر', 'نوفمبر', 'ديسمبر'
                    ],
                },
            },
            onClose: function(selectedDates, dateStr, instance) {
                progressFunc()
            },
        });

        function progressFunc() {
            $('.progress-circle').circleProgress({
                max: 500,
                value: <?php echo e($ad->views); ?>,
                textFormat: 'value'
            });
        }
        progressFunc()
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/ads/statistics.blade.php ENDPATH**/ ?>
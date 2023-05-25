
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

    <section class="statistic-details-page">
        <div class="container">
            <div class="white-card">
                <h4 class="details-subtitle">الزيارات</h4>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-daily-visits-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-daily-visits" type="button" role="tab"
                            aria-controls="pills-daily-visits" aria-selected="true">يومى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-weekly-visits-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-weekly-visits" type="button" role="tab"
                            aria-controls="pills-weekly-visits" aria-selected="false">اسبوعى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-monthly-visits-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-monthly-visits" type="button" role="tab"
                            aria-controls="pills-monthly-visits" aria-selected="false">شهرى</button>
                    </li>
                </ul>
                <div class="st-title">
                    <p class="title">الزيارات لهذا الاسبوع</p>
                    <h6 class="num">25,621</h6>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-daily-visits" role="tabpanel"
                        aria-labelledby="pills-daily-visits-tab">
                        <canvas id="dailyVisitsChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-weekly-visits" role="tabpanel"
                        aria-labelledby="pills-weekly-visits-tab">
                        <canvas id="weeklyVisitsChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-monthly-visits" role="tabpanel"
                        aria-labelledby="pills-monthly-visits-tab">
                        <canvas id="monthlyVisitsChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="white-card">
                <h4 class="details-subtitle">المشاهدات</h4>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-daily-views-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-daily-views" type="button" role="tab"
                            aria-controls="pills-daily-views" aria-selected="true">يومى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-weekly-views-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-weekly-views" type="button" role="tab"
                            aria-controls="pills-weekly-views" aria-selected="false">اسبوعى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-monthly-views-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-monthly-views" type="button" role="tab"
                            aria-controls="pills-monthly-views" aria-selected="false">شهرى</button>
                    </li>
                </ul>
                <div class="st-title">
                    <p class="title">المشاهدات لهذا الاسبوع</p>
                    <h6 class="num">25,621</h6>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-daily-views" role="tabpanel"
                        aria-labelledby="pills-daily-views-tab">
                        <canvas id="dailyViewsChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-weekly-views" role="tabpanel"
                        aria-labelledby="pills-weekly-views-tab">
                        <canvas id="weeklyViewsChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-monthly-views" role="tabpanel"
                        aria-labelledby="pills-monthly-views-tab">
                        <canvas id="monthlyViewsChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="white-card">
                <h4 class="details-subtitle">التواصل</h4>
                <canvas id="contactChart"></canvas>
            </div>
            <div class="white-card">
                <h4 class="details-subtitle">اجمالى عدد التقييمات(162.276)</h4>
                <canvas id="totalReviewsChart" class="mb-4"></canvas>
                <ul class="rates">
                    <li>
                        <p class="rate-type">5.0</p>
                        <ul class="stars">
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                        </ul>
                        <p class="num">(5,600)</p>
                    </li>
                    <li>
                        <p class="rate-type">4.0</p>
                        <ul class="stars">
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="num">(5,600)</p>
                    </li>
                    <li>
                        <p class="rate-type">3.0</p>
                        <ul class="stars">
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="num">(5,600)</p>
                    </li>
                    <li>
                        <p class="rate-type">2.0</p>
                        <ul class="stars">
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="num">(5,600)</p>
                    </li>
                    <li>
                        <p class="rate-type">1.0</p>
                        <ul class="stars">
                            <li><i class="fas fa-star active"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <p class="num">(5,600)</p>
                    </li>
                </ul>
            </div>
            <div class="white-card">
                <h4 class="details-subtitle">النشاط</h4>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-daily-activity-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-daily-activity" type="button" role="tab"
                            aria-controls="pills-daily-activity" aria-selected="true">يومى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-weekly-activity-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-weekly-activity" type="button" role="tab"
                            aria-controls="pills-weekly-activity" aria-selected="false">اسبوعى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-monthly-activity-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-monthly-activity" type="button" role="tab"
                            aria-controls="pills-monthly-activity" aria-selected="false">شهرى</button>
                    </li>
                </ul>
                <div class="st-title">
                    <p class="title">النشاط لهذا الاسبوع</p>
                    <h6 class="num">25,621</h6>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-daily-activity" role="tabpanel"
                        aria-labelledby="pills-daily-activity-tab">
                        <canvas id="dailyActivityChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-weekly-activity" role="tabpanel"
                        aria-labelledby="pills-weekly-activity-tab">
                        <canvas id="weeklyActivityChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-monthly-activity" role="tabpanel"
                        aria-labelledby="pills-monthly-activity-tab">
                        <canvas id="monthlyActivityChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="white-card">
                <h4 class="details-subtitle">عمليات البحث</h4>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-daily-search-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-daily-search" type="button" role="tab"
                            aria-controls="pills-daily-search" aria-selected="true">يومى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-weekly-search-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-weekly-search" type="button" role="tab"
                            aria-controls="pills-weekly-search" aria-selected="false">اسبوعى</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-monthly-search-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-monthly-search" type="button" role="tab"
                            aria-controls="pills-monthly-search" aria-selected="false">شهرى</button>
                    </li>
                </ul>
                <div class="st-title">
                    <p class="title">عمليات البحث لهذا الاسبوع</p>
                    <h6 class="num">25,621</h6>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-daily-search" role="tabpanel"
                        aria-labelledby="pills-daily-search-tab">
                        <canvas id="dailySearchChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-weekly-search" role="tabpanel"
                        aria-labelledby="pills-weekly-search-tab">
                        <canvas id="weeklySearchChart"></canvas>
                    </div>
                    <div class="tab-pane fade" id="pills-monthly-search" role="tabpanel"
                        aria-labelledby="pills-monthly-search-tab">
                        <canvas id="monthlySearchChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="white-card">
                <h4 class="details-subtitle">الاحصائيات</h4>
                <canvas id="statisticsChart" class="mb-4"></canvas>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>

   
    <script>
        /* dailyVisitsData */
        const dailyVisitsData = {
            labels: ['21 يناير', '22 يناير', '23 يناير', '24 يناير', '25 يناير', '26 يناير', '27 يناير'],
            datasets: [{
                label: 'عدد الزيارات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const dailyVisitsConfig = {
            type: 'line',
            data: dailyVisitsData,

            options: {
                responsive: true,
            }
        };
        const dailyVisitsChart = new Chart(
            document.getElementById('dailyVisitsChart'),
            dailyVisitsConfig
        );

        /* weeklyVisitsData */
        const weeklyVisitsData = {
            labels: ['اسبوع1', 'اسبوع2', 'اسبوع3', 'اسبوع4'],
            datasets: [{
                label: 'عدد الزيارات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const weeklyVisitsConfig = {
            type: 'line',
            data: weeklyVisitsData,

            options: {
                responsive: true,
            }
        };
        const weeklyVisitsChart = new Chart(
            document.getElementById('weeklyVisitsChart'),
            weeklyVisitsConfig
        );

        /* monthlyVisitsData */
        const monthlyVisitsData = {
            labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                'نوفمبر', 'ديسمبر'
            ],
            datasets: [{
                label: 'عدد الزيارات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const monthlyVisitsConfig = {
            type: 'line',
            data: monthlyVisitsData,

            options: {
                responsive: true,
            }
        };
        const monthlyVisitsChart = new Chart(
            document.getElementById('monthlyVisitsChart'),
            monthlyVisitsConfig
        );


        /* ---------- views-chart ---------- */
        /* dailyViewsData */
        const dailyViewsData = {
            labels: ['21 يناير', '22 يناير', '23 يناير', '24 يناير', '25 يناير', '26 يناير', '27 يناير'],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const dailyViewsConfig = {
            type: 'line',
            data: dailyViewsData,

            options: {
                responsive: true,
            }
        };
        const dailyViewsChart = new Chart(
            document.getElementById('dailyViewsChart'),
            dailyViewsConfig
        );

        /* weeklyViewsData */
        const weeklyViewsData = {
            labels: ['اسبوع1', 'اسبوع2', 'اسبوع3', 'اسبوع4'],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const weeklyViewsConfig = {
            type: 'line',
            data: weeklyViewsData,

            options: {
                responsive: true,
            }
        };
        const weeklyViewsChart = new Chart(
            document.getElementById('weeklyViewsChart'),
            weeklyViewsConfig
        );

        /* monthlyViewsData */
        const monthlyViewsData = {
            labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                'نوفمبر', 'ديسمبر'
            ],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const monthlyViewsConfig = {
            type: 'line',
            data: monthlyViewsData,

            options: {
                responsive: true,
            }
        };
        const monthlyViewsChart = new Chart(
            document.getElementById('monthlyViewsChart'),
            monthlyViewsConfig
        );

        /* ---------- contact-chart ---------- */
        const contactLabels = ['واتساب', 'إتصال هاتفي', 'دردشة مباشرة', 'رسائل نصية'];
        const contactData = {
            labels: contactLabels,
            datasets: [{
                label: '',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    '#5DC519',
                    '#00A2FF',
                    '#FF4600',
                    '#A9BDDC'
                ]
            }]
        };
        const contactConfig = {
            type: 'bar',
            data: contactData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };
        const contactChart = new Chart(
            document.getElementById('contactChart'),
            contactConfig
        );

        /* ---------- totalReviewsData ---------- */
        const totalReviewsData = {
            labels: ['', '', '', ''],
            datasets: [{
                label: '',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const totalReviewsConfig = {
            type: 'line',
            data: totalReviewsData,

            options: {
                responsive: true,
            }
        };
        const totalReviewsChart = new Chart(
            document.getElementById('totalReviewsChart'),
            totalReviewsConfig
        );

        /* ---------- activityChart ---------- */
        /* dailyActivityData */
        const dailyActivityData = {
            labels: ['21 يناير', '22 يناير', '23 يناير', '24 يناير', '25 يناير', '26 يناير', '27 يناير'],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const dailyActivityConfig = {
            type: 'line',
            data: dailyActivityData,

            options: {
                responsive: true,
            }
        };
        const dailyActivityChart = new Chart(
            document.getElementById('dailyActivityChart'),
            dailyActivityConfig
        );

        /* weeklyActivityData */
        const weeklyActivityData = {
            labels: ['اسبوع1', 'اسبوع2', 'اسبوع3', 'اسبوع4'],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const weeklyActivityConfig = {
            type: 'line',
            data: weeklyActivityData,

            options: {
                responsive: true,
            }
        };
        const weeklyActivityChart = new Chart(
            document.getElementById('weeklyActivityChart'),
            weeklyActivityConfig
        );

        /* monthlyActivityData */
        const monthlyActivityData = {
            labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                'نوفمبر', 'ديسمبر'
            ],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const monthlyActivityConfig = {
            type: 'line',
            data: monthlyActivityData,

            options: {
                responsive: true,
            }
        };
        const monthlyActivityChart = new Chart(
            document.getElementById('monthlyActivityChart'),
            monthlyActivityConfig
        );

        /* ---------- searchChart ---------- */
        /* dailySearchData */
        const dailySearchData = {
            labels: ['21 يناير', '22 يناير', '23 يناير', '24 يناير', '25 يناير', '26 يناير', '27 يناير'],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const dailySearchConfig = {
            type: 'line',
            data: dailySearchData,

            options: {
                responsive: true,
            }
        };
        const dailySearchChart = new Chart(
            document.getElementById('dailySearchChart'),
            dailySearchConfig
        );

        /* weeklySearchData */
        const weeklySearchData = {
            labels: ['اسبوع1', 'اسبوع2', 'اسبوع3', 'اسبوع4'],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const weeklySearchConfig = {
            type: 'line',
            data: weeklySearchData,

            options: {
                responsive: true,
            }
        };
        const weeklySearchChart = new Chart(
            document.getElementById('weeklySearchChart'),
            weeklySearchConfig
        );

        /* monthlySearchData */
        const monthlySearchData = {
            labels: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر',
                'نوفمبر', 'ديسمبر'
            ],
            datasets: [{
                label: 'عدد المشاهدات',
                backgroundColor: '#0055A6',
                borderColor: '#0055A6',
                data: [250, 500, 250, 750, 500, 1000, 1200],
                cubicInterpolationMode: 'monotone',
            }],
        };
        const monthlySearchConfig = {
            type: 'line',
            data: monthlySearchData,

            options: {
                responsive: true,
            }
        };
        const monthlySearchChart = new Chart(
            document.getElementById('monthlySearchChart'),
            monthlySearchConfig
        );

        /* ---------- statiscticsChart ---------- */
        const statiscticsLabels = ['المنتجات', 'الاعجاب', 'الصور'];
        const statiscticsData = {
            labels: statiscticsLabels,
            datasets: [{
                label: '',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    '#A9BDDC',
                    '#FFE600',
                    '#FF4600'
                ]
            }]
        };
        const statistcisConfig = {
            type: 'bar',
            data: statiscticsData,
        };
        const statiscticsChart = new Chart(
            document.getElementById('statisticsChart'),
            statistcisConfig
        );
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/ads/statistic-details.blade.php ENDPATH**/ ?>
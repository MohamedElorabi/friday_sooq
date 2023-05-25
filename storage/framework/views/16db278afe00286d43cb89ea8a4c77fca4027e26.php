<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>اضافة اعلان</h4>
                </li>
            </ol>
        </div>
    </nav>
    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
    <?php elseif(Session::has('error')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
    <?php endif; ?>

    <section class="create-ad">
        <div class="container">
            <form class="ad-form" action="<?php echo e(route('ad.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="imgs-uploader white-card">
                            <!-- <div id="uppy-container"></div> -->
                            <div class="image-uploader">
                                <div class="input-div">
                                    <div class="input">
                                        <i class="fal fa-plus"></i>
                                        <input class="form-control" type="file" id="files" name="image[]" multiple />
                                    </div>
                                </div>
                                <div class="uploaded-files">
                                    <div class="row" id="uploadedFiles">
                                    </div>
                                </div>
                                <div class="placeholder" id="placeholder">
                                    <i class="fal fa-cloud-upload"></i>
                                    <h5 class="title">قم بسحب الصور وافلاتها هنا او اضغط لاختيار الصور </h5>
                                    <p>يمكنك تحميل 4 صور بحد اقصى</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ad-inputs white-card">
                            <div class="form-group mb-4">
                                <label for="title" class="form-label">عنوان الاعلان</label>
                                <input type="text" class="form-control input-1" name="name" id="title"
                                    placeholder="اكتب عنوان الاعلان هنا" required>
                                <?php if($errors->has('name')): ?>
                                    <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group mb-4">
                                <select class="form-select input-1" aria-label="Default select example" name="category_id"
                                    id="category">
                                    <option selected disabled>اختر صنف الاعلان</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('category_id')): ?>
                                    <span class="text-danger text-left"><?php echo e($errors->first('category_id')); ?></span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group mb-4">
                                <select class="form-select input-1" aria-label="Default select example" name=""
                                    id="subcategory">
                                </select>
                            </div>


                            <div class="form-group mb-4">
                                <label for="price" class="form-label">سعر المنتج</label>
                                <div class="input-div">
                                    <p>د.ك</p>
                                    <input type="number" class="form-control input-1" name="price" id="price"
                                        placeholder="اكتب السعر هنا" required>
                                    <?php if($errors->has('price')): ?>
                                        <span class="text-danger text-left"><?php echo e($errors->first('price')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="describtion" class="form-label">الوصف</label>
                                <textarea class="form-control input-1" name="desc" id="describtion" rows="6" placeholder="اكتب الوصف هنا"></textarea>
                                <?php if($errors->has('desc')): ?>
                                    <span class="text-danger text-left"><?php echo e($errors->first('desc')); ?></span>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="user-inputs white-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="other-phone" class="form-label">رقم هاتف اخر</label>
                                        <input type="number" class="form-control input-1" name="mobile" id="other-phone"
                                            placeholder="اكتب رقم الهاتف هنا">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="govern" class="form-label">المحافظة</label>
                                        <select class="form-select input-1" name="city_id" id="govern"
                                            aria-label="Default select example">

                                            <option selected disabled> <?php echo e(__('site.Select_City')); ?></option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($city->id); ?>"><?php echo e($city->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                        <?php if($errors->has('city_id')): ?>
                                            <span class="text-danger text-left"><?php echo e($errors->first('city_id')); ?></span>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-check form-group form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="whatsapp"
                                            id="whatsapp">
                                        <label class="form-check-label" for="whatsapp">السماح بالمراسلة عبر
                                            واتساب</label>
                                    </div>
                                    <div class="form-check form-group form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="map-show"
                                            name="map">
                                        <label class="form-check-label" for="map-show">السماح بمشاركةالموقع</label>
                                    </div>

                                    <div class="section-div shadow-sm" id="mapDiv">

                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d132328.95890918095!2d47.973146541545496!3d29.360270938884454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c8ce8db396d%3A0x6747a130779f0bc0!2z2K3ZiNmE2YrYjCDYp9mE2YPZiNmK2KrigI4!5e0!3m2!1sar!2seg!4v1650443171125!5m2!1sar!2seg"
                                            class="w-100" id="mapFrame" style="border:0; display:none;"
                                            allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="ad-type white-card">
                            <ul>
                                <li>
                                    <div class="form-check form-group form-switch">
                                        <i class="fal fa-coins icon"></i>
                                        <input class="form-check-input" type="radio" role="switch" name="ad-type"
                                            value="free-ad" id="free-ad" checked>
                                        <label class="form-check-label" for="free-ad">مجانا</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-group form-switch">
                                        <i class="fal fa-rocket-launch icon"></i>
                                        <input class="form-check-input" type="radio" role="switch" name="ad-type"
                                            value="featured-ad" id="featured-ad">
                                        <label class="form-check-label" for="featured-ad">مميز</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="ad-btns">
                            <li>
                                <button type="button" id="preview" class="btn-2" data-bs-toggle="modal"
                                    data-bs-target="#adView">
                                    <i class="fal fa-eye"></i>
                                    معاينة الاعلان
                                </button>
                            </li>
                            <li>
                                <button type="submit" class="btn-1">نشر الاعلان</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>




    <!-- modals -->
    <div class="modal modal-one fade" id="adView" tabindex="-1" aria-labelledby="adViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adViewLabel">معاينة الاعلان</h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ad-details-page">
                        <div class="ad-details">
                            <div class="slogan-right">
                                <div class="ad-images">
                                    <div class="featured-ribbon">
                                        <div class="ribbon">
                                            اعلان مميز
                                        </div>
                                    </div>
                                    <div class="ad-img-carousel owl-carousel owl-theme" id="sameHeight">
                                        <div class="item image-cover customSmHeight">
                                            <img src="<?php echo e(asset('wb/imgs/ad-img.svg')); ?>" alt="ad-img">
                                        </div>
                                        <div class="item image-cover customSmHeight">
                                            <img src="<?php echo e(asset('wb/imgs/ad-img.svg')); ?>" alt="ad-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="details-bar">
                                    <p class="time" id="time"><i class="far fa-clock"></i>منذ 0 ايام</p>
                                    <div class="divider"></div>
                                    <p class="watches" id="watches"><i class="far fa-eye"></i>0</p>
                                    <div class="divider"></div>
                                    <p class="camera" id="camera"><i class="fas fa-camera"></i>0</p>
                                </div>
                                <div class="title-price">
                                    <h5 id="name">اسم الاعلان</h5>
                                    <h4 id="price">000 د.ك</h4>
                                </div>
                                <div class="description">
                                    <h5>الوصف</h5>
                                    <p id="desc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script>
        // $(function () {
        //     let mainCategory = document.querySelectorAll("#mainCategory");
        //     let mainCategoryDiv = document.querySelector("#mainCategDiv"),
        //         category = document.querySelectorAll("#category"),
        //         subCategoryDiv = document.querySelector("#categDiv"),
        //         inputsPage = document.querySelector("#inputsPage");

        //     for (let i = 0; i < $(mainCategory).length; i++) {
        //         $(mainCategory[i]).click(function (e) {
        //             e.preventDefault();
        //             let categVal = $(mainCategory[i]).attr("data-value"),
        //                 categName = $(mainCategory[i]).find(".title");
        //             /* console.log($(categName).html()) */
        //             document.cookie = "categCookie=" + categVal;
        //             checkMainCookie()
        //         })
        //     }

        //     function getMainCookie() {
        //         let name = "categCookie=";
        //         let decodedCookie = decodeURIComponent(document.cookie);
        //         let ca = decodedCookie.split(';');
        //         for (let i = 0; i < ca.length; i++) {
        //             let c = ca[i];
        //             while (c.charAt(0) == ' ') {
        //                 c = c.substring(1);
        //             }
        //             if (c.indexOf(name) == 0) {
        //                 return c.substring(name.length, c.length);
        //             }
        //         }
        //         return "";
        //     }

        //     function checkMainCookie() {
        //         let cookieData = getMainCookie("categCookie=");
        //         if (cookieData != "") {
        //             $(mainCategoryDiv).hide();
        //             $(subCategoryDiv).show();
        //             $("#mainCategLink").html(`${getMainCookie("categCookie=")}`);
        //         } else {
        //             document.cookie = "subCategCookie=";
        //             $(mainCategoryDiv).show();
        //             $(subCategoryDiv).hide();
        //             $(inputsPage).hide();
        //         }
        //     }
        //     checkMainCookie();

        //     /* sub-category-cookie */
        //     function subCategoryFunc() {
        //         let subCategoryVar = document.querySelectorAll("#category");
        //         for (let j = 0; j < $(subCategoryVar).length; j++) {
        //             $(subCategoryVar[j]).click(function (e) {
        //                 e.preventDefault();
        //                 let subCategoryVarVal = $(subCategoryVar[j]).attr("data-value");
        //                 document.cookie = "subCategCookie=" + subCategoryVarVal;

        //                 checkSubCookie();
        //             })
        //         }
        //     }

        //     function getSubCookie() {
        //         let name = "subCategCookie=";
        //         let decodedCookie = decodeURIComponent(document.cookie);
        //         let ca = decodedCookie.split(';');
        //         for (let i = 0; i < ca.length; i++) {
        //             let c = ca[i];
        //             while (c.charAt(0) == ' ') {
        //                 c = c.substring(1);
        //             }
        //             if (c.indexOf(name) == 0) {
        //                 return c.substring(name.length, c.length);
        //             }
        //         }
        //         return "";
        //     }

        //     function checkSubCookie() {
        //         let cookieData = getSubCookie("subCategCookie=");
        //         if (cookieData != "") {
        //             $(subCategoryDiv).hide();
        //             $(inputsPage).show();
        //             $("#subCategLink").html(`${getSubCookie("subCategCookie=")}`);
        //         }
        //     }
        //     checkSubCookie();
        //     subCategoryFunc();

        //     $("#mainCategLink , #subCategLink").click(function (e) {
        //         e.preventDefault();
        //         document.cookie = "categCookie=";
        //         checkMainCookie();
        //     })

        // })
        /* toggle-map */
        let mapToggler = document.querySelector("#map-show"),
            mapFrame = document.querySelector("#mapFrame");
        mapToggler.onclick = function() {
            this.classList.toggle("checked");
            if (mapToggler.classList.contains("checked")) {
                mapFrame.style.display = "block";
            } else {
                mapFrame.style.display = "none";
            }
        }
    </script>


    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#category').on('change', function(e) {
                var cat_id = e.target.value;
                $('#subcategory').empty();
                $.ajax({
                    url: "<?php echo e(route('ad.getSubCtegory')); ?>",
                    type: "post",
                    data: {

                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#subcategory').html(`<option value="">اختر قسم فرعى</option>`)
                        console.log(data);
                        for (const option of data) {
                            html = `
                        <option value="${option.id}">${option.title}</option>
                        `
                            $('#subcategory').append(html)
                        }

                    }
                })
            });
        });
    </script>

    
    ()
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/ads/create.blade.php ENDPATH**/ ?>
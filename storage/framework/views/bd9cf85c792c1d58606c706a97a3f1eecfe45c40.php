
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('site.stores')); ?>"><small>المتاجر</small></a></li>
                <li class="breadcrumb-item"><a href="add-group-item.html"><small>اضافة مجموعة/عنصر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>اضافة عنصر جديد</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="add-new-item-page">
        <div class="container">
            <form action="<?php echo e(route('product.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-6 col-md-9 m-auto">
                        <div class="white-card">
                            <div class="imgs-uploader mb-4">
                                <div class="image-uploader">
                                    <div class="input-div">
                                        <div class="input">
                                            <i class="fal fa-plus"></i>
                                            <input class="form-control" type="file" id="files" name="files[]"
                                                multiple />
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
                            <div class="form-group mb-4">
                                <label for="product-name" class="form-label">اسم المنتج*</label>
                                <input type="text" class="form-control input-1" name="product-name" id="product-name"
                                    placeholder="اكتب اسم المنتج هنا" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="product-describtion" class="form-label">وصف المنتج*</label>
                                <textarea class="form-control input-1" name="product-describtion" id="product-describtion" name="product-describtion"
                                    rows="5" placeholder="اكتب وصف المنتج هنا" required></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="category" class="form-label">اسم القسم*</label>
                                <select class="form-select input-1" id="category" name="category"
                                    aria-label="Default select example">
                                    <option selected disabled>اختر قسم المنتج</option>
                                    <?php $__currentLoopData = $store_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="$store_category->id"><?php echo e($store_category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </select>
                            </div>
                            <div class="accordion-item mb-4">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                        <i class="fal fa-plus-circle"></i>اضافة قسم فرعى
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="form-group">
                                        <label for="sub-category" class="form-label">اختر القسم الفرعى</label>
                                        <select class="form-select input-1" id="sub-category" name="sub-category">
                                            <option selected disabled>القسم</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4 colors d-flex align-items-center gap-2">
                                <label class="form-label m-0 me-auto">اضافة لون إن وجد</label>
                                <button type="button" class="add-option-btn" data-bs-toggle="modal"
                                    data-bs-target="#addOptionModal" data-value="add-color" id="modalLink"><i
                                        class="fal fa-plus"></i></button>
                                <ul class="colors-checks" dir="ltr">
                                    <li>
                                        <input type="radio" class="btn-check" name="color" id="red" value="red"
                                            autocomplete="off" required>
                                        <label class="color-check" for="red"></label>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="color" id="yellow"
                                            value="yellow" autocomplete="off" required>
                                        <label class="color-check" for="yellow"></label>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="color" id="blue"
                                            value="blue" autocomplete="off" required>
                                        <label class="color-check" for="blue"></label>
                                    </li>
                                    <li>
                                        <input type="radio" class="btn-check" name="color" id="green"
                                            value="green" autocomplete="off" required>
                                        <label class="color-check" for="green"></label>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group mb-4 sizes d-flex align-items-center gap-2">
                                <label class="form-label m-0 me-auto">اضافة المقاس إن وجد</label>
                                <button type="button" class="add-option-btn" data-bs-toggle="modal"
                                    data-bs-target="#addOptionModal" data-value="add-size" id="modalLink"><i
                                        class="fal fa-plus"></i></button>
                                <ul class="sizes-checks" dir="ltr">
                                    <li>
                                        <input type="radio" class="btn-check" name="size" id="s"
                                            value="s" autocomplete="off" required>
                                        <label class="size-check" for="s">S</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-5">
                                        <label for="stock-num" class="form-label">عدد المخزون*</label>
                                        <input type="number" min="0" value="0"
                                            class="form-control input-1 text-center" name="stock-num" id="stock-num"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-5">
                                        <label for="min-stock" class="form-label">تنبيه الحد الادنى من المخزون*</label>
                                        <input type="number" min="0" value="0"
                                            class="form-control input-1 text-center" name="min-stock" id="min-stock"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="more-details">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <div class="profit">
                                            <label>الربح</label>
                                            <h5 class="result"><span id="profitNum">0</span></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="profit">
                                            <label>فرق سعر الشراء والبيع</label>
                                            <h5 class="result"><span id="priceDifference">0</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-2 mb-4">
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="sell-price" class="form-label">سعر البيع</label>
                                        </div>
                                        <div class="col-7 g-0">
                                            <span class="kwd">د.ك</span>
                                            <input type="number" placeholder="ادخل سعر البيع"
                                                class="form-control price-input" name="sell-price" id="sell-price">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-2 mb-4">
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="price-before-disc" class="form-label">السعر قبل الخصم</label>
                                        </div>
                                        <div class="col-7 g-0">
                                            <span class="kwd">د.ك</span>
                                            <input type="number" placeholder="ادخل السعر قبل الخصم" class="form-control"
                                                name="price-before-disc" id="price-before-disc">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-2 mb-4">
                                    <div class="row">
                                        <div class="col-5">
                                            <label for="cost-price" class="form-label">سعر التكلفة</label>
                                        </div>
                                        <div class="col-7 g-0">
                                            <span class="kwd">د.ك</span>
                                            <input type="number" placeholder="ادخل سعر التكلفة"
                                                class="form-control price-input" name="cost-price" id="cost-price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-1 w-100">حفظ واضافة الى القسم</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Modal -->
    <!-- contact-modal -->
    <div class="modal modal-one add-option-modal fade" id="addOptionModal" tabindex="-1"
        aria-labelledby="addOptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                    <div id="add-color">
                        <h5 class="title">اضافة لون جديد</h5>
                        <form action="">
                            <div class="form-group mb-4 d-flex align-items-center justify-content-center gap-3">
                                <label for="color" class="form-label m-0">قم بالضغط واختر اللون المناسب:</label>
                                <input type="color" class="form-control color-input" id="color" name="color">
                            </div>
                            <button type="submit" class="btn-1 m-auto">حفظ</button>
                        </form>
                    </div>
                    <div id="add-size">
                        <h5 class="title">اضافة لون جديد</h5>
                        <form action="">
                            <div class="form-group mb-4">
                                <label for="size" class="form-label">اختر المقاس المناسب</label>
                                <select class="form-select input-1" id="size" name="size">
                                    <option selected disabled>المقاس</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-1 m-auto">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('custom-scripts'); ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="assets/js/fa-pro.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        /* calc-profits */
        let input = document.querySelectorAll(".price-input");

        function calcFun() {
            let sellPrice = $("#sell-price").val();
            let costPrice = $("#cost-price").val();
            let profit = sellPrice - costPrice;
            $("#profitNum").html(`${profit} KWD`);
            let profitPercent = profit / costPrice;
            $("#priceDifference").html(`${profitPercent}%`);
            if (costPrice == 0 || costPrice == '') {
                $("#priceDifference").html(`0%`);
            }
        }
        calcFun();
        for (let i = 0; i < $(input).length; i++) {
            $(input[i]).keyup(function() {
                calcFun();
                document.body.addEventListener("keydown", (e) => {
                    if (e.key == "Enter") {
                        result.innerText = "Enter Key Pressed";
                    }
                    if (e.key == "Enter" && e.shiftKey) {
                        result.innerText = "Enter + Shift Key Pressed";
                    }
                });
            })
        }

        /* switch-between-modal-contents */
        $(function() {
            let modalLink = document.querySelectorAll("#modalLink"),
                modalContent = document.querySelector("#modalContent");
            for (let i = 0; i < $(modalLink).length; i++) {
                let link = $(modalLink[i]);
                $(link).click(function() {
                    $(modalContent).find(`#${$(link).attr("data-value")}`).show().siblings().hide();
                })
            }
        })
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
            </script>
            -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/products/create.blade.php ENDPATH**/ ?>
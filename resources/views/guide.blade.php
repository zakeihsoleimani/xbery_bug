@extends('layout.master')

@section('content')

<main class="border rounded p-3" dir="rtl">

    <div class="text-center mb-5">

        <div class="mb-6">
             <div class="alert alert-warning border-0 shadow-sm p-4">

                <h2 class="h5 fw-bold mb-4">
                    <i class="bi bi-exclamation-triangle ms-2"></i>
                    توجه
                </h2>

                <ul class="mb-0 lh-lg">

                    <li>
                        این سامانه برای گزارش و پیگیری مسائل و باگ‌های سیستم‌های مختلف طراحی شده است
                    </li>
                    <li>
                        لطفاً قبل از گزارش یک باگ، مطمئن شوید که مسئله تکراری نیست
                    </li>
                </ul>

            </div>
        </div>

    </div>

    <section class="mb-5" dir="rtl">
        <div>

            <div class="text-center mb-5">

                <h2 class="fw-bold mb-3">
                    سامانه‌ای برای مدیریت و پیگیری مسائل
                </h2>

                <p class="lead text-muted mx-auto" style="max-width: 750px;">
                    این سامانه ابزاری برای ساده‌سازی فرآیند گزارش، پیگیری و حل مسائل و باگ‌های
                    سیستم‌های مختلف است
                </p>
            </div>

            {{-- ویژگی‌های اصلی --}}
            <div class="row mt-10 mb-5">
                <h2 class="h4 fw-bold text-center mb-3">نقش‌های کاربری</h2>

                {{-- گزارش‌کننده --}}
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">

                            <div class="fs-1 text-primary mb-3">
                                <i class="bi bi-bug"></i>
                            </div>

                            <h3 class="h5 fw-bold mb-3">📝
                                گزارش‌کننده
                            </h3>

                            <p class="text-muted mb-0">
                                کسی که مسائل و باگ‌های سیستم را کشف کرده و گزارش می‌دهد.
                                می‌تواند باگ‌های خود را ثبت کند، وضعیت آن‌ها را پیگیری کند و
                                با تیم پشتیبانی مکاتبه کند.
                            </p>

                        </div>
                    </div>
                </div>

                <!-- مسئول پردازش -->
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">

                            <div class="fs-1 text-success mb-3">
                                <i class="bi bi-check-circle"></i>
                            </div>

                            <h3 class="h5 fw-bold mb-3">⚙️
                                مسئول پردازش
                            </h3>

                            <p class="text-muted mb-0">
                                کسی که مسئول بررسی و حل مسائل گزارش‌شده است.
                                می‌تواند وضعیت باگ را تغییر دهد، پیام‌های توضیحی بفرستد و
                                نهایتا باگ را حل‌شده علامت‌گذاری کند.
                            </p>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================= -->
    <!-- فرآیند گزارش باگ -->
    <!-- ========================================= -->

    <section class="mb-5">

        <h2 class="h4 fw-bold mb-4">
            <i class="bi bi-diagram-3 text-primary ms-2"></i>
            فرآیند گزارش و پیگیری باگ
        </h2>

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-lg-5">

                <p class="text-secondary lh-lg mb-4">
                    فرآیند گزارش و پیگیری باگ در سامانه به صورت مرحله‌ای انجام می‌شود.
                    مراحل اصلی این فرآیند به صورت زیر است:
                </p>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                            <span class="badge bg-primary rounded-circle p-2">۱</span>
                            <span>ثبت باگ جدید</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                            <span class="badge bg-primary rounded-circle p-2">۲</span>
                            <span>انتساب به مسئول</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                            <span class="badge bg-primary rounded-circle p-2">۳</span>
                            <span>بررسی و مکاتبه</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                            <span class="badge bg-primary rounded-circle p-2">۴</span>
                            <span>حل و بستن باگ</span>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================================= -->
    <!-- ثبت باگ جدید -->
    <!-- ========================================= -->

    <section class="mb-5">

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-lg-5">

                <h2 class="h4 fw-bold mb-4">
                    <i class="bi bi-pencil-square text-primary ms-2"></i>
                    چگونه باگ جدید ثبت کنیم؟
                </h2>

                <p class="text-secondary lh-lg mb-4">
                    برای ثبت یک باگ جدید، مراحل زیر را دنبال کنید:
                </p>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="border rounded p-3 h-100">
                            <i class="bi bi-1-circle fs-4 text-primary"></i>
                            <h3 class="h6 fw-bold mt-3">
                                رفتن به صفحه ثبت باگ
                            </h3>
                            <p class="small text-muted mb-0">
                                از فهرست برنامه‌ریزی (سایدبار)، بر روی گزینه‌ی "گزارش یا ثبت پیشنهاد" کلیک کنید.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded p-3 h-100">
                            <i class="bi bi-2-circle fs-4 text-primary"></i>
                            <h3 class="h6 fw-bold mt-3">
                                پرکردن فرم
                            </h3>
                            <p class="small text-muted mb-0">
                                صفحه‌ای که مسئله در آن رخ داده را انتخاب کنید و توضیح تفصیلی درباره
                                باگ بنویسید.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded p-3 h-100">
                            <i class="bi bi-3-circle fs-4 text-primary"></i>
                            <h3 class="h6 fw-bold mt-3">
                                ارسال باگ
                            </h3>
                            <p class="small text-muted mb-0">
                                پس از پرکردن اطلاعات، بر روی دکمه‌ی "ثبت باگ" کلیک کنید.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="border rounded p-3 h-100">
                            <i class="bi bi-4-circle fs-4 text-primary"></i>
                            <h3 class="h6 fw-bold mt-3">
                                پیگیری وضعیت
                            </h3>
                            <p class="small text-muted mb-0">
                                باگ ثبت می‌شود و می‌تواند وضعیت آن را از صفحه "باگ‌های من" پیگیری کنید.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================================= -->
    <!-- وضعیت‌های باگ -->
    <!-- ========================================= -->

    <section class="mb-5">

        <h2 class="h4 fw-bold mb-4">
            <i class="bi bi-info-circle text-primary ms-2"></i>
            وضعیت‌های مختلف باگ
        </h2>

        <div class="card border-0 shadow-sm">

            <div class="card-body p-4 p-lg-5">

                <p class="text-secondary lh-lg mb-4">
                    هر باگ در طول فرآیند پیگیری از وضعیت‌های مختلفی عبور می‌کند:
                </p>

                <div class="row g-3">

                    <div class="col-md-4">
                        <div class="card border-danger shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="fw-bold text-danger mb-2">
                                    <i class="bi bi-exclamation-circle"></i>
                                    وضعیت: باز
                                </div>
                                <p class="small text-muted mb-0">
                                    باگ جدید ثبت‌شده و هنوز به کسی انتساب نیافته است
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-warning shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="fw-bold text-warning mb-2">
                                    <i class="bi bi-arrow-repeat"></i>
                                    وضعیت: در حال بررسی
                                </div>
                                <p class="small text-muted mb-0">
                                    باگ به مسئول اختصاصی انتساب یافته و در حال بررسی است
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card border-success shadow-sm h-100">
                            <div class="card-body text-center">
                                <div class="fw-bold text-success mb-2">
                                    <i class="bi bi-check-circle"></i>
                                    وضعیت: حل‌شده
                                </div>
                                <p class="small text-muted mb-0">
                                    باگ بررسی‌شده و مسئله حل شده است
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- ========================================= -->
    <!-- نکات مهم -->
    <!-- ========================================= -->

    <section class="mb-5">

        <div class="alert alert-warning border-0 shadow-sm p-4">

            <h2 class="h5 fw-bold mb-4">
                <i class="bi bi-exclamation-triangle ms-2"></i>
                نکات مهم
            </h2>

            <ul class="mb-0 lh-lg">

                <li>
                    قبل از ثبت باگ، مطمئن شوید که این مسئله قبل‌تر گزارش نشده است.
                </li>

                <li>
                    توضیحات تفصیلی باگ را بنویسید تا مسئول به‌راحتی بتواند آن را فهم کند.
                </li>

                <li>
                    اگر امکان دارد، مراحل تکرار مسئله را شرح دهید.
                </li>

                <li>
                    منتظر باشید تا مسئول باگ شما را بررسی کند و پاسخ دهد.
                </li>

                <li>
                    اگر سؤالی دارید، می‌توانید پیام‌های توضیحی بفرستید.
                </li>

            </ul>

        </div>

    </section>

    <!-- ========================================= -->
    <!-- سوالات متداول -->
    <!-- ========================================= -->

    <section class="mb-5">

        <h2 class="h4 fw-bold mb-4">
            <i class="bi bi-question-circle text-primary ms-2"></i>
            سوالات متداول
        </h2>

        <div class="accordion" id="faqAccordion">

            <!-- سوال ۱ -->
            <div class="accordion-item border-0 shadow-sm mb-2">

                <h3 class="accordion-header">

                    <button
                        class="accordion-button collapsed justify-content-between"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqOne">

                        چقدر طول می‌کشد تا باگ من بررسی شود؟

                    </button>

                </h3>

                <div id="faqOne"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-secondary lh-lg">

                        زمان بررسی باگ بستگی به شدت و پیچیدگی مسئله دارد.
                        تیم پشتیبانی تلاش می‌کند تا در سریع‌ترین زمان ممکن
                        باگ‌ها را بررسی کند.

                    </div>

                </div>

            </div>

            <!-- سوال ۲ -->
            <div class="accordion-item border-0 shadow-sm mb-2">

                <h3 class="accordion-header">

                    <button
                        class="accordion-button collapsed justify-content-between"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqTwo">

                        چگونه می‌تواتوانم وضعیت باگ خود را بررسی کنم؟

                    </button>

                </h3>

                <div id="faqTwo"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-secondary lh-lg">

                        از طریق صفحه "باگ‌های من"، می‌توانید تمام باگ‌های
                        گزارش‌شده توسط خود را مشاهده کنید و وضعیت هرکدام را پیگیری کنید.

                    </div>

                </div>

            </div>

            <!-- سوال ۳ -->
            <div class="accordion-item border-0 shadow-sm mb-2">

                <h3 class="accordion-header">

                    <button
                        class="accordion-button collapsed justify-content-between"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqThree">

                        آیا می‌توانم باگ ثبت‌شده را ویرایش کنم؟

                    </button>

                </h3>

                <div id="faqThree"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-secondary lh-lg">

                        باگ‌های ثبت‌شده نمی‌توانند مستقیماً ویرایش شوند، اما
                        می‌توانید از طریق صفحه بررسی باگ، پیام‌های توضیحی اضافی ارسال کنید.

                    </div>

                </div>

            </div>

            <!-- سوال ۴ -->
            <div class="accordion-item border-0 shadow-sm">

                <h3 class="accordion-header">

                    <button
                        class="accordion-button collapsed justify-content-between"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#faqFour">

                        اگر باگ حل‌شده علامت‌گذاری شود، می‌تواتوانم اعتراض کنم؟

                    </button>

                </h3>

                <div id="faqFour"
                     class="accordion-collapse collapse"
                     data-bs-parent="#faqAccordion">

                    <div class="accordion-body text-secondary lh-lg">

                        بله. اگر فکر می‌کنید باگ هنوز حل نشده است، می‌توانید
                        یک پیام بفرستید تا مسئول دوباره باگ را بررسی کند.

                    </div>

                </div>

            </div>

        </div>

    </section>

</main>

@endsection

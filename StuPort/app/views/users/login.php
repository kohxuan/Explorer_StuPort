<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>StuPort</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public/assets/media/logos/yvtablogo.png" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?php echo URLROOT ?>/public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URLROOT ?>/public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form action="<?php echo URLROOT; ?>/users/login" method="POST">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <img src="https://i.ibb.co/7byWKRt/youth-venture-logo.png" alt="youth-venture-logo " style="height: 80px; margin-right: 10px;">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">StuPort</div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->


                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->

                                <?php if ($data['emailError'] != "") { ?>
                                    <span class="badge badge-danger"><?php echo $data['emailError']; ?></span>
                                <?php } ?>

                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" />
                                <?php if ($data['passwordError'] != "") { ?>
                                    <span class="badge badge-danger"><?php echo $data['passwordError']; ?></span>
                                <?php } ?>
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <!--begin::Link-->
                                <!-- <a href="authentication/layouts/corporate/reset-password.html" class="link-primary">Forgot Password ?</a> -->
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn" style="background-color: #FCBD32; color: #ffffff;">Sign In</button>


                                <!--begin::Indicator label-->

                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign up-->
                            <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                                <a href="<?php echo URLROOT; ?>/users/register" class="link-primary">Sign up</a>
                            </div>
                            <!--end::Sign up-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2" style="background-image: url('https://i.ibb.co/vqRd3P2/Yv-logo-login.jpg');">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100 align-self-start">
                    <!--begin::Logo-->
                    <a href="index.html" class="mb-0 mb-lg-12">
                        <img src="https://i.ibb.co/7byWKRt/youth-venture-logo.png" alt="youth-venture-logo " style="height: 80px; margin-right: 10px;">
                    </a>
                    <!--end::Logo-->
                    <!--begin::Image-->

                    <!--begin::Title-->
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    <br></br>
                    
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Expert In Youth</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <!-- <div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a
                        person they’ve interviewed
                        <br />and provides some background information about
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
                        <br />work following this is a transcript of the interview.
                    </div> -->
                    <!--end::Text-->

                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?php echo URLROOT ?>/public/assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?php echo URLROOT ?>/public/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?php echo URLROOT ?>/public/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
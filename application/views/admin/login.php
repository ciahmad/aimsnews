<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../">
        <title>Login : <?php echo $name; ?></title>
        <meta charset="utf-8" />
        <meta name="description" content="Discover AIMS with great featurs to manage your institutional activities. This application is end to end encripted to secure user's data and integrity" />
        <meta name="keywords" content="institutional, institute, application" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
        <meta property="og:url" content="https://keenthemes.com/metronic" />
        <meta property="og:site_name" content="Keenthemes | Metronic" />
        <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php $this->setting_model->getAdminsmalllogo($result['admin_id']);?>" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="bg-body">
        <!--begin::Main-->
        <!--begin::Root-->

        <div class="d-flex flex-column flex-root">
            <!--begin::Authentication - Sign-in -->
            <div class="d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Aside-->
                <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                        <!--begin::Content-->
                        <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                            <!--begin::Logo-->
                            <a href="<?php echo base_url(); ?>" class="py-9 mb-5">
                                <img alt="Logo" src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo(); ?>" class="h-60px" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Title-->
                            <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to AIMS</h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <p class="fw-bold fs-2" style="color: #986923;">Explore and Enjoy 
                            <br />(Advance Institutional Management System)</p>
                            <!--end::Description-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Illustration-->
                        <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(<?php echo base_url(); ?>assets/media/illustrations/sketchy-1/13.png"></div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Aside-->
                <!--begin::Body-->
                <div class="d-flex flex-column flex-lg-row-fluid py-10">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column flex-column-fluid">
                        <!--begin::Wrapper-->
                        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                            <!--begin::Form-->
                            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="<?php echo site_url('site/login') ?>" action="<?php echo site_url('site/login') ?>">
                                <!--begin::Heading-->
                                <div class="text-center mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">Sign In to AIMS</h1>
                                    <!--end::Title-->
                                    <!--begin::Link-->
                                    <div class="text-gray-400 fw-bold fs-4">New Here?
                                    <a href="<?php echo site_url('site/register') ?>" class="link-primary fw-bolder">Create an Account</a></div>
                                    <!--end::Link-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-6 fw-bolder text-dark"><?php echo $this->lang->line('username'); ?></label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input id="username" class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack mb-2">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                        <!--end::Label-->
                                        <!--begin::Link-->
                                        <a href="<?php echo site_url('site/forgotpassword') ?>" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <!--begin::Submit button-->
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                        <span class="indicator-label">Continue</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Submit button-->
                                    <!--begin::Separator-->
                                    <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                                    <!--end::Separator-->
                                    <!--begin::Google link-->
                                    <a href="javascript:" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                    <img alt="Logo" src="<?php echo base_url(); ?>assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
                                    <!--end::Google link-->
                                    <!--begin::Google link-->
                                    <a href="javascript:" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                    <img alt="Logo" src="<?php echo base_url(); ?>assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
                                    <!--end::Google link-->
                                    <!--begin::Google link-->
                                    <a href="javascript:" class="btn btn-flex flex-center btn-light btn-lg w-100">
                                    <img alt="Logo" src="<?php echo base_url(); ?>assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>
                                    <!--end::Google link-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                        <!--begin::Links-->
                        <div class="d-flex flex-center fw-bold fs-6">
                            <a href="<?php echo site_url('site/login') ?>" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                            <a href="<?php echo site_url('site/login') ?>" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
                            <a href="<?php echo site_url('site/login') ?>" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Sign-in-->
        </div>
        <!--end::Root-->
        <!--end::Main-->
        <!--begin::Javascript-->
        <script>var hostUrl = "<?php echo base_url(); ?>assets/";</script>
        <!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
        <!--end::Global Javascript Bundle-->
        <!--begin::Page Custom Javascript(used by this page)-->
        <script src="<?php echo base_url(); ?>assets/js/custom/authentication/sign-in/general.js"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->
</html>
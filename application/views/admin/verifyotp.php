<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../">
        <title>OTP Verification: <?php echo $name; ?></title>
        <meta charset="utf-8" />
        <meta name="description" content="Discover AIMS with great featurs to manage your institutional activities. This application is end to end encripted to secure user's data and integrity" />
        <meta name="keywords" content="institutional, institute, application" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="institutional, institute, application" />
        <meta property="og:url" content="https://myaims.net/" />
        <meta property="og:site_name" content="institute | application" />
        <link rel="canonical" href="https://myaims.net/" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php $this->setting_model->getAdminsmalllogo(); ?>" />
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
            <!--begin::Authentication - Two-stes -->
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
                            <p class="fw-bold fs-2" style="color: #986923;">Discover Amazing AIMS
                            <br />with great build tools</p>
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
                        <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                            <!--begin::Form-->
                            <form class="form w-100 mb-10" novalidate="novalidate" data-kt-redirect-url="<?php echo site_url('site/verifyOneTimePassword') ?>" id="kt_sing_in_two_steps_form">
                                <!--begin::Icon-->
                                <div class="text-center mb-10">
                                    <img alt="Logo" class="mh-125px" src="<?php echo base_url(); ?>uploads/school_content/admin_logo/<?php $this->setting_model->getAdminlogo(); ?>" />
                                </div>
                                <!--end::Icon-->
                                <!--begin::Heading-->
                                <div class="text-center mb-10">
                                    <!--begin::Title-->
                                    <h1 class="text-dark mb-3">OTP Verification</h1>
                                    <!--end::Title-->
                                    <!--begin::Sub-title-->
                                    <div class="text-muted fw-bold fs-5 mb-5">Enter the verification code we sent to your email</div>
                                    <!--end::Sub-title-->
                                    <!--begin::Mobile no-->
                                    <div class="fw-bolder text-dark fs-3"><?php echo $this->session->userdata("user_email")?></div>
                                    <!--end::Mobile no-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Section-->
                                <div class="mb-10 px-md-10">
                                    <!--begin::Label-->
                                    <div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">Type your 6 digit security code</div>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-wrap flex-stack">
                                        <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                                        <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                                        <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                                        <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                                        <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                                        <input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
                                    </div>
                                    <!--begin::Input group-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Submit-->
                                <div class="d-flex flex-center">
                                    <button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bolder">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Submit-->
                            </form>
                            <!--end::Form-->
                            <!--begin::Notice-->
                            <div class="text-center fw-bold fs-5">
                                <span class="text-muted me-1">Didn’t get the code ?</span>
                                <a href="#" class="link-primary fw-bolder fs-5 me-1">Resend</a>
                                <span class="text-muted me-1">or</span>
                                <a href="#" class="link-primary fw-bolder fs-5">Call Us</a>
                            </div>
                            <!--end::Notice-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                        <!--begin::Links-->
                        <div class="d-flex flex-center fw-bold fs-6">
                            <a href="<?php echo base_url(); ?>" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                            <a href="<?php echo base_url(); ?>" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
                            <a href="<?php echo base_url(); ?>" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Authentication - Two-stes-->
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
        <script src="<?php echo base_url(); ?>assets/js/custom/authentication/sign-in/two-steps.js"></script>
        <!--end::Page Custom Javascript-->
        <!--end::Javascript-->
    </body>
    <!--end::Body-->
</html>
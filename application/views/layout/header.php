<?php $result = $this->customlib->getUserData();
//echo '<pre>';print_r($result); die();
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title style="text-align: center;"><?= $result['school_name'] ?></title>
    <meta charset="utf-8" />
    <!-- <meta name="description" content="The most advanced Bootstrap Adfin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
        <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php $this->setting_model->getAdminsmalllogo($result['admin_id']); ?>" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/school_content/admin_small_logo/<?php $this->setting_model->getAdminsmalllogo($result['admin_id']); ?>" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.main.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<!--end::Head-->
<style type="text/css">
    .input-contain {
        position: relative;
    }

    input {
        height: 3.6rem;
        width: 24rem;
        border: 2px solid black;
        border-radius: 1rem;
    }

    input:focus {
        outline: none;
        border-color: blueviolet;
    }

    input:focus+.placeholder-text .text,
    :not(input[value=""])+.placeholder-text .text {
        background-color: white;
        font-size: 0.8rem;
        color: black;
        transform: translate(0, -160%);
    }

    input:focus+.placeholder-text .text {
        border-color: blueviolet;
        color: blueviolet;
    }

    .placeholder-text {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        border: 3px solid transparent;
        background-color: transparent;
        pointer-events: none;
        display: flex;
        align-items: center;
    }

    .text {
        font-size: 1rem;
        padding: 0 0.5rem;
        background-color: transparent;
        transform: translate(0);
        color: black;
        transition: transform 0.15s ease-out, font-size 0.15s ease-out, background-color 0.2s ease-out, color 0.15s ease-out;
    }

    input,
    .placeholder-text {
        font-size: 1.4rem;
        padding: 0 1.2rem;
    }

    @media (max-width: 40rem) {
        input {
            width: 70vw;
        }
    }
</style>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">

        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <div class="download_label">
                <h2>Hello World</h2>
            </div>
                <!--begin::Header-->
                <?php $this->load->view('layout/top_header_menu'); ?>
                <!--end::Header-->
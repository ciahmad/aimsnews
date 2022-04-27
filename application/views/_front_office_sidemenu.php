<!--begin::Menu-->
<div class="menu menu-rounded menu-column menu-title-gray-700 menu-icon-gray-400 menu-arrow-gray-400 menu-bullet-gray-400 menu-arrow-gray-400 menu-state-bg fw-bold w-250px card pt-10" data-kt-menu="true">
    <!--begin::Menu item-->
    <h4 class="text-black mb-3" style="padding-left: 19px;color: #F1BC00">RECEPTION MENU</h4>
    <div class="menu-item">
        <a href="<?= base_url('admin/enquiry'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Enquiry Book</span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/generalcall'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Phone Call Log</span>
        </a>
    </div>
    <div class="menu-item">
        <a href="<?= base_url('admin/dispatch'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Postal Dispatch</span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/receive'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Postal Receive</span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/complaint'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Complain</span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/visitors'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title">Visitor Book</span>
        </a>
    </div>

   

    

    <div class="menu-item menu-accordion" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3">
            <span class="menu-icon">
                <i class="bi bi-bar-chart fs-3"></i>
            </span>
            <span class="menu-title">Setup Reception</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->

        <div class="menu-sub menu-sub-accordion pt-3">
            <!--begin::Menu item-->

            <!--end::Menu item-->

            <!--begin::Menu item-->
            <div class="menu-item">
                <a href="<?= base_url('admin/visitorspurpose'); ?>" class="menu-link py-3">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Purpose</span>
                </a>
            </div>
            <!--end::Menu item-->

             <!--begin::Menu item-->
             <div class="menu-item">
                <a href="<?= base_url('admin/complainttype'); ?>" class="menu-link py-3">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Complain Type</span>
                </a>
            </div>
            <!--end::Menu item-->

             <!--begin::Menu item-->
             <div class="menu-item">
                <a href="<?= base_url('admin/source'); ?>" class="menu-link py-3">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Source</span>
                </a>
            </div>
            <!--end::Menu item-->

             <!--begin::Menu item-->
             <div class="menu-item">
                <a href="<?= base_url('admin/reference'); ?>" class="menu-link py-3">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Reference</span>
                </a>
            </div>
            <!--end::Menu item-->

            
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu-->
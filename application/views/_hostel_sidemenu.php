<!--begin::Menu-->
<div class="menu menu-rounded menu-column menu-title-gray-700 menu-icon-gray-400 menu-arrow-gray-400 menu-bullet-gray-400 menu-arrow-gray-400 menu-state-bg fw-bold w-250px card pt-10" data-kt-menu="true">
    <!--begin::Menu item-->
    <h4 class="text-black mb-3" style="padding-left: 19px;color: #F1BC00">HOSTEL MANANGEMENT</h4>
    <div class="menu-item">
        <a href="<?= base_url('admin/hostelroom'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('hostel_rooms'); ?></span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/roomtype'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('room_type'); ?></span>
        </a>
    </div>
    <div class="menu-item">
        <a href="<?= base_url('admin/hostel'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('hostel'); ?></span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/receive'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('assign_room'); ?></span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/complaint'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('assign_warden'); ?></span>
        </a>
    </div>



    <div class="menu-item">
        <a href="<?= base_url('admin/visitors'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('hostel_list'); ?></span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/visitors'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('rooms_list'); ?></span>
        </a>
    </div>

    <div class="menu-item">
        <a href="<?= base_url('admin/visitors'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('assigned_rooms'); ?></span>
        </a>
    </div>


    <div class="menu-item">
        <a href="<?= base_url('admin/visitors'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('available_rooms'); ?></span>
        </a>
    </div>


    <div class="menu-item">
        <a href="<?= base_url('admin/visitors'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('hostel_management'); ?></span>
        </a>
    </div>

    <!--end::Menu item-->
</div>
<!--end::Menu-->
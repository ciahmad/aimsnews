<!--begin::Menu-->
<div class="menu menu-rounded menu-column menu-title-gray-700 menu-icon-gray-400 menu-arrow-gray-400 menu-bullet-gray-400 menu-arrow-gray-400 menu-state-bg fw-bold w-250px card pt-10" data-kt-menu="true">
    <!--begin::Menu item-->
    <h6 class="text-black mb-3" style="padding-left: 19px;color: #F1BC00">TRANSPORT MANANGEMENT</h6>
    <?php if ($this->rbac->hasPrivilege('routes', 'can_view')) { ?>
    <div class="menu-item">
        <a  href="<?= base_url('admin/route'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('routes'); ?></span>
        </a>
    </div>
    <?php }  if ($this->rbac->hasPrivilege('vehicle', 'can_view')) {
    ?>

    <div class="menu-item">
        <a href="<?= base_url('admin/vehicle'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('vehicles'); ?></span>
        </a>
    </div> 
    <?php } if ($this->rbac->hasPrivilege('assign_vehicle', 'can_view')) { ?>
    <div class="menu-item">
        <a href="<?= base_url('admin/vehroute'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('assign_vehicle'); ?></span>
        </a>
    </div>
    <?php } 
    
    ?>

    <div class="menu-item">
        <a href="javascript:" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('assign_students'); ?></span>
        </a>
    </div>

    <div class="menu-item">
        <a href="javascript:" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('assign_staff'); ?></span>
        </a>
    </div>



    <div class="menu-item">
        <a href="javascript:" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?= $this->lang->line('transport_reports'); ?></span>
        </a>
    </div>


    <!--end::Menu item-->
</div>
<!--end::Menu-->
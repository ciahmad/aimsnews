<!--begin::Menu-->
<div class="menu menu-rounded menu-column menu-title-gray-700 menu-icon-gray-400 menu-arrow-gray-400 menu-bullet-gray-400 menu-arrow-gray-400 menu-state-bg fw-bold w-250px card pt-10" data-kt-menu="true">
    <!--begin::Menu item-->
    <h6 class="text-black mb-2" style="padding-left: 19px;color: #F1BC00; font-size:13px">INVENTORY MANANGEMENT</h6>
    <?php if ($this->rbac->hasPrivilege('issue_item', 'can_view')) { ?>
        <div class="menu-item">
            <a href="<?= base_url('admin/issueitem'); ?>" class="menu-link py-3">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"><?= $this->lang->line('issue_item'); ?></span>
            </a>
        </div>

        <div class="menu-item">
            <a href="<?= base_url('admin/itemstock'); ?>" class="menu-link py-3">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title"><?= $this->lang->line('add_item_stock'); ?></span>
            </a>
        </div>

    <?php } // if ($this->rbac->hasPrivilege('vehicle', 'can_view')) {
    ?>

    <div class="menu-item menu-accordion" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3">
            <span class="menu-icon">
                <i class="bi bi-bar-chart fs-3"></i>
            </span>
            <span class="menu-title">Setup Inventory</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->

        <div class="menu-sub menu-sub-accordion pt-3">

            <!--begin::Menu item-->
            <?php
            if ($this->rbac->hasPrivilege('item', 'can_view')) { ?>
                <div class="menu-item">
                    <a href="<?= base_url('admin/item'); ?>" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title"><?= $this->lang->line('add_item'); ?></span>
                    </a>
                </div>
            <?php } ?>
            <?php if ($this->rbac->hasPrivilege('item_category', 'can_view')) { ?>
                <div class="menu-item">
                    <a href="<?= base_url('admin/itemcategory'); ?>" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title"><?= $this->lang->line('item_category'); ?></span>
                    </a>
                </div>
            <?php } ?>

            <?php if ($this->rbac->hasPrivilege('store', 'can_view')) { ?>
                <div class="menu-item">
                    <a href="<?= base_url('admin/itemstore'); ?>" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title"><?= $this->lang->line('item_store'); ?></span>
                    </a>
                </div>
            <?php } ?>

            <?php if ($this->rbac->hasPrivilege('supplier', 'can_view')) { ?>
                <div class="menu-item">
                    <a href="<?= base_url('admin/itemsupplier'); ?>" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title"><?= $this->lang->line('item_supplier'); ?></span>
                    </a>
                </div>
            <?php } ?>
            <!--end::Menu item-->


        </div>
        <!--end::Menu sub-->
    </div>

    <div class="menu-item menu-accordion" data-kt-menu-trigger="click">
        <!--begin::Menu link-->
        <a href="#" class="menu-link py-3">
            <span class="menu-icon">
                <i class="bi bi-bar-chart fs-3"></i>
            </span>
            <span class="menu-title">Reports</span>
            <span class="menu-arrow"></span>
        </a>
        <!--end::Menu link-->

        <!--begin::Menu sub-->

        <div class="menu-sub menu-sub-accordion pt-3">

            <!--begin::Menu item-->

            <?php //if ($this->rbac->hasPrivilege('supplier', 'can_view')) { ?>
                <div class="menu-item">
                    <a href="" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Stock Report</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Add Item Report</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="" class="menu-link py-3">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Issue Item Report</span>
                    </a>
                </div>
            <?php //} ?>
            <!--end::Menu item-->

            


        </div>
        <!--end::Menu sub-->
    </div>

    <!-- <div class="menu-item">
        <a href="<?= base_url('report/inventory'); ?>" class="menu-link py-3">
            <span class="menu-bullet">
                <span class="bullet bullet-dot"></span>
            </span>
            <span class="menu-title"><?php echo $this->lang->line('inventory'); ?> <?php echo $this->lang->line('reports'); ?></span>
        </a>
    </div> -->

    <!--end::Menu item-->
</div>
<!--end::Menu-->
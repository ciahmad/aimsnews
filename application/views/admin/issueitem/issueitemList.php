<style>
    td {
        padding-top: 0.25rem !important;
        padding-bottom: 0.25rem !important;
    }

    th {
        padding-top: 10px !important;
        padding-bottom: 10px !important;
    }
</style>
<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Item Item</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Pages</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">FAQ</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Extended</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter
                    </a>
                    <!--end::Menu toggle-->
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_62447660c6e62">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->
                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Status:</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_62447660c6e62" data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Member Type:</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">Author</span>
                                    </label>
                                    <!--end::Options-->
                                    <!--begin::Options-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                        <span class="form-check-label">Customer</span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-bold">Notifications:</label>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                    <label class="form-check-label">Enabled</label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->
                </div>
                <!--end::Filter menu-->
                <!--begin::Secondary button-->
                <!--end::Secondary button-->
                <!--begin::Primary button-->
                <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_reference">Issue Item</a>
                <!--end::Primary button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::FAQ card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-5">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-lg-row">
                        <!--begin::Sidebar-->
                        <?php $this->load->view('_ inventory_sidemenu'); ?>
                        <!--end::Sidebar-->
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid">
                            <!--begin::Extended content-->
                            <div class="card card-p-0 card-flush">
                                <!--begin::Card header-->
                                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                                        </div>
                                        <!--end::Search-->
                                        <!--begin::Export buttons-->
                                        <div id="kt_datatable_example_1_export" class="d-none"></div>
                                        <!--end::Export buttons-->
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                        <!--begin::Export dropdown-->
                                        <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                                    <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                                                    <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Export Report
                                        </button>
                                        <!--begin::Menu-->
                                        <div id="kt_datatable_example_1_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="copy">Copy to clipboard</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="excel">Export as Excel</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="csv">Export as CSV</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="pdf">Export as PDF</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-export="print">Report as print</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::Export dropdown-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Table-->
                                    <table style="font-size:12px !important" class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                                        <thead>
                                            <tr class="text-start fw-bolder fs-7 text-uppercase themecolor">
                                                <th class="min-w-100px"><?= $this->lang->line('item'); ?></th>
                                                <th class="min-w-100px"><?= $this->lang->line('item_category'); ?></th>
                                                <th class="min-w-100px"><?php echo $this->lang->line('issue') . " - " . $this->lang->line('return'); ?></th>
                                                <th class="min-w-100px"><?= $this->lang->line('issue_to'); ?></th>
                                                <th class="min-w-100px"><?= $this->lang->line('issued_by'); ?></th>
                                                <th class="min-w-100px"><?= $this->lang->line('quantity') . " " . $this->lang->line('price'); ?></th>
                                                <th class="min-w-100px"><?= $this->lang->line('status'); ?></th>

                                                <th class="min-w-100px text-end " style="padding-right: 40px !important">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody class="fw-bold">
                                            <?php if (empty($itemissueList)) {
                                            ?>

                                                <?php
                                            } else {
                                                $count = 1;
                                                foreach ($itemissueList as $item) {
                                                ?>
                                                    <tr>
                                                        <td class="mailbox-name">
                                                            <a href="#" data-toggle="popover" class="detail_popover"><?php echo $item['item_name'] ?></a>

                                                            <div class="fee_detail_popover" style="display: none">
                                                                <?php
                                                                if ($item['note'] == "") {
                                                                ?>
                                                                    <p class="text text-danger"><?php echo $this->lang->line('no_description'); ?></p>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <p class="text text-info"><?php echo $item['note']; ?></p>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                        <td class="mailbox-name">
                                                            <?php echo $item['item_category']; ?>
                                                        </td>


                                                        <td class="mailbox-name">
                                                            <?php
                                                            if ($item['return_date'] == "0000-00-00") {
                                                                $return_date = "";
                                                            } else {
                                                                $return_date = date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($item['return_date']));
                                                            }
                                                            echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($item['issue_date'])) . " - " . $return_date;
                                                            ?>
                                                        </td>
                                                        <td class="mailbox-name">
                                                            <?php
                                                            echo $item['staff_name'] . " " . $item['surname'] . " (" . $item['employee_id'] . ")";;
                                                            ?>
                                                        </td>
                                                        <td class="mailbox-name"><?php echo $item['issue_by']; ?></td>
                                                        <td class="mailbox-name"><?php echo $item['quantity']; ?></td>
                                                        <td class="mailbox-name"><?php if ($item['is_returned'] == 1) { ?>
                                                                <span class="label label-danger item_remove" data-item="<?php echo $item['id'] ?>" data-category="<?php echo $item['item_category'] ?>" data-item_name="<?php echo $item['item_name'] ?>" data-quantity="<?php echo $item['quantity'] ?>" data-toggle="modal" data-target="#confirm-delete"><?php echo $this->lang->line('click_to_return'); ?></span>

                                                            <?php
                                                                                    } else {
                                                            ?>
                                                                <span class="label label-success"><?php echo $this->lang->line('returned'); ?></span>
                                                            <?php
                                                                                    }
                                                            ?>
                                                        </td>
                                                        <td class="text-end" style="padding: 0.25rem !important">
                                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                                <span class="svg-icon svg-icon-5 m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="menu-link px-3">Edit</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>

                                                    </tr>

                                            <?php }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Extended content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Layout-->

                </div>
                <!--end::Body-->
            </div>
            <!--end::FAQ card-->
        </div>
        <!--end::Container-->
    </div>
    <div class="modal fade" id="kt_modal_add_reference" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header" id="data-kt-users-modal-action" style="padding: 10px;background:var(--bs-active-warning) ">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Issue Item</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-toggle="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1" style="color: red;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_add_reference_form" class="form" action="#" method="post" enctype="multipart/form-data">
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_reference_header" data-kt-scroll-wrappers="#kt_modal_add_reference_scroll" data-kt-scroll-offset="300px">
                            <!--begin::Input group-->

                            <div class="fv-row mb-7">
                                <!--begin::Col-->
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->

                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('user_type');  ?></label>
                                        <select class="form-select form-select-solid" name="account_type" onchange="getIssueUser(this.value)" id="input-type-student" data-allow-clear="true">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($roles as $role_key => $role_value) {
                                            ?>


                                                <!--input autofocus="" name="account_type" class="ac_type" id="input-type-student" value="<?php echo $role_value['id']; ?>" type="radio" /-->
                                                <option value="<?php echo $role_value['id']; ?>"><?php echo $role_value['name'] ?></option>

                                                <?php echo $role_value['name']; ?>


                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('issue_to');  ?></label>
                                        <select class="form-select form-select-solid" name="issue_to" id="issue_to">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                    </div>

                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('issue_by');  ?></label>
                                        <select class="form-select form-select-solid" name="issue_by" id="issue_by">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($staff as $key => $value) {
                                            ?>
                                                <option value="<?php echo $value['name'] . ' (' . $value['employee_id'] . ')'; ?>"><?php echo $value['name'] . ' (' . $value['employee_id'] . ')'; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--end::Col-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Col-->
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('issue_date');  ?></label>
                                        <input type="date" id="contact_person_email" name="issue_date" autocomplete="off" value="<?= date('Y-m-d') ?>" placeholder="<?= $this->lang->line('date');  ?>" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
                                    </div>

                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('return_date');  ?></label>
                                        <input type="date" id="return_date" name="return_date" autocomplete="off" value="<?= date('Y-m-d') ?>" placeholder="<?= $this->lang->line('date');  ?>" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
                                    </div>



                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('note');  ?></label>
                                        <input type="text" id="note" name="note" autocomplete="off" value="" placeholder="<?= $this->lang->line('note');  ?>" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
                                    </div>

                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--end::Col-->
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Col-->
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->


                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('issue_to');  ?></label>
                                        <select class="form-select form-select-solid" id="item_category_id" name="item_category_id">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($itemcatlist as $item_category) {
                                            ?>
                                                <option value="<?php echo $item_category['id'] ?>" <?php
                                                                                                    if (set_value('item_category_id') == $item_category['id']) { echo "selected = selected";
                                                                                                    }
                                                                                                    ?>><?php echo $item_category['item_category'] ?></option>

                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('issue_to');  ?></label>
                                        <select class="form-select form-select-solid" id="item_id" name="item_id">
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        </select>
                                    </div>

                                    <div class="input-contain col-sm-4 fv-row">
                                        <label for="floatingPassword"><?= $this->lang->line('quantity');  ?></label>
                                        <input type="text" id="quantity" name="quantity" autocomplete="off" value="" placeholder="<?= $this->lang->line('quantity');  ?>" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
                                        <div id="div_avail">
                                            <span>Available Quantity : </span>
                                            <span id="item_available_quantity">0</span>
                                        </div>
                                    </div>

                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--end::Col-->
                            </div>

                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="button" data-bs-toggle="modal" onclick="javascript:window.location.reload()" class="btn btn-danger btn-active-light-primary me-2">Discard</button>
                            <?php
                            if ($this->rbac->hasPrivilege('item_stock', 'can_add')) {
                            ?>
                                <button type="button" class="btn btn-primary add_reference_data" data-btn-text="save_close" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save') . ' & ' . $this->lang->line('close'); ?>
                                </button>
                                <button type="button" class="btn btn-success add_reference_data ms-1" data-btn-text="save_new" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save') . ' & ' . $this->lang->line('new'); ?> </button> <?php } ?>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Post-->

</div>
<script>
    $(".add_reference_data").on('click', function(e) {
        var $this = $(this);
        var btn_text = $(this).data('btn-text');
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("admin/issueitem/add") ?>',
            type: 'POST',
            data: $('#kt_modal_add_reference_form').serialize(),
            dataType: 'json',

            success: function(data) {
                // console.log(data); return false;
                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function(index, value) {
                        if (value != '') {
                            message += '<span style="color:#f00">' + value + '</span>';
                        }
                    });
                    Swal.fire({
                        html: message,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //errorMsg(message);
                } else {
                    Swal.fire({
                        text: data.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //successMsg(data.message);
                    if (btn_text == 'save_close') {
                        window.location.reload(true);
                    }
                    $('#route_title, #fare').val("");

                }

                $this.button('reset');
            }
        });
    });

    $(document).ready(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $('#item_issue_id').val("");
            $('.debug-url').html('');
            $('#modal_item_quantity,#modal_item,#modal_item_cat').text("");
            var item_issue_id = $(e.relatedTarget).data('item');
            var item_category = $(e.relatedTarget).data('category');
            var quantity = $(e.relatedTarget).data('quantity');
            var item_name = $(e.relatedTarget).data('item_name');
            $('#item_issue_id').val(item_issue_id);
            $('#modal_item_cat').text(item_category);
            $('#modal_item').text(item_name);
            $('#modal_item_quantity').text(quantity);

        });
        $("#confirm-delete").modal({
            backdrop: false,
            show: false

        });
       // var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';


    });


    var base_url = '<?php echo base_url() ?>';

    function populateItem(item_id_post, item_category_id_post) {
        if (item_category_id_post != "") {
            $('#item_id').html("");
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "admin/itemstock/getItemByCategory",
                data: {
                    'item_category_id': item_category_id_post
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(i, obj) {
                        var select = "";
                        if (item_id_post == obj.id) {
                            var select = "selected=selected";
                        }
                        div_data += "<option value=" + obj.id + " " + select + ">" + obj.name + "</option>";
                    });
                    $('#item_id').append(div_data);
                }

            });
        }
    }


    $(document).on('change', '#item_category_id', function(e) {
        $('#item_id').html("");
        var item_category_id = $(this).val();
        populateItem(0, item_category_id);
    });
    $(document).on('change', '#item_id', function(e) {
        $('#div_avail').hide();
        var item_id = $(this).val();
        availableQuantity(item_id);

    });

    function availableQuantity(item_id) {
        if (item_id != "") {
            $('#item_available_quantity').html("");
            var div_data = '';
            $.ajax({
                type: "GET",
                url: base_url + "admin/item/getAvailQuantity",
                data: {
                    'item_id': item_id
                },
                dataType: "json",
                success: function(data) {

                    $('#item_available_quantity').html(data.available);
                    $('#div_avail').show();
                }

            });
        }
    }

    $("input[name=account_type]:radio").change(function() {
        var user = $('input[name=account_type]:checked').val();
        getIssueUser(user);



    });

    function getIssueUser(usertype) {
        $('#issue_to').html("");
        var div_data = "";
        $.ajax({
            type: "POST",
            url: base_url + "admin/issueitem/getUser",
            data: {
                'usertype': usertype
            },
            dataType: "json",
            success: function(data) {

                $.each(data.result, function(i, obj) {
                    if (data.usertype == "admin") {
                        name = obj.username;
                    } else {
                        name = obj.name + " " + obj.surname + " (" + obj.employee_id + ")";

                    }
                    div_data += "<option value=" + obj.id + ">" + name + "</option>";
                });
                $('#issue_to').append(div_data);
            }

        });
    }

    $("#issueitem").submit(function(e) {
        var data = $(this).serializeArray();
        var issue_to = $('#issue_to option:selected').text();
        data.push({
            name: 'issue_to_name',
            value: issue_to
        });

        var $this = $('.allot-fees');
        $this.button('loading');
        e.preventDefault();
        var postData = data;
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            dataType: 'Json',
            success: function(data, textStatus, jqXHR) {
                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function(index, value) {

                        message += value;
                    });
                    errorMsg(message);
                } else {
                    $('#item_available_quantity').html("");
                    $('#div_avail').css('display', 'none');
                    document.getElementById("issueitem").reset();
                    successMsg(data.message);
                }

                $this.button('reset');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $this.button('reset');
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.detail_popover').popover({
            placement: 'right',
            trigger: 'hover',
            container: 'body',
            html: true,
            content: function() {
                return $(this).closest('td').find('.fee_detail_popover').html();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            $('#item_issue_id').val("");
            $('.debug-url').html('');
            $('#modal_item_quantity,#modal_item,#modal_item_cat').text("");
            var item_issue_id = $(e.relatedTarget).data('item');
            var item_category = $(e.relatedTarget).data('category');
            var quantity = $(e.relatedTarget).data('quantity');
            var item_name = $(e.relatedTarget).data('item_name');
            $('#item_issue_id').val(item_issue_id);
            $('#modal_item_cat').text(item_category);
            $('#modal_item').text(item_name);
            $('#modal_item_quantity').text(quantity);

        });
        $("#confirm-delete").modal({
            backdrop: false,
            show: false

        });
        var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy',]) ?>';






    });



    var base_url = '<?php echo base_url() ?>';

    $(document).on('change', '#item_category_id', function(e) {
        $('#item_id').html("");
        var item_category_id = $(this).val();
        populateItem(0, item_category_id);
    });


    $(document).on('click', '.btn-ok', function() {
        var $this = $('.btn-ok');
        $this.button('loading');
        var item_issue_id = $('#item_issue_id').val();
        $.ajax({
            url: "<?php echo site_url('admin/issueitem/returnItem') ?>",
            type: "POST",
            data: {
                'item_issue_id': item_issue_id
            },
            dataType: 'Json',
            success: function(data, textStatus, jqXHR) {
                if (data.status == "fail") {

                    errorMsg(data.message);
                } else {
                    successMsg(data.message);
                    //  $("span[data-item='" + item_issue_id + "']").removeClass("label-danger").addClass("label-success").text("Returned");

                    $("#confirm-delete").modal('hide');
                    location.reload();
                }

                $this.button('reset');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $this.button('reset');
            }
        });

    });
</script>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header themecolor">

                <h4 class="modal-title" id="myModalLabel"><?php echo $this->lang->line('confirm_return'); ?></h4>
            </div>

            <div class="modal-body">
                <input type="hidden" id="item_issue_id" name="item_issue_id" value="">
                <p>Are you sure to return this item !</p>

                <ul class="list2">
                    <li><?php echo $this->lang->line('item'); ?><span id="modal_item"></span></li>
                    <li><?php echo $this->lang->line('item_category'); ?><span id="modal_item_cat"></span></li>
                    <li><?php echo $this->lang->line('quantity'); ?><span id="modal_item_quantity"></span></li>
                </ul>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default themecolor" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
                <a class="btn cfees btn-ok" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait.."><?php echo $this->lang->line('return'); ?></a>
            </div>
        </div>
    </div>
</div>
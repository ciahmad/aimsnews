
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Toolbar-->
                <div class="toolbar" id="kt_toolbar">
                    <!--begin::Container-->
                    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                        <!--begin::Page title-->
                        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                            <!--begin::Title-->
                            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Account Settings</h1>
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
                                <li class="breadcrumb-item text-muted">Account</li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-300 w-5px h-2px"></span>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="breadcrumb-item text-dark">Settings</li>
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
                                <!--end::Svg Icon-->Filter</a>
                                <!--end::Menu toggle-->
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6244761217157">
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
                                                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6244761217157" data-allow-clear="true">
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
                            <a href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create</a>
                            <!--end::Primary button-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Toolbar-->
                <?php //echo "<pre>"; print_r($result);?>
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Navbar-->
                        <div class="card mb-5 mb-xl-10">
                            <div class="card-body pt-9 pb-0">
                                <!--begin::Details-->
                                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                                    <!--begin: Pic-->
                                    <div class="me-7 mb-4">
                                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                            <img src="<?php echo base_url();?>uploads/staff_images/<?php echo $this->setting_model->getAdminProfileImg($result->admin_id);?>" alt="image" />
                                            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                                        </div>
                                    </div>
                                    <!--end::Pic-->
                                    <!--begin::Info-->
                                    <div class="flex-grow-1">
                                        <!--begin::Title-->
                                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                            <!--begin::User-->
                                            <div class="d-flex flex-column">
                                                <!--begin::Name-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"><?php echo $result->name; ?></a>
                                                    <a href="#">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                                                <path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
                                                                <path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a>
                                                </div>
                                                <!--end::Name-->
                                                <!--begin::Info-->
                                                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="currentColor" />
                                                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->Developer</a>
                                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                                            <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->SF, Bay Area</a>
                                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                    <span class="svg-icon svg-icon-4 me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                                            <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->max@kt.com</a>
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Actions-->
                                            <div class="d-flex my-4">
                                                <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                                    <span class="svg-icon svg-icon-3 d-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor" />
                                                            <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::Indicator-->
                                                    <span class="indicator-label">Follow</span>
                                                    <span class="indicator-progress">Please wait...
                                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    <!--end::Indicator-->
                                                </a>
                                                <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
                                                <!--begin::Menu-->
                                                <div class="me-0">
                                                    <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                        <i class="bi bi-three-dots fs-3"></i>
                                                    </button>
                                                    <!--begin::Menu 3-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                                        <!--begin::Heading-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                        </div>
                                                        <!--end::Heading-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Create Invoice</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Generate Bill</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                            <a href="#" class="menu-link px-3">
                                                                <span class="menu-title">Subscription</span>
                                                                <span class="menu-arrow"></span>
                                                            </a>
                                                            <!--begin::Menu sub-->
                                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">Plans</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">Billing</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">Statements</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu separator-->
                                                                <div class="separator my-2"></div>
                                                                <!--end::Menu separator-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <div class="menu-content px-3">
                                                                        <!--begin::Switch-->
                                                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                                                            <!--begin::Input-->
                                                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                            <!--end::Input-->
                                                                            <!--end::Label-->
                                                                            <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                            <!--end::Label-->
                                                                        </label>
                                                                        <!--end::Switch-->
                                                                    </div>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu sub-->
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 my-1">
                                                            <a href="#" class="menu-link px-3">Settings</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu 3-->
                                                </div>
                                                <!--end::Menu-->
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                                <!--begin::Stats-->
                                                <div class="d-flex flex-wrap">
                                                    <!--begin::Stat-->
                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                                                        </div>
                                                        <!--end::Number-->
                                                        <!--begin::Label-->
                                                        <div class="fw-bold fs-6 text-gray-400">Earnings</div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->
                                                    <!--begin::Stat-->
                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                            <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                                                    <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                                        </div>
                                                        <!--end::Number-->
                                                        <!--begin::Label-->
                                                        <div class="fw-bold fs-6 text-gray-400">Projects</div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->
                                                    <!--begin::Stat-->
                                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                            <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                                        </div>
                                                        <!--end::Number-->
                                                        <!--begin::Label-->
                                                        <div class="fw-bold fs-6 text-gray-400">Success Rate</div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Wrapper-->
                                            <!--begin::Progress-->
                                            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                    <span class="fw-bold fs-6 text-gray-400">Profile Compleation</span>
                                                    <span class="fw-bolder fs-6">50%</span>
                                                </div>
                                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                    <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end::Progress-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->
                                <!--begin::Navs-->
                                <?php $this->load->view('admin/profile_menu'); ?>
                                <!--begin::Navs-->
                            </div>
                        </div>
                        <!--end::Navbar-->
                        <!--begin::Basic info-->
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Institute Details</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form role="form" id="schsetting_form" class="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="sch_id" value="<?php echo $result->id; ?>">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="input-contain col-lg-6 fv-row">
                                                <input type="text" id="school_name" name="school_name" autocomplete="off" value="<?php echo $result->name; ?>" aria-labelledby="placeholder-account_no" class="form-control form-control-lg form-control-solid" >
                                                <label class="placeholder-text" for="account_no" id="placeholder-school_name">
                                                    <div class="required text"><?php echo $this->lang->line('school_name'); ?></div>
                                                </label>
                                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                                            </div>
                                            <div class="input-contain col-lg-6 fv-row">
                                                <input type="text" id="dise_code" name="sch_dise_code" autocomplete="off" value="<?php echo $result->dise_code; ?>" aria-labelledby="placeholder-sch_dise_code" class="form-control form-control-lg form-control-solid">
                                                <label class="placeholder-text" for="sch_dise_code" id="placeholder-sch_dise_code">
                                                    <div class="text"><?php echo $this->lang->line('school_code'); ?></div>
                                                </label>
                                            </div>

                                            
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="input-contain col-lg-12 fv-row">
                                                <input type="text" id="address" name="sch_address" autocomplete="off" value="<?php echo $result->address; ?>" aria-labelledby="placeholder-sch_address" class="form-control form-control-lg form-control-solid">
                                                <label class="placeholder-text" for="sch_address" id="placeholder-sch_address">
                                                    <div class="required text"><?php echo $this->lang->line('address'); ?></div>
                                                </label>
                                            </div>
                                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="input-contain col-lg-6 fv-row">
                                                <input type="text" id="phone" name="sch_phone" autocomplete="off" value="<?php echo $result->phone; ?>" aria-labelledby="placeholder-phone" class="form-control form-control-lg form-control-solid">
                                                <label class="placeholder-text" for="phone" id="placeholder-phone">
                                                    <div class="required text"><?php echo $this->lang->line('phone'); ?></div>
                                                </label>
                                                <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                            </div>

                                            <div class="input-contain col-lg-6 fv-row">
                                                <input type="text" id="email" name="sch_email" autocomplete="off" value="<?php echo $result->email; ?>" aria-labelledby="placeholder-email" class="form-control form-control-lg form-control-solid">
                                                <label class="placeholder-text" for="email" id="placeholder-email">
                                                    <div class="required text"><?php echo $this->lang->line('email'); ?></div>
                                                </label>
                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                            </div>

                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2"><?php echo $this->lang->line('academic') . " " . $this->lang->line('session'); ?></span></div>
                                <div class="row mb-6">
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="input-contain col-lg-6 fv-row">

                                                <select name="sch_session_id" id="session_id" class="form-control form-control-lg form-control-solid" aria-label="Select example">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($sessionlist as $session) {
                                                        ?>
                                                        <option value="<?php echo $session['id'] ?>" <?php
                                                        if ($session['id'] == $result->session_id) {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo $session['session'] ?></option>
                                                            <?php } ?>
                                                </select>
                                                <label class="placeholder-text" for="session" id="placeholder-session"><div class="required text"><?php echo $this->lang->line('session'); ?></div>
                                                </label> 
                                                <span class="text-danger"><?php echo form_error('session_id'); ?></span>
                                            </div>
                                            <div class="input-contain col-lg-6 fv-row">
                                                <select name="sch_start_month" id="start_month" class="form-control form-control-lg form-control-solid" aria-label="Select example">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($monthList as $key => $month) {
                                                        ?>
                                                        <option value="<?php echo $key ?>" <?php
                                                        if ($key == $result->start_month) {
                                                            echo "selected";
                                                        }
                                                        ?> ><?php echo $month ?></option>
                                                            <?php } ?>
                                                </select>
                                                <label class="placeholder-text" for="sch_start_month" id="placeholder-sch_start_month"><div class="required text"><?php echo $this->lang->line('session_start_month'); ?></div>
                                                </label> 
                                                <span class="text-danger"><?php echo form_error('start_month'); ?></span>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2"><?php echo $this->lang->line('attendence') . " " . $this->lang->line('type'); ?></span></div>
                                <div class="row mb-6">
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="row mb-0">
                                                <!--begin::Label-->
                                                <label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $this->lang->line('attendence'); ?></label>
                                                <!--begin::Label-->
                                                <!--begin::Label-->
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="attendence_type" type="radio" value="0" id="flexCheckboxSm1" <?php
                                                    if (!$result->attendence_type) {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                        <label class="form-check-label" for="flexCheckboxSm">
                                                           <?php echo $this->lang->line('day') . " " . $this->lang->line('wise'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="attendence_type" type="radio" value="1" id="flexCheckboxSm2" <?php
                                                    if ($result->attendence_type) {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                        <label class="form-check-label" for="flexCheckboxSm">
                                                           <?php echo $this->lang->line('period') . " " . $this->lang->line('wise'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--begin::Label-->

                                                <!--begin::Label-->
                                                <label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $this->lang->line('biometric') . " " . $this->lang->line('attendance'); ?></label>
                                                <!--begin::Label-->
                                                <!--begin::Label-->
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="biometric" type="radio" value="0" <?php
                                                    if (!$result->biometric) {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                        <label class="form-check-label" for="biometric">
                                                           <?php echo $this->lang->line('disabled') ; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="biometric" type="radio" value="1" <?php
                                                    if ($result->biometric) {
                                                        echo "checked";
                                                    }
                                                    ?> />
                                                        <label class="form-check-label" for="biometric">
                                                           <?php echo $this->lang->line('enabled') ; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--begin::Label-->
                                            </div>
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <div class="input-contain col-lg-12 fv-row">
                                                        <input type="text" id="biometric_device" name="biometric_device" autocomplete="off" value="<?php echo $result->biometric_device; ?>" aria-labelledby="placeholder-biometric_device" class="form-control form-control-lg form-control-solid">
                                                        <label class="placeholder-text" for="biometric_device" id="placeholder-biometric_device">
                                                            <div class="text"><?php echo $this->lang->line('devices') . " (" . $this->lang->line('seprate') . " " . $this->lang->line('by') . " " . $this->lang->line('coma') . ")"; ?></div>
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2"><?php echo $this->lang->line('language') ; ?></span></div>

                                <div class="row mb-6">
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">

                                            <div class="row mb-0">
                                                <div class="input-contain col-lg-4 fv-row">

                                                <select name="sch_lang_id" id="language" class="form-control form-control-lg form-control-solid" aria-label="Select example">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($languagelist as $language) {
                                                        ?>
                                                        <option value="<?php echo $language['id']; ?>" <?php
                                                        if ($language['id'] == $result->lang_id) {
                                                            echo "selected";
                                                        }
                                                        ?> ><?php echo $language['language']; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <label class="placeholder-text" for="language" id="placeholder-language"><div class="required text"><?php echo $this->lang->line('language'); ?></div>
                                                </label> 
                                                <span class="text-danger"><?php echo form_error('language_id'); ?></span>
                                            </div>

                                                <!--begin::Label-->
                                                <label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $this->lang->line('language_rtl_text_mode'); ?></label>
                                                <!--begin::Label-->
                                                <!--begin::Label-->
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="sch_is_rtl" type="radio" value="disabled" id="flexCheckboxSm3"  <?php if ($result->is_rtl == "disabled") { echo "checked"; } ?>/>
                                                        <label class="form-check-label" for="flexCheckboxSm">
                                                           <?php echo $this->lang->line('disabled'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="sch_is_rtl" type="radio" value="" id="flexCheckboxSm4"  value="enabled" <?php if ($result->is_rtl == "enabled") { echo "checked"; } ?>/>
                                                        <label class="form-check-label" for="flexCheckboxSm">
                                                           <?php echo $this->lang->line('enabled'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--begin::Label-->
                                            </div>

                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2"><?php echo $this->lang->line('date') . " " . $this->lang->line('time'); ?></span></div>
                                <div class="row mb-6">
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">

                                            <div class="input-contain col-lg-6 fv-row">

                                                <select name="sch_date_format" id="date_format" class="form-control form-control-lg form-control-solid" aria-label="Select example">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($dateFormatList as $key => $dateformat) {
                                                        ?>
                                                        <option value="<?php echo $key ?>" <?php
                                                        if ($key == $result->date_format) {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo $dateformat; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <label class="placeholder-text" for="sch_date_format" id="placeholder-sch_date_format"><div class="required text"><?php echo $this->lang->line('date_format'); ?></div>
                                                </label> 
                                                <span class="text-danger"><?php echo form_error('date_format'); ?></span>
                                            </div>

                                            <div class="input-contain col-lg-6 fv-row">
                                                <select name="sch_timezone" id="sch_timezone" class="form-control form-control-lg form-control-solid" aria-label="Select example">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($timezoneList as $key => $timezone) {
                                                        ?>
                                                        <option value="<?php echo $key ?>" <?php
                                                        if ($key == $result->timezone) {
                                                            echo "selected";
                                                        }
                                                        ?> ><?php echo $timezone ?></option>
                                                            <?php } ?>
                                                </select>
                                                <label class="placeholder-text" for="sch_timezone" id="placeholder-sch_timezone"><div class="required text"><?php echo $this->lang->line('timezone'); ?></div>
                                                </label>
                                                <span class="text-danger"><?php echo form_error('timezone'); ?></span> 
                                            </div>

                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2"><?php echo $this->lang->line('currency') ; ?></span></div>

                                <div class="row mb-6">
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <div class="input-contain col-lg-6 fv-row">
                                                <select name="sch_currency" id="currency" class="form-control form-control-lg form-control-solid" aria-label="Select example">
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
                                                    <?php foreach ($currencyList as $currency) {
                                                        ?>
                                                        <option value="<?php echo $currency ?>" <?php
                                                        if ($currency == $result->currency) {
                                                            echo "selected";
                                                        }
                                                        ?> ><?php echo $currency; ?></option>
                                                            <?php } ?>
                                                </select>
                                                <label class="placeholder-text" for="currency" id="placeholder-currency"><div class="required text"><?php echo $this->lang->line('currency'); ?></div>
                                                </label> 
                                                <span class="text-danger"><?php echo form_error('currency'); ?></span>
                                            </div>
                                            <!--end::Col-->
                                            <div class="input-contain col-lg-6 fv-row">
                                                <input type="text" id="currency_symbol" name="sch_currency_symbol" autocomplete="off" value="<?php echo $result->currency_symbol; ?>" aria-labelledby="placeholder-currency_symbol" class="form-control form-control-lg form-control-solid">
                                                <label class="placeholder-text" for="currency_symbol" id="placeholder-currency_symbol">
                                                    <div class="required text"><?php echo $this->lang->line('currency_symbol'); ?></div>
                                                </label>
                                                <span class="text-danger"><?php echo form_error('currency_symbol'); ?></span>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2"><?php echo $this->lang->line('miscellaneous') ; ?></span></div>
                                <div class="row mb-6">
                                    
                                    <!--begin::Col-->
                                    <div class="col-lg-12">
                                        <!--begin::Row-->
                                        <div class="row">

                                            <div class="row mb-0">
                                                <!--begin::Label-->
                                                <label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $this->lang->line('duplicate') . " " . $this->lang->line('fees') . " " . $this->lang->line('invoice'); ?></label>
                                                <!--begin::Label-->
                                                <!--begin::Label-->
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="is_duplicate_fees_invoice" type="radio" value="0" <?php
                                                    if ($result->is_duplicate_fees_invoice == 0) {
                                                        echo "checked";
                                                    }
                                                    ?> id="flexCheckboxSm5"  />
                                                        <label class="form-check-label" for="flexCheckboxSm">
                                                           <?php echo $this->lang->line('disabled'); ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 d-flex align-items-center">
                                                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                        <input class="form-check-input" name="is_duplicate_fees_invoice" type="radio" value="1" id="flexCheckboxSm6"  <?php
                                                    if ($result->is_duplicate_fees_invoice == 1) {
                                                        echo "checked";
                                                    }
                                                    ?>/>
                                                        <label class="form-check-label" for="flexCheckboxSm">
                                                           <?php echo $this->lang->line('enabled') ; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--begin::Label-->
                                                <!--begin::Label-->
                                                <div class="input-contain col-lg-6 fv-row">
                                                    <input type="text" id="fee_due_days" name="fee_due_days" autocomplete="off" value="<?php echo $result->fee_due_days; ?>" aria-labelledby="placeholder-fee_due_days" class="form-control form-control-lg form-control-solid">
                                                    <label class="placeholder-text" for="fee_due_days" id="placeholder-fee_due_days">
                                                        <div class="required text"><?php echo $this->lang->line('fee_due_days'); ?></div>
                                                    </label>
                                                    <span class="text-danger"><?php echo form_error('fee_due_days'); ?></span>
                                                </div>
                                               
                                                <!--begin::Label-->
                                            </div>


                                            <div class="row mb-6">
                                    
                                                <!--begin::Col-->
                                                <div class="col-lg-12">
                                                    <!--begin::Row-->
                                                    <div class="row">

                                                        <div class="row mb-0">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $this->lang->line('online') . " " . $this->lang->line('admission'); ?></label>
                                                            <!--begin::Label-->
                                                            <!--begin::Label-->
                                                            <div class="col-lg-2 d-flex align-items-center">
                                                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                                    <input class="form-check-input" name="online_admission" type="radio" value="0" id="flexCheckboxSm7" <?php
                                                                if ($result->online_admission == 0) {
                                                                    echo "checked";
                                                                }
                                                                ?>/>
                                                                    <label class="form-check-label" for="flexCheckboxSm">
                                                                       <?php echo $this->lang->line('disabled') ; ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 d-flex align-items-center">
                                                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                                    <input class="form-check-input" name="online_admission" type="radio" value="1" id="flexCheckboxSm8" <?php
                                                                if ($result->online_admission == 1) {
                                                                    echo "checked";
                                                                }
                                                                ?>/>
                                                                    <label class="form-check-label" for="flexCheckboxSm">
                                                                       <?php echo $this->lang->line('enabled'); ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::Label-->

                                                            <!--begin::Label-->
                                                            <label class="col-lg-2 col-form-label fw-bold fs-6"><?php echo $this->lang->line('teacher_restricted_mode'); ?></label>
                                                            <!--begin::Label-->
                                                            <!--begin::Label-->
                                                            <div class="col-lg-2 d-flex align-items-center">
                                                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                                    <input class="form-check-input" name="class_teacher" type="radio" value="no"  <?php
                                                                if ($result->class_teacher == "no") {
                                                                    echo "checked";
                                                                }
                                                                ?> />
                                                                    <label class="form-check-label" for="class_teacher">
                                                                       <?php echo $this->lang->line('disabled') ; ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 d-flex align-items-center">
                                                                <div class="form-check form-check-custom form-check-solid form-check-lg">
                                                                    <input class="form-check-input" name="class_teacher" type="radio" value=""  <?php
                                                                if ($result->class_teacher == "yes") {
                                                                    echo "checked";
                                                                }
                                                                ?> />
                                                                    <label class="form-check-label" for="class_teacher">
                                                                       <?php echo $this->lang->line('enabled') ; ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <!--begin::Label-->
                                                        </div>

                                                    </div>
                                                    <!--end::Row-->
                                                </div>
                                                <!--end::Col-->
                                            </div>

                                            
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                                <!--begin::Actions-->
                                <?php if ($this->rbac->hasPrivilege('general_setting', 'can_edit')) { ?>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="button" class="btn btn-primary edit_setting" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save'); ?> <?php echo $this->lang->line('changes'); ?> </button>
                                </div>
                                <?php } ?>
                                <!--end::Actions-->

                                
                            <!--end::Card body-->
                            
                        </form>

                        <div class="separator separator-dotted separator-content border-dark my-15"><span class="h2">Logo</span></div>

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <div class="col-lg-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="d-block fw-bold fs-6 mb-5"><?php echo $this->lang->line('edit') . " " . $this->lang->line('print') . " " . $this->lang->line('logo'); ?></label>
                                            <!--end::Label-->
                                            <input value="<?php echo $result->id ?>" type="hidden" name="id" id="id_logo"/>
                                            <?php
                                            if ($result->image == "") {
                                                $print_logo ='uploads/school_content/logo/images.png';
                                                ?>
                                                <?php
                                            } else {
                                                $print_logo ='uploads/school_content/logo/'.$result->image;
                                                ?>
                                                <?php
                                            }
                                            ?>
                                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" >

                                                <img src="<?php echo base_url().$print_logo; ?>" class="img-responsive img-thumbnail" width="200" height="100"> 
                                                <!-- <img src="<?php echo base_url().$print_logo ?>" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"> -->
                                                <!--begin::Preview existing avatar-->
                                                <!-- <div class="image-input-wrapper w-125px h-125px"></div> -->
                                                <!--end::Preview existing avatar-->

                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change <?php echo $this->lang->line('print') . " " . $this->lang->line('logo'); ?>">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="file" id="file" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel <?php echo $this->lang->line('print') . " " . $this->lang->line('logo'); ?>">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->

                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove <?php echo $this->lang->line('print') . " " . $this->lang->line('logo'); ?>">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="d-block fw-bold fs-6 mb-5">Admin Logo</label>
                                            <!--end::Label-->
                                            <?php
                                                if ($result->admin_logo == "") {

                                                    $admin_logo ='uploads/school_content/admin_logo/images.png';
                                                    ?>
                                                    
                                                    <?php
                                                } else {
                                                    $admin_logo ='uploads/school_content/admin_logo/'.$result->admin_logo;
                                                    ?>
                                                    
                                                    <?php
                                                }
                                            ?>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" >
                                                <!--begin::Preview existing avatar-->
                                                <img src="<?php echo base_url().$admin_logo; ?>" class="img-thumbnail" width="204" height="60">  
                                                <!--end::Preview existing avatar-->

                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Admin Logo">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <input value="<?php echo $result->id ?>" type="hidden" name="id" id="id_logo_admin"/>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="file" id="file_admin" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Admin Logo">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->

                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Admin Logo">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->

                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="d-block fw-bold fs-6 mb-5">Admin Small Logo</label>
                                            <!--end::Label-->

                                            <?php
                                            if ($result->admin_small_logo == "") {
                                                $admin_small_logo ='uploads/school_content/admin_small_logo/images.png';
                                                ?>
                                                <?php
                                            } else {
                                                $admin_small_logo ='uploads/school_content/admin_small_logo/'.$result->admin_small_logo;
                                                ?>
                                                <?php
                                            }
                                            ?>

                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true" >
                                                <!--begin::Preview existing avatar-->
                                                <img src="<?php echo base_url().$admin_small_logo; ?>" class="img-thumbnail" width="200" height="100">  
                                                <!-- <div class="image-input-wrapper w-125px h-125px"></div> -->
                                                <!--end::Preview existing avatar-->

                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Admin Small Logo">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <input value="<?php echo $result->id ?>" type="hidden" name="id" id="id_logo_small"/>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="file" id="file_small" accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Admin Small Logo">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->

                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Admin Small Logo">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->

                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                </div>
                        <!--end::Form-->
                    </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Basic info-->
                        <!--begin::Sign-in Method-->
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Sign-in Method</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Email Address-->
                                    <div class="d-flex flex-wrap align-items-center">
                                        <!--begin::Label-->
                                        <div id="kt_signin_email">
                                            <div class="fs-6 fw-bolder mb-1">Email Address</div>
                                            <div class="fw-bold text-gray-600">support@keenthemes.com</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Edit-->
                                        <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                            <!--begin::Form-->
                                            <form id="kt_signin_change_email" class="form" novalidate="novalidate">
                                                <div class="row mb-6">
                                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                                        <div class="fv-row mb-0">
                                                            <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Enter New Email Address</label>
                                                            <input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="emailaddress" value="support@keenthemes.com" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="fv-row mb-0">
                                                            <label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Confirm Password</label>
                                                            <input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
                                                    <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Edit-->
                                        <!--begin::Action-->
                                        <div id="kt_signin_email_button" class="ms-auto">
                                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Email Address-->
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-6"></div>
                                    <!--end::Separator-->
                                    <!--begin::Password-->
                                    <div class="d-flex flex-wrap align-items-center mb-10">
                                        <!--begin::Label-->
                                        <div id="kt_signin_password">
                                            <div class="fs-6 fw-bolder mb-1">Password</div>
                                            <div class="fw-bold text-gray-600">************</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Edit-->
                                        <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                                            <!--begin::Form-->
                                            <form id="kt_signin_change_password" class="form" novalidate="novalidate">
                                                <div class="row mb-1">
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0">
                                                            <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current Password</label>
                                                            <input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0">
                                                            <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New Password</label>
                                                            <input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="fv-row mb-0">
                                                            <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm New Password</label>
                                                            <input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                                                <div class="d-flex">
                                                    <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
                                                    <button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Edit-->
                                        <!--begin::Action-->
                                        <div id="kt_signin_password_button" class="ms-auto">
                                            <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                                        </div>
                                        <!--end::Action-->
                                    </div>
                                    <!--end::Password-->
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                                                <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <!--begin::Content-->
                                            <div class="mb-3 mb-md-0 fw-bold">
                                                <h4 class="text-gray-900 fw-bolder">Secure Your Account</h4>
                                                <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer of security to your account. To log in, in addition you'll need to provide a 6 digit code</div>
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Enable</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Sign-in Method-->
                        <!--begin::Connected Accounts-->
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Connected Accounts</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_connected_accounts" class="collapse show">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Notice-->
                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z" fill="currentColor" />
                                                <path d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <!--begin::Content-->
                                            <div class="fw-bold">
                                                <div class="fs-6 text-gray-700">Two-factor authentication adds an extra layer of security to your account. To log in, in you'll need to provide a 4 digit amazing code.
                                                <a href="#" class="fw-bolder">Learn More</a></div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Notice-->
                                    <!--begin::Items-->
                                    <div class="py-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex">
                                                <img src="<?php echo base_url(); ?>assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="" />
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Google</a>
                                                    <div class="fs-6 fw-bold text-gray-400">Plan properly your workflow</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <div class="form-check form-check-solid form-switch">
                                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" checked="checked" />
                                                    <label class="form-check-label" for="googleswitch"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <div class="separator separator-dashed my-5"></div>
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex">
                                                <img src="<?php echo base_url(); ?>assets/media/svg/brand-logos/github.svg" class="w-30px me-6" alt="" />
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Github</a>
                                                    <div class="fs-6 fw-bold text-gray-400">Keep eye on on your Repositories</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <div class="form-check form-check-solid form-switch">
                                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="githubswitch" checked="checked" />
                                                    <label class="form-check-label" for="githubswitch"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <div class="separator separator-dashed my-5"></div>
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <div class="d-flex">
                                                <img src="<?php echo base_url(); ?>assets/media/svg/brand-logos/slack-icon.svg" class="w-30px me-6" alt="" />
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Slack</a>
                                                    <div class="fs-6 fw-bold text-gray-400">Integrate Projects Discussions</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <div class="form-check form-check-solid form-switch">
                                                    <input class="form-check-input w-45px h-30px" type="checkbox" id="slackswitch" />
                                                    <label class="form-check-label" for="slackswitch"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Card body-->
                                <!--begin::Card footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                                <!--end::Card footer-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Connected Accounts-->
                        <!--begin::Notifications-->
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Email Preferences</h3>
                                </div>
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_email_preferences" class="collapse show">
                                <!--begin::Form-->
                                <form class="form">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top px-9 py-9">
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Successful Payments</span>
                                                <span class="text-muted fs-6">Receive a notification for every successful payment.</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Payouts</span>
                                                <span class="text-muted fs-6">Receive a notification for every initiated payout.</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Fee Collection</span>
                                                <span class="text-muted fs-6">Receive a notification each time you collect a fee from sales</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Customer Payment Dispute</span>
                                                <span class="text-muted fs-6">Receive a notification if a payment is disputed by a customer and for dispute purposes.</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Refund Alerts</span>
                                                <span class="text-muted fs-6">Receive a notification if a payment is stated as risk by the Finance Department.</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Invoice Payments</span>
                                                <span class="text-muted fs-6">Receive a notification if a customer sends an incorrect amount to pay their invoice.</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <div class="separator separator-dashed my-6"></div>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-custom form-check-solid align-items-start">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
                                            <!--end::Input-->
                                            <!--begin::Label-->
                                            <span class="form-check-label d-flex flex-column align-items-start">
                                                <span class="fw-bolder fs-5 mb-0">Webhook API Endpoints</span>
                                                <span class="text-muted fs-6">Receive notifications for consistently failing webhook API endpoints.</span>
                                            </span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Card footer-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                        <button class="btn btn-primary px-6">Save Changes</button>
                                    </div>
                                    <!--end::Card footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Notifications-->
                        <!--begin::Notifications-->
                        <div class="card mb-5 mb-xl-10">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_notifications" aria-expanded="true" aria-controls="kt_account_notifications">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Notifications</h3>
                                </div>
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_notifications" class="collapse show">
                                <!--begin::Form-->
                                <form class="form">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top px-9 pt-3 pb-4">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed border-gray-300 align-middle gy-6">
                                                <tbody class="fs-6 fw-bold">
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td class="min-w-250px fs-4 fw-bolder">Notifications</td>
                                                        <td class="w-125px">
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_email" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=email]" />
                                                                <label class="form-check-label ps-2" for="kt_settings_notification_email">Email</label>
                                                            </div>
                                                        </td>
                                                        <td class="w-125px">
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="kt_settings_notification_phone" checked="checked" data-kt-check="true" data-kt-check-target="[data-kt-settings-notification=phone]" />
                                                                <label class="form-check-label ps-2" for="kt_settings_notification_phone">Phone</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--begin::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Billing Updates</td>
                                                        <td>
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="1" id="billing1" checked="checked" data-kt-settings-notification="email" />
                                                                <label class="form-check-label ps-2" for="billing1"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="billing2" checked="checked" data-kt-settings-notification="phone" />
                                                                <label class="form-check-label ps-2" for="billing2"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--begin::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>New Team Members</td>
                                                        <td>
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="team1" checked="checked" data-kt-settings-notification="email" />
                                                                <label class="form-check-label ps-2" for="team1"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="team2" data-kt-settings-notification="phone" />
                                                                <label class="form-check-label ps-2" for="team2"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--begin::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td>Completed Projects</td>
                                                        <td>
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="project1" data-kt-settings-notification="email" />
                                                                <label class="form-check-label ps-2" for="project1"></label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="project2" checked="checked" data-kt-settings-notification="phone" />
                                                                <label class="form-check-label ps-2" for="project2"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--begin::Table row-->
                                                    <!--begin::Table row-->
                                                    <tr>
                                                        <td class="border-bottom-0">Newsletters</td>
                                                        <td class="border-bottom-0">
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="newsletter1" data-kt-settings-notification="email" />
                                                                <label class="form-check-label ps-2" for="newsletter1"></label>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="form-check form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" id="newsletter2" data-kt-settings-notification="phone" />
                                                                <label class="form-check-label ps-2" for="newsletter2"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <!--begin::Table row-->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Card footer-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                        <button class="btn btn-primary px-6">Save Changes</button>
                                    </div>
                                    <!--end::Card footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Notifications-->
                        <!--begin::Deactivate Account-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_deactivate" aria-expanded="true" aria-controls="kt_account_deactivate">
                                <div class="card-title m-0">
                                    <h3 class="fw-bolder m-0">Deactivate Account</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Content-->
                            <div id="kt_account_settings_deactivate" class="collapse show">
                                <!--begin::Form-->
                                <form id="kt_account_deactivate_form" class="form">
                                    <!--begin::Card body-->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Notice-->
                                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-bold">
                                                    <h4 class="text-gray-900 fw-bolder">You Are Deactivating Your Account</h4>
                                                    <div class="fs-6 text-gray-700">For extra security, this requires you to confirm your email or phone number when you reset yousignr password.
                                                    <br />
                                                    <a class="fw-bolder" href="#">Learn more</a></div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--begin::Form input row-->
                                        <div class="form-check form-check-solid fv-row">
                                            <input name="deactivate" class="form-check-input" type="checkbox" value="" id="deactivate" />
                                            <label class="form-check-label fw-bold ps-2 fs-6" for="deactivate">I confirm my account deactivation</label>
                                        </div>
                                        <!--end::Form input row-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Card footer-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-danger fw-bold">Deactivate Account</button>
                                    </div>
                                    <!--end::Card footer-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Deactivate Account-->
                        <!--begin::Modals-->
                        <!--begin::Modal - Two-factor authentication-->
                        <div class="modal fade" id="kt_modal_two_factor_authentication" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal header-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header flex-stack">
                                        <!--begin::Title-->
                                        <h2>Choose An Authentication Method</h2>
                                        <!--end::Title-->
                                        <!--begin::Close-->
                                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--begin::Modal header-->
                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y pt-10 pb-15 px-lg-17">
                                        <!--begin::Options-->
                                        <div data-kt-element="options">
                                            <!--begin::Notice-->
                                            <p class="text-muted fs-5 fw-bold mb-10">In addition to your username and password, you???ll have to enter a code (delivered via app or SMS) to log into your account.</p>
                                            <!--end::Notice-->
                                            <!--begin::Wrapper-->
                                            <div class="pb-10">
                                                <!--begin::Option-->
                                                <input type="radio" class="btn-check" name="auth_option" value="apps" checked="checked" id="kt_modal_two_factor_authentication_option_1" />
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5" for="kt_modal_two_factor_authentication_option_1">
                                                    <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                                    <span class="svg-icon svg-icon-4x me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor" />
                                                            <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="d-block fw-bold text-start">
                                                        <span class="text-dark fw-bolder d-block fs-3">Authenticator Apps</span>
                                                        <span class="text-muted fw-bold fs-6">Get codes from an app like Google Authenticator, Microsoft Authenticator, Authy or 1Password.</span>
                                                    </span>
                                                </label>
                                                <!--end::Option-->
                                                <!--begin::Option-->
                                                <input type="radio" class="btn-check" name="auth_option" value="sms" id="kt_modal_two_factor_authentication_option_2" />
                                                <label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center" for="kt_modal_two_factor_authentication_option_2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                                                    <span class="svg-icon svg-icon-4x me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor" />
                                                            <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <span class="d-block fw-bold text-start">
                                                        <span class="text-dark fw-bolder d-block fs-3">SMS</span>
                                                        <span class="text-muted fw-bold fs-6">We will send a code via SMS if you need to use your backup login method.</span>
                                                    </span>
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Options-->
                                            <!--begin::Action-->
                                            <button class="btn btn-primary w-100" data-kt-element="options-select">Continue</button>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Options-->
                                        <!--begin::Apps-->
                                        <div class="d-none" data-kt-element="apps">
                                            <!--begin::Heading-->
                                            <h3 class="text-dark fw-bolder mb-7">Authenticator Apps</h3>
                                            <!--end::Heading-->
                                            <!--begin::Description-->
                                            <div class="text-gray-500 fw-bold fs-6 mb-10">Using an authenticator app like
                                            <a href="https://support.google.com/accounts/answer/1066447?hl=en" target="_blank">Google Authenticator</a>,
                                            <a href="https://www.microsoft.com/en-us/account/authenticator" target="_blank">Microsoft Authenticator</a>,
                                            <a href="https://authy.com/download/" target="_blank">Authy</a>, or
                                            <a href="https://support.1password.com/one-time-passwords/" target="_blank">1Password</a>, scan the QR code. It will generate a 6 digit code for you to enter below.
                                            <!--begin::QR code image-->
                                            <div class="pt-5 text-center">
                                                <img src="<?php echo base_url(); ?>assets/media/misc/qr.png" alt="" class="mw-150px" />
                                            </div>
                                            <!--end::QR code image--></div>
                                            <!--end::Description-->
                                            <!--begin::Notice-->
                                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-10 p-6">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                                                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                                                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-bold">
                                                        <div class="fs-6 text-gray-700">If you having trouble using the QR code, select manual entry on your app, and enter your username and the code:
                                                        <div class="fw-bolder text-dark pt-2">KBSS3QDAAFUMCBY63YCKI5WSSVACUMPN</div></div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                            <!--begin::Form-->
                                            <form data-kt-element="apps-form" class="form" action="#">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Enter authentication code" name="code" />
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex flex-center">
                                                    <button type="reset" data-kt-element="apps-cancel" class="btn btn-light me-3">Cancel</button>
                                                    <button type="submit" data-kt-element="apps-submit" class="btn btn-primary">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Options-->
                                        <!--begin::SMS-->
                                        <div class="d-none" data-kt-element="sms">
                                            <!--begin::Heading-->
                                            <h3 class="text-dark fw-bolder fs-3 mb-5">SMS: Verify Your Mobile Number</h3>
                                            <!--end::Heading-->
                                            <!--begin::Notice-->
                                            <div class="text-muted fw-bold mb-10">Enter your mobile phone number with country code and we will send you a verification code upon request.</div>
                                            <!--end::Notice-->
                                            <!--begin::Form-->
                                            <form data-kt-element="sms-form" class="form" action="#">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <input type="text" class="form-control form-control-lg form-control-solid" placeholder="Mobile number with country code..." name="mobile" />
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="d-flex flex-center">
                                                    <button type="reset" data-kt-element="sms-cancel" class="btn btn-light me-3">Cancel</button>
                                                    <button type="submit" data-kt-element="sms-submit" class="btn btn-primary">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::SMS-->
                                    </div>
                                    <!--begin::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal header-->
                        </div>
                        <!--end::Modal - Two-factor authentication-->
                        <!--end::Modals-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->
            
<script type="text/javascript">
    var logo_type = "logo";
    
    // file selected
    $("#file_admin").change(function () {
        var fd = new FormData();
        var files = $('#file_admin')[0].files[0];
        fd.append('file', files);
        fd.append("id", $('#id_logo_admin').val());
        fd.append("logo_type", logo_type);
        uploadadminData(fd);
    });

    // Sending AJAX request and upload file
    function uploadadminData(formdata) {

        $.ajax({
            url: '<?php echo site_url('schsettings/ajax_editadmin_adminlogo') ?>',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            cache: false,

            beforeSend: function () {
                //$('#modal-upload_admin_logo').addClass('modal_loading');
            },
            success: function (response) {

                if (response.success) {

                    Swal.fire({
                        html: response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //successMsg(response.message);
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 2000);

                    // successMsg(response.message);
                    // window.location.reload(true);
                } else {

                    Swal.fire({
                        html: response.error.file,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //errorMsg(response.error.file);
                }

            },
            error: function (xhr) { // if error occured

            },
            complete: function () {
                //$('#modal-upload_admin_logo').removeClass('modal_loading');

            }


        });
    }

    // file selected
    $("#file").change(function () {
        var fd = new FormData();

        var files = $('#file')[0].files[0];

        fd.append('file', files);
        fd.append("id", $('#id_logo').val());
        fd.append("logo_type", logo_type);
        console.log(fd);
        uploadData(fd);
    });

    // Sending AJAX request and upload file
    function uploadData(formdata) {

        $.ajax({
            url: '<?php echo site_url('schsettings/ajax_editlogo') ?>',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            cache: false,

            beforeSend: function () {
                //$('#modal-uploadfile').addClass('modal_loading');
            },
            success: function (response) {
                if (response.success) {

                    Swal.fire({
                        html: response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //successMsg(response.message);
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 2000);
                } else {
                    Swal.fire({
                        html: response.error.file,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //errorMsg(response.error.file);
                }

            },
            error: function (xhr) { // if error occured

            },
            complete: function () {
                $('#modal-uploadfile').removeClass('modal_loading');

            }


        });
    }

    $(".edit_setting").on('click', function (e) {

        var $this = $(this);
        //console.log($this);
        $this.button('loading');
        $.ajax({
            url: '<?php echo site_url("schsettings/ajax_schedit") ?>',
            type: 'POST',
            data: $('#schsetting_form').serialize(),
            dataType: 'json',

            success: function (data) {

                if (data.status == "fail") {
                    var message = "";
                    $.each(data.error, function (index, value) {
                        if(value!=''){
                            message += '<span style="color:#f00">'+value+'</span>';
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
                    //window.location.reload(true);
                }

                $this.button('reset');
            }
        });
    });

    // file selected
    $("#file_small").change(function () {
        var fd = new FormData();

        var files = $('#file_small')[0].files[0];

        fd.append('file', files);
        fd.append("id", $('#id_logo_small').val());
        fd.append("logo_type", logo_type);
        uploadSmallData(fd);
    });

    // Sending AJAX request and upload file
    function uploadSmallData(formdata) {

        $.ajax({
            url: '<?php echo site_url('schsettings/ajax_editadmin_smalllogo') ?>',
            type: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            cache: false,

            beforeSend: function () {
                $('#modal-upload_admin_small_logo').addClass('modal_loading');
            },
            success: function (response) {

                if (response.success) {

                    Swal.fire({
                        html: response.message,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //successMsg(response.message);
                    setTimeout(function () {
                        window.location.reload(true);
                    }, 2000);
                    // successMsg(response.message);
                    // window.location.reload(true);
                } else {
                    Swal.fire({
                        html: response.error.file,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    //errorMsg(response.error.file);
                }

            },
            error: function (xhr) { // if error occured

            },
            complete: function () {
                $('#modal-upload_admin_small_logo').removeClass('modal_loading');

            }


        });
    }
</script>

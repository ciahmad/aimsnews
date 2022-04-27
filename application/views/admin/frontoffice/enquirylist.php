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

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Enquiry Book</h1>
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
				<a href="javascript:" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_reference">Create Enquiry</a>
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
						<?php $this->load->view('_front_office_sidemenu'); ?>
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
												<th class="min-w-100px"><?php echo $this->lang->line('name'); ?></th>
												<th class="min-w-100px"><?php echo $this->lang->line('phone'); ?></th>
												<th class="min-w-100px"><?php echo $this->lang->line('source'); ?></th>
												<th class="min-w-100px"><?php echo $this->lang->line('enquiry'); ?> <?php echo $this->lang->line('date'); ?></th>
												<th class="min-w-100px"><?php echo $this->lang->line('last_follow_up_date'); ?></th>
												<th class="min-w-100px"><?php echo $this->lang->line('next_follow_up_date'); ?></th>
												<th><?php echo $this->lang->line('status'); ?></th>
												<th class="min-w-100px text-end " style="padding-right: 40px !important">Actions</th>

											</tr>
										</thead>
										<tbody class="fw-bold">
											<?php
											//print_r($enquiry_list); die('enquiry list');
											if (empty($enquiry_list)) {
											?>
												<?php
											} else {
												foreach ($enquiry_list as $key => $value) {
													//print_r($value);
													$current_date = date("Y-m-d");
													$next_date = $value["next_date"];
													if (empty($next_date)) {

														$next_date = $value["follow_up_date"];
													}

													if ($next_date < $current_date) {
														$class = "class='danger'";
													} else {
														$class = "";
													}
												?>
													<tr>
														<td class="mailbox-name"><?php echo $value['name']; ?></td>
														<td class="mailbox-name"><?php echo $value['contact']; ?> </td>
														<td class="mailbox-name"><?php echo $value['source']; ?></td>
														<td class="mailbox-name"> <?php
																					if (!empty($value["date"])) {
																						echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['date']));
																					}
																					?></td>

														<td class="mailbox-name"> <?php
																					if (!empty($value["followupdate"])) {
																						echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['followupdate']));
																					}
																					?></td>
														<td class="mailbox-name"> <?php
																					if (!empty($next_date)) {
																						echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($next_date));
																					}
																					?></td>
														<td> <?php echo $enquiry_status[$value["status"]] ?></td>

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
																<div class="menu-item px-3">
																	<a href="<?php echo base_url('admin/enquiry/followupview/' . $value['id'] . '/' . $value['status']); ?>" class="menu-link px-3" data-kt-users-table-filter="">Follow Up</a>
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
					<h2 class="fw-bolder">Add Enquiry</h2>
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
								<label></label>

								<!--begin::Col-->
								<div class="col-lg-12">
									<!--begin::Row-->
									<div class="row">
										<!--begin::Col-->
										<div class="input-contain col-sm-4 fv-row">
											<label for="floatingPassword" class="required"><?= $this->lang->line('name');  ?></label>
											<input type="text" id="name" name="name" autocomplete="off" value="" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
										</div>

										<div class="input-contain col-sm-4 fv-row">
											<label for="floatingPassword" class="required"><?= $this->lang->line('phone');  ?></label>
											<input type="text" id="contact" name="contact" autocomplete="off" value="" placeholder="+9230000000..." aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
										</div>

										<div class="input-contain col-sm-4 fv-row">
											<label for="floatingPassword"><?= $this->lang->line('email');  ?></label>
											<input type="text" id="email" name="email" autocomplete="off" value="" placeholder="example@gmail.com" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
										</div>

										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Col-->
							</div>

							<div class="fv-row mb-7">
								<!--begin::Col-->
								<div class="col-lg-12">
									<!--begin::Row-->
									<div class="row">
										<!--begin::Col-->
										<div class="input-contain col-sm-6 fv-row">
											<label for="floatingPassword" class=""><?= $this->lang->line('address');  ?></label>
											<input type="text" id="address" name="address" autocomplete="off" value="" class="form-control form-control-lg form-control-solid" spellcheck="false">
										</div>

										<div class="input-contain col-sm-6 fv-row">
											<label for="floatingPassword"><?= $this->lang->line('note');  ?></label>
											<input type="text" id="note" name="note" autocomplete="off" value="" placeholder="Note" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
										</div>

										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Col-->
							</div>

							<div class="fv-row mb-7">
								<!--begin::Col-->
								<!--begin::Row-->
								<div class="row">
									<!--begin::Col-->

									<div class="input-contain col-sm-4 fv-row">
										<label for="floatingPassword" class="required"><?= $this->lang->line('date');  ?></label>
										<input type="text" name="date" id="kt_daterangepicker_2324" autocomplete="off" value="<?php echo date("Y/m/d"); ?>" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
									</div>

									<div class="input-contain col-sm-4 fv-row">
										<label for="floatingPassword"><?= $this->lang->line('next_follow_up_date');  ?></label>
										<input type="text" id="kt_datepicker_23" name="follow_up_date" autocomplete="off" value="<?php echo date("Y/m/d"); ?>" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
									</div>

									<div class="input-contain col-sm-4 fv-row">
										<label for="floatingPassword" class=""><?= $this->lang->line('assigned_to');  ?></label>
										<input type="text" id="assigned" name="assigned" autocomplete="off" value="" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
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

									<div class="input-contain col-sm-3 fv-row">
										<label for="floatingPassword"><?php echo $this->lang->line('reference'); ?></label>

										<select name="reference" class="form-select form-select-solid">
											<option value=""><?php echo $this->lang->line('select') ?></option>
											<?php foreach ($Reference as $key => $value) { ?>
												<option value="<?php echo $value['reference']; ?>" <?php if (set_value('reference') == $value['reference']) { ?>selected="" <?php } ?>><?php echo $value['reference']; ?></option>
											<?php }
											?>
										</select>

									</div>

									<div class="input-contain col-sm-3 fv-row">
										<label for="floatingPassword"><?php echo $this->lang->line('source'); ?></label>

										<select name="source" class="form-select form-select-solid">
											<option value=""><?php echo $this->lang->line('select') ?></option>
											<?php foreach ($sourcelist as $key => $value) { ?>
												<option value="<?php echo $value['source']; ?>"><?php echo $value['source']; ?></option>
											<?php }
											?>
										</select>

									</div>

									<div class="input-contain col-sm-3 fv-row">
										<label for="floatingPassword"><?php echo $this->lang->line('class'); ?></label>

										<select name="class" class="form-select form-select-solid">
											<option value=""><?php echo $this->lang->line('select') ?></option>
											<?php
											foreach ($class_list as $key => $value) {
											?>
												<option value="<?php echo $value['id'] ?>" <?php if (set_value('class') == $value['id']) { ?> selected="" <?php } ?>><?php echo $value['class'] ?></option>
											<?php
											}
											?>
										</select>

									</div>

									<div class="input-contain col-sm-3 fv-row">
										<label for="floatingPassword"><?php echo $this->lang->line('number_of_child'); ?></label>

										<input type="number" min="1" id="no_of_child" name="no_of_child" autocomplete="off" value="" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">

									</div>



									<!--begin::Form-->

									<!--end::Form-->

									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--end::Col-->


							<!--end::Input group-->

						</div>
						<!--end::Scroll-->
						<!--begin::Actions-->
						<div class="card-footer d-flex justify-content-end py-6 px-9">
							<button type="reset" data-bs-toggle="modal" class="btn btn-danger btn-active-light-primary me-2">Discard</button>

							<button type="button" class="btn btn-primary add_reference_data" data-btn-text="save_close" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save') . ' & ' . $this->lang->line('close'); ?>
							</button>
							<button type="button" class="btn btn-success add_reference_data ms-1" data-btn-text="save_new" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save') . ' & ' . $this->lang->line('new'); ?> </button>
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
	$(document).ready(function() {
		$("#kt_daterangepicker_2324").flatpickr({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 1901,
			maxYear: parseInt(moment().format("YYYY"), 10)
		});

		$("#kt_datepicker_23").flatpickr();

	});
	$(".add_reference_data").on('click', function(e) {

		var $this = $(this);
		var btn_text = $(this).data('btn-text');
		$this.button('loading');
		$.ajax({
			url: '<?php echo site_url("admin/enquiry/add") ?>',
			type: 'POST',
			data: $('#kt_modal_add_reference_form').serialize(),
			dataType: 'json',

			success: function(data) {
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
					if(btn_text=='save_close'){
						window.location.reload(true);
					}
					$('#name, #contact, #email, #address, #note, #kt_daterangepicker_2324, #kt_datepicker_23, #assigned, #no_of_child, #reference, #source, #class').val("");
				}

				$this.button('reset');
			}
		});
	});

</script>
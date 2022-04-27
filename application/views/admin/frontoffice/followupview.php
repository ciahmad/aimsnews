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
				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Follow Up</h1>
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
				<a href="javascript:" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_reference">Add Next Follow Up Date</a>
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

			<!--begin::Navbar-->
			<div class="card mb-5 mb-xxl-8">

				<div class="card-body pt-9 pb-0">

					<!--begin::Details-->
					<div class="d-flex flex-lg-row">
						<!--begin::Image-->
						<!-- <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
												<img class="mw-50px mw-lg-75px" src="assets/media/svg/brand-logos/volicity-9.svg" alt="image" />
											</div> -->
						<!--end::Image-->
						<!--begin::Wrapper-->
						<div class="flex-grow-1">
							<!--begin::Head-->
							<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
								<!--begin::Details-->
								<div class="d-flex flex-column">
									<!--begin::Status-->
									<div class="d-flex align-items-center mb-1">
										<a href="javascript:" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3"><?= $enquiry_data['name']; ?></a>
										<span class="badge badge-light-success me-auto"><?= $enquiry_data['status']; ?></span>
									</div>
									<!--end::Status-->
									<!--begin::Description-->
									<div class="d-flex flex-wrap fw-bold mb-4 fs-5 text-gray-400">
										<?php $admin = $this->customlib->getLoggedInUserData(); ?>
										Created By: <?= $admin['username'] ?> </div>
									<!--end::Description-->
								</div>
								<!--end::Details-->
								<!--begin::Actions-->

								<!--end::Actions-->
							</div>
							<!--end::Head-->
							<!--begin::Info-->
							<div class="d-flex flex-wrap justify-content-start">
								<!--begin::Stats-->
								<div class="d-flex flex-wrap">
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<div class="fs-4 fw-bolder" style="color: blueviolet;">
												<?php print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($enquiry_data['date']))); ?>
											</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">
											<?= $this->lang->line('enquiry'); ?> <?php echo $this->lang->line('date'); ?>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<div class="fs-4 fw-bolder" style="color: brown;">
												<?php
												if (!empty($next_date)) {
													echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($next_date[0]['date']));
												}
												?>
											</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">
											<?= $this->lang->line('last_follow_up_date'); ?>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<div class="fs-4 fw-bolder" style="color: green;">
												<?php
												if (!empty($next_date)) {
													echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($next_date[0]['next_date']));
												} else {
													echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($enquiry_data['follow_up_date']));
												}
												?>
											</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">
											<?= $this->lang->line('next_follow_up_date'); ?>
										</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
								</div>
								<!--end::Stats-->
								<!--begin::Users-->
								<!--end::Users-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Details-->
					<div class="separator"></div>
					<!--begin::Nav-->

					<!--end::Nav-->
				</div>
			</div>
			<!--end::Navbar-->
			<!--begin::Timeline-->
			<div class="card">
				<div class="row">
					<div class="col-md-2">
						<?php $this->load->view('_front_office_sidemenu'); ?>
					</div>
					<div class="col-md-10">
						<div class="card-header card-header-stretch">
							<!--begin::Title-->
							<div class="card-title d-flex align-items-center">
								<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
								<span class="svg-icon svg-icon-1 svg-icon-primary me-3 lh-0">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
										<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
										<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
								<h3 class="fw-bolder m-0 text-gray-800">
									<?php

									echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat(date('Y-m-d')));
									?>
								</h3>
							</div>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar m-0">
								<!--begin::Tab nav-->
								<ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bolder" role="tablist">

									<li class="nav-item" role="presentation">
										<a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today">Today</a>
									</li>
									<li class="nav-item" role="presentation">
										<a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_week">Week</a>
									</li>
									<li class="nav-item" role="presentation">
										<a id="kt_activity_month_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_month">Month</a>
									</li>
									<li class="nav-item" role="presentation">
										<a id="kt_activity_year_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_year">2022</a>
									</li>
								</ul>
								<!--end::Tab nav-->
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Card head-->
						<!--begin::Card body-->
						<div class="card-body">

							<!--begin::Tab Content-->
							<div class="tab-content">
								<!--begin::Tab panel-->
								<div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
									<!--begin::Timeline-->
									<?php foreach ($follow_up_list as $value) {
									?>
										<div class="timeline">
											<!--begin::Timeline item-->
											<div class="timeline-item">
												<!--begin::Timeline line-->
												<div class="timeline-line w-40px"></div>
												<!--end::Timeline line-->
												<!--begin::Timeline icon-->
												<div class="timeline-icon symbol symbol-circle symbol-40px me-4">
													<div class="symbol-label bg-light">
														<!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-gray-500">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="currentColor" />
																<path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</div>
												</div>
												<!--end::Timeline icon-->
												<!--begin::Timeline content-->
												<div class="timeline-content mb-10 mt-n1">
													<!--begin::Timeline heading-->
													<div class="pe-3 mb-5">
														<!--begin::Title-->
														<div class="fs-5 fw-bold mb-2"><?= $value['followup_by'] ?></div>
														<!--end::Title-->
														<!--begin::Description-->
														<div class="d-flex align-items-center mt-1 fs-6">
															<!--begin::Info-->
															<div class="text-muted me-2 fs-7"><?php
																								echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value['next_date']));
																								?></div>
															<!--end::Info-->
															<!--begin::User-->

															<!--end::User-->
														</div>
														<!--end::Description-->
													</div>
													<!--end::Timeline heading-->
													<!--begin::Timeline details-->
													<div class="overflow-auto pb-5">


														<table style="font-size:12px !important" class="table align-middle border rounded table-row-dashed fs-6 g-5 table-bordered" id="">
															<div class="download_label">
																<h3>Hello World</h3>
															</div>
															<thead class="themecolor">
																<tr class="text-start fw-bolder fs-7 text-uppercase ">
																	<th class="min-w-100px text-wrap"><?php echo $this->lang->line('response'); ?></th>
																	<th class="min-w-100px"><?php echo $this->lang->line('note'); ?></th>

																	<th class="min-w-100px text-end " style="padding-right: 40px !important">Actions</th>

																</tr>
															</thead>
															<tbody class="fw-bold" style="border: 1px solid #bdbdbd5c;">

																<tr>
																	<td class="mailbox-name" style="word-wrap: break-word;min-width: 250px;max-width: 180px;"><?php echo $value['response']; ?></td>

																	<td class="mailbox-name" style="word-wrap: break-word;min-width: 250px;max-width: 180px;"><?php echo $value['note']; ?> </td>
																	<td class="text-end" style="padding: 0.25rem !important; width: 40px !important;">

																		<a href="javascript:" style="margin-right:30px" class="btn btn-sm btn-light btn-active-light-danger" data-kt-ecommerce-order-filter="delete_row">
																			<li class="fa fa-trash"></li>
																		</a>
																		<!--end::Menu-->
																	</td>

																</tr>



															</tbody>
														</table>

														<!--end::Record-->
													</div>
													<!--end::Timeline details-->
												</div>
												<!--end::Timeline content-->
											</div>
											<!--end::Timeline item-->
											<!--begin::Timeline item-->
											<div class="timeline-item">
												<!--begin::Timeline line-->
												<div class="timeline-line w-40px"></div>
												<!--end::Timeline line-->
												<!--begin::Timeline icon-->
												<div class="timeline-icon symbol symbol-circle symbol-40px">

												</div>
												<!--end::Timeline icon-->
												<!--begin::Timeline content-->

												<!--end::Timeline content-->
											</div>
											<!--end::Timeline item-->
											<!--begin::Timeline item-->


										</div>
									<?php } ?>
									<!--end::Timeline-->





								</div>
								<!--end::Tab panel-->
								<!--begin::Tab panel-->
								<div id="kt_activity_week" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_week_tab">

									<!--begin::Timeline-->
									<div class="timeline">
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->

											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n2">
												<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that speak human workshop</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
															<img src="assets/media/avatars/300-1.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->

											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="mb-5 pe-3">
													<!--begin::Title-->
													<a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
															<img src="assets/media/avatars/300-23.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
												<!--begin::Timeline details-->
												<div class="overflow-auto pb-5">
													<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
															<!--begin::Icon-->
															<img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="../../demo1/dist/apps/projects/project.html" class="fs-6 text-hover-primary fw-bolder">Finance KPI App Guidelines</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">1.9mb</div>
																<!--end::Number-->
															</div>
															<!--begin::Info-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
															<!--begin::Icon-->
															<img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/doc.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="#" class="fs-6 text-hover-primary fw-bolder">Client UAT Testing Results</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">18kb</div>
																<!--end::Number-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center">
															<!--begin::Icon-->
															<img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/css.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="#" class="fs-6 text-hover-primary fw-bolder">Finance Reports</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">20mb</div>
																<!--end::Number-->
															</div>
															<!--end::Icon-->
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Timeline details-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor" />
															<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Task
														<a href="#" class="text-primary fw-bolder me-1">#45890</a>merged with
														<a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads Pro Admin Dashboard project:
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
															<img src="assets/media/avatars/300-14.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
															<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
															<img src="assets/media/avatars/300-2.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
												<!--begin::Timeline details-->
												<div class="overflow-auto pb-5">
													<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
														<!--begin::Item-->
														<div class="overlay me-10">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-29.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="overlay me-10">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-31.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="overlay">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-40.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Timeline details-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->

										<!--end::Timeline item-->
									</div>
									<!--end::Timeline-->
								</div>
								<!--end::Tab panel-->
								<!--begin::Tab panel-->
								<div id="kt_activity_month" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_month_tab">

									<!--begin::Timeline-->
									<div class="timeline">
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
															<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
															<img src="assets/media/avatars/300-2.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
												<!--begin::Timeline details-->
												<div class="overflow-auto pb-5">
													<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
														<!--begin::Item-->
														<div class="overlay me-10">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-29.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="overlay me-10">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-31.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="overlay">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-40.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Timeline details-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor" />
															<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">New case
														<a href="#" class="text-primary fw-bolder me-1">#67890</a>is assigned to you in Multi-platform Database Design project
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="overflow-auto pb-5">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mt-1 fs-6">
															<!--begin::Info-->
															<div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
															<!--end::Info-->
															<!--begin::User-->
															<a href="#" class="text-primary fw-bolder me-1">Alice Tan</a>
															<!--end::User-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor" />
															<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor" />
															<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">New order
														<a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed for Workshow Planning &amp; Budget Estimation
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/communication/com009.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M5.78001 21.115L3.28001 21.949C3.10897 22.0059 2.92548 22.0141 2.75004 21.9727C2.57461 21.9312 2.41416 21.8418 2.28669 21.7144C2.15923 21.5869 2.06975 21.4264 2.0283 21.251C1.98685 21.0755 1.99507 20.892 2.05201 20.7209L2.886 18.2209L7.22801 13.879L10.128 16.774L5.78001 21.115Z" fill="currentColor" />
															<path d="M21.7 8.08899L15.911 2.30005C15.8161 2.2049 15.7033 2.12939 15.5792 2.07788C15.455 2.02637 15.3219 1.99988 15.1875 1.99988C15.0531 1.99988 14.92 2.02637 14.7958 2.07788C14.6717 2.12939 14.5589 2.2049 14.464 2.30005L13.74 3.02295C13.548 3.21498 13.4402 3.4754 13.4402 3.74695C13.4402 4.01849 13.548 4.27892 13.74 4.47095L14.464 5.19397L11.303 8.35498C10.1615 7.80702 8.87825 7.62639 7.62985 7.83789C6.38145 8.04939 5.2293 8.64265 4.332 9.53601C4.14026 9.72817 4.03256 9.98855 4.03256 10.26C4.03256 10.5315 4.14026 10.7918 4.332 10.984L13.016 19.667C13.208 19.859 13.4684 19.9668 13.74 19.9668C14.0115 19.9668 14.272 19.859 14.464 19.667C15.3575 18.77 15.9509 17.618 16.1624 16.3698C16.374 15.1215 16.1932 13.8383 15.645 12.697L18.806 9.53601L19.529 10.26C19.721 10.452 19.9814 10.5598 20.253 10.5598C20.5245 10.5598 20.785 10.452 20.977 10.26L21.7 9.53601C21.7952 9.44108 21.8706 9.32825 21.9221 9.2041C21.9737 9.07995 22.0002 8.94691 22.0002 8.8125C22.0002 8.67809 21.9737 8.54505 21.9221 8.4209C21.8706 8.29675 21.7952 8.18392 21.7 8.08899Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n2">
												<!--begin::Timeline heading-->
												<div class="overflow-auto pe-3">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Invitation for crafting engaging designs that speak human workshop</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Alan Nilson">
															<img src="assets/media/avatars/300-1.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="currentColor" />
															<path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="mb-5 pe-3">
													<!--begin::Title-->
													<a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
															<img src="assets/media/avatars/300-23.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
												<!--begin::Timeline details-->
												<div class="overflow-auto pb-5">
													<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
															<!--begin::Icon-->
															<img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="../../demo1/dist/apps/projects/project.html" class="fs-6 text-hover-primary fw-bolder">Finance KPI App Guidelines</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">1.9mb</div>
																<!--end::Number-->
															</div>
															<!--begin::Info-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
															<!--begin::Icon-->
															<img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/doc.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="#" class="fs-6 text-hover-primary fw-bolder">Client UAT Testing Results</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">18kb</div>
																<!--end::Number-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center">
															<!--begin::Icon-->
															<img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/css.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="#" class="fs-6 text-hover-primary fw-bolder">Finance Reports</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">20mb</div>
																<!--end::Number-->
															</div>
															<!--end::Icon-->
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Timeline details-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor" />
															<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Task
														<a href="#" class="text-primary fw-bolder me-1">#45890</a>merged with
														<a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads Pro Admin Dashboard project:
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
															<img src="assets/media/avatars/300-14.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
									</div>
									<!--end::Timeline-->
								</div>
								<!--end::Tab panel-->
								<!--begin::Tab panel-->
								<div id="kt_activity_year" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_year_tab">

									<!--begin::Timeline-->
									<div class="timeline">
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/coding/cod008.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="currentColor" />
															<path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="mb-5 pe-3">
													<!--begin::Title-->
													<a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Jan Hummer">
															<img src="assets/media/avatars/300-23.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
												<!--begin::Timeline details-->
												<div class="overflow-auto pb-5">
													<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
															<!--begin::Icon-->
															<img alt="" class="w-30px me-3" src="assets/media/svg/files/pdf.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="../../demo1/dist/apps/projects/project.html" class="fs-6 text-hover-primary fw-bolder">Finance KPI App Guidelines</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">1.9mb</div>
																<!--end::Number-->
															</div>
															<!--begin::Info-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center pe-10 pe-lg-20">
															<!--begin::Icon-->
															<img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/doc.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="#" class="fs-6 text-hover-primary fw-bolder">Client UAT Testing Results</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">18kb</div>
																<!--end::Number-->
															</div>
															<!--end::Info-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="d-flex flex-aligns-center">
															<!--begin::Icon-->
															<img alt="../../demo1/dist/apps/projects/project.html" class="w-30px me-3" src="assets/media/svg/files/css.svg" />
															<!--end::Icon-->
															<!--begin::Info-->
															<div class="ms-1 fw-bold">
																<!--begin::Desc-->
																<a href="#" class="fs-6 text-hover-primary fw-bolder">Finance Reports</a>
																<!--end::Desc-->
																<!--begin::Number-->
																<div class="text-gray-400">20mb</div>
																<!--end::Number-->
															</div>
															<!--end::Icon-->
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Timeline details-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z" fill="currentColor" />
															<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">Task
														<a href="#" class="text-primary fw-bolder me-1">#45890</a>merged with
														<a href="#" class="text-primary fw-bolder me-1">#45890</a>in “Ads Pro Admin Dashboard project:
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Nina Nilson">
															<img src="assets/media/avatars/300-14.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor" />
															<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">3 new application design concepts added:</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" title="Marcus Dotson">
															<img src="assets/media/avatars/300-2.jpg" alt="img" />
														</div>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
												<!--begin::Timeline details-->
												<div class="overflow-auto pb-5">
													<div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
														<!--begin::Item-->
														<div class="overlay me-10">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-29.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="overlay me-10">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-31.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
														<!--begin::Item-->
														<div class="overlay">
															<!--begin::Image-->
															<div class="overlay-wrapper">
																<img alt="img" class="rounded w-150px" src="assets/media/stock/600x400/img-40.jpg" />
															</div>
															<!--end::Image-->
															<!--begin::Link-->
															<div class="overlay-layer bg-dark bg-opacity-10 rounded">
																<a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
															</div>
															<!--end::Link-->
														</div>
														<!--end::Item-->
													</div>
												</div>
												<!--end::Timeline details-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z" fill="currentColor" />
															<path opacity="0.3" d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mb-10 mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">New case
														<a href="#" class="text-primary fw-bolder me-1">#67890</a>is assigned to you in Multi-platform Database Design project
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="overflow-auto pb-5">
														<!--begin::Wrapper-->
														<div class="d-flex align-items-center mt-1 fs-6">
															<!--begin::Info-->
															<div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>
															<!--end::Info-->
															<!--begin::User-->
															<a href="#" class="text-primary fw-bolder me-1">Alice Tan</a>
															<!--end::User-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
										<!--begin::Timeline item-->
										<div class="timeline-item">
											<!--begin::Timeline line-->
											<div class="timeline-line w-40px"></div>
											<!--end::Timeline line-->
											<!--begin::Timeline icon-->
											<div class="timeline-icon symbol symbol-circle symbol-40px">
												<div class="symbol-label bg-light">
													<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
													<span class="svg-icon svg-icon-2 svg-icon-gray-500">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor" />
															<path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor" />
															<path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
											</div>
											<!--end::Timeline icon-->
											<!--begin::Timeline content-->
											<div class="timeline-content mt-n1">
												<!--begin::Timeline heading-->
												<div class="pe-3 mb-5">
													<!--begin::Title-->
													<div class="fs-5 fw-bold mb-2">New order
														<a href="#" class="text-primary fw-bolder me-1">#67890</a>is placed for Workshow Planning &amp; Budget Estimation
													</div>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="d-flex align-items-center mt-1 fs-6">
														<!--begin::Info-->
														<div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>
														<!--end::Info-->
														<!--begin::User-->
														<a href="#" class="text-primary fw-bolder me-1">Jimmy Bold</a>
														<!--end::User-->
													</div>
													<!--end::Description-->
												</div>
												<!--end::Timeline heading-->
											</div>
											<!--end::Timeline content-->
										</div>
										<!--end::Timeline item-->
									</div>
									<!--end::Timeline-->
								</div>
								<!--end::Tab panel-->
							</div>
							<!--end::Tab Content-->
						</div>
					</div>
				</div>
				<!--begin::Card head-->

				<!--end::Card body-->
			</div>
			<!--end::Timeline-->
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
					<h2 class="fw-bolder">Add Next Follow Up Date</h2>
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
										<div class="input-contain col-sm-6 fv-row">
											<label for="floatingPassword" class="required"><?= $this->lang->line('follow_up_date');  ?></label>
											<input type="text" id="date" name="date" autocomplete="off" value="<?php print_r(date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($enquiry_data['date']))); ?>" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
										</div>

										<div class="input-contain col-sm-6 fv-row">
											<label for="floatingPassword" class="required"><?= $this->lang->line('next_follow_up_date');  ?></label>
											<input type="text" id="kt_datepicker_23" name="follow_up_date" autocomplete="off" value="<?php echo date("Y/m/d"); ?>" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">

											<input type="hidden" id="enquiry_id" name="enquiry_id" autocomplete="off" value="<?= $id; ?>" aria-labelledby="placeholder-name" class="form-control form-control-lg form-control-solid" spellcheck="false" data-ms-editor="true">
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
											<label for="floatingPassword" class="required"><?= $this->lang->line('response');  ?></label>
											<input type="text" id="response" name="response" autocomplete="off" placeholder="Response" value="" class="form-control form-control-lg form-control-solid" spellcheck="false">
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
							<!--end::Row-->
							<!--end::Col-->


							<!--end::Input group-->

						</div>
						<!--end::Scroll-->
						<!--begin::Actions-->
						<div class="card-footer d-flex justify-content-end py-6 px-9">
							<button type="reset" data-bs-toggle="modal" class="btn btn-danger btn-active-light-primary me-2">Discard</button>
							<button type="button" class="btn btn-primary add_reference_data" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> <?php echo $this->lang->line('save') . ' & ' . $this->lang->line('close'); ?>
							</button>
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



		// $("#kt_daterangepicker_3").daterangepicker({
		// 	singleDatePicker: true,
		// 	showDropdowns: true,
		// 	minYear: 1901,
		// 	maxYear: parseInt(moment().format("YYYY"), 10)
		// }, function(start, end, label) {
		// 	var years = moment().diff(start, "years");
		// 	alert("You are " + years + " years old!");
		// });

		// $("#kt_datepicker_2").flatpickr();

		$("#kt_datepicker_23").flatpickr();

		$("#kt_datepicker_8").flatpickr({
			enableTime: true,
			noCalendar: true,
			dateFormat: "H:i a",
		});

		$("#kt_datepicker_9").flatpickr({
			enableTime: true,
			noCalendar: true,
			dateFormat: "H:i a",
		});

		// var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
		//     url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
		//     paramName: "file", // The name that will be used to transfer the file
		//     maxFiles: 10,
		//     maxFilesize: 10, // MB
		//     addRemoveLinks: true,
		//     accept: function(file, done) {
		//         if (file.name == "wow.jpg") {
		//             done("Naha, you don't.");
		//         } else {
		//             done();
		//         }
		//     }
		// });

		// Dropzone.autoDiscover = false;

		// var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
		//     autoProcessQueue: false,
		//     parallelUploads: 10 // Number of files process at a time (default 2)
		// });

		// $('#uploadfiles').click(function() {
		//     myDropzone.processQueue();
		// });

		// console.log(myDropzone);
	});
	$(".add_reference_data").on('click', function(e) {

		var $this = $(this);
		$this.button('loading');
		$.ajax({
			url: '<?php echo site_url("admin/enquiry/follow_up_insert") ?>',
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
					window.location.reload(true);
				}

				$this.button('reset');
			}
		});
	});
</script>
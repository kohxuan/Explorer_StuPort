
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
	<!--begin::Menu wrapper-->
	<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
		<!--begin::Scroll wrapper-->
		<div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
			<!--begin::Menu-->
			<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

<!-- Here is for student sidebar -->
			<?php if ($_SESSION['user_role'] == 'Student') : ?>
				<!--begin:Menu item-->
				<div class="menu-item pt-5">
						<!--begin:Menu content-->
						<div class="menu-content">
							<span class="menu-heading fw-bold text-uppercase fs-7">Profile</span>
						</div>
						<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-user">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
						<span class="menu-title">Profile Settings</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT . '/pages/view_profile'; ?>">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Manage Profile</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>

				<!--begin:Menu item-->
				<div class="menu-item pt-5">
					<!--begin:Menu content-->
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Personal Activity</span>
					</div>
					<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<!--begin:Menu link-->
					<span class="menu-link">
						<span class="menu-icon">
							<i class="ki-duotone ki-element-7 fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</span>
						<span class="menu-title">Personal Activity Options</span>
						<span class="menu-arrow"></span>
					</span>
					<!--end:Menu link-->
					<!--begin:Menu sub-->
					<div class="menu-sub menu-sub-accordion">
						<!--begin:Menu item-->
						<div class="menu-item">
							<!--begin:Menu link-->
							<a class="menu-link" href="<?php echo URLROOT; ?>/peractivity">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Manage Personal Activity</span>
							</a>
							<!--end:Menu link-->
						</div>
						<!--end:Menu item-->
						<!--begin:Menu item-->
						<div class="menu-item">
							<!--begin:Menu link-->
							<a class="menu-link" href="<?php echo URLROOT; ?>/peractivity/approved">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Approved Personal Activity</span>
							</a>
							<!--end:Menu link-->
						</div>
						<!--end:Menu item-->
					</div>
					<!--end:Menu sub-->
				</div>


				<!--begin:Menu item-->
				<div class="menu-item pt-5">
						<!--begin:Menu content-->
						<div class="menu-content">
							<span class="menu-heading fw-bold text-uppercase fs-7">Activity</span>
						</div>
						<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fa fa-calendar">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
						<span class="menu-title">Activity Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/activities">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">View Activities</span>
								</a>
								<!--end:Menu link-->
							</div>

							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/activities/particip">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Registered Activities</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>

				<!--begin:Menu item-->
				<div class="menu-item pt-5">
						<!--begin:Menu content-->
						<div class="menu-content">
							<span class="menu-heading fw-bold text-uppercase fs-7">Reward</span>
						</div>
						<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-trophy">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
						<span class="menu-title">Reward Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/rewards">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">View Reward</span> 
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>
			<?php endif; ?>

<!-- Here is for lecturer sidebar -->
			<?php if ($_SESSION['user_role'] == 'Lecturer') : ?>
				<!--begin:Menu item-->
				<div class="menu-item pt-5">
						<!--begin:Menu content-->
						<div class="menu-content">
							<span class="menu-heading fw-bold text-uppercase fs-7">Profile</span>
						</div>
						<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-user">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
						<span class="menu-title">Profile Settings</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/pages/view_profile_lecturer">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Manage Profile</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>

				<!--begin:Menu item-->
				<div class="menu-item pt-5">
					<!--begin:Menu content-->
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Student Personal Activity</span>
					</div>
					<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-running">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
						<span class="menu-title">Manage Student Personal Activity</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/peractivity">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Manage Personal Activity</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>
			<?php endif; ?>

<!-- Here is for admin sidebar -->
			<?php if ($_SESSION['user_role'] == 'Administrator') : ?>
				<!--begin:Menu item-->
				<div class="menu-item pt-5">
					<!--begin:Menu content-->
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Activity</span>
					</div>
					<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fa fa-calendar">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">Activity Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/activities">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Manage Activities</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
				</div>

					
				
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-user-plus">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">Registration Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/activities">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Student Registered Activity List</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<!--begin:Menu link-->
					<span class="menu-link">
						<span class="menu-icon">
							<i class="far fa-comment">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</span>
						<span class="menu-title">Feedback Options</span>
						<span class="menu-arrow"></span>
					</span>
					<!--end:Menu link-->
					<!--begin:Menu sub-->
					<div class="menu-sub menu-sub-accordion">
						<!--begin:Menu item-->
						<div class="menu-item">
							<!--begin:Menu link-->
							<a class="menu-link" href="<?php echo URLROOT; ?>/feedbacks">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Manage Feedback</span>
							</a>
							<!--end:Menu link-->
						</div>
						<!--end:Menu item-->
					</div>
				</div>
			<?php endif; ?>

<!-- Here is for master admin sidebar -->
			<?php if ($_SESSION['user_role'] == 'Master Administrator') : ?>
				<!--begin:Menu item-->
				<div class="menu-item pt-5">
					<!--begin:Menu content-->
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Activity</span>
					</div>
					<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fa fa-calendar">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">Activity Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/activities">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Manage Activities</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
				</div>

				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-user-plus">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">Registration Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/activities">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Student Registered Activity List</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
						<!--end::Menu-->
				</div>
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<!--begin:Menu link-->
					<span class="menu-link">
						<span class="menu-icon">
							<i class="far fa-comment">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</span>
						<span class="menu-title">Feedback Options</span>
						<span class="menu-arrow"></span>
					</span>
					<!--end:Menu link-->
					<!--begin:Menu sub-->
					<div class="menu-sub menu-sub-accordion">
						<!--begin:Menu item-->
						<div class="menu-item">
							<!--begin:Menu link-->
							<a class="menu-link" href="<?php echo URLROOT; ?>/feedbacks">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Manage Feedback</span>
							</a>
							<!--end:Menu link-->
						</div>
						<!--end:Menu item-->
					</div>
				</div>

				<!--begin:Menu item-->
				<div class="menu-item pt-5">
					<!--begin:Menu content-->
					<div class="menu-content">
						<span class="menu-heading fw-bold text-uppercase fs-7">Reward</span>
					</div>
					<!--end:Menu content-->
				</div>
				<!--end:Menu item-->
				<!--begin:Menu item-->
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-icon">
								<i class="fas fa-trophy">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">Reward Options</span>
							<span class="menu-arrow"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-accordion">
							<!--begin:Menu item-->
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/rewards">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Manage Reward</span>
								</a>
								<!--end:Menu link-->
							</div>
							<div class="menu-item">
								<!--begin:Menu link-->
								<a class="menu-link" href="<?php echo URLROOT; ?>/rewards/create">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Create Reward</span>
								</a>
								<!--end:Menu link-->
							</div>
						</div>
				</div>
			<?php endif; ?>

			</div>
			<!--end::Menu-->
		</div>

	</div>
	<!--end::Scroll wrapper-->
</div>
<!--end::Menu wrapper-->
<!--end::sidebar menu-->
<!--begin::Footer-->
<div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
	<a href="https://www.youthventures.asia/our-story/" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins" target="blank">
		<span class="btn-label">About Us</span>
		<i class="ki-duotone ki-document btn-icon fs-2 m-0">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</a>
</div>
<!--end::Footer-->
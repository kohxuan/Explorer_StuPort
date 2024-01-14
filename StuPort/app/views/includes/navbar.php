<div class="app-navbar flex-shrink-0">
	<!--begin::Search-->



	<!--begin::Activities-->
	<div class="app-navbar-item ms-1 ms-md-4">
		<!-- <input class="form-control me-2" type="search" placeholder="Search...." aria-label="Search" style="font-size: 14px; padding: 7px 10px; margin-right: 20px;"> btn btn-sm btn-primary align-self-center -->
		<!-- <button class="btn btn-outline-success" type="submit" style="font-size: 14px; padding: 7px 10px; margin-right: 20px;">Search</button> -->
		<!--begin::Button-->
		<a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-light-primary" style="font-size: 14px; padding: 7px 10px; margin-right: 20px;">Homepage</a>
		<!--end::Button-->

	</div>
	<!--end::Activities-->



	<!--begin::Theme mode-->
	<div class="app-navbar-item ms-1 ms-md-4">
		<!--begin::Menu toggle-->
		<a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
			<i class="ki-duotone ki-night-day theme-light-show fs-1">
				<span class="path1"></span>
				<span class="path2"></span>
				<span class="path3"></span>
				<span class="path4"></span>
				<span class="path5"></span>
				<span class="path6"></span>
				<span class="path7"></span>
				<span class="path8"></span>
				<span class="path9"></span>
				<span class="path10"></span>
			</i>
			<i class="ki-duotone ki-moon theme-dark-show fs-1">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</a>
		<!--begin::Menu toggle-->
		<!--begin::Menu-->
		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
			<!--begin::Menu item-->
			<div class="menu-item px-3 my-0">
				<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
					<span class="menu-icon" data-kt-element="icon">
						<i class="ki-duotone ki-night-day fs-2">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
							<span class="path4"></span>
							<span class="path5"></span>
							<span class="path6"></span>
							<span class="path7"></span>
							<span class="path8"></span>
							<span class="path9"></span>
							<span class="path10"></span>
						</i>
					</span>
					<span class="menu-title">Light</span>
				</a>
			</div>
			<!--end::Menu item-->
			<!--begin::Menu item-->
			<div class="menu-item px-3 my-0">
				<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
					<span class="menu-icon" data-kt-element="icon">
						<i class="ki-duotone ki-moon fs-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
					</span>
					<span class="menu-title">Dark</span>
				</a>
			</div>
			<!--end::Menu item-->
			<!--begin::Menu item-->
			<div class="menu-item px-3 my-0">
				<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
					<span class="menu-icon" data-kt-element="icon">
						<i class="ki-duotone ki-screen fs-2">
							<span class="path1"></span>
							<span class="path2"></span>
							<span class="path3"></span>
							<span class="path4"></span>
						</i>
					</span>
					<span class="menu-title">Default</span>
				</a>
			</div>
			<!--end::Menu item-->
		</div>
		<!--end::Menu-->
	</div>
	<!--end::Theme mode-->
	<!--begin::User menu-->
	<div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
		<!--begin::Menu wrapper-->
		<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
			<?php if ($_SESSION['user_role'] == 'Student' || $_SESSION['user_role'] == 'Lecturer') : ?>
				<img src="<?php echo URLROOT . "/public/" . $_SESSION['user_image']->profileimage; ?>" class="rounded-3" alt="user" />
			<?php endif; ?>
			<?php if ($_SESSION['user_role'] == 'Administrator' || $_SESSION['user_role'] == 'Master Administrator') : ?>
				<img src="<?php echo URLROOT . "/public/images/dummy/user.png"; ?>" class="rounded-3" alt="dropdown" />
			<?php endif; ?>
		</div>
		<!--begin::User account menu-->
		<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
			<!--begin::Menu item-->
			<div class="menu-item px-3">
				<div class="menu-content d-flex align-items-center px-3">
					<!--begin::Avatar-->
					<?php if ($_SESSION['user_role'] == 'Student' || $_SESSION['user_role'] == 'Lecturer') : ?>
						<div class="symbol symbol-50px me-5">
							<img alt="Logo" src="<?php echo URLROOT . "/public/" . $_SESSION['user_image']->profileimage; ?>" />
						</div>
					<?php endif; ?>
					<!--end::Avatar-->
					<!--begin::Username-->
					<div class="d-flex flex-column">
						<div class="fw-bold d-flex align-items-center fs-5"> <?php if (isset($_SESSION['email'])) echo $_SESSION['username'] ?>
							<!-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>s -->
						</div>
						<a href="#" class="fw-semibold text-muted text-hover-primary fs-7"><?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ?></a>
					</div>
					<!--end::Username-->
				</div>
			</div>
			<!--end::Menu item-->
			<!--begin::Menu separator-->
			<div class="separator my-2"></div>
			<!--end::Menu separator-->
			<?php if ($_SESSION['user_role'] == 'Student' || $_SESSION['user_role'] == 'Lecturer') : ?>
				<!--begin::Menu item-->
				<div class="menu-item px-5">
					<a href="<?php echo URLROOT; ?>/pages/edit_profile" class="menu-link px-5">Profile</a>
				</div>
				<!--end::Menu item-->
			<?php endif; ?>
			<!--begin::Menu item-->
			<div class="menu-item px-5">
				<a href="<?php echo URLROOT . '/activities'; ?>" class="menu-link px-5">
					<span class="menu-text">Activity</span>
				</a>
			</div>
			<!--end::Menu item-->
			<!--begin::Menu item-->
			<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
				<!-- <a href="#" class="menu-link px-5">
					<span class="menu-title">My Subscription</span>
					<span class="menu-arrow"></span>
				</a> -->
			</div>
			<!--end::Menu item-->
			<!--begin::Menu item-->
			<div class="menu-item px-5">
				<!-- <a href="account/statements.html" class="menu-link px-5">My Statements</a> -->
			</div>
			<!--end::Menu item-->
			<!--begin::Menu separator-->
			<div class="separator my-2"></div>
			<!--end::Menu separator-->
			<!--begin::Menu item-->
			<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
				<a href="#" class="menu-link px-5">
					<span class="menu-title position-relative">Mode
						<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
							<i class="ki-duotone ki-night-day theme-light-show fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
								<span class="path5"></span>
								<span class="path6"></span>
								<span class="path7"></span>
								<span class="path8"></span>
								<span class="path9"></span>
								<span class="path10"></span>
							</i>
							<i class="ki-duotone ki-moon theme-dark-show fs-2">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</span></span>
				</a>
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-duotone ki-night-day fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
									<span class="path5"></span>
									<span class="path6"></span>
									<span class="path7"></span>
									<span class="path8"></span>
									<span class="path9"></span>
									<span class="path10"></span>
								</i>
							</span>
							<span class="menu-title">Light</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-duotone ki-moon fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
							<span class="menu-title">Dark</span>
						</a>
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div class="menu-item px-3 my-0">
						<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
							<span class="menu-icon" data-kt-element="icon">
								<i class="ki-duotone ki-screen fs-2">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
							</span>
							<span class="menu-title">Default</span>
						</a>
					</div>
					<!--end::Menu item-->
				</div>
				<!--end::Menu-->
			</div>
			<!--end::Menu item-->
			<!--begin::Menu item-->
			<!-- <div class="menu-item px-5 my-1">
				<a href="account/settings.html" class="menu-link px-5">Account Settings</a>
			</div> -->
			<!--end::Menu item-->
			<!--begin::Menu item-->
			<div class="menu-item px-5">

				<?php if (isset($_SESSION['user_id'])) : ?>
					<a href="<?php echo URLROOT; ?>/users/logout" class="menu-link px-5">Log out</a>
				<?php else : ?>
					<a href="<?php echo URLROOT; ?>/users/login" class="menu-link px-5">Login</a>
				<?php endif; ?>
			</div>
			<!--end::Menu item-->
		</div>
		<!--end::User account menu-->
		<!--end::Menu wrapper-->
	</div>
	<!--end::User menu-->
	<!--begin::Header menu toggle-->
	<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
		<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
			<i class="ki-duotone ki-element-4 fs-1">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
	</div>
	<!--end::Header menu toggle-->
	<!--begin::Aside toggle-->
	<!--end::Header menu toggle-->
</div>
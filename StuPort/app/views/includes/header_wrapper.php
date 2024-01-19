<style>
    .app-header-menu h1 {
		font-family: 'Source Sans Pro', sans-serif;
        font-size: 32px; /* Change the font size as needed */
        font-weight: bold; /* Change the font weight as needed */
        color: #003399; /* Change the color as needed */
        /* Add any other styles you want to modify */
    }
</style>

<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
	<!--begin::Menu-->
	<div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
		<!--begin:Menu item-->
		<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
			<!--begin:Menu link-->
			<h1 class="menu-link">
				<!--store user data across multiple pages until the user closes the browser or the session expires-->
				<span class="menu-title">Welcome <?php 
					if (isset($_SESSION['user_id'])) 
						echo $_SESSION['user_role'] . ", ";
					if (isset($_SESSION['username'])){
						// Apply a different color to the username using inline style
						echo '<span style="color: #183D64; font-style: italic;">' . $_SESSION['username'] . '</span>';
					} else {
						header('location: ' . URLROOT . '/users/login');
					}
				?>. Dive into the experience, and let's embark on this exciting journey together !</span>
				<span class="menu-arrow d-lg-none"></span>
			</h1>
			<!--end:Menu link-->
		</div>
		<!--end:Menu item-->
	</div>
	<!--end::Menu-->
</div>
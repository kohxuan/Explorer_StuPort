<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
    <!--begin::Toolbar container-->
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Profile Settings</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Profile</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
    </div>
</div>

<div class="card-body">
    <?php
    foreach ($data['studentProfile'] as $studentProfile) :
    ?>
    <?php endforeach; ?>

    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">

            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">

                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="<?php echo URLROOT . '/public/' . $studentProfile->profileimage; ?>" alt="Profile Image" />
                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
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
                                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo $studentProfile->s_fName; ?></a>
                                <a href="#">
                                    <i class="ki-duotone ki-verify fs-1 text-primary">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i><?php echo $studentProfile->position; ?></a>
                                <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-geolocation fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i><?php echo $studentProfile->citystate . ", " . $studentProfile->country; ?></a>
                                <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                    <i class="ki-duotone ki-sms fs-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i><?php echo $studentProfile->s_email; ?></a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                        <!--begin::Actions-->
                        <div class="d-flex my-4">
                            <!-- <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                            <i class="ki-duotone ki-check fs-3 d-none"></i> -->
                            <!--begin::Indicator label-->
                            <!-- <span class="indicator-label">Follow</span> -->
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <!-- <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span> -->
                            <!--end::Indicator progress-->
                            <!-- </a> -->
                            <!-- <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a> -->
                            <!--begin::Menu-->
                            <div class="me-0">
                                <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                </button>
                                <!--begin::Menu 3-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                    <!--begin::Heading-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Profile</div>
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="<?php echo URLROOT; ?>/pages/generate_resume" class="menu-link px-3" target="_blank">Download Resume</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <!-- <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                            <i class="ki-duotone ki-information fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i>
                                                        </span></a>
                                                </div> -->
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <!-- <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div> -->
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                        <!-- <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a> -->
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
                                        <a href="<?php echo URLROOT; ?>/pages/view_profile" class="menu-link px-3">Overview</a>
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
                        <!--begin::Progress-->
                        <!-- <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                                            <span class="fw-bold fs-6">50%</span>
                                        </div>
                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                            <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div> -->
                        <!--end::Progress-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <!--begin::Navs-->
            <!--begin::Navs-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="<?php echo URLROOT; ?>/pages/view_profile">Profile</a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="<?php echo URLROOT; ?>/pages/edit_profile">Settings</a>
                </li>
                <!--end::Nav item-->
            </ul>
            <!--begin::Navs-->
        </div>
    </div>
    <!--end::Navbar-->

    <!-- Profile Details -->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form action="<?php echo URLROOT; ?>/pages/edit_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form"> <!--Submit will hantar ke edit profile -->

                <div class="card-body border-top p-9">
                    <!-- Avatar Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Profile Image</label>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT . "/public/" . $studentProfile->profileimage; ?>')">
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT . "/public/" . $studentProfile->profileimage; ?>')"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        </div>
                    </div>

                    <!-- Email Address Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Address</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="s_email" type="text" readonly value="<?php echo $studentProfile->s_email; ?>" />
                        </div>
                    </div>

                    <!-- Name Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="s_fName" type="text" maxlength="255" value="<?php echo $studentProfile->s_fName; ?>" />
                            <div class="form-text">Full Name</div>
                        </div>
                    </div>

                    <!-- IC Number Section -->
                    <!-- <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">IC Number</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="st_ic" type="text" required value="<?php //echo $studentProfile->st_ic; 
                                                                                                                                ?>" />
                    </div>
                </div> -->

                    <!-- Gender Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Gender</label>
                        <div class="col-lg-8">
                            <select class="form-select form-select-solid form-select-lg" name="s_gender">
                                <option value="<?php echo $studentProfile->s_gender ?>"><?php echo $studentProfile->s_gender ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Race Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Race</label>
                        <div class="col-lg-8">
                            <select class="form-select form-select-solid form-select-lg" name="s_race">
                                <option value="<?php echo $studentProfile->s_race ?>"><?php echo $studentProfile->s_race ?></option>
                                <option value="Malay">Malay</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Indian">Indian</option>
                                <option value="Others">Others</option>
                                <!-- Additional options here -->
                            </select>
                        </div>
                    </div>

                    <!-- Age Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Age</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="s_age" type="number" maxlength="11" value="<?php echo $studentProfile->s_age; ?>" />
                            <div class="form-text">Please enter numbers.</div>
                            <div class="form-text">Eg. 20</div>
                        </div>
                    </div>

                    <!-- Date of Birth Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Date of Birth</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="dob" type="date" value="<?php echo $studentProfile->dob; ?>" />
                            <div class="form-text">MM/DD/YYYY</div>
                        </div>
                    </div>

                    <!-- Position Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Position</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="position" type="text" maxlength="50" readonly value="<?php echo $studentProfile->position; ?>" />
                        </div>
                    </div>

                    <!-- Headline Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Headline</label>
                        <div class="col-lg-8">
                            <textarea class="form-control form-control-solid" name="headline" rows="3"><?php echo $studentProfile->headline; ?></textarea>
                        </div>
                    </div>

                    <!-- About Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">About</label>
                        <div class="col-lg-8">
                            <textarea class="form-control form-control-solid" name="about" rows="3"><?php echo $studentProfile->about; ?></textarea>
                        </div>
                    </div>

                    <!-- Country Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Country</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="country" type="text" maxlength="50" value="<?php echo $studentProfile->country; ?>" />
                        </div>
                    </div>

                    <!-- City/State Section -->
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">City/State</label>
                        <div class="col-lg-8">
                            <input class="form-control form-control-lg form-control-solid" name="citystate" type="text" maxlength="50" value="<?php echo $studentProfile->citystate; ?>" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <!-- <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <input type="hidden" id="update_student" name="update_student" value="update_student">--> <!-- Hidden value, modify if use same form for other roles //use if statement -->
                    <!-- <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div> -->
                </div>
                <!-- </form> -->
        </div>

        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Academic Details</h3>
            </div>
            <!--end::Card title-->
        </div>
        <div class="card-body">
            <!--begin::Card header-->
            <div class="card-body border-top p-9">
                <!-- Student Table -->
                <!-- s_fName Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Full Name</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_fName" type="text" value="<?php echo $studentProfile->s_fName; ?>" />
                    </div>
                </div>

                <!-- s_telephone_no Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Telephone Number</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_telephone_no" type="text" value="<?php echo $studentProfile->s_telephone_no; ?>" />
                        <div class="form-text">Eg. 01116781234</div>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                    <div class="col-lg-8">
                        <textarea class="form-control form-control-solid" name="s_address" rows="3"><?php echo $studentProfile->s_address ?></textarea>
                    </div>
                </div>

                <!-- Institution of Higher Learning Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Institution</label>
                    <div class="col-lg-8">
                        <select class="form-select form-select-solid form-select-lg" name="s_institution">
                            <option value="UTM">UTM</option>
                            <!-- Additional options here -->
                        </select>
                    </div>
                </div>

                <!-- s_course Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Course</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_course" type="text" value="<?php echo $studentProfile->s_course; ?>" />
                    </div>
                </div>

                <!-- s_skills Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Skills</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_skills" type="text" value="<?php echo $studentProfile->s_skills; ?>" />
                    </div>
                </div>

                <!-- s_hobby Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Hobby</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_hobby" type="text" value="<?php echo $studentProfile->s_hobby; ?>" />
                    </div>
                </div>

                <!-- s_achievement Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Achievement</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_achievement" type="text" value="<?php echo $studentProfile->s_achievement; ?>" />
                    </div>
                </div>

                <!-- s_ambition Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Ambition</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_ambition" type="text" value="<?php echo $studentProfile->s_ambition; ?>" />
                    </div>
                </div>

                <!-- s_academic_cert Section -->
                <!-- <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Academic Certification</label>
                <div class="col-lg-8">
                <input class="form-control form-control-lg form-control-solid" name="s_academic_cert" type="text" />
                <div class="form-text">Allowed file types: pdf.</div>
                </div>
            </div> -->

                <!-- s_academic_cert Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Academic Certificate</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                            <input type="file" class="form-control" name="filepdf" accept=".pdf" />
                        </div>
                        <div class="form-text">Allowed file type: PDF.</div>
                    </div>
                </div>

                <!-- s_cocurriculum_cert Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Co-curriculum Certificate</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="s_cocurriculum_cert" type="text" />
                        <div class="form-text">Allowed file types: pdf.</div>
                    </div>
                    <!-- Submit Button -->
                </div>
            </div>


            <!-- Submit Button -->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <input type="hidden" id="update_student" name="update_student" value="update_student"> <!-- Hidden value, modify if use same form for other roles //use if statement -->
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
            </form>

        </div>
        <!-- <div class="card-footer"> -->
        <!-- Footer -->
        <!-- </div> -->
    </div>
</div>
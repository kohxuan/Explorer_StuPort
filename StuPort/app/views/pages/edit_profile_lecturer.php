<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
        <div class="card-toolbar">
            <!-- Additional Toolbar Actions -->
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($data['lecturerProfile'] as $lecturerProfile) : ?>
            <!-- Display admin profile data -->
        <?php endforeach; ?>

        <form action="<?php echo URLROOT; ?>/pages/edit_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
            <div class="card-body border-top p-9">
                <!-- Avatar Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Profile Image</label>
                    <div class="col-lg-8">
                        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT . "/public/" . $adminProfile->profileimage; ?>')">
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT . "/public/" . $adminProfile->profileimage; ?>')"></div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="ki-duotone ki-pencil fs-7"></i>
                                <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_avatar_remove" />
                            </label>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="ki-duotone ki-cross fs-2"></i>
                            </span>
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="ki-duotone ki-cross fs-2"></i>
                            </span>
                        </div>
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                    </div>
                </div>

                <!-- Email Address Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email Address</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="p_email" type="text" readonly value="<?php echo $adminProfile->p_email; ?>" />
                    </div>
                </div>

                <!-- Name Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Name</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="p_name" type="text" maxlength="255" value="<?php echo $adminProfile->p_name; ?>" />
                        <div class="form-text">Full Name</div>
                    </div>
                </div>

                <!-- IC Number Section -->
                <!-- <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">IC Number</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="st_ic" type="text" required value="<?php //echo $adminProfile->st_ic; 
                                                                                                                                ?>" />
                    </div>
                </div> -->

                <!-- Gender Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Gender</label>
                    <div class="col-lg-8">
                        <select class="form-select form-select-solid form-select-lg" name="gender">
                            <option value="<?php echo $adminProfile->gender ?>"><?php echo $adminProfile->gender ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <!-- Race Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Race</label>
                    <div class="col-lg-8">
                        <select class="form-select form-select-solid form-select-lg" name="race">
                            <option value="<?php echo $adminProfile->race ?>"><?php echo $adminProfile->race ?></option>
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
                        <input class="form-control form-control-lg form-control-solid" name="age" type="number" maxlength="11" value="<?php echo $adminProfile->age; ?>" />
                        <div class="form-text">Please enter numbers.</div>
                        <div class="form-text">Eg. 20</div>
                    </div>
                </div>

                <!-- Date of Birth Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Date of Birth</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="dob" type="date" value="<?php echo $adminProfile->dob; ?>" />
                        <div class="form-text">MM/DD/YYYY</div>
                    </div>
                </div>

                <!-- Position Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Position</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="position" type="text" maxlength="50" readonly value="<?php echo $adminProfile->position; ?>" />
                    </div>
                </div>

                <!-- Headline Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Headline</label>
                    <div class="col-lg-8">
                        <textarea class="form-control form-control-solid" name="headline" rows="3"><?php echo $adminProfile->headline; ?></textarea>
                    </div>
                </div>

                <!-- About Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">About</label>
                    <div class="col-lg-8">
                        <textarea class="form-control form-control-solid" name="about" rows="3"><?php echo $adminProfile->about; ?></textarea>
                    </div>
                </div>

                <!-- Country Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Country</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="country" type="text" maxlength="50" value="<?php echo $adminProfile->country; ?>" />
                    </div>
                </div>

                <!-- City/State Section -->
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">City/ State</label>
                    <div class="col-lg-8">
                        <input class="form-control form-control-lg form-control-solid" name="citystate" type="text" maxlength="50" value="<?php echo $adminProfile->citystate; ?>" />
                    </div>
                </div>

                <!-- Submit Button -->
                <!-- <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <input type="hidden" id="update_admin" name="update_admin" value="update_admin">--> <!-- Hidden value, modify if use same form for other roles //use if statement -->
                <!-- <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div> -->
            </div>
            <!-- </form> -->

    </div>
</div>
<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Edit Oganization Information</h3>
        <div class="card-toolbar">

        </div>
    </div>
    <div class="card-body">
        <!-- <form action="<?php //echo URLROOT; 
                            ?>/pages/edit_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form"> -->

        <div class="card-body border-top p-9">
            <!-- Admin Table -->
            <!-- a_organization Section -->
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Organization Name</label>
                <div class="col-lg-8">
                    <input class="form-control form-control-lg form-control-solid" name="s_fName" type="text" value="<?php echo $adminProfile->a_organization; ?>" />
                </div>
            </div>

            <!-- a_org_num Section -->
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Organization Number</label>
                <div class="col-lg-8">
                    <input class="form-control form-control-lg form-control-solid" name="s_telephone_no" type="text" value="<?php echo $adminProfile->a_org_num; ?>" />
                    <div class="form-text">Eg. 01116781234</div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                <div class="col-lg-8">
                    <textarea class="form-control form-control-solid" name="s_address" rows="3"><?php echo $adminProfile->a_address ?></textarea>
                </div>
            </div>
            <!-- Submit Button -->
        </div>
        <!-- Submit Button -->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <input type="hidden" id="update_admin" name="update_admin" value="update_admin"> <!-- Hidden value, modify if use same form for other roles //use if statement -->
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
        </form>

    </div>
    <div class="card-footer">
        <!-- Footer -->
    </div>
</div>
</div>
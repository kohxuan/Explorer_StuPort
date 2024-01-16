<div class="card shadow-sm" style="border-color: #183D64;">
    <div class="card-header" style="background-color: #183D64; color: white;">
        <h3 class="card-title"style="color: white;font-family: 'Your Special Font', gagalin;font-size: 2em;">Create Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT;?>/activities" class="btn btn-light-primary"style="background-color: #FCBD32; color: white;">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">


    <form action="<?php echo URLROOT; ?>/activities/create" method="POST" enctype="multipart/form-data">

<div class="mb-10">
    <label for="exampleFormControlInput1" class="required form-label">Activity Title</label>
    <input type="text" name="title" class="form-control form-control-solid" placeholder="Title" required />
</div>

<div class="mb-10">
    <label for="exampleFormControlInput1" class="form-label">Description</label>
    <div class="position-relative">
        <div class="required position-absolute top-0"></div>
        <textarea name="activity_desc" class="form-control" aria-label="With textarea" required></textarea>
    </div>
</div>

<div class="mb-10">
    <label for="exampleFormControlSelect1" class="required form-label">Category</label>
    <select class="form-select" name="category" required>
        <option value="" disabled selected>Select Category</option>
        <option value="Competition/Scholarship">Competition/Scholarship</option>
        <option value="Program/Activities">Program/Activities</option>
        <option value="Bootcamp/Workshop">Bootcamp/Workshop</option>
        <option value="Part Time">Part Time</option>
        <option value="Volunteering">Volunteering</option>
        <option value="Internship">Internship</option>
        <!-- Add more options as needed -->
    </select>
</div>

<div class="mb-10">
    <label for="exampleFormControlInput1" class="required form-label">Date and Time</label>
    <input type="datetime-local" name="act_datetime" class="form-control form-control-solid" required />
</div>

<div class="mb-10">
    <label for="exampleFormControlInput1" class="form-label">Location</label>
    <input type="text" name="location" class="form-control form-control-solid" placeholder="Location" />
</div>

<div class="mb-10">
    <label for="exampleFormControlInput1" class="form-label">Organizer Name</label>
    <input type="text" name="organizer_name" class="form-control form-control-solid" placeholder="Organizer Name" />
</div>

<div class="mb-10">
            <label for="exampleFormControlInput1" class="form-label">Skill Acquired</label>
            <input type="text" name="skill_acquired" class="form-control form-control-solid" placeholder="Skill Acquired" />
        </div>

    <!-- Avatar Section -->
    <div class="row mb-10">
        <label class="col-lg-4 col-form-label fw-semibold fs-6">Attachment</label>
        <div class="col-lg-8">
            <div class="image-input image-input-outline" data-kt-image-input="true">
                <div class="image-input-wrapper w-125px h-125px" ></div>
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

    <button type="submit" class="btn btn-primary font-weight-bold" style="background-color: #183D64;">Submit</button>

</form>


    </div>
    <div class="card-footer" style="background-color: #183D64; color: white;">
        Footer
    </div>
</div>


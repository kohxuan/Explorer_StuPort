<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Create Activity</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/activities" class="btn btn-light-primary">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">


    <form action="<?php echo URLROOT; ?>/activities/create" method="POST">

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

<div class="mb-10">
            <label for="exampleFormControlInput1" class="form-label">Attachment (Image)</label>
            <input type="file" name="attachment" class="form-control form-control-solid" />
</div>

<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>

</form>


    </div>
    <div class="card-footer">
        Footer
    </div>
</div>


<div class="tab-pane fade profile-edit pt-3" id="profile-edit">

    <!-- Profile Edit Form -->
    <form method="post" action="">

        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="name" type="text" class="form-control" value="<?= $row['name'] ?>" id="fullName" placeholder="Enter Your Name">
            </div>
        </div>

        <div class="row mb-3">
            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
            <div class="col-md-8 col-lg-9">
                <textarea name="about" class="form-control" id="about" style="height: 100px" placeholder="About Your Self"><?= $row['about'] ?></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
            <div class="col-md-8 col-lg-9">
                <input name="company" type="text" class="form-control" value="<?= $row['company'] ?>" id="company" placeholder="Enter Your Company">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
            <div class="col-md-8 col-lg-9">
                <input name="job" type="text" class="form-control" id="Job" value="<?= $row['job'] ?>" placeholder="Enter Your Job">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
            <div class="col-md-8 col-lg-9">
                <input name="country" type="text" class="form-control" value="<?= $row['country'] ?>" id="Country" placeholder="Enter Your Country">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
                <input name="address" type="text" class="form-control" value="<?= $row['address'] ?>" id="Address" placeholder="Enter Your Address">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
            <div class="col-md-8 col-lg-9">
                <input name="phone" type="text" class="form-control" value="<?= $row['phone'] ?>" id="Phone" placeholder="Mobile No.">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
                <input name="email" type="email" class="form-control" value="<?= $row['email'] ?>" id="Email" placeholder="Enter Your Email">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="twitterid" type="text" class="form-control" value="<?= $row['twitterid'] ?>" id="Twitter" placeholder="Url">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="facebookid" type="text" class="form-control" value="<?= $row['facebookid'] ?>" id="facebookid" placeholder="Url">
            </div>
        </div>

        <div class="row mb-3">
            <label for="instaid" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="instaid" type="text" class="form-control" value="<?= $row['instaid'] ?>" id="instaid" placeholder="Url">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
            <div class="col-md-8 col-lg-9">
                <input name="linkedinid" type="text" class="form-control" value="<?= $row['linkedinid'] ?>" id="linkedinid" placeholder="Url">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" name="profileUpdateBtn" class="btn btn-primary">Save Changes</button>
        </div>
    </form><!-- End Profile Edit Form -->

</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto-Generated Resume</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12pt;
            line-height: 1.2;
            color: #333;
            background-color: #fff;
        }

        .heading {
            font-size: 16pt;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #183D64;
            /* Blue */
        }

        .wrapper {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .sidebar-wrapper {
            width: 30%;
        }

        .main-wrapper {
            width: 65%;
        }

        .profile-container {
            text-align: center;
            margin-bottom: 25px;
        }

        .profile {
            width: 140px;
            /* Set the width as needed */
            max-width: 100%;
            border-radius: 50%;
        }

        .name {
            font-size: 14pt;
            margin: 10px 0 5px 0;
            color: #7C1C2B;
            /* Red */
        }

        .tagline {
            font-size: 14pt;
            margin-bottom: 20px;
            color: #183D64;
            /* Blue */
        }

        .contact-container {
            margin-bottom: 30px;
        }

        .contact-list {
            list-style: none;
            padding: 0;
        }

        .contact-list li {
            margin-bottom: 8px;
            color: #555;
        }

        .section {
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 15px;
            color: #183D64;
            /* Blue */
        }

        .summary {
            font-size: 10pt;
            color: #333;
        }

        .footer {
            background-color: #f8f8f8;
            padding: 20px;
            color: #666;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        .print-button {
            background-color: #FCBD32;
            /* Yellow */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 14pt;
            color: #7C1C2B;
            cursor: pointer;
            float: right;
            margin-right: 60px;
            border-radius: 8px;
        }


        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="heading">Resume</div>
    <!-- Print Button -->
    <button class="print-button" onclick="printResume()">Print</button>
    <!-- Download as PDF Button -->
    <!-- <button class="print-button" onclick="downloadAsPDF()">Download Resume as PDF</button> -->



    <?php foreach ($data['studentProfile'] as $studentProfile) : ?>
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <div class="profile-container">
                    <img class="profile" src="<?php echo URLROOT . '/public/' . $studentProfile->profileimage; ?>" alt="Profile Image" />
                    <h1 class="name"><?php echo $studentProfile->s_fName; ?></h1>
                    <h3 class="tagline"><?php echo $studentProfile->position; ?></h3>
                    <div class="summary">
                        <p style="text-align: left;"><?php echo empty($studentProfile->headline) ? '-' : $studentProfile->headline; ?></p>
                    </div>
                </div>

                <div class="contact-container container-block">
                    <ul class="list-unstyled contact-list">
                        <li class="email" style="font-size: 14px;"><i class="fa-solid fa-envelope"></i><a href="mailto: <?php echo $studentProfile->s_email; ?>" style="color: #7C1C2B;"><?php echo $studentProfile->s_email; ?></a></li>
                        <li class="phone" style="font-size: 14px;"><i class="fa-solid fa-phone"></i><a href="tel:<?php echo $studentProfile->s_telephone_no; ?>" style="color: #7C1C2B;"><?php echo empty($studentProfile->s_telephone_no) ? '-' : $studentProfile->s_telephone_no; ?></a></li>
                        <li class="phone" style="font-size: 14px;"><i class="fa-solid fa-phone"></i><?php echo empty($studentProfile->citystate) ? '-' : ($studentProfile->citystate . ", " . (empty($studentProfile->country) ? '-' : $studentProfile->country)); ?></li>
                    </ul>
                </div>
            </div>

            <div class="main-wrapper">

                <section class="section summary-section">
                    <h2 class="section-title">About Me</h2>
                    <div class="summary">
                        <p><?php echo empty($studentProfile->about) ? '-' : $studentProfile->about; ?></p>
                    </div>
                </section>

                <section class="section summary-section">
                    <h2 class="section-title">Personal Details</h2>
                    <div class="summary">
                        <p>Date of Birth: <?php echo empty($studentProfile->dob) ? '-' : $studentProfile->dob; ?></p>
                        <p>Age : <?php echo empty($studentProfile->s_age) ? '-' : $studentProfile->s_age; ?></p>
                        <p>Gender : <?php echo empty($studentProfile->s_gender) ? '-' : $studentProfile->s_gender; ?></p>
                        <p>Race : <?php echo empty($studentProfile->s_race) ? '-' : $studentProfile->s_race; ?></p>
                        <p>Address : <?php echo empty($studentProfile->s_address) ? '-' : $studentProfile->s_address; ?></p>

                        <p>Institution : <?php echo empty($studentProfile->s_institution) ? '-' : $studentProfile->s_institution; ?></p>
                        <p>Course : <?php echo empty($studentProfile->s_course) ? '-' : $studentProfile->s_course; ?></p>

                        <p>Hobby : <?php echo empty($studentProfile->s_hobby) ? '-' : $studentProfile->s_hobby; ?></p>
                        <p>Ambition : <?php echo empty($studentProfile->s_ambition) ? '-' : $studentProfile->s_ambition; ?></p>
                    </div>
                </section>

                <!-- <section class="section experiences-section">
                    <h2 class="section-title">Experiences</h2>
                </section> -->

                <section class="section projects-section">
                    <h2 class="section-title">Achievement</h2>
                    <p><?php echo empty($studentProfile->s_achievement) ? '-' : $studentProfile->s_achievement; ?></p>
                    <!-- Add more project items as needed -->
                </section>

                <section class="skills-section section">
                    <h2 class="section-title">Skills &amp; Proficiency</h2>
                    <div class="summary">
                        <p><?php echo empty($studentProfile->s_skills) ? '-' : $studentProfile->s_skills; ?></p>
                    </div>
                    <!-- Add more skill items as needed -->
                </section>
            </div>
        </div>
    <?php endforeach; ?>

    <footer class="footer">
        <div class="text-center">
            <small class="copyright">This resume is auto-generated by Youth Ventures Asia system. Designed by Explorer for StuPort</small>
        </div>
    </footer>

    <!-- JavaScript for Print Functionality -->
    <script>
        function printResume() {
            window.print();
        }
    </script>
</body>

</html>
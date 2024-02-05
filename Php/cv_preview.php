<?php
session_start();
include 'connection.php';
$query = mysqli_query($con, "SELECT * FROM personel_infromation WHERE user_id = '" . $_SESSION['id'] . "'") or die();


if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $db_name = $row['name'];
    $db_job = $row['job_title'];
    $db_number = $row['contact_number'];
    $db_email = $row['email'];
    $db_country = $row['country'];
    $db_linkedin = $row['linkedin_pro'];
    $db_web = $row['web_link'];

    ?>

    <style>
        .main-wrapper {
            background: black;
        }

        .cv-temp-1 .link.side-bar-links span {
            text-transform: lowercase !important;
        }

        .action-btns button, .action-btns a.prev-btn {
            padding: 13px 50px;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="templete-outer">
                <div id="cv_temp_1" class="cv-temp-1 cv-temp">
                    <header>
                        <h2 class="name opacity-0"> <?php echo $db_name ?> </h2>
                        <h2 class="rink gray-txt opacity-0"><?php echo $db_job ?></h2>
                    </header>
                    <div class="cv-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="side-bar sit-border-right">
                                    <h4 class="cv-heading">CONTACT</h4>
                                    <div class="persnol-details">
                                        <p class="link side-bar-links">
                                            <i class="fas fa-phone-alt"></i> <span
                                                    class="phone opacity-0"><?php echo $db_number ?></span>
                                        </p>
                                        <p class="link side-bar-links">
                                            <i class="fas fa-envelope"></i> <span
                                                    class="email opacity-0"><?php echo $db_email ?></span>
                                        </p>
                                        <p class="link side-bar-links">
                                            <i class="fas fa-home"></i> <span
                                                    class="addres opacity-0"><?php echo $db_country ?></span>
                                        </p>
                                        <?php if ($db_linkedin) { ?>
                                            <p class="link side-bar-links linkedin-name-outer">
                                                <i class="fab fa-linkedin-in"></i> <span
                                                        class="linkedin-name opacity-0"><?php echo $db_linkedin ?></span>
                                            </p>
                                        <?php } ?>
                                        <?php if ($db_web) { ?>
                                            <p class="link side-bar-links web-outer">
                                                <i class="fas fa-tv"></i> <span
                                                        class="web opacity-0"><?php echo $db_web ?></span>
                                            </p>
                                        <?php } ?>
                                    </div>

                                    <h4 class="cv-heading mt-4">EDUCATION</h4>
                                    <div class="educations-details deg-detail">
                                        <?php

                                        $check_data = mysqli_query($con, "SELECT * FROM education WHERE user_id = '" . $_SESSION["id"] . "'");
                                        if (mysqli_num_rows($check_data) > 0) {
                                            while ($row = mysqli_fetch_assoc($check_data)) {
                                                ?>

                                                <p class="link mb-0">
                                                    <span class="degree-name opacity-0 d-block"><?php echo $row['edu_degree'] ?></span>
                                                    <span class="institute-name opacity-0 text-capitalize"><?php echo $row['edu_name'] ?> || <?php echo $row['edu_location'] ?> <?php echo date("m-Y", strtotime(trim($row['start_date']))) ?> / <?php echo date("m-Y", strtotime(trim($row['end_date']))) ?></span>
                                                </p>
                                                <?php
                                            };
                                        }
                                        ?>

                                        <!--                                        <p class="link">-->
                                        <!--                                            <span class="degree-name opacity-0 d-block">DEGREE NAME || MAJOR</span>-->
                                        <!--                                            <span class="institute-name opacity-0 text-capitalize">University || Location 2008-2010</span>-->
                                        <!--                                        </p>-->
                                    </div>

                                    <h4 class="cv-heading mt-4">SKILLS</h4>
                                    <div class="skills_outer">
                                        <ul class="temp-1-ul">
                                            <?php

                                            $check_data = mysqli_query($con, "SELECT * FROM skills WHERE user_id = '" . $_SESSION["id"] . "'");
                                            if (mysqli_num_rows($check_data) > 0) {
                                                while ($row = mysqli_fetch_assoc($check_data)) {
                                                    ?>
                                                    <li><?php echo $row['skill_name'] ?></li>
                                                    <?php
                                                };
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="cv-main-wraper">
                                    <h4 class="cv-heading">PROFESSIONAL PROFILE</h4>
                                    <div class="persnol-details">
                                        <?php

                                        $check_data = mysqli_query($con, "SELECT * FROM professional_detail WHERE user_id = '" . $_SESSION["id"] . "'");
                                        if (mysqli_num_rows($check_data) > 0) {
                                            while ($row = mysqli_fetch_assoc($check_data)) {
                                                ?>
                                                <p class="link profissional-dics text-justify opacity-0"><?php echo $row['professional_profile'] ?></p>
                                                <?php
                                            };
                                        }
                                        ?>
                                    </div>

                                    <h4 class="cv-heading mt-4">PROFESSIONAL EXPERIENCE</h4>
                                    <div class="persnol-details profissional-summery">
                                        <?php
                                        $check_data = mysqli_query($con, "SELECT * FROM professional_experience WHERE user_id = '" . $_SESSION['id'] . "' ");
                                        if (mysqli_num_rows($check_data) > 0) {
                                            while ($row = mysqli_fetch_assoc($check_data)) {
                                                ?>
                                                <p class="link text-capitalize job-title"><?php echo $row['job_title'] ?></p>
                                                <p class="link text-capitalize"><?php echo $row['compnay_name'] ?>
                                                    || <?php echo $row['compnay_location'] ?>
                                                    || <?php echo $row['start_date'] ?>
                                                    - <?php echo $row['to_date'] ?></p>
                                                <p class="link text-capitalize job-dics text-justify mt-2"><?php echo $row['professional_experience'] ?></p>

                                            <?php }
                                        } ?>
                                        <!--                                        <ul class="temp-1-ul opacity-0 ul-padding-left">-->
                                        <!--                                            <li>Lorem Ipsum is simply dummy text of the printing and-->
                                        <!--                                            </li>-->
                                        <!--                                            <li>Lorem Ipsum is simply dummy text of the prin</li>-->
                                        <!--                                            <li>Lorem Ipsum is simply dummy</li>-->
                                        <!--                                            <li>Lorem Ipsum is simply dummy text of the printing and-->
                                        <!--                                            </li>-->
                                        <!--                                        </ul>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="download_preview text-center mt-5">
            </div>
        </div>
        <div class="action-btns text-center mt-lg-5 mt-4">
            <a href="<?php session_start();
            echo $_SESSION["page-number"] ?> " class="prev-btn">Go Back</a>
            <button class="next-btn cv_downlaod">Download</button>
        </div>
    </div>


    <?php
}
?>


<script src="assets/js/cv_download.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>-->
<script src="  https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<!--<script src="  https://unpkg.com/html2canvas@1.0.0-rc.5/dist/html2canvas.js"></script>-->

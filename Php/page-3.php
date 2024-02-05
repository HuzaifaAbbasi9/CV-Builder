<?php
include 'connection.php';
session_start();

//$institute_name = 'g.h.s';
//$institute_location = 'nakar';
//$institute_degree = 'Matric';
//$feild_of_study = '';
//$start_date = '2019-03';
//$end_date = '2020-08';


$institute_name = '';
$institute_location = '';
$institute_degree = '';
$feild_of_study = '';
$start_date = '';
$end_date = '';
$edit_edu_id = $_SESSION['edit_edu_id'];
$user_id = $_SESSION['id'];
$page_title = 'Add Education';

if (isset($edit_edu_id)) {
    $query = mysqli_query($con, "SELECT * FROM education WHERE user_id = '" . $user_id . "' && edu_id = '" . $edit_edu_id . "' ");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $institute_name = $row['edu_name'];
        $institute_location = $row['edu_location'];
        $institute_degree = $row['edu_degree'];
        $feild_of_study = $row['field_of_study'];
        $start_date = $row['start_date'];
        $end_date = $row['end_date'];
        $page_title = 'Edit Education';
    } else {
        unset($_SESSION['edit_edu_id']);
    }
} else {
    $institute_name = '';
    $institute_location = '';
    $institute_degree = '';
    $feild_of_study = '';
    $start_date = '';
    $end_date = '';
    $page_title = 'Add Education';
}

$checkUser = mysqli_query($con, "SELECT * FROM education WHERE user_id = '" . $user_id . "'");
if (mysqli_num_rows($checkUser) > 0) {
    if ($_SESSION["vasited"] == 1) {
        $_SESSION["vasited"] = 2;
        header("Location: index.php?view=page-4");
    }
}

?>

<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>

<form id="page-3-form" autocomplete="off">
    <div class="row">
        <div class="col-12 py-3">
            <h1 class="page-heading text-center"><?php echo $page_title ?> </h1>
        </div>
        <div class="col-12 mx-auto">
            <div class="form-row">
                <div class="form-group col-md-6 col-lg-4 invalid-inp">
                    <label for="institute_name">institute name*</label>
                    <input type="text" value="<?php echo $institute_name ?>" required
                           class="form-control page-3-input" id="institute_name" name="institute_name">
                </div>
                <div class="form-group col-md-6 col-lg-4 invalid-inp">
                    <label for="institute_location">institute location*</label>
                    <input type="text" required class="form-control page-3-input" id="institute_location"
                           name="institute_location" value="<?php echo $institute_location ?>">
                    <input type="text" class="form-control d-none" name="page" value="page-3">
                </div>
                <div class="form-group col-md-6 col-lg-4 invalid-inp">
                    <label for="degree">degree*</label>
                    <div class="dropdown position-relative">
                        <input type="text" name="institute_degree" id="institute_degree" class="d-none" required
                               value="<?php echo $institute_degree ?>">
                        <button class="form-control custom-drop-down dropdown-toggle dropdown-1"
                                type="button"
                                id="degree-dropdwon" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <?php
                            if ($institute_degree) {
                                echo $institute_degree;
                            } else {
                                ?>
                                Select
                            <?php } ?>
                            <!--                            Matric-->
                        </button>
                        <div class="dropdown-menu custom-drop-down-menu degree_dropdwon_menu"
                             aria-labelledby="degree_dropdwon">
                            <?php
                            foreach ($degrees as $value) {
                                ?>
                                <p class="dropdown-item mb-0 dropdown-1-item degree-dropdwon"><?php echo $value; ?></p>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group field_of_study_outer d-none col-md-6 col-lg-4 invalid-inp">
                    <label for="field_of_study">Field Of Study*</label>
                    <input type="text" class="form-control page-3-input text-capitalize"
                           id="field_of_study" name="field_of_study" value="<?php echo $feild_of_study ?>">
                </div>
                <div class="form-group col-md-6 col-lg-4 invalid-inp">
                    <label for="start_date">start date*</label>
                    <input type="month" required
                           class="form-control page-3-input date-picker" value="<?php echo $start_date ?>"
                           id="start_date" name="start_date">
                </div>
                <div class="form-group col-md-6 col-lg-4 invalid-inp">
                    <label for="end_date">end date*</label>
                    <input type="month" required
                           class="form-control page-3-input date-picker" value="<?php echo $end_date ?>" id="end_date"
                           name="end_date">
                </div>
            </div>
            <div class="action-btns text-center mt-lg-5 mt-4">
                <a href="?view=page-2" class="prev-btn mr-2">Prev</a>
                <button class="next-btn step-4-next" type="submit" disabled>Next</button>
            </div>
        </div>

    </div>
</form>

<script>
    var input = '';
    $(document).ready(function () {
        var ele = $(".page-3-input");
        for (var i = 0; i < ele.length; i++) {
            if ($(ele[i]).val().trim().length > 0) {
                $(ele[i]).parents(".form-group").removeClass("invalid-inp");
                $(".next-btn").prop('disabled', false);
            } else {
                $(".next-btn").prop('disabled', true);
            }
        }
        if ($("#degree-dropdwon").text().trim() != 'Select') {
            if ($("#degree-dropdwon").text().trim() == 'Enter a different degree') {
                $(".field_of_study_outer").removeClass("d-none");
                $("#degree-dropdwon").parents(".form-group").removeClass("invalid-inp");
                if ($("#field_of_study").val().trim() != '') {
                    $(".next-btn").prop('disabled', false);
                }
            } else {
                $("#degree-dropdwon").parents(".form-group").removeClass("invalid-inp");
                $(".next-btn").prop('disabled', false);
            }
        }

        $("#institute_degree").val($("#degree-dropdwon").text().trim());

    });

    $(".page-3-input").on("keyup", function () {
        var input = $(this);
        if (input.val().trim().length > 0) {
            input.parents(".form-group").removeClass("invalid-inp");
        } else {
            input.parents(".form-group").addClass("invalid-inp");
        }


        if ($("#institute_name").val().trim() != '' && $("#institute_location").val().trim() != '' && $("#degree-dropdwon").text().trim() != 'Select' && $("#start_date").val().trim() != '' && $("#end_date").val().trim() != '') {
            if ($("#degree-dropdwon").text().trim() == 'Enter a different degree' && $("#field_of_study").val().trim() != '') {
                $(".next-btn").prop('disabled', false);
            } else if ($("#degree-dropdwon").text().trim() != 'Enter a different degree') {
                $(".next-btn").prop('disabled', false);
            } else {
                $(".next-btn").prop('disabled', true);
            }
        } else {
            $(".next-btn").prop('disabled', true);
        }
        //         if ($("#degree-dropdwon").text().trim() == 'Enter a different degree' && $("#field_of_study").val().trim() != '') {
        //             $(".next-btn").prop('disabled', false);
        //         } else {
        //             $(".next-btn").prop('disabled', true);
        //             // console.log("123456789");
        //         }
        //     } else {
        //         $(".next-btn").prop('disabled', true);
        //     }
    });
    $(".date-picker").change(function () {
        $(this).parents(".form-group").removeClass("invalid-inp");
        if ($("#institute_name").val().trim() != '' && $("#institute_location").val().trim() != '' && $("#degree-dropdwon").text().trim() != 'Select' && $("#start_date").val().trim() != '' && $("#end_date").val().trim() != '') {
            $(".next-btn").prop('disabled', false);
        } else {
            $(".next-btn").prop('disabled', true);
        }

    });


    $(".dropdown-1-item").click(function () {
        if ($(this).text().trim() == 'Enter a different degree') {
            $(this).parents(".form-group").removeClass("invalid-inp");
            $(".next-btn").prop('disabled', true);
        } else {
            if ($(this).text().trim() != 'Select') {
                $(this).parents(".form-group").removeClass("invalid-inp");
                if ($("#institute_name").val().trim() != '' && $("#institute_location").val().trim() != '' && $("#start_date").val().trim() != '' && $("#end_date").val().trim() != '') {
                    $(".next-btn").prop('disabled', false);
                }
            } else {
                $(this).parents(".form-group").addClass("invalid-inp");
                $(".next-btn").prop('disabled', true);
            }
        }
    });

</script>

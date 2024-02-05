<?php
session_start();
include 'connection.php';
$compnay_name = '';
$job_title = '';
$compnay_location = '';
$start_date = '';
$end_date = '';
$professional_experience = '';

if (isset($_SESSION['edit_experience_id'])) {
    $query = mysqli_query($con, "SELECT * FROM professional_experience WHERE professional_id = '" . $_SESSION['edit_experience_id'] . "'") or die();
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $compnay_name = $row['compnay_name'];
        $job_title = $row['job_title'];
        $compnay_location = $row['compnay_location'];
        $start_date = $row['start_date'];
        $end_date = $row['to_date'];
        $professional_experience = $row['professional_experience'];
    } else {
        $compnay_name = '';
        $job_title = '';
        $compnay_location = '';
        $start_date = '';
        $end_date = '';
        $professional_experience = '';
    }
}


?>

<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>
<p class="to_date_output d-none"><?php echo $end_date ?></p>
<form id="page-7-form" autocomplete="off">
    <div class="row step step-2">
        <div class="col-12 py-3">
            <h1 class="page-heading text-center">professional experience</h1>
        </div>
        <div class="col-12">
            <div class="form-row">
                <div class="form-group invalid-inp col-md-4">
                    <label for="job-title">Job title*</label>
                    <div class="autocomplete">
                        <input type="text" required value="<?php echo $job_title; ?>" class="form-control page-7-input"
                               id="job-title"
                               name="job-title">
                    </div>
                </div>
                <div class="form-group invalid-inp col-md-4">
                    <label for="name">compnay name*</label>
                    <input type="text" required value="<?php echo $compnay_name; ?>" class="form-control page-7-input"
                           id="compnay_name" name="compnay_name">
                </div>
                <div class="form-group invalid-inp col-md-4">
                    <label for="contact_number">compnay location*</label>
                    <input type="text" required value="<?php echo $compnay_location; ?>"
                           class="form-control page-7-input"
                           id="compnay_location"
                           name="compnay_location">
                </div>
                <div class="form-group col-md-6 col-lg-4 invalid-inp">
                    <label for="start_date">start date*</label>
                    <input type="month" required="" class="form-control page-7-input date-picker"
                           value="<?php echo $start_date; ?>"
                           id="start_date" name="start_date">
                </div>
                <div class="form-group col-md-6 col-lg-4">
                    <div class="form-check present-checkbox">
                        <input type="checkbox" checked class="form-check-input" id="present_check">
                        <label class="form-check-label" for="present_check">present</label>
                    </div>

                </div>
                <div class="form-group col-md-6 col-lg-4 invalid-inp d-none to_date">
                    <label for="end_date">end date*</label>
                    <input type="month" class="form-control page-7-input date-picker" value="<?php echo $end_date ?>"
                           id="end_date"
                           name="end_date">
                </div>
                <div class="form-group col-lg-12 invalid-inp">
                    <label for="professional_profile">add professional experience*</label>
                    <textarea class="form-control page-7-input" name="professional_experience"
                              id="professional_experience"
                              rows="6"><?php echo $professional_experience ?></textarea>
                </div>
                <input type="text" name="page" value="page-7" class="form-control d-none">
                <input type="text" name="to_date" id="to_date" value="" class="form-control d-none">
            </div>
            <div class="action-btns text-center mt-lg-5 mt-4">
                <button type="submit" class="next-btn add-experiance">Submit</button>
            </div>
            <?php $check_data = mysqli_query($con, "SELECT * FROM professional_experience WHERE user_id = '" . $_SESSION['id'] . "' ");
            if (mysqli_num_rows($check_data) > 0) {
                ?>
                <div class="table-outer page-7-table mt-lg-5 mt-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Job Title</th>
                            <th scope="col">Compnay Name</th>
                            <th scope="col">Compnay Location</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">To Date</th>
                            <th scope="col">Experience</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($check_data)) { ?>
                            <tr>
                                <td><?php echo $row['job_title'] ?></td>
                                <td><?php echo $row['compnay_name'] ?></td>
                                <td><?php echo $row['compnay_location'] ?></td>
                                <td><?php echo date("m-Y", strtotime(trim($row['start_date']))) ?></td>
                                <td><?php
                                    if ($row['to_date'] == "Present") {
                                        echo $row['to_date'];
                                    } else {
                                        echo date("m-Y", strtotime(trim($row['to_date'])));
                                    } ?></td>
                                <td class="td_experinace" data-toggle="tooltip" data-placement="top"
                                    title="<?php echo $row['professional_experience'] ?>"><?php echo $row['professional_experience'] ?></td>
                                <td class="text-center">
                                    <i data-target="<?php echo $row['professional_id'] ?>"
                                       class="fas fa-pen edit_experinace mr-4"></i>
                                    <i data-target="<?php echo $row['professional_id'] ?>"
                                       class="fas fa-trash delete_experinace"></i>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>

    </div>
</form>
<div class="action-btns text-center mt-lg-5 mt-4">
    <a href="?view=page-6" class="prev-btn mr-2"> Prev</a>
    <?php $check_data = mysqli_query($con, "SELECT * FROM professional_experience WHERE user_id = '" . $_SESSION['id'] . "' ");
    if (!mysqli_num_rows($check_data) > 0) { ?>
        <button class="next-btn" type="submit" disabled="true">Save</button>
    <?php } else { ?>
        <a href="?view=cv_preview" class="prev-btn cv_preview mr-2">Save</a>
    <?php } ?>
</div>

<?php

if (isset($_SESSION['edit_experience_id']) && $end_date != 'Present') {
    ?>
    <script>
        $('#present_check').prop('checked', false);
        $(".to_date").removeClass("d-none");
    </script>

<?php } else { ?>
    <script>
        $('#present_check').prop('checked', true);
        $(".to_date").addClass("d-none");
    </script>
<?php } ?>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    var input = '';
    $(document).ready(function () {
        var td = $(".td_experinace");
        for (var i = 0; i < td.length; i++) {
            var para = $(td[i]).text();
            var count = 30;
            var result = para.slice(0, count) + (para.length > count ? "..." : "");
            $(td[i]).text(result);
        }

        var ele = $(".page-7-input");
        for (var i = 0; i < ele.length; i++) {
            if ($(ele[i]).val().trim().length > 0) {
                $(ele[i]).parents(".form-group").removeClass("invalid-inp");
                $(".add-experiance").prop('disabled', false);
            } else {
                $(".add-experiance").prop('disabled', true);
            }
        }

    })
    $(".page-7-input").on("keyup", function () {
        var
            input = $(this);
        if (input.val().trim().length > 0) {
            input.parents(".form-group").removeClass("invalid-inp");
        } else {
            input.parents(".form-group").addClass("invalid-inp");
        }
        if ($("#job-title").val().trim() != '' && $("#compnay_name").val().trim() != '' && $("#compnay_location").val().trim() != '' && $("#start_date").val().trim() != '' && $("#professional_experience").val().trim() != '') {
            if ($('#present_check').is(':checked')) {
                $(".add-experiance").prop('disabled', false);
            } else {
                if ($("#end_date").val().trim() != '') {
                    $(".add-experiance").prop('disabled', false);
                } else {
                    $(".add-experiance").prop('disabled', true);
                }
            }

        } else {
            $(".add-experiance").prop('disabled', true);
        }
    });

    $('#present_check').change(function () {
        if ($(this).is(':checked')) {
            $(".to_date").addClass("d-none");
            if ($("#job-title").val().trim() != '' && $("#compnay_name").val().trim() != '' && $("#compnay_location").val().trim() != '' && $("#start_date").val().trim() != '' && $("#professional_experience").val().trim() != '') {
                $(".add-experiance").prop('disabled', false);
            }
        } else {
            $(".to_date").removeClass("d-none");
            if ($("#job-title").val().trim() != '' && $("#compnay_name").val().trim() != '' && $("#compnay_location").val().trim() != '' && $("#start_date").val().trim() != '' && $("#professional_experience").val().trim() != '' && $("#end_date").val().trim() != '') {
                $(".add-experiance").prop('disabled', false);
            } else {
                $(".add-experiance").prop('disabled', true);
            }
        }
    });


    $(".date-picker").change(function () {
        $(this).parents(".form-group").removeClass("invalid-inp");
        if ($("#job-title").val().trim() != '' && $("#compnay_name").val().trim() != '' && $("#compnay_location").val().trim() != '' && $("#start_date").val().trim() != '' && $("#professional_experience").val().trim() != '') {
            if ($("#present_check").is(':checked')) {
                $(".add-experiance").prop('disabled', false);
            } else {
                if ($("#end_date").val().trim() != '') {
                    $(".add-experiance").prop('disabled', false);
                }
            }
        } else {
            $(".next-btn").prop('disabled', true);
        }

    });
</script>
<script>
    var job_title = ['Program Manager', 'Emergency Room Technician', 'Barista', 'Warehouse Driver', 'Home Health Care Aid', 'Instructor', 'Information Technology Specialist', 'Cashier', 'Receptionist', 'Store Manager', 'Sales Associate', 'Laborer', 'Qualification Summary', 'Administrative Assistant'];


    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var
            currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var
                a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function (e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function (e) {
            var
                x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var
                x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }

        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    autocomplete(document.getElementById("job-title"), job_title);
</script>
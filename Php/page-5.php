<?php
$skill_name = '';
if (isset($_SESSION['skill_id'])) {
    session_start();
    include 'connection.php';
    $query = mysqli_query($con, "SELECT * FROM skills WHERE skill_id = '" . $_SESSION['skill_id'] . "'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $skill_name = $row['skill_name'];
    }
} else {
    $skill_name = '';
}
?>

<style>
    .delete_skill, .edit_skill {
        cursor: pointer;
    }

    .table_margin_top {
        margin-top: 30px;
    }

    .add_skill {
        width: 100%;
    }
</style>

<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>
<form id="page-5-form" autocomplete="off">
    <div class="row">
        <div class="col-12 pt-3 pb-lg-5 pb-4">
            <h1 class="page-heading text-center">Add Skills </h1>
        </div>
        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-lg-10 invalid-inp">
                    <label for="institute_name">add skill*</label>
                    <div class="autocomplete">
                        <input type="text" value='<?php echo $skill_name ?>' required class="form-control page-5-input"
                               id="add_skill"
                               name="add_skill">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="action-btns mt-lg-4 mt-4">
                        <button class="next-btn add_skill" type="submit" disabled="">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="text" class="form-control d-none" name="page" value="page-5">
        <div class="col-12 mt-4">
            <table class="table table-bordered table_margin_top">
                <thead>
                <tr>
                    <th class="w-75" scope="col">Skill</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <?php
                session_start();
                include 'connection.php';
                $user_id = $_SESSION["id"];
                $check_data = mysqli_query($con, "SELECT * FROM skills WHERE user_id = '" . $user_id . "'");
                if (mysqli_num_rows($check_data) > 0) {
                    ?>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($check_data)) {
                        ?>
                        <tr>
                            <td> <?php echo $row['skill_name'] ?> </td>
                            <td class="text-center">
                                <i data-target='<?php echo $row['skill_id'] ?>' class="fas fa-pen edit_skill mr-4"></i>
                                <i data-target='<?php echo $row['skill_id'] ?>'
                                   class="fas fa-trash-alt delete_skill"></i>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>

    </div>
</form>
<div class="action-btns text-center mt-lg-5 mt-4">
    <a href="?view=page-4" class="prev-btn mr-2">Prev</a>
    <a href="?view=page-6" class="next-btn page-5-next" disabled>Next</a>
</div>
<?php
$user_id = $_SESSION["id"];
$check_data = mysqli_query($con, "SELECT * FROM skills WHERE user_id = '" . $user_id . "'");
if (mysqli_num_rows($check_data) > 0) {
    ?>
    <script>
        $(".page-5-next").prop('disabled', false);
    </script>
<?php } else { ?>
    <script>
        $(".page-5-next").prop('disabled', true);
    </script>
<?php } ?>
<script>
    var input = '';
    $(document).ready(function () {
        var ele = $(".page-5-input");
        for (var i = 0; i < ele.length; i++) {
            if ($(ele[i]).val().trim().length > 0) {
                $(ele[i]).parents(".form-group").removeClass("invalid-inp");
                $(".add_skill").prop('disabled', false);
            } else {
                $(".add_skill").prop('disabled', true);
            }
        }
    });

    $(".page-5-input").on("keyup", function () {
        var input = $(this);
        if (input.val().trim().length > 0) {
            input.parents(".form-group").removeClass("invalid-inp");
            $(".add_skill").prop('disabled', false);
        } else {
            input.parents(".form-group").addClass("invalid-inp");
            $(".add_skill").prop('disabled', true);
        }

    });
</script>
<script>
    var jobs = ["Creativity","Interpersonal Skills","Critical Thinking", "Problem Solving", "Public Speaking", "Customer Service Skills", "Teamwork Skills", "Communication", "Collaboration", "Accounting", "Active Listening", "Adaptability", "Negotiation", "Conflict Resolution", "Empathy","Customer Service","Decision Making","Oral communication", "Written communication", "Interpersonal communication", "Non-verbal communication", "Listening", "Presentation", "Public-speaking", "Relationship-building", "Small talk", "Rapport-building", "Negotiating", "Persuading", "Discussion", "Data Management", "Recruiting", "Staff Development","Financial Analysis", "Market Analysis","Staff Development","Staff Training","Organizational Skills","Social Media Analysis","Communication Skills","Inventory Management","Audits","Surveillance Technology","Cyber Security", "Cyber Intelligence","Event Coordination","Meeting Planning","Desktop Support", "Helpdesk Support", "Warehouse Management", "Interpersonal Skills", "Taking Vital Signs","Patient Care", "Recording Patient Medical History", "Wound Dressing and Care", "Urgent and Emergency Care", "Record-Keeping", "Patient Education", "NIH Stroke Scale Patient Assessment", "Electronic Medical Record (EMR)", "Medicine Administration", "Blood Pressure Monitoring", "Phlebotomy", "Rehabilitation Therapy", "Hygiene Assistance", "Use of X-Ray, MRI, CAT Scans","Meditech","Glucose Checks","Electronic Heart Record (EHR)", "Programming Languages", "Web Development", "Data Structures", "Open Source Experience", "Coding Java Script", "Security", "Machine Learning", "Debugging", "UX/UI", "Front-End & Back-End Development", "Cloud Management", "Agile Development", "STEM Skills", "CAD", "Design", "Prototyping", "Testing", "Troubleshooting", "Project Launch", "Lean Manufacturing", "Workflow Development", "Computer Skills", "SolidWorks", "Budgeting", "Technical Report Writing Skills", "Agile", "Managing Cross-Functional Teams", "Scrum", "Performance Tracking", "Financial Modelling", "Ideation Leadership", "Feature Definition", "Forecasting", "Profit and Loss", "Scope Management", "Project Lifecycle Management", "Meeting Facilitation"];
    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
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
            var x = document.getElementById(this.id + "autocomplete-list");
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
            var x = document.getElementsByClassName("autocomplete-items");
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

    autocomplete(document.getElementById("add_skill"), jobs);
</script>

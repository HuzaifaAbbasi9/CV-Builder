function preloader() {
    setTimeout(function () {
        $("body").removeClass("preloader-outer");
    }, 500)
}

$(document).ready(function () {

    $(".icons").click(function () {
        $(this).removeClass("show-icon");
        if ($(this).hasClass("show-pswd")) {
            $(this).parents(".action-btns").prev().attr('type', 'text')
            $(this).next().addClass("show-icon");
        } else {
            $(this).parents(".action-btns").prev().attr('type', 'password')
            $(this).prev().addClass("show-icon");
        }
    });

    $(".signup").submit(function (e) {
        e.preventDefault();
        // window.location.href = "login.php";
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    alert("Sign Up Successfully");
                    window.location.href = "index.php";
                    $("body").addClass("preloader-outer");
                    setTimeout(function () {
                        preloader();
                    }, 200);
                } else {
                    alert(res);
                    // location.reload(true);
                }
                ;
            }
        });
    });

    $(".login").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    alert("Log In Successfully");
                    window.location.href = "index.php";
                    $("body").addClass("preloader-outer");
                    setTimeout(function () {
                        preloader();
                    }, 200);
                } else {
                    alert(res);
                    // location.reload(true);
                }
                ;
            }
        });
    });

    $(".logout").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: {page: 'logout'},
            success: function (res) {
                if (res == 1) {
                    alert("Log Out Successfuly!");
                    window.location.href = "login.php";
                    $("body").addClass("preloader-outer");
                    setTimeout(function () {
                        preloader();
                    }, 200);
                } else {
                    alert("Something Wrong!");
                }
            }
        });
    });

    $(".dropdown-1-item").click(function (e) {
        e.preventDefault();
        $(".dropdown-1").html($(this).html());
        $("#institute_degree").val($(".dropdown-1").text().trim());
        // if ($(this).html() == "Some College (No Degree)") {
        //     $(".field_of_study_outer").addClass("d-none");
        //     $(".other_degree_outer").removeClass("d-none");
        // } else

        if ($(this).html() == "Enter a different degree") {
            $(".other_degree_outer").addClass("d-none");
            $(".field_of_study_outer").removeClass("d-none");
        } else {
            $(".field_of_study_outer").addClass("d-none");
            $(".other_degree_outer").addClass("d-none");
            $("#field_of_study").val('');
        }
    });

    $(window).on('load', function () {
        preloader();
    });

    setTimeout(function () {
        preloader();
    }, 600)

    $("#page-1-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    window.location.href = "index.php?view=page-2";
                } else {
                    alert(res);
                }

            }
        });

    });

    $("#page-2-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    window.location.href = "index.php?view=page-3";
                } else {
                    alert(res);
                }

            }
        });

    });

    $("#page-3-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    window.location.href = "index.php?view=page-4";
                } else {
                    alert(res);
                }

            }
        });

    });

    $("#page-5-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    window.location.reload(true);
                } else {
                    alert(res);
                }

            }
        });

    });

    $("#page-6-form").submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    alert("Details received successfully!")
                    window.location.reload(true);
                } else {
                    alert(res);
                }

            }
        });

    });

    $("#page-7-form").submit(function (e)   {
        e.preventDefault();
        if($('#present_check').is(':checked')) {
            $("#to_date").val('Present');
        } else {
            $("#to_date").val($("#end_date").val());
        }
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: $(this).serialize(),
            success: function (res) {
                if (res == 1) {
                    alert("Details received successfully!");
                    $('.to_date_output').text('');
                    // $(".to_date").removeClass("d-none");
                    // $('#present_check').prop('checked', true);
                    window.location.reload(true);
                } else {
                    alert(res);
                }

            }
        });

    });

    $(".delete-table-row").click(function () {
        var user_id = $(this).attr('data-toggle');
        var obj = {page: 'delete_edu', user_id: user_id};

        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    alert("Delete Data Successfully");
                    window.location.reload(true);
                } else {
                    alert(res);
                }
            }
        });
    });

    $(".delete_skill").click(function () {
        var skill_id = parseInt($(this).attr('data-target'));
        var obj = {page: 'delete_skill', skill_id: skill_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    alert("Delete Skill Successfully");
                    window.location.reload(true);
                } else {
                    alert(res);
                }
            }
        });
    });

    $(".edit_skill").click(function () {
        var skill_id = parseInt($(this).attr('data-target'));
        var obj = {page: 'eidt_skill', skill_id: skill_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    window.location.reload(true);
                } else {
                    alert(res);
                }
            }
        });
    });

    $(".delete_info").click(function (e) {
        e.preventDefault();
        var delete_info_id = parseInt($(this).attr('data-target'));
        var obj = {page: 'delete_info', delete_info_id: delete_info_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    alert("Delete Data Successfully");
                    window.location.reload(true);
                } else {
                    alert(res);
                }
            }
        });
    });

    $(".eidt_info").click(function (e) {
        e.preventDefault();
        var edit_info_id = parseInt($(this).attr('data-target'));
        var obj = {page: 'eidt_info', edit_info_id: edit_info_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    window.location.reload(true);
                } else {
                    alert("Try Again");
                }
            }
        });
    });

    $(".edit_experinace").click(function (e) {
        e.preventDefault();
        var edit_experience_id = parseInt($(this).attr('data-target'));
        var obj = {page: 'eidt_experience', edit_experience_id: edit_experience_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    window.location.reload(true);
                } else {
                    alert("Try Again");
                }
            }
        });
    });

    $(".delete_experinace").click(function (e) {
        e.preventDefault();
        var delete_experience_id = parseInt($(this).attr('data-target'));
        var obj = {page: 'delete_experience', delete_experience_id: delete_experience_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == '1') {
                    window.location.reload(true);
                } else {
                    alert("Try Again");
                }
            }
        });
    });

    $(".edit-table-row").click(function () {
        var user_id = $(this).attr('data-toggle');
        var obj = {page: 'edit_edu', user_id: user_id};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == 1) {
                    window.location.href = "index.php?view=page-3";
                } else {
                    alert(res);
                }
            }
        });
    });

    $(".cv_preview").click(function (e) {
        e.preventDefault();
        var obj = {page: 'page_tracker', page_tracker: $(".page-tracker").text()};
        $.ajax({
            type: "POST",
            url: "Php/action.php",
            data: obj,
            success: function (res) {
                if (res == 1) {
                    window.location.href = "index.php?view=cv_preview";
                } else {
                    alert(res);
                }
            }
        });
    });

})
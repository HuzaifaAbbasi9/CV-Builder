<?php

$page = $_POST['page'];

if ($page == "signup") {
    signup();
} else if ($page == "login") {
    login();
} else if ($page == "logout") {
    logout();
} else if ($page == "education") {
    education();
} else if ($page == "delete_edu") {
    delete_edu();
} else if ($page == "edit_edu") {
    edit_edu();
} else if ($page == "page-1") {
    page_1();
} else if ($page == "page-2") {
    page_2();
} else if ($page == "page-3") {
    page_3();
} else if ($page == "page-5") {
    page_5();
} else if ($page == "delete_skill") {
    delete_skill();
} else if ($page == "eidt_skill") {
    eidt_skill();
} else if ($page == "page-6") {
    page_6();
} else if ($page == "page-7") {
    page_7();
} else if ($page == "page_tracker") {
    page_tracker();
} else if ($page == "delete_info") {
    delete_info();
} else if ($page == "eidt_info") {
    eidt_info();
} else if ($page == "eidt_experience") {
    eidt_experience();
} else if ($page == "delete_experience") {
    delete_experience();
}


function signup()
{
    session_start();
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);
    $name = $_POST['name'];
    $number = $_POST['number'];

    $signup_email = mysqli_query($con, "SELECT email FROM signup");
    $check_email = mysqli_query($con, "SELECT * FROM signup WHERE email='" . $email . "'");

    if (mysqli_num_rows($signup_email) > 0) {
        if (!$check_email) {
            die('Error: ' . mysqli_error($con));
        }

        if (mysqli_num_rows($check_email) > 0) {
            echo "email already exists";

        } else {

            $query = mysqli_query($con, "INSERT INTO signup(name, email, number, password) VALUES('$name', '$email', '$number', '$hashpassword')");
            if ($query) {
                $query = mysqli_query($con, "SELECT * FROM signup ORDER BY id DESC LIMIT 1");
                $row = mysqli_fetch_assoc($query);
                $_SESSION["id"] = $row["id"];
                echo "1";
                $_SESSION["vasited"] = 1;
            };

        }

    } else {
        $query = mysqli_query($con, "INSERT INTO signup(name, email, number, password) VALUES('$name', '$email', '$number', '$hashpassword')");
        if ($query) {
            $query = mysqli_query($con, "SELECT * FROM signup ORDER BY id DESC LIMIT 1");
            $row = mysqli_fetch_assoc($query);
            $_SESSION["id"] = $row["id"];
            echo "1";
            $_SESSION["vasited"] = 1;
        };

    }
}

function login()
{
    session_start();
    include 'connection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashpassword = md5($password);
    $check_email = mysqli_query($con, "SELECT * FROM signup WHERE email='" . $email . "' && password = '" . $hashpassword . "'");
    if (mysqli_num_rows($check_email) > 0) {
        $row = mysqli_fetch_assoc($check_email);
        $_SESSION["id"] = $row["id"];
        echo "1";
        $_SESSION["vasited"] = 1;

    } else {
        echo "Invalid Email or Password";
    }
}

function logout()
{
    session_start();
    session_unset();
    session_destroy();
    echo '1';
}

function page_1()
{
    session_start();
    include 'connection.php';
    $query = mysqli_query($con, "SELECT * FROM cv_templete WHERE user_id=" . $_SESSION['id'] . "");
    if (mysqli_num_rows($query) > 0) {
        $update = mysqli_query($con, "UPDATE cv_templete SET temp = '" . $_POST['templete'] . "'");
        if ($update) {
            echo 1;
        } else {
            echo mysqli_error($con);
        }
    } else {
        $query = mysqli_query($con, "INSERT INTO cv_templete(temp, user_id) VALUES ('" . $_POST['templete'] . "' , '" . $_SESSION['id'] . "')");
        if ($query) {
            echo 1;
        } else {
            echo mysqli_error($con);
        }
    }
}

function page_2()
{
    include 'connection.php';
    session_start();
    $name = $_POST['name'];
    $job_title = $_POST['job-title'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $linkedin_pro = $_POST['linkedin-pro'];
    $web_link = $_POST['web-link'];
    $user = $_SESSION['id'];
    $insert = mysqli_query($con, "SELECT * FROM personel_infromation WHERE user_id = '" . $_SESSION['id'] . "'") or die();
    if (mysqli_num_rows($insert) > 0) {
        $update = mysqli_query($con, "UPDATE personel_infromation SET name='" . $name . "',job_title='" . $job_title . "',contact_number='" . $contact_number . "',email='" . $email . "',country='" . $country . "',linkedin_pro='" . $linkedin_pro . "',web_link='" . $web_link . "' WHERE user_id='" . $_SESSION['id'] . "'");
        if ($update) {
            echo 1;
            $_SESSION["cv-preview-page"] = "?view=page-2";
            $_SESSION["cv-next-page"] = "?view=page-3";
        } else {
            echo mysqli_error($con);
        }
    } else {
        $query = mysqli_query($con, "INSERT INTO personel_infromation (name,job_title,contact_number,email,country,linkedin_pro,web_link, user_id) VALUES ('$name', '$job_title', '$contact_number', '$email', '$country', '$linkedin_pro', '$web_link', '$user')");
        if ($query) {
            echo 1;
            $_SESSION["cv-preview-page"] = "?view=page-2";
            $_SESSION["cv-next-page"] = "?view=page-3";
        } else {
            echo mysqli_error($con);
        }
    }
}

function page_3()
{
    session_start();
    include 'connection.php';
    $edu_name = trim($_POST['institute_name']);
    $edu_location = trim($_POST['institute_location']);
    $edu_degree = trim($_POST['institute_degree']);
    $field_of_studey = trim($_POST['field_of_study']);
//    $start_date = date("m-Y", strtotime(trim($_POST['start_date'])));
//    $end_date = date("m-Y", strtotime(trim($_POST['end_date'])));

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $user_id = $_SESSION["id"];


    if (isset($_SESSION["edit_edu_id"])) {
        $check_data = mysqli_query($con, "SELECT * FROM education WHERE edu_id = '" . $_SESSION["edit_edu_id"] . "'");
        if (mysqli_num_rows($check_data) > 0) {
            $row = mysqli_fetch_assoc($check_data);
            if ($row["edu_name"] == $edu_name && $row['edu_location'] == $edu_location && $row['edu_degree'] == $edu_degree && $row['field_of_study'] == $field_of_studey && $row['start_date'] == $start_date && $row['end_date'] == $end_date) {
                echo "Please Update Some Data";
            } else {
                $update_data = mysqli_query($con, "UPDATE education SET edu_name='" . $edu_name . "' , edu_location='" . $edu_location . "', edu_degree='" . $edu_degree . "', field_of_study='" . $field_of_studey . "', start_date='" . $start_date . "', end_date='" . $end_date . "' WHERE edu_id='" . $_SESSION["edit_edu_id"] . "'");
                if ($update_data) {
                    echo "1";
                } else {
                    echo mysqli_error($con);
                }
            }
        }
    } else {
        $check_data = mysqli_query($con, "SELECT * FROM education WHERE user_id = '" . $user_id . "' && edu_name='" . $edu_name . "' && edu_location = '" . $edu_location . "' && edu_degree = '" . $edu_degree . "' && field_of_study = '" . $field_of_studey . "' &&  start_date='" . $start_date . "' && end_date='" . $end_date . "'");
        if (!mysqli_num_rows($check_data) > 0) {
            $insert_data = mysqli_query($con, "INSERT INTO education(edu_name, edu_location, edu_degree, field_of_study,start_date,end_date, user_id) VALUES('$edu_name', '$edu_location', '$edu_degree', '$field_of_studey', '$start_date', '$end_date', '$user_id')");
            if ($insert_data) {
                echo "1";
//                echo $start_date;
            } else {
                echo mysqli_error($con);
            }

        } else {
            echo "this education detail is already exist";
        }
    }

}

function page_5()
{
    session_start();
    include 'connection.php';
    $add_skill = trim($_POST['add_skill']);
    $add_skill = strtoupper($add_skill);
    $user_id = $_SESSION["id"];

    if (isset($_SESSION['skill_id'])) {
        $check_data = mysqli_query($con, "SELECT * FROM skills WHERE skill_id ='" . $_SESSION['skill_id'] . "'");
        if (mysqli_num_rows($check_data) > 0) {
            $row = mysqli_fetch_assoc($check_data);
            if ($row["skill_name"] == $add_skill) {
                echo "Please update some data";
            } else {
                $update_data = mysqli_query($con, "UPDATE skills SET skill_name='" . $add_skill . "' WHERE skill_id ='" . $_SESSION['skill_id'] . "'");
                if ($update_data) {
                    unset($_SESSION['skill_id']);
                    echo "1";
                } else {
                    echo mysqli_error($con);
                }
            }
        } else {
            echo "No Data Found";
        }
//            echo "1";
//            $row = mysqli_fetch_assoc($check_data);
//            if ($row["add_skill"] == $add_skill) {
//                echo "Please Update Some Data";
//            } else {
//                $update_data = mysqli_query($con, "UPDATE skills SET skill_name='" . $add_skill . "' WHERE skill_id ='" . $_SESSION['skill_id'] . "'");
//                if ($update_data) {
//                    echo "1";
//                } else {
//                    echo mysqli_error($con);
//                }
//            }
//        } else {
//            echo "this skill is already exist";
//        }
    } else {
        $check_data = mysqli_query($con, "SELECT * FROM skills WHERE user_id = '" . $user_id . "' && skill_name='" . $add_skill . "' ");
        if (!mysqli_num_rows($check_data) > 0) {
            $insert_data = mysqli_query($con, "INSERT INTO skills(user_id, skill_name) VALUES('$user_id', '$add_skill')");
            if ($insert_data) {
                echo "1";
            } else {
                echo mysqli_error($con);
            }

        } else {
            echo "this skill is already exist";
        }
    }


}

function page_6()
{
    session_start();
    include 'connection.php';
    $professional_profile = trim($_POST['professional_profile']);
    $user_id = $_SESSION["id"];
    $professional_id = '';
    if (isset($_SESSION['edit_info_id'])) {
        $professional_id = $_SESSION['edit_info_id'];
    } else {
        $professional_id = '';
    }

    if (isset($_SESSION['edit_info_id'])) {
        $check_data = mysqli_query($con, "SELECT * FROM professional_detail WHERE professional_profile = '" . $professional_profile . "' && professional_id='" . $professional_id . "' ");
        if (!mysqli_num_rows($check_data) > 0) {
            $update_data = mysqli_query($con, "UPDATE professional_detail SET professional_profile='" . $professional_profile . "' WHERE professional_id ='" . $professional_id . "'");
            if ($update_data) {
                unset($_SESSION['edit_info_id']);
                echo 1;
            } else {
                echo mysqli_error($con);
            }
        } else {
            echo "Please Update Some Data";
        }
    } else {
        $check_data = mysqli_query($con, "SELECT * FROM professional_detail WHERE user_id = '" . $user_id . "' && professional_profile='" . $professional_profile . "' ");
        if (!mysqli_num_rows($check_data) > 0) {
            $insert_data = mysqli_query($con, "INSERT INTO professional_detail(user_id, professional_profile) VALUES('$user_id', '$professional_profile')");
            if ($insert_data) {
                unset($_SESSION['edit_info_id']);
                echo 1;
            } else {
                echo mysqli_error($con);
            }

        } else {
            echo "this details is already exist";
        }
    }
}

function page_7()
{
    session_start();
    include 'connection.php';
    $job_title = trim($_POST['job-title']);
    $compnay_name = trim($_POST['compnay_name']);
    $compnay_location = trim($_POST['compnay_location']);
    $start_date = trim($_POST['start_date']);
    $to_date = trim($_POST['to_date']);
    $professional_experience = trim($_POST['professional_experience']);
    $user_id = $_SESSION['id'];

    if (isset($_SESSION['edit_experience_id'])) {
        $check_data = mysqli_query($con, "SELECT * FROM professional_experience WHERE user_id = '" . $user_id . "' && job_title='" . $job_title . "'&& compnay_name='" . $compnay_name . "'&& compnay_location='" . $compnay_location . "'&& start_date='" . $start_date . "'&& to_date='" . $to_date . "'&& professional_experience='" . $professional_experience . "' ");
        if (!mysqli_num_rows($check_data) > 0) {
            $update_data = mysqli_query($con, "UPDATE professional_experience SET job_title='" . $job_title . "', compnay_name='" . $compnay_name . "', compnay_location='" . $compnay_location . "', start_date='" . $start_date . "', to_date='" . $to_date . "', professional_experience='" . $professional_experience . "' WHERE professional_id ='" . $_SESSION['edit_experience_id'] . "'");
            if ($update_data) {
                unset($_SESSION['edit_experience_id']);
                echo "1";
            } else {
                echo mysqli_error($con);
            }
        } else {
            echo "Please Update Some Data";
        }
    } else {
        $check_data = mysqli_query($con, "SELECT * FROM professional_experience WHERE user_id = '" . $user_id . "' && job_title='" . $job_title . "'&& compnay_name='" . $compnay_name . "'&& compnay_location='" . $compnay_location . "'&& start_date='" . $start_date . "'&& to_date='" . $to_date . "'&& professional_experience='" . $professional_experience . "' ");
        if (!mysqli_num_rows($check_data) > 0) {
            $insert_data = mysqli_query($con, "INSERT INTO professional_experience(user_id, job_title, compnay_name, compnay_location, start_date, to_date, professional_experience) VALUES('$user_id', '$job_title', '$compnay_name', '$compnay_location', '$start_date', '$to_date', '$professional_experience')");
            if ($insert_data) {
                unset($_SESSION['edit_experience_id']);
                echo 1;
            } else {
                echo mysqli_error($con);
            }

        } else {
            echo "this details is already exist";
        }
    }
}

function page_tracker()
{
    session_start();
    $_SESSION["page-number"] = "index.php?view=" . $_POST['page_tracker'];
    if (isset($_SESSION["page-number"])) {
        echo 1;
    } else {
        echo "Error!";
    }
}

function delete_edu()
{
    session_start();
    include 'connection.php';
    $user_id = $_POST['user_id'];
    $query = mysqli_query($con, "DELETE FROM education WHERE edu_id = '" . $user_id . "'");
    if ($query) {
        echo "1";
    } else {
        mysqli_error($con);
    }
}

function delete_skill()
{
    session_start();
    include 'connection.php';
    $skill_id = $_POST['skill_id'];
    $query = mysqli_query($con, "DELETE FROM skills WHERE skill_id = '" . $skill_id . "'");
    if ($query) {
        echo "1";
    } else {
        mysqli_error($con);
    }
}

function delete_info()
{
    session_start();
    include 'connection.php';
    $delete_info_id = $_POST['delete_info_id'];
    $query = mysqli_query($con, "DELETE FROM professional_detail WHERE professional_id = '" . $delete_info_id . "'");
    if ($query) {
        echo "1";
    } else {
        echo mysqli_error($con);
    }
}

function delete_experience()
{
    session_start();
    include 'connection.php';
    $delete_experience_id = $_POST['delete_experience_id'];
    $query = mysqli_query($con, "DELETE FROM professional_experience WHERE professional_id = '" . $delete_experience_id . "'");
    if ($query) {
        echo "1";
    } else {
        echo mysqli_error($con);
    }
}

function eidt_info()
{
    session_start();
    include 'connection.php';
    $_SESSION['edit_info_id'] = $_POST['edit_info_id'];
    if (isset($_SESSION['edit_info_id'])) {
        echo "1";
    }
}

function eidt_experience()
{
    session_start();
    include 'connection.php';
    $_SESSION['edit_experience_id'] = $_POST['edit_experience_id'];
    if (isset($_SESSION['edit_experience_id'])) {
        echo "1";
    }
}

function eidt_skill()
{
    session_start();
    include 'connection.php';
    $_SESSION['skill_id'] = $_POST['skill_id'];
    if (isset($_SESSION['skill_id'])) {
        echo "1";
    }
}

function edit_edu()
{
    include 'connection.php';
    session_start();
    $edit_edu_id = $_POST['user_id'];
    $user_id = $_SESSION["id"];
    $query = mysqli_query($con, "SELECT * FROM education WHERE user_id = '" . $user_id . "' && edu_id = '" . $edit_edu_id . "' ");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION["edit_edu_id"] = $edit_edu_id;
        $_SESSION["vasited"] = 2;
        echo 1;
    } else {
        mysqli_error($con);
    }
}


?>

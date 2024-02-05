<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>
<form autocomplete="off" id="page-1-form">
    <div class="row">
        <div class="col-12 py-3">
            <h1 class="page-heading text-center">Choose Templete.</h1>
        </div>
        <div class="col-md-4 col-6">
            <label>
                <input type="radio" name="templete" value="temp-1" id="temp-1-cv" class="custom-radio">
                <img src="images/page_1.png" class="img-fluid choose-temp" alt="">
            </label>
        </div>
        <div class="col-md-4 col-6 mt-4 mt-md-0">
            <label>
                <input type="radio" name="templete" value="temp-3" id="temp-3-cv" class="custom-radio">
                <img src="images/page_3.png" class="img-fluid choose-temp" alt="">
            </label>
        </div>
        <div class="col-md-4 col-6 mt-4 mt-md-0">
            <label>
                <input type="radio" name="templete" value="temp-4" id="temp-4-cv" class="custom-radio">
                <img src="images/page_4.png" class="img-fluid choose-temp" alt="">
            </label>
        </div>
        <input type="text" name="page" value="page-1" class="form-control d-none">
        <div class="action-btns text-center mt-lg-5 mt-4">
            <button class="next-btn disabled" type="submit">Next</button>
        </div>
    </div>
</form>

<script>
    $(".choose-temp").click(function () {
        $(".next-btn").removeAttr("disabled");
    });
</script>
<?php

session_start();
include 'connection.php';
$query = mysqli_query($con, "SELECT * FROM cv_templete WHERE user_id=" . $_SESSION['id'] . "");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    ?>
    <script>
        var ele = $("#" + "<?php echo $row['temp'] ?>" + "-cv");
        ele.prop("checked", true);
        $(".next-btn").removeAttr("disabled");
    </script>
    <?php

}
?>




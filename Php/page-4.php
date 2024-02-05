<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>

<div class="row">
    <div class="col-12 py-3">
        <h1 class="page-heading text-center"> Education </h1>
    </div>
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Institute Name</th>
                <th scope="col">Institute Location</th>
                <th scope="col">Degree</th>
                <th scope="col">Field Of Study</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody class="eduction-details">
            <?php
            include 'Php/connection.php';
            $query = mysqli_query($con, "SELECT * FROM education WHERE user_id='" . $_SESSION['id'] . "'") or die(mysqli_error($con));
            if (mysqli_num_rows($query) > 0) {
                // output data of each row
            while ($row = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td>
                        <span class='education-result'><?php echo $row['edu_name'] ?></span>
                    </td>
                    <td>
                        <span class='education-result'><?php echo $row['edu_location'] ?></span>
                    </td>
                    <td>
                        <span class='education-result'><?php echo $row['edu_degree'] ?></span>
                    </td>
                    <td>
                        <span class='education-result'><?php echo $row['field_of_study'] ?></span>
                    </td>
                    <td>
                        <span class='education-result'><?php echo date("m-Y", strtotime(trim($row['start_date']))) ?></span>
                    </td>
                    <td>
                        <span class='education-result'><?php echo date("m-Y", strtotime(trim($row['end_date'])))     ?></span>
                    </td>
                    <td class='text-center'>
                        <span class='edit-table-row' data-toggle=<?php echo $row['edu_id'] ?>>edit</span>
                        <i class='fas fa-trash-alt delete-table-row'
                           data-toggle=<?php echo $row['edu_id'] ?>></i>
                    </td>
                </tr>
            <?php
            }
            }else {
            ?>
                <script>
                    window.location.href = "index.php?view=page-3";
                </script>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="action-btns text-center mt-lg-5 mt-4">
            <a href="?view=page-3" class="prev-btn page-4-prev mr-2">Add Education</a>
            <a href="?view=page-5" class="next-btn page-4-next">Next</a>
        </div>
    </div>

</div>
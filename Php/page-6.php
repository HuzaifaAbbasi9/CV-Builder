<?php
include 'connection.php';
session_start();
$edit_info_id = '';
$job_title = '';
if (isset($_SESSION['edit_info_id'])) {
    session_start();
    include 'connection.php';
    $query = mysqli_query($con, "SELECT * FROM professional_detail WHERE professional_id = '" . $_SESSION['edit_info_id'] . "'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $edit_info_id = $row['professional_profile'];
    }
} else {
    $edit_info_id = '';
}
$query = mysqli_query($con, "SELECT * FROM personel_infromation WHERE user_id = '" . $_SESSION['id'] . "'") or die();
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $job_title = $row['job_title'];
}
?>

<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>

<form id="page-6-form" autocomplete="off">
    <div class="row">
        <div class="col-12 pt-3 pb-lg-5 pb-4">
            <h1 class="page-heading text-center">professional Profile </h1>
        </div>
        <div class="col-12">
            <div class="form-row">
                <div class="form-group col-12 profile_autocomplete"></div>
                <div class="form-group col-lg-10 invalid-inp">
                    <label for="professional_profile">add professional profile*</label>
                    <textarea class="form-control page-6-input" name="professional_profile" id="professional_profile"
                              rows="8"><?php echo $edit_info_id ?></textarea>
                </div>
                <div class="col-lg-2 d-lg-flex align-items-lg-center">
                    <div class="action-btns mt-3">
                        <button class="next-btn add_professional_profile w-100" type="submit" disabled="">Submit
                        </button>
                    </div>
                </div>

                <div class="form-group col-12 profile_autocomplete_items mt-lg-5 mt-4">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM professional_detail WHERE user_id = '" . $_SESSION['id'] . "'") or die();
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                            <div class="profile_autocomplete_outer">
                                <p class="autocomplete_item"><?php echo $row['professional_profile'] ?> </p>
                                <div class="text-right">
                                    <button data-target="<?php echo $row['professional_id'] ?>" class="eidt_info"><i
                                                class="fas fa-pencil-alt"></i></button>
                                    <button data-target="<?php echo $row['professional_id'] ?>" class="delete_info"><i
                                                class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <input type="text" class="form-control d-none" name="page" value="page-6">
        <p class="job-title d-none"><?php echo $job_title ?></p>
    </div>
</form>
<div class="action-btns text-center mt-lg-5 mt-4">
    <a href="?view=page-5" class="prev-btn mr-2">Prev</a>
    <?php
    $query = mysqli_query($con, "SELECT * FROM professional_detail WHERE user_id = '" . $_SESSION['id'] . "'") or die();
    if (!mysqli_num_rows($query) > 0) {
        ?>
        <button class="next-btn page-6-next" disabled>Next</button>
    <?php } else { ?>
        <a href="?view=page-7" class="next-btn page-6-next">Next</a>
    <?php } ?>
</div>

<?php

if ($job_title != '') {
    ?>
    <script>
        var job_details = [
            {
                job_title: "Qualification Summary",
                id: 1,
                decs: "Customer Service Professional with a diverse background in the service industry, utilizes high-value skills including inventory and organizational management, strategic communication, and staff development. Proven ability to streamline processes to exceed or meet tight deadlines, saving time and resources. Maximizes strong interpersonal skills to develop team’s soft and hard skills in order to achieve daily and monthly organizational goals, as well as creatively resolving customer service issues without alienating the customer."
            },
            {
                id: 1,
                decs: "Demonstrated expertise in federal government guidelines regarding water waste management. Demonstrated ability to handle complex and concurrent event management under stringent timeframe and changing priorities. Organizational skills issues are resolved with creativity and strategic customer service."
            },
            {
                id: 1,
                decs: "Health Care Expert with over 20 years of experience assessing patients, coordinating resources for medical facilities while providing high-quality treatment and triaging patients for urgent care. Utilizes technical expertise and interpersonal skills to assist physicians and nurses. Strong communication skills used to articulate diagnoses and treatment recommendations. Expert in emergency room best practices and cutting-edge industry trends. Demonstrated ability to make critical decisions and effectively guide others in high stress environments."
            },
            {
                job_title: "Administrative Assistant",
                id: 2,
                decs: 'Tracks the progress and completion of office projects; collaborating with office team members to delegate and provide assistance.'
            },
            {
                id: 2,
                decs: 'Trains new hires on the office’s standard operating procedures, ensuring each employee fully understands the implications of processing tasks incorrectly, as well as corrective procedures if an error occurs.',
            },
            {
                id: 2,
                decs: 'Received numerous commendations including attendance and safety awards'
            },
            {
                id: 2,
                decs: 'Monitored budgets and tracked expenditures, according to the office’s budget priorities. Answered incoming multi-line telephone calls, sharing helpful information and informing the public of government services.'
            },
            {
                id: 2,
                decs: 'Processed the supplies’ order received form and ensured timely delivery of raw materials to construction sites. '
            },
            {
                id: 2,
                decs: 'Arranged meetings and ordered allergy-specific and diet-conscious lunches for guests and staff attending meetings on the property. '
            },
            {
                id: 2,
                decs: 'Organized monthly social events for staff and guests to network and foster a sense of community'
            },
            {
                job_title: 'Laborer',
                id: 3,
                decs: 'Develops strategic plans to efficiently clean and sanitize over xx conference rooms, offices and restrooms weekly.'
            },
            {
                id: 3,
                decs: 'Coordinates and physically relocated furniture, ensuring no items were lost or damaged. Analyzed the effectiveness and outcomes of using varying cleaning products on different surfaces.'
            },
            {
                id: 3,
                decs: 'Audits cleaning supplies, ensuring stock levels were able to meet service demands. Implemented safety procedures by strategically placing proper signage around the property, alerting customers of in-process repairs and cleaning.'
            },
            {
                id: 3,
                decs: 'Safely and carefully transports large equipment and supplies including hand trucks, various kinds of dollies and flatbed trucks. As a manager of large inventory operations, utilizes regular audits and detailed contingency plans for maximum team effectiveness'
            },
            {
                id: 3,
                decs: 'Drafts reports detailing inventory shortages and surpluses for the executive manager.'
            },
            {
                id: 3,
                decs: 'Decreases response times for immediate assistance requests including liquid spills, broken glass or immediate trash removal. Therefore, improved customer satisfaction and the office’s reputation for being highly responsive.'
            },
            {
                id: 3,
                decs: 'Cleaning and preparing construction sites'
            },
            {
                id: 3,
                decs: 'Loading and unloading materials and equipment'
            },
            {
                id: 3,
                decs: 'Building and taking down scaffolding and temporary structures'
            },
            {
                id: 3,
                decs: 'Digging trenches, compacting earth and backfilling holes'
            },
            {
                id: 3,
                decs: 'Operating and tending machinery and heavy equipment.'
            },
            {
                id: 3,
                decs: 'Following instructions from supervisors and implementing construction plans.'
            },
            {
                id: 3,
                decs: 'Assisting skilled tradespeople in their duties'
            },
            {
                job_title: 'Sales Associate',
                id: 4,
                decs: 'Assessed and determined the talent needs for the sales teams.'
            },
            {
                id: 4,
                decs: 'Actively recruited, hired and trained an average sales professionals for the regional market of the company influence.'
            },
            {
                id: 4,
                decs: 'Designed short and long-term sales strategies to achieve record-breaking revenue goals. Proactively sought growth opportunities, networking and widening the business area of influence.'
            },
            {
                id: 4,
                decs: 'Led the marketing efforts resulting in an increase of sales in equipment and service revenue. '
            },
            {
                id: 4,
                decs: 'Designed sales strategies and trained an average of 30 sales personnel on techniques to convert interactions into sales.'
            },
            {
                job_title: 'Store Manager',
                id: 5,
                decs: 'Trained over xx sales associates on product knowledge, store policy, customer service expectations and converting sales.'
            },
            {
                id: 5,
                decs: 'Utilized interpersonal skills while investigating and resolving customer issues and complaints. '
            },
            {
                id: 5,
                decs: 'Monitored daily sales and designs, and implemented targeted strategy to boost overall sales in an effort to meet weekly goals'
            },
            {
                id: 5,
                decs: 'Answered incoming phone calls and provided requested information to each caller. Interpreted policies to customers.'
            },
            {
                id: 5,
                decs: 'Communicated daily sales goals and expectations in verbal and written form to the sales associate team.'
            },
            {
                id: 5,
                decs: 'Collaborated with the maintenance team to report and repair leaks and other store damage. '
            },
            {
                id: 5,
                decs: 'Reported weekly, monthly and projected sales to the store manager and district manager.'
            },
            {
                id: 5,
                decs: 'Managed the schedule of 10 sales associates based on their availability and personal requests. '
            },
            {
                id: 5,
                decs: 'Input time and attendance for each sales associate based on store policies and procedures. '
            },
            {
                id: 5,
                decs: 'Interpreted policies, and recommended new policies and procedures, to improve the overall store experience for both customers and staff.'
            },
            {
                job_title: 'Receptionist',
                id: 6,
                decs: 'Independently performed administrative functions including routing correspondence, planning meetings and documentation management. Routinely received and filed onsite project development reports and maintained organizational project details.'
            },
            {
                id: 6,
                decs: 'Increased the business’ social media presence by collaborating with a social media expert to identify and evaluate the business’ key demographic and develop targeted messaging to influence our customers online purchases.'
            },
            {
                job_title: 'Cashier ',
                id: 7,
                decs: 'Interacted with over 100 customers daily and provided detailed customer service, utilizing my firm knowledge of the store’s products and processes to actively listen and assess how best to serve each customer.'
            },
            {
                id: 7,
                decs: 'Used the first-in-first-out (FIFO) inventory method, ensuring customers had access to ample amounts of condiments, utensils, and containers for purchased meals. '
            },
            {
                id: 7,
                decs: 'Strictly adhered to food safety standards while cleaning the Café Bar. Independently completed audits to determine accurate stock levels. Ordered supplies and inventory based on requested quantities. '
            },
            {
                id: 7,
                decs: 'Contributed to increased sales by actively engaging customers during product demonstrations. Identified efficient ways to bag items that decreased checkout line wait times while engaging each customer.'
            },
            {
                job_title: 'Information Technology Specialist',
                id: 8,
                decs: 'Strategically consults daily to verify and correct server configurations and other essential equipment ranging from registers, inventory equipment and fuel pumps.'
            },
            {
                id: 8,
                decs: 'Provides program management and technical support to resolve cybersecurity incidents and administer preventive maintenance.'
            },
            {
                id: 8,
                decs: 'Consults closely with project managers on PC replacement rollout timelines, potential risks, project holds, and budget and staffing constraints.'
            },
            {
                id: 8,
                decs: 'Coordinated the replacement of over xxx PCs and monitors weekly, ensuring fewer interruptions to critical operations, improved efficiency, and compliance with cybersecurity principles.'
            },
            {
                id: 8,
                decs: 'Trained over ten IT specialists on contractual standard operating procedures and responsibilities. Drafted a training manual detailing the process of replacing, backing up and imaging PCs.'
            },
            {
                id: 8,
                decs: 'Routinely facilitates training sessions with regional directors to demonstrate the process. '
            },
            {
                job_title: 'Instructor',
                id: 9,
                decs: 'Manages daily school operations including school activities and services, community relations, personnel, and curriculum instruction, while promoting an environment of high expectations for students and staff.'
            },
            {
                id: 9,
                decs: 'Creates and monitors systems that ensure teachers utilize formative assessments and adjust instruction for improved student learning.'
            },
            {
                id: 9,
                decs: 'Collaborates with state and local leaders to address social issues impacting the student body, such as equity gaps, that exist in certain groups of students and works diligently to close them.'
            },
            {
                id: 9,
                decs: 'Successful working in non-traditional and urban environments based on my ability to build strong relationships with all stakeholders including students, parents and staff while advancing the effectiveness of instructional techniques to achieve state education goals.'
            },
            {
                id: 9,
                decs: 'Licensed in K-12 administration and supervision and 6-12.'
            },
            {
                id: 9,
                decs: 'Facilitates data-driven conversations with individuals and groups of teachers to review student-level data, discuss instructional implications and develop the capacity of teachers to lead and perfect their craft.'
            },
            {
                job_title: 'Home Health Care Aid',
                id: 10,
                decs: 'Spearheaded the overhaul of the office’s standard operating procedures; devised new procedures for packing products quickly and ensuring shipping labels were accurate.'
            },
            {
                id: 10,
                decs: 'Closely supervised new employees on operating heavy equipment machinery.'
            },
            {
                id: 10,
                decs: 'Independently operated large vehicles to deliver over X fragile products weekly. Communicated and interpreted policy with customers.'
            },
            {
                id: 10,
                decs: 'Calculated delivery times using GPS tracking, ensuring timely delivery to each location. Immediately communicated with customers and executive managers regarding unforeseen problems on transit routes. '
            },
            {
                job_title: 'Warehouse Driver',
                id: 11,
                decs: 'Calculated delivery times using GPS tracking, ensuring timely delivery to each location. Immediately communicated with customers and executive managers regarding unforeseen problems on transit routes.'
            },
            {
                job_title: 'Barista',
                id: 12,
                decs: 'Independently prepared and served an average of 60 hot and cold beverages including coffee, tea, artisan, and specialty drinks daily.'
            },
            {
                id: 12,
                decs: 'Sanitized work areas, utensils, and equipment, as well as service and seating areas. Clearly described menu items and suggested products to customers while taking orders.'
            },
            {
                id: 12,
                decs: 'Mindfully ordered, received, and distributed stock supplies. Received and processed customer payments.'
            },
            {
                job_title: 'Emergency Room Technician',
                id: 13,
                decs: 'Performed detailed daily assessments on over 50 patients for illnesses by taking vital signs. Collected blood samples and electrocardiograms, as needed, to further analyze patient\'s health in support of preventive measures and diagnoses. Performed dual energy X-ray absorptiometry (DEXA) scans and nerve conduction tests on qualified patients.'
            },
            {
                id: 13,
                decs: 'Administered intramuscular and subcutaneous injections.'
            },
            {
                id: 13,
                decs: 'Processed laboratory specimens for shipment according to facility policies and HIPPA regulations.'
            },
            {
                id: 13,
                decs: 'Trained three incoming registered medical assistants on the facility’s standard operating procedures'
            },
            {
                id: 13,
                decs: 'Completed meticulous inventory audits and determined that some supplies were ordered in excess. Subsequently, recommended the appropriate supply quantities, resulting in a 20 percent reduction in medical supply expenses over a three-month period.'
            },
            {
                id: 13,
                decs: 'Spearheaded the improvement of standard operating procedures for triaging patients and determining next steps, which decreased emergency wait time by approximately 30 minutes'
            },
            {
                id: 13,
                decs: 'Demonstrated initiative by consulting hospital administration and recommending best courses of action for emergency care during the COVID-19 pandemic. '
            },
            {
                job_title: 'Program Manager',
                id: 14,
                decs: 'Routinely received and filed onsite project development reports for the organization. Communicated policies to both external and internal clients based on federal guidelines and procedures governing mail processing.'
            },
            {
                id: 14,
                decs: 'Drafted official correspondence and documents to support critical mission work, ensuring documents were properly formatted, grammatically correct, conformed with published directives and had proper concurrence and clearance. Each document was tailored based on its target audience and desired outcome.'
            }
        ];

        var id = '';

        job_details.forEach(function (obj) {
            var obj_job_title = obj.job_title;
            var job_title = $(".job-title").text();
            if (obj_job_title == job_title) {
                id = obj.id;
            }
        });

        job_details.forEach(function (object) {
            var obj_id = object.id;
            if (obj_id == id) {
                $(".profile_autocomplete").append('<div class="profile_autocomplete_outer"><p class="autocomplete_item">' + object.decs + '</p><button class="add_this"><i class="fas fa-plus"></i></button><button class="remove_this"><i class="fas fa-minus"></i></button></div>')
            }
        })
    </script>
    <?php
}
?>

<script>
    var input = '';
    $(document).ready(function () {
        var ele = $(".page-6-input");
        for (var i = 0; i < ele.length; i++) {
            if ($(ele[i]).val().trim().length > 0) {
                $(ele[i]).parents(".form-group").removeClass("invalid-inp");
                $(".add_professional_profile").prop('disabled', false);
            } else {
                $(".add_professional_profile").prop('disabled', true);
            }
        }
    });

    $(".page-6-input").on("keyup", function () {
        var input = $(this);
        if (input.val().trim().length > 0) {
            input.parents(".form-group").removeClass("invalid-inp");
            $(".add_professional_profile").prop('disabled', false);

            var elements = $(".profile_autocomplete_outer");

            for (var i = 0; i < elements.length; i++) {
                if ($(elements[i]).hasClass("selected")) {
                    $(elements[i]).removeClass("selected")
                }
            }


        } else {
            input.parents(".form-group").addClass("invalid-inp");
            $(".add_professional_profile").prop('disabled', true);
        }

    });

    // $(document).ready(function () {
    //     var ele = $(".autocomplete_item");
    //     for (var i = 0; i < ele.length; i++) {
    //         var newEle = ele[i].innerHTML + ("\n");
    //         ele[i].innerHTML = newEle;
    //     }
    // })

    $(".add_this").click(function (e) {
        e.preventDefault();
        var prevVal = $("#professional_profile").val();
        $("#professional_profile").val(prevVal + $(this).prev("p").text());
        $(this).parents(".profile_autocomplete_outer").addClass("selected");
        if ($("#professional_profile").val() != '') {
            $(".add_professional_profile").prop('disabled', false);
            $("#professional_profile").parents(".form-group").removeClass("invalid-inp");
        }
    });

    $(".remove_this").click(function (e) {
        e.preventDefault();
        var value = $("#professional_profile").val();
        var txt = $(this).prev().prev("p").text();
        value = value.replace(txt, "");
        $("#professional_profile").val(value);
        $(this).parents(".profile_autocomplete_outer").removeClass("selected");
        if ($("#professional_profile").val() == '') {
            $(".add_professional_profile").prop('disabled', true);
            $("#professional_profile").parents(".form-group").addClass("invalid-inp");
        }
    });
</script>

<?php
session_start();
include 'connection.php';
$query = mysqli_query($con, "SELECT * FROM personel_infromation WHERE user_id = '" . $_SESSION['id'] . "'") or die();
$db_name = '';
$db_job = '';
$db_number = '';
$db_email = '';
$db_country = '';
$db_linkedin = '';
$db_web = '';

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $db_name = $row['name'];
    $db_job = $row['job_title'];
    $db_number = $row['contact_number'];
    $db_email = $row['email'];
    $db_country = $row['country'];
    $db_linkedin = $row['linkedin_pro'];
    $db_web = $row['web_link'];

}

?>
<p class="page-tracker d-none"><?php echo $_GET['view'] ?></p>
<form id="page-2-form" autocomplete="off">
    <div class="row step step-2">
        <div class="col-12 py-3">
            <h1 class="page-heading text-center">Let’s start</h1>
        </div>
        <div class="col-12">
            <div class="form-row">
                <div class="form-group invalid-inp col-md-4">
                    <label for="name">name*</label>
                    <input type="text" required value="<?php echo $db_name; ?>" class="form-control page-2-input"
                           id="name" name="name">
                </div>
                <div class="form-group invalid-inp col-md-4">
                    <label for="job-title">Job title*</label>
                    <div class="autocomplete">
                        <input type="text" required value="<?php echo $db_job; ?>" class="form-control page-2-input"
                               id="job-title"
                               name="job-title">
                    </div>
                </div>
                <input type="text" name="page" value="page-2" class="form-control d-none">
                <div class="form-group invalid-inp col-md-4">
                    <label for="contact_number">contact number*</label>
                    <input type="number" required value="<?php echo $db_number; ?>" class="form-control page-2-input"
                           id="contact_number"
                           name="contact_number">
                </div>
                <div class="form-group invalid-inp col-md-4">
                    <label for="email">email*</label>
                    <input type="email" required value="<?php echo $db_email; ?>"
                           class="form-control text-lowercase page-2-input" id="email"
                           name="email">
                </div>
                <div class="form-group invalid-inp col-md-4">
                    <label for="country">country*</label>
                    <div class="autocomplete">
                        <input type="text" required value="<?php echo $db_country; ?>" class="form-control page-2-input"
                               id="country"
                               name="country">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="linkedin-pro">Linkedin Profile</label>
                    <input type="url" value="<?php echo $db_linkedin; ?>" class="form-control text-lowercase"
                           id="linkedin-pro"
                           name="linkedin-pro">
                </div>
                <div class="form-group col-md-4">
                    <label for="website">Your Website</label>
                    <input type="url" value="<?php echo $db_web; ?>" class="form-control text-lowercase" id="web-link"
                           name="web-link">
                </div>
            </div>
            <div class="action-btns text-center mt-lg-5 mt-4">
                <a href="?view=page-1" class="prev-btn mr-2">Prev</a>
                <button class="next-btn" type="submit" disabled="true">Next</button>
            </div>
        </div>

    </div>
</form>
<script>
    var input = '';
    $(document).ready(function () {
        var ele = $(".page-2-input");
        for (var i = 0; i < ele.length; i++) {
            if ($(ele[i]).val().trim().length > 0) {
                $(ele[i]).parents(".form-group").removeClass("invalid-inp");
                $(".next-btn").prop('disabled', false);
            } else {
                $(".next-btn").prop('disabled', true);
            }
        }

    })
    $(".page-2-input").on("keyup", function () {
        var input = $(this);
        if (input.val().trim().length > 0) {
            input.parents(".form-group").removeClass("invalid-inp");
        } else {
            input.parents(".form-group").addClass("invalid-inp");
        }
        if ($("#name").val().trim() != '' && $("#job-title").val().trim() != '' && $("#contact_number").val().trim() != '' && $("#email").val().trim() != '' && $("#country").val().trim() != '') {
            $(".next-btn").prop('disabled', false);
        } else {
            $(".next-btn").prop('disabled', true);
        }
    });


</script>
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
    ]
    var countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua &amp; Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia &amp; Herzegovina", "Botswana", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central Arfrican Republic", "Chad", "Chile", "China", "Colombia", "Congo", "Cook Islands", "Costa Rica", "Cote D Ivoire", "Croatia", "Cuba", "Curacao", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Polynesia", "French West Indies", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauro", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Saint Pierre &amp; Miquelon", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "St Kitts &amp; Nevis", "St Lucia", "St Vincent", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Timor L'Este", "Togo", "Tonga", "Trinidad &amp; Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks &amp; Caicos", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (US)", "Yemen", "Zambia", "Zimbabwe"];
    function autocompleteJob(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = $(this).val().trim();
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
                if (arr[i].job_title && arr[i].job_title.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].job_title.substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].job_title.substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i].job_title + "'>";
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

    autocomplete(document.getElementById("country"), countries);
    autocompleteJob(document.getElementById("job-title"), job_details);
</script>
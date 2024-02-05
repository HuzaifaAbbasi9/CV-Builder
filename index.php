<?php
error_reporting(0);

include "Php/header.php";

if (strlen($_GET['view']) == 0) {
    include "Php/page-1.php";
} else {
    include "Php/".$_GET['view'].".php";
}
include "Php/footer.php";

?>
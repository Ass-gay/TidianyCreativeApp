<!DOCTYPE html>
<html lang="en">
	<!-- ================== SECTION HEAD ================== -->
		<?php require_once("view/sections/login/head.php"); ?>

<body class="pace-top">
	
        <!-- ================== SECTION LOADER ================== -->
		<?php require_once("view/sections/login/loader.php"); ?>
	
		<!-- ================== SECTION page-container ================== -->
	<div id="page-container" class="fade">

		<!-- ================== SECTION FORM ================== -->
		<?php require_once("view/sections/login/form.php"); ?>
		
        <!-- ================== SECTION CONFIG ================== -->
		<?php require_once("view/sections/login/config.php"); ?>
		
        <!-- ================== SECTION SCOROLL TOP ================== -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	
    </div>

        <!-- ================== SECTION SCRIPT ================== -->
		<?php require_once("view/sections/login/script.php"); ?>

        <!-- ================== SECTION Message erreur/success ================== -->
		<?php require_once ("view/sections/admin/msgErreuSuccess.php"); ?>
</body>
</html>
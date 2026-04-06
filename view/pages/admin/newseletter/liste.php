 <!DOCTYPE html>
<html lang="en">
    <!-- ==================SECTION HEAD ================== -->
		<?php require_once ("../../../sections/admin/head.php"); ?>
<body>

 	<!-- ================== Verification Session ================== -->
		<?php require_once ("../../../sections/admin/verifieSession.php"); ?>


	<!-- ========= Recuperation liste User Dans BD ========= -->
 	<?php

 		require_once("../../../../model/NewseletterRepository.php");
		$newseletterRepository = new NewseletterRepository();

		try {
			$listeNewseletter = $newseletterRepository->getAll(1);
		} catch (Exception $error) {
			echo "<P>Erreur lors du changement de liste des Newseletter" . $error->getMessage() . "</P>";
			$listeNewseletter = [];
		}
	?>
	

	<!-- ================== page-loader ================== -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	
	<!-- ================== page-container ================== -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

	<!-- ==================SECTION MENU HAUT ================== -->
		<?php require_once ("../../../sections/admin/menuHaut.php"); ?>
		
	<!-- ================== SECTION MENU GAUCHE ================== -->
		<?php require_once ("../../../sections/admin/meneGauche.php"); ?>
		
	<!-- ================== SECTION BASE CONTENT ================== -->
        <div id="content" class="content">
			<ol class="breadcrumb float-xl-right">

 				<!-- Btn Send Message aux abonnes -->
				<li class="breadcrumb-item">
                    <a href="#modal-send-message" class="btn btn-sm btn-dark text-white fw-bold" data-toggle="modal">
						Envoyer un message aux abonnes
					</a>
                </li>

				<!-- Btn  Pour aller vers User -->
				<li class="breadcrumb-item">
                    <a href="listeUser" class="btn btn-sm btn-dark text-white fw-bold" data-toggle="modal">User</a>
                </li>

 				<!-- Btn Pour aller vers userlisation -->
				<li id="btn-show-liste-users" class="breadcrumb-item">
					<a href="listeuser" class="btn btn-sm btn-dark text-white fw-bold">Realisation</a>
				</li>

			</ol>
	        <!-- ================== SECTION HEADER ================== -->
			<h1 class="page-header"># Newseletter</h1>

			<!-- Liste Newseletter -->
			<div id="table-liste-newseletter" class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Liste des Newseletter</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th class="text-nowrap text-center">Identifiant</th>
								<th class="text-nowrap text-center">Email</th>
								<th class="text-nowrap text-center">Créer le</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($listeNewseletter)) : ?>
								<?php foreach ($listeNewseletter as $newseletter) : ?>
									<tr class="odd gradeX">
										<!-- ID -->
										<td class="text-center">
											<?= htmlspecialchars($newseletter['id']); ?>
										</td>

										<!-- Email -->
										<td class="text-center">
											<?= htmlspecialchars($newseletter['email']); ?>
										</td>

										<!-- Creer Le -->
										<td class="text-center">
											<?= htmlspecialchars(date("d/m/Y H:i:s"), strtotime($newseletter['created_at'])); ?>
										</td>
									</tr>
								<?php endforeach ?>
							<?php else :?>
								<p class="alert alert-danger text-center h3 fw-bold">La liste des newseletter est vide !</p>
							<?php endif ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- ================== SECTION MODAL SEND MESSAGE ================== -->
        <div class="modal fade" id="modal-send-message" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <!-- HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title">Envoyer mesaage aux abonnes</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- FORM -->
                    
                    <div class="modal-body">

                        <form action="newseletterMainController" method="POST"  id="sendMessageForm">
                            
								<!-- Message -->
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" class="form-control" id="message" placeholder="Entrer votre message" required></textarea>
									<p class="error-message mt-2"></p>
                                </div>


                                <!-- Soumissions -->
                                <div style="display: flex; justify-content: center;">
                                    <button type="submit" name="frmSendMessage" class="btn btn-primary fw-bold">Envoyer</button>
                                </div>
                                
                        </form>
                    </div>

                </div>
            </div>
        </div>
        
	<!-- ================== SECTION CONFIG PANEL ================== -->
		<?php require_once ("../../../sections/admin/config.php"); ?>
		
	<!-- ================== SECTION SCROLL TOP ================== -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- ================== SECTION SCRIPT ================== -->
		<?php require_once ("../../../sections/admin/script.php"); ?>
		
	<!-- ================== SECTION Message Erreur/Success ================== -->
		<?php require_once ("../../../sections/admin/msgErreuSuccess.php"); ?>
</body>
</html>
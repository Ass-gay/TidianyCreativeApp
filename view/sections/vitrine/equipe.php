
<!-- ========= Recuperation liste des Equipe dans BD ========= -->
<?php

	require_once("model/UserRepository.php");
	$userRepository = new UserRepository();

	try {
		$listeUser = $userRepository->getAll(1, 'Equipe');
	} catch (Exception $error) {
		echo "<P>Erreur lors du changement de liste des Utilisateur" . $error->getMessage() . "</P>";
		$listeUser = [];
	}
?>


<div id="team" class="content" data-scrollview="true">
			<div class="container">
				<!-- Titre -->
				<h2 class="content-title">Notre Équipe</h2>
				<p class="content-desc">
					Une équipe passionnée par le digital, le design et l’innovation.<br />
					Nous travaillons ensemble pour transformer vos idées en projets concrets et professionnels.
				</p>
				<!-- Liste des Utilisateur equipe -->
				<div class="row">
					<?php if(!empty($listeUser)) : ?>
						<?php foreach ($listeUser as $user) : ?>
							<div class="col-lg-4">
								<div class="team">
									<!-- Photo -->
									<div class="image" data-animation="true" data-animation-type="flipInX">
										<img src="public/images/user/<?= htmlspecialchars($user['photo']); ?>" alt="Photo user" />
									</div>
									
									<!-- Text -->
									<div class="info">
										
										<!-- Nom -->
										<h3 class="name"> <?= $user['nom']?> </h3>
										
										<!-- Role -->
										<div class="title text-primary"> <?= $user['role']?> </div>

										<!-- icon -->
										<div class="social">
											<a href="#"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
											<a href="#"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
											<a href="#"><i class="fab fa-google-plus-g fa-lg fa-fw"></i></a>
										</div>
									</div>
								</div>
							</div>

					<?php endforeach ?>
					<?php else :?>
						<p class=" col-lg-12 alert alert-danger text-center h3 fw-bold">Aucun Utilisateur trouvee !</p>
					<?php endif ?>
				</div>
			</div>
		</div>
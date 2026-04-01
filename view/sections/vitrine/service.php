
<!-- ========= Recuperation liste des Service ========= -->
<?php

	require_once("model/ServiceReaRepository.php");
	$serviceReaRepository = new ServiceReaRepository();

	try {
		$listeServices = $serviceReaRepository->getAllByEtatAndType(1, 'S');
	} catch (Exception $error) {
		echo "<P>Erreur lors du changement de liste des Services" . $error->getMessage() . "</P>";
		$listeServices = [];
	}
?>


<div id="service" class="content" data-scrollview="true">
			<div class="container">
				<!-- Titre -->
				<h2 class="content-title"># Nos Services</h2>
				<p class="content-desc">
					Nous proposons une gamme complète de services créatifs pour accompagner les particuliers et entreprises dans leur communication visuelle.
					Notre objectif est de vous aider à vous démarquer avec des créations modernes, professionnelles et efficaces.
				</p>

				<!-- Liste des services -->
				<div class="row">
					<?php if(!empty($listeServices)) : ?>
						<?php foreach ($listeServices as $service) : ?>
							<div class="col-lg-4 col-md-6">

								<div class="service">
									<!-- Photo -->
									<div class="icon" data-animation="true" data-animation-type="bounceIn">
										<img height="50px;" src="public/images/servicesRea/<?= htmlspecialchars($service['photo']); ?>" alt="Photo Service">
									</div>

									<!-- Text -->
									<div class="info">
										<h4 class="title"><?= htmlspecialchars($service['nom']); ?></h4>
										<p class="desc" data-toggle="tooltip" data-placement="top" title="<?= htmlspecialchars($service['description']); ?>">
											<?= htmlspecialchars(mb_substr($service['description'], 0, 20)) . (strlen($service['description']) > 20 ? "... Lire Plus" : ""); ?>
										</p>
									</div>
								</div>
							</div>
						<?php endforeach ?>
						<?php else :?>
							<p class="alert alert-danger text-center h3 fw-bold">Aucun realisations trouvee !</p>
						<?php endif ?>
				</div>
			</div>
		</div>
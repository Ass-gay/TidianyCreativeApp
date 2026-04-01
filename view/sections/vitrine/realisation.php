
<!-- ========= Recuperation liste des realisation ========= -->
<?php

	require_once("model/ServiceReaRepository.php");
	$serviceReaRepository = new ServiceReaRepository();

	try {
		$listeRealisations = $serviceReaRepository->getAllByEtatAndType(1, 'R');
	} catch (Exception $error) {
		echo "<P>Erreur lors du changement de liste des Realisations" . $error->getMessage() . "</P>";
		$listeRealisations = [];
	}
?>

<!-- ========= Tableau liste des realisation ========= -->
<div id="work" class="content" data-scrollview="true">
	<div class="container" data-animation="true" data-animation-type="fadeInDown">

		<!-- Titre -->
		<h2 class="content-title"># Nos Realisation</h2>
		<p class="content-desc">
			Chez Tidiany Creative, nous transformons les idées en visuels impactants.
			Chaque réalisation reflète notre créativité, notre expertise et notre engagement à offrir des résultats modernes,
			uniques et adaptés aux besoins de nos clients.
		</p>
		<!-- Liste des realisation -->
		<div class="row row-space-10">
			<?php if(!empty($listeRealisations)) : ?>
				<?php foreach ($listeRealisations as $realisation) : ?>
					<div class="col-lg-3 col-md-4">
						<div class="work">
							<!-- Photo -->
							<div class="image">
								<a href="#"><img height="300px;" width="300px;"style="border:1px dashed #222" src="public/images/servicesRea/<?= htmlspecialchars($realisation['photo']); ?>" alt="Photo realisation" /></a>
							</div>
							<!-- Text -->
							<div class="desc">
								<!-- Nom -->
								<span class="desc-title"> 
										<?= htmlspecialchars($realisation['nom']); ?>
								</span>
								<!-- Description -->
								<span class="desc-text" data-toggle="tooltip" data-placement="top" title="<?= htmlspecialchars($realisation['description']); ?>">
									<?= htmlspecialchars(mb_substr($realisation['description'], 0, 20)) . (strlen($realisation['description']) > 20 ? "... Lire Plus" : ""); ?>
								</span>
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
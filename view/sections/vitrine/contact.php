<div id="contact" class="content bg-silver-lighter" data-scrollview="true">
	<div class="container">
		<h2 class="content-title">Contactez-nous</h2>
		<p class="content-desc">
			Vous avez un projet digital ? Une idée à concrétiser ?<br />
			L’équipe Tidiany Creative est à votre écoute pour vous accompagner.
		</p>

		<div class="row">
			<!-- Infos Contact -->
			<div class="col-lg-6" data-animation="true" data-animation-type="fadeInLeft">
				<h3>Informations de contact</h3>
				<p>
					N’hésitez pas à nous contacter pour discuter de votre projet ou demander un devis personnalisé.
				</p>

				<p>
					<strong>Tidiany Creative</strong><br />
					Nayobé, Louga, Sénégal<br />
					Téléphone : 78 718 35 27<br />
					Email : gayeass425@gmail.com<br />
				</p>

				<p>
					<strong>Horaires :</strong><br />
					Lundi - Samedi : 09h00 - 18h00<br />
					Dimanche : Fermé
				</p>
			</div>

			<!-- Formulaire -->
			<div class="col-lg-6 form-col" data-animation="true" data-animation-type="fadeInRight">
				<form action="contactMainController" method="post" id="contactForm" class="form-horizontal">

					<!-- Nom -->
					<div class="form-group row">
						<label for="nom" class="col-form-label col-lg-3 text-lg-right">Nom <span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="nom" id="nom" class="form-control" placeholder="Entre votre nom" />
							<p class="error-message mt-2"></p>
						</div>
					</div>

					<!-- Email -->
					<div class="form-group row">
						<label for="email" class="col-form-label col-lg-3 text-lg-right">Email <span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="email" name="email" id="email" class="form-control" placeholder=" Entrer votre email" />
							<p class="error-message mt-2"></p>
						</div>
					</div>

					<!-- Sujet -->
					<div class="form-group row">
						<label for="sujet" class="col-form-label col-lg-3 text-lg-right">Sujet <span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="sujet" id="sujet" class="form-control" placeholder="De quoi sagit il ?" />
							<p class="error-message mt-2"></p>
						</div>
					</div>

					<!-- Message -->
					<div class="form-group row">
						<label for="message" class="col-form-label col-lg-3 text-lg-right">Message <span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<textarea name="message" id="message" class="form-control" rows="5" placeholder="Laissez votre message..."></textarea>
							<p class="error-message mt-2"></p>
						</div>
					</div>

					<!-- Button Soumission -->
					<div class="form-group row">
						<div class="col-lg-9 offset-lg-3">
							<button type="submit" name="frmContact" class="btn btn-theme btn-primary btn-block">
								Envoyer le message
							</button>
						</div>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>
		<div id="home" class="content has-bg home">
				<div class="content-bg" style="background-image: url(public/templates/templateVitrine/assets/img/bg/bg-home.jpg);" 
					data-paroller="true" 
					data-paroller-factor="0.5"
					data-paroller-factor-xs="0.25">
				</div>
				<div class="container home-content">
					<h1>Bienvenue chez Tidiany Creative</h1>
					<h3>Votre partenaire en solutions digitales modernes</h3>
					<p>
						Nous sommes une agence créative spécialisée dans le développement web, le design graphique.<br />
						Nous transformons vos idées en projets innovants et professionnels. <br />
					</p>
					<a href="#" class="btn btn-theme btn-primary">Explorez nos réalisations</a> <a href="#" class="btn btn-theme btn-outline-white">Contactez-nous</a><br />
					<br />
					ou <a href="#" data-toggle="modal" data-target="#modal-add-newseletter"> abonnez-vous à notre newsletter</a> pour suivre nos nouveautés
				</div>
		</div>

		<!-- ================== SECTION MODAL ADD Newsletter ================== -->
        <div class="modal fade" id="modal-add-newseletter" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <!-- HEADER -->
                    <div class="modal-header">
                        <h4 class="modal-title">S'inscrire a la newseletter</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- FORM -->
                    
                    <div class="modal-body">

                        <form action="newseletterMainController" method="POST" id="addNewseletterForm">
                
								<!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="add-newseletter-email" class="form-control" id="add-newseletter-email" placeholder="Entrer votre email" required>
									<p class="error-message mt-2"></p>
                                </div>


                                <!-- Soumissions -->
                                <div style="display: flex; justify-content: center;">
                                    <button type="submit" name="frmAddNewseletter" class="btn btn-primary fw-bold">S'inscrire</button>
                                </div>
                                
                        </form>
                    </div>

                </div>
            </div>
        </div>
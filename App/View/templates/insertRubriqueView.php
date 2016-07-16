<div class="row">
	<div class="col-md-9">
		<h2>Créer une nouvelle rubrique</h2>
		<div class="separator"></div>
	</div>
	<div class="col-md-12">
		<form action="<?=FO_URL?>new/rubrique/post" method="post">
			<div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="">
			</div>
			<div class="form-group">
				<label for="id_univers">Univers</label>
				<select name="id_univers" id="id_univers">
					<?php
					foreach($insertRubriqueData as $univers) {
						?>
						<option value="<?=$univers->getId()?>" ><?=$univers->getNom()?></option>
						<?php
					}//endfor
					?>
				</select>
			</div>
			<input type="hidden" id="slug" name="slug" value="">
			<button type="submit" class="btn btn-default">Envoyer</button>
		</form>
	</div>
</div>
<?php
$p = isset($_GET['url']) ? $_GET['url'] : '';
?>
<section class="row expanded">
	<div class="medium-2 columns pad_0" id="sidebar">
		<ul class="vertical menu" data-accordion-menu>
			<li class="<?=(empty($p)) ? 'active' : ''?>"><a href="<?=FO_URL?>">Accueil</a></li>
			<?php
			foreach($menu as $Univers){
				?>
				<li>
					<a href=""><?=$Univers->getIcon().$Univers->getNom()?></a>
					<?php
					if($Univers->rubrique){
						foreach($Univers->rubrique as $Rubrique){
							?>
							<ul class="menu vertical nested">
								<li>
									<a href=""><?=$Rubrique->getNom()?></a>
								</li>
							</ul>
							<?php
						}//endfor
					}//endif
					?>
				</li>
				<?php
			}//endfor
			?>
			<li>
				<a href=""><i class="fa fa-cogs" aria-hidden="true"></i>Paramètres</a>
				<ul class="menu vertical nested">
					<li>
						<a href="<?=FO_URL?>univers">Univers</a>
					</li>
					<li>
						<a href="<?=FO_URL?>rubriques">Rubriques</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
    <div class="medium-10 columns">
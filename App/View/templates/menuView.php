<?php
$p = isset($_GET['url']) ? $_GET['url'] : '';
?>
<section class="sidebar">
	<ul class="vertical menu" data-accordion-menu>
		<li class="<?=(empty($p)) ? 'active' : ''?>"><a href="<?=FO_URL?>">Accueil</a></li>
		<?php
		foreach($menu as $Univers){
			?>
			<li>
				<a href=""><?=icon($Univers->getIcon()).$Univers->getNom()?></a>
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
					<a href="<?=FO_URL?>categories">Gérer les catégories</a>
				</li>
			</ul>
		</li>
	</ul>
</section>
<section class="main-section">
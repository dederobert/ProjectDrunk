<ul class="collection collapsible popout" data-collapsible="accordion">
<?php foreach ($cocktails as $cocktail): ?>
	<li class="collection-item avatar">
				<!-- Nom du cocktail-->
				<div class="collapsible-header">
					<?php echo ImgHelper::img("Photos/".$cocktail->name.".jpg", ['alt' => $cocktail->name, 'not_found' => '', 'class' => 'circle']) ?>
					<span class="title"><?php echo $cocktail->name ?></span>
				</div>
				<!-- Ingrédients et prépartion-->
				<div class="collapsible-body">
					<a class="grey-text text-lighten-3" href="<?php echo URLHelper::URL(['controller' => 'cocktails', 'action' => 'view', 'params' => [$cocktail->name]]) ?>"><i class="material-icons">info</i>Voir</a>
					<h4>Ingrédients</h4>
					<ul class="browser-default">
						<?php foreach ($cocktail->ingredients as $ingredient): ?>
							<li><?php echo $ingredient ?></li>
						<?php endforeach ?>
					</ul>
					<h4>Préparation</h4>
					<p><?php echo $cocktail->preparation ?></p>
					<?php foreach ($cocktail->tags as $tag): ?>
						<div class="chip"><i class="material-icons tiny">label_outline</i><a href="<?php echo URLHelper::URL(['controller' => 'ingredients', 'action' => 'view', 'params' => [$tag]]) ?>"><?php echo $tag ?></a></div>
					<?php endforeach ?>
				</div>
				<!-- Favorie-->
					<a href="#" class="secondary-content bnt tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter aux favories">
					 <?php echo(ImgHelper::img("full_heart.png", 
					 	["alt"=>"empty_full", "class"=>"heart heart_full", "name" => $cocktail->name])
					 ); ?>
					</a>
			</li>
<?php endforeach ?>
</ul>
<script>var base_url = <?php echo BASE_URL; ?></script>
<?php echo ScriptHelper::script("heart"); ?>
<div class="row">
	<div class="col s12 m3">
		<?php if ($ingredients->hasSousCategorie): ?>	
		<ul>
			<?php foreach($ingredients->sousCategorie as $ingredient): ?>
			<li><?php echo URLHelper::link(['controller' => 'Ingredients', 'action' => 'view', 'params' => [$ingredient]],
			$ingredient); ?></li>
			<?php endforeach; ?>
		</ul>	
		<?php endif ?>
	</div>
	<div class="col s12 m9">
		<h2>Cocktails</h2>
		<ul class="collection">
			<?php foreach ($ingredients->cocktails as $cocktail): ?>
			<li class="collection-item avatar">
				<div>
					<?php echo ImgHelper::img("Photos/".$cocktail->name.".jpg", ['alt' => $cocktail->name, 'not_found' => '', 'class' => 'circle']) ?>
					<span class="title"><?php echo $cocktail->name ?></span>

					<p><?php echo $cocktail->preparation ?></p>
					<?php foreach ($cocktail->tags as $tag): ?>
						<div class="chip"><i class="material-icons tiny">label_outline</i><a href="<?php echo URLHelper::URL(['controller' => 'ingredients', 'action' => 'view', 'params' => [$tag]]) ?>"><?php echo $tag ?></a></div>
					<?php endforeach ?>
					<a href="#" class="secondary-content"><i class="material-icons">send</i></a>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>
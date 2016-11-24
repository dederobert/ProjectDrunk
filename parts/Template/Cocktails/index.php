<nav>
	<div class="nav-wrapper">
		<form>
			<div class="input-field">
				<input id="search" class="search" required>
				<label for="search"><i class="material-icons">search</i></label>
				<i class="material-icons">close</i>
			</div>
		</form>
	</div>
</nav>
<?php echo URLHelper::link(
	['controller' => 'pages', 'action' => 'test', 'params' => ['1']], 
	"Test fil d'arianne"
); ?>
<h1>Cocktails</h1>
<ul class="collection">
	<?php foreach ($cocktails as $cocktail): ?>
	<li class="collection-item avatar">
		<div>
			<?php echo ImgHelper::img("Photos/".$cocktail->name.".jpg", ['alt' => $cocktail->name, 'not_found' => '', 'class' => 'circle']) ?>
			<span class="title"><?php echo $cocktail->name ?></span>

			<p><?php echo $cocktail->preparation; ?></p>
			<?php foreach ($cocktail->tags as $tag): ?>
				<div class="chip"><i class="material-icons tiny">label_outline</i><a href="#"><?php echo $tag ?></a></div>
			<?php endforeach ?>
			<a href="#" class="secondary-content"><i class="material-icons">send</i></a>
		</div>
	</li>
	<?php endforeach ?>
</ul>
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
<a href="<?php echo BASE_URL.DS."pages".DS."test".DS."1"; ?>">Test fil d'arianne</a>
<h1>Cocktails</h1>
<ul class="collection">
	<?php foreach ($cocktails as $cocktail): ?>
	<li class="collection-item avatar">
		<div>
			<?php if (file_exists(WWW.DS."imgs".DS."Photos".DS.$cocktail['titre'].".jpg")): ?>
				<img src="<?php echo BASE_URL.DS."www".DS."imgs".DS."Photos".DS.$cocktail['titre'].".jpg" ?>" alt="<?php echo $cocktail['titre'] ?>" class="circle">
			<?php endif ?>
			<span class="title"><?php echo $cocktail['titre'] ?></span>

			<p><?php echo $cocktail['preparation'] ?></p>
			<?php foreach ($cocktail['index'] as $tag): ?>
				<div class="chip"><i class="material-icons tiny">label_outline</i><a href="#"><?php echo $tag ?></a></div>
			<?php endforeach ?>
			<a href="#" class="secondary-content"><i class="material-icons">send</i></a>
		</div>
	</li>
	<?php endforeach ?>
</ul>
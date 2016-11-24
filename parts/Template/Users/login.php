<div class="container">
	<div class="row">
		<div class="col s12">
			<?php if (isset($error)): ?>
				<?php echo $error; ?>
			<?php endif ?>
		</div>
		<form action="" method="POST">
			<div class="col s12">
				<div class="row">
					<div class="input-field col s8 offset-s2">
						<i class="material-icons prefix">account_circle</i>
						<input value="<?php echo $username ?>" type="text" name="username" id="username" class="validate" required pattern="[a-zA-Z0-9]{4,}">
						<label for="username" data-error="trop court" data-success="ok">Nom d'utilisateur</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8 offset-s2">
						<i class="material-icons prefix">vpn_key</i>
						<input type="password" id="password" name="password" class="validate" required pattern="[a-zA-Z0-9]{4,}">
						<label for="password" data-error="trop court" data-success="ok">Mot de passe</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field center-align">
						<button class="btn waves-effect waves-light" type="submit" name="submit">
							Se connecter
							<i class="material-icons">send</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
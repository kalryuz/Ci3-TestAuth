<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h2>Test Login</h2>

	<?php if ($this->session->flashdata('error')) : ?>
		<p style="color:red;"><?= $this->session->flashdata('error'); ?></p>
	<?php endif; ?>

	<form action="<?= site_url('auth/process_login'); ?>" method="post">
		<label>Username:</label>
		<input type="text" name="username" required><br>

		<label>Password:</label>
		<input type="password" name="password" required><br>

		<button type="submit">Login</button>
	</form>
</body>
</html>
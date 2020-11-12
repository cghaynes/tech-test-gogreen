<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>

    <body>
		<div class="main">

			<h3>Register</h3>

			<div class="login-form">
				<form action="/register" method="post">
					@csrf

					<label for="name">Name</label>
					<input type="text" name="name" />
					<br>

					<label for="email">Email</label>
					<input type="text" name="email" />
					<br>

					<label for="password">Password</label>
					<input type="password" name="password" />
					<br>

					<input type="submit" />
				</form>
			</div>
		</div>    	
    </body>
</html>
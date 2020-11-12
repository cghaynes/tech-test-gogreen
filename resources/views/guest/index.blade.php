<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


    </head>

    <body>
		<div class="main">
			<div class="logo">
				<h3>Welcome to Tech-Test</h3>
			</div>
			<div class="login-form">
				<form action="/login" method="post">
					@csrf

					<label for="email">Email</label>
					<input type="text" name="email" />
					<br>

					<label for="password">Password</label>
					<input type="password" name="password" />
					<br>

					<input type="submit" />
				</form>

				<a href='/register'>New User? Register here</a>
			</div>
		</div>    	
    </body>
</html>
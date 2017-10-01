<!DOCTYPE html>
<html>
<head>
	<title></title>

		{{-- material icons --}}
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	{{-- materialize css --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<main>
	<div class="container" style="padding: 0 20px 0 20px;">
		<div class="row" style="margin-top: 30px">
			<div class="col m5 s12 offset-m3">
				<h5 class="light center">Login Sistem Informasi <br> BMT Mobile</h5>
				@foreach ($errors->all() as $error)
					<div class="card orange darken-2">
            <div class="card-content white-text">
              <span>{{ $error }}</span>
            </div>
          </div>
				@endforeach
				<div class="card grey lighten-3">
					<div class="card-content">
						<div class="row center">
							<i class="material-icons large teal-text text-lighten-2">person_pin</i>
						</div>
						<form class="row" action="/login" method="POST">
						{{ csrf_field() }}
							<div class="col s10 offset-s1">
								<div class="input-field">
						          <input name="username" id="username" type="text" class="validate" required>
						          <label for="username">Username</label>
						        </div>
								<div class="input-field">
						          <input name="password" id="password" type="password" class="validate" required>
						          <label for="password">Password</label>
						        </div>
						        <div class="input-field right">
							        <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
						        </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
</body>
</html>
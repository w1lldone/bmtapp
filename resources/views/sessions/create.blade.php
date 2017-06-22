@extends ('layouts.master')

@section('content')
	<div class="container" style="padding: 0 20px 0 20px;">
		<div class="row" style="margin-top: 30px">
			<div class="col m5 offset-m3">
				<div class="center"><img src="http://sat.tp.ugm.ac.id/img/logo/logo-sat.png" width="40%" height="40%"></div>
				<h5 class="light center">Login Sistem Informasi SAT</h5>
				<div class="card grey lighten-3">
					<div class="card-content">
						<div class="row center">
							<i class="material-icons large teal-text text-lighten-2">person_pin</i>
						</div>
						<form class="row" action="/bmtapp/public/login" method="POST">
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
@endsection
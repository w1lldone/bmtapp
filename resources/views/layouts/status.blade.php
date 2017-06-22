@if (session('status'))
	<div class="alert alert-success alert-with-icon" data-notify="container">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
        <i data-notify="icon" class="material-icons">done</i>
        <span data-notify="message">{{ session('status') }}</span>
    </div>
@endif

@if (session('warning'))
	<div class="alert alert-warning alert-with-icon" data-notify="container">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">×</button>
        <i data-notify="icon" class="material-icons">warning</i>
        <span data-notify="message">{{ session('warning') }}</span>
    </div>
@endif
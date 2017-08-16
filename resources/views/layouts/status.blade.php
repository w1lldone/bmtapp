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
@if(count($errors))
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <div class="container-fluid">
              <div class="alert-icon">
                <i class="material-icons">error_outline</i>
              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
              </button>
              <b>Error Alert :</b> {{ $error }}
            </div>
        </div>
    @endforeach
@endif
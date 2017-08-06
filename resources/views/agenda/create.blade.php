@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/agenda">Agenda</a></li>
      <li>Tambah agenda</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			@include('layouts.status')
			@include('layouts.errors')
			<div class="card">
        <div class="card-header" data-background-color="bmt-green">
        	<div class="row">
        		<div class="col-xs-12">
        			<h4 class="title">Form tambah agenda MKU</h4>
                <p class="category">BMT mobile app</p>
        		</div>
        	</div>
        </div>
				<div class="card-content">
					<div class="row">
				    <div class="col-lg-12">
				      <form action="/agenda" method="POST">
				        {{ csrf_field() }}
				        <div class="row">
				          <div class="col-md-6">
			              <div class="form-group label-floating {{ $errors->has('tanggal') ? ' has-error' : '' }}">
		                  <label class="control-label">Masukkan tanggal</label>
		                  <input class="form-control" id="date" required name="tanggal" type="text" value="{{ old('tanggal') }}"/>
			              </div>
				          </div>
				          <div class="col-md-6">
				              <div class="form-group label-floating {{ $errors->has('mku_id') ? ' has-error' : '' }}">
				              	<label class="control-label">Pilih MKU</label>
				              	<select name="mku_id" id="mku_id" class="form-control">
				              		<option value=""></option>
				              		@foreach (\App\Mku::all() as $mku)
				              			<option value="{{ $mku->id }}">{{ $mku->name }}</option>
				              		@endforeach
				              	</select>
				              </div>
				          </div>				          
				        </div>
				        <div class="row">
				          <div class="col-md-6">
				            <div class="form-group input-group bootstrap-timepicker timepicker {{ $errors->has('mulai_at') ? ' has-error' : '' }}">
				            	  <label>Mulai</label>
			                      <input onfocus="showTime()" id="timepicker1" name="mulai_at" type="text" placeholder="Klik gambar jam" class="form-control input-small" value="{{ old('mulai_at') }}">
			                      <span onclick="showTime()" class="input-group-addon"><i class="material-icons">access_time</i></span>
			                    </div>
					        </div>
					        <div class="col-md-6">
					            <div class="form-group input-group bootstrap-timepicker timepicker {{ $errors->has('selesai_at') ? ' has-error' : '' }}">
						          <label>selesai</label>
			                      <input id="timepicker2" name="selesai_at" type="text" placeholder="Klik gambar jam" class="form-control input-small" value="{{ old('selesai_at') }}">
			                      <span class="input-group-addon"><i class="material-icons">access_time</i></span>
			                    </div>
					        </div>
				        </div>
				        <div class="row">
				          <div class="col-md-6">
			              <div class="form-group label-floating {{ $errors->has('name') ? ' has-error' : '' }}">
		                  <label class="control-label">Nama kegiatan</label>
		                  <input class="form-control" required name="name" type="text" value="{{ old('name') }}"/>
			              </div>
				          </div>				          
				          <div class="col-md-6">
			              <div class="form-group label-floating {{ $errors->has('lokasi') ? ' has-error' : '' }}">
		                  <label class="control-label">Lokasi</label>
		                  <input class="form-control" required name="lokasi" type="text" value="{{ old('lokasi') }}"/>
			              </div>
				          </div>	
				        </div>
				        <div class="row">
				          <div class="col-md-12">
			              <div class="form-group label-floating {{ $errors->has('deskripsi') ? ' has-error' : '' }}">
		                  <label class="control-label">Deskripsi/catatan</label>
		                  <textarea class="form-control" name="deskripsi">{{ old('deskripsi') }}</textarea>
			              </div>
				          </div>				          
				        </div>
				        <button type="submit" class="btn btn-success pull-right">Proses</button>
				        <div class="clearfix"></div>
				      </form> 
				    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
  <script>
  	// DATE PICKER
    $(document).ready(function(){
      var date_input=$('input[name="tanggal"]'); //our date input has the name "date"
      date_input.datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true,
      });
    });

    // TIME PICKER
    $('#timepicker1').timepicker({
    	// template: 'modal',
    	showMeridian: false,
    	defaultTime: false,
    	disableFocus: true,
    	showInputs: true,
    	// modalBackdrop: true,
    });

    $('#timepicker2').timepicker({
    	// template: 'modal',
    	showMeridian: false,
    	defaultTime: false,
    	disableFocus: true,
    	showInputs: true,
    });

    // function showTime1() {
    // 	$('#timepicker1').timepicker('showWidget');
    // }
  </script>
@endsection

@extends ('layouts.master')

@section('breadcrumb')
	<ol class="breadcrumb">
      <li><a href="/agenda">Agenda</a></li>
      <li>Buat agenda</li>
    </ol>
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-6">
			@include('layouts.status')
			<div class="card">
        <div class="card-header" data-background-color="bmt-green">
        	<div class="row">
        		<div class="col-xs-12">
        			<h4 class="title">Form buat agenda</h4>
                <p class="category">BMT mobile app</p>
        		</div>
        	</div>
        </div>
				<div class="card-content">
					<div class="row">
				    <div class="col-lg-12">
				      <form action="/reminder" method="POST">
				        {{ csrf_field() }}
				        <div class="row">
				          <div class="col-md-6">
				              <div class="form-group label-floating">
				                  <label class="control-label">Masukkan tanggal</label>
				                  <input class="form-control" id="date" required name="tanggal" type="text"/>
				              </div>
				          </div>				          
				          <div class="col-md-6">
				            <div class="input-group bootstrap-timepicker timepicker">
                        <input id="timepicker1" type="text" placeholder="Klik gambar jam" class="form-control input-small">
                        <span class="input-group-addon"><i class="material-icons">access_time</i></span>
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
    	showMeridian: false,
    });
  </script>
@endsection

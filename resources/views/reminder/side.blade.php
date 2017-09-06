<div class="card">
    <div class="card-header" data-background-color="bmt-green">
      <h4 class="title">Pengingat Pembayaran Kredit</h4>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col-lg-12">
              <form action="/reminder/create" method="GET">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group label-floating">
                          <label class="control-label">Masukkan tanggal</label>
                          <input class="form-control" id="date" required name="tanggal" type="text"/>
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
<div class="card">
    <div class="card-header" data-background-color="blue">
      <h4 class="title">Template reminder</h4>
    </div>
    <div class="card-content">
        <div class="row">
            <div class="col-lg-12">
              <p>{{ $template->head }} </p>
              <ul>
                <li>Nama: <b>Nama nasabah</b></li>
                <li>Rekening kredit: <b>No rekening</b></li>
                <li>Cicilan ke: <b>Cicilan</b></li>
                <li>Nominal cicilan: <b>Nominal</b></li>
              </ul>
              <p>{{ $template->foot }}</p>
              <a class="btn btn-warning pull-right" href="/template/{{$template->id}}/edit">Edit</a>
            </div>
        </div>
    </div>
</div>

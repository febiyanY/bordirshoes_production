@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_logistik')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengiriman
      <small>Siap pengiriman</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
            <h4 class="box-title">Selasa, 02/04/2019 12:54</h4>
            <div class="box-tools pull-right">
              <a href="#" class="btn btn-sm btn-primary btn-flat">Kirim</a>
            </div>
          </div> -->
          <div class="box-body table-responsive">
            <table class="table table-bordered table-hover dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Pengiriman</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody><?php $no = 1;?>
                  @foreach($ready as $rw)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$rw->idPemesanan}}</td>
                  <td>{{$rw->tanggal}}</td>
                  <td><a href="{{url('/logistik/ready/detail')}}/{{$rw->idPemesanan}}" class="btn btn-sm btn-primary btn-flat" > Kirim </a></td>
                  
                </tr>
                @endforeach
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div>
  </section>
</div>


<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')
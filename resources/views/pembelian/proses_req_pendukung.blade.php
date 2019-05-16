  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_pembelian')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proses
        <small>Barang pendukung</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
              <form action="{{url('/pembelian/konfirmasi_req_pendukung')}}" method="post" >
                <input type="hidden" class="form-control" name="request_id" value="{{$id}}">
                <input type="hidden" class="form-control" name="tanggal" value="{{$tgl}}">
            <div class="box-header with-border">
              <h4 class="box-title">{{$tgl}}</h4>
              <div class="box-tools pull-right">
                  <button type="submit"  class="btn btn-sm btn-primary btn-flat">Konfirmasi</button>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barang pendukung</th>
                    <th>Jumlah</th>
                    <th>Vendor</th>
                  </tr>
                </thead>
                <tbody><?php $no = 1;?>
                  
                  @foreach($req as $row)
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>{{$row->nama}}</td>
                      <input type="hidden" class="form-control" name="nama[]" value="{{$row->nama}}">
                      <td>{{$row->jumlah}}</td>
                      <input type="hidden" class="form-control" name="jumlah[]" value="{{$row->jumlah}}">
                      <td><input type="text" class="form-control" name="vendor[]" placeholder="Nama Vendor" required></td>
                    </tr>
                    @endforeach
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                  
                </tbody>
              </table>
            </div><!-- /.box-body --> 
          </form>
          </div>
        </div>
        
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template/footer')
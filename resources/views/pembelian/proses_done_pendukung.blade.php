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
              <form action="{{url('/pembelian/konfirmasi_done_pendukung')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="request_id" value="{{$id}}">
                <input type="hidden" class="form-control" name="tanggal" value="{{$tgl}}">
            <div class="box-header with-border">
              <h4 class="box-title">{{$tgl}}</h4>
              <div class="box-tools pull-right">
                <input type="submit" value="Konfirmasi" class="btn btn-sm btn-primary btn-flat">
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
                    <th>Harga</th>
                    <th>Harga Total</th>
                    <th>Bukti Pembelian</th>
                  </tr>
                </thead>
               
                  <tbody><?php $no = 1;?>
                    @foreach($req as $row)
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td>{{$row->nama}}</td>
                      <input type="hidden" value="{{$row->nama}}" name="nama[]">
                      <td class="jumlah">{{$row->jumlah}}</td>
                      <td>{{$row->vendor}}</td>
                      <input type="hidden" class="form-control" name="jumlah[]" value="{{$row->jumlah}}">
                      <input type="hidden" value="{{$row->vendor}}" name="vendor[]">
                      <td><input type="number" class="form-control harga-input" placeholder="Rp." required></td>
                      <td><input type="number" class="form-control total-harga" value="" name="total[]" readonly></td>
                      <td><input type="file" class="form-control" name="bukti[]"></td>
                    </tr>
                    @endforeach
                  </tbody>
                
              </table>
            </div><!-- /.box-body -->
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
          </form>
          </div>
        </div>

      </div>
    </section>
  </div>

  <script>
    $(document).ready(function () {
      $('.harga-input').on('keyup', function () {
        let jml = parseFloat($(this).closest('tr').find('.jumlah').text());
        let total = parseFloat($(this).val());
        $(this).closest('td').next().find('.total-harga').val(jml * total);

      });
    });
  </script>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template/footer')
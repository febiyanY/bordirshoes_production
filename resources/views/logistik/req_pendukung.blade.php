@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_logistik')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Request
      <small>Barang pendukung</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <form action="" method="post">


            <div class="box-header with-border">
              <h4 class="box-title">Selasa, 02/04/2019 12:54</h4>
              <div class="box-tools pull-right">
                <input type="submit" value="Kirim" class="btn btn-sm btn-primary btn-flat">
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barang pendukung</th>
                    <th>Jumlah</th>
                    <th><button type="button" id="add" class="btn btn-sm btn-success btn-flat">Tambah Barang</button></th>
                  </tr>
                </thead>
                <tbody class="tbody">
                  <script>
                    var i = 1;
                  </script>
                  <tr>
                    <td class="no">
                      1
                    </td>
                    <td><select class="form-control" name="nama[]" id="">
                      <option value="lem">lem</option>
                      <option value="gunting">gunting</option>
                      <option value="jarum">jarum</option>
                      <option value="kantong plastik">kantong plastik</option>
                      <option value="kardus">kardus</option>
                      <option value="rol meteran">rol meteran</option>
                    </select></td>
                    <td><input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah" required></td>
                    <td><button class="btn btn-sm btn-danger btn-flat delete">Hapus</button></td>
                  </tr>

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
    function number() {
      let i = 1;
      $('.no').each(function (index) {
        $(this).text(i++);
      });
    }
    $('#add').on('click', function () {
      let el ='<tr><td class="no"></td><td><select class="form-control" name="nama[]" id=""><option value="lem">lem</option><option value="gunting">gunting</option><option value="jarum">jarum</option><option value="kantong plastik">kantong plastik</option><option value="kardus">kardus</option></select></td><td><input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah"/></td><option value="rol meteran">rol meteran</option><td><button  class="btn btn-sm btn-danger btn-flat delete">Hapus</button></td></tr>';
      $('.tbody').append(el);
      number();
    });

    $('body').on('click', '.delete', function () {
      $(this).closest('td').closest('tr').remove();
      number();
    });
  });
</script>
<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_logistik')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Request
        <small>Barang Pendukung</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Selasa, 02/04/2019 12:54</h4>
              <div class="box-tools pull-right">
                <a href="#" class="btn btn-sm btn-primary btn-flat">Kirim</a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barang pendukung</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody><?php $no = 1;?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Kain satin sutra</td>
                    <td>50</td>
                  </tr>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Benang bordir</td>
                    <td>100</td>
                  </tr>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Benang sulam</td>
                    <td>100</td>
                  </tr>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Sol karet sepatu</td>
                    <td>80</td>
                  </tr>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Kain lapis dalam taiwan</td>
                    <td>80</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.box-body --> 
          </div>
        </div>
        
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template/footer')
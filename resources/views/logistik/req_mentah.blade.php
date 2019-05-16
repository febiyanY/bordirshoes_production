  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_logistik')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Request
        <small>Barang Mentah</small>
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
                      <th>Barang Mentah</th>
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
                        <option value="Kain satin sutra">Kain satin sutra</option>
                        <option value="Benang bordir">	Benang bordir</option>
                        <option value="Benang sulam">	Benang sulam</option>
                        <option value="Kain beldru">Kain beldru</option>
                        <option value="Sol karet sepatu">Sol karet sepatu</option>
                        <option value="Kain lapis dalam taiwan">Kain lapis dalam taiwan</option>
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
        let el ='<tr><td class="no"></td><td><select class="form-control" name="nama[]" id=""><option value="Kain satin sutra">Kain satin sutra</option><option value="Benang bordir">	Benang bordir</option><option value="Benang sulam">	Benang sulam</option><option value="Kain beldru">Kain beldru</option><option value="Sol karet sepatu">Sol karet sepatu</option><option value="Kain lapis dalam taiwan">Kain lapis dalam taiwan</option></select></td><td><input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah"/></td><td><button  class="btn btn-sm btn-danger btn-flat delete">Hapus</button></td></tr>';
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
  @include('template/footer')
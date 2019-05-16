  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_logistik')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Stok
          <small>Barang Mentah</small>
        <span style="float:right;"><a href="<?php echo url('/logistik/cek_stok_mentah')?>" class="btn btn-sm btn-primary btn-flat">Cek Stok</a></span>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
              <form>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="tanggal">
                </div>
                <div class="form-group">
                  <label>Ukuran</label>
                  <input type="text" class="form-control" name="tanggal">
                </div>
                <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Tambah</button>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template/footer')
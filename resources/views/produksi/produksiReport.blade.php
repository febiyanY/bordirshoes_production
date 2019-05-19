@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_produksi')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Produksi & Reporting
            <!-- <small>Produksi</small> -->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Proses Produksi</h4>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-sm btn-primary btn-flat" id="addButton">Tambah
                                Produksi</button>
                        </div>
                    </div>
                    <div class="box-body" id="tambahBox" style="display:none">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Cutting</label>
                                <div class="col-sm-10">
                                    <input type="number" name="cutting" class="form-control" id="inputPassword"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Menjahit</label>
                                <div class="col-sm-10">
                                    <input type="number" name="menjahit" class="form-control" id="inputPassword"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Perakitan</label>
                                <div class="col-sm-10">
                                    <input type="number" name="perakitan" class="form-control" id="inputPassword"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Quality</label>
                                <div class="col-sm-10">
                                    <input type="text" name="quality" class="form-control" id="inputPassword"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="box-tools pull-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">View Reporting</h4>
                        <!-- <div class="box-tools pull-right">
                            <a href="#" class="btn btn-sm btn-primary btn-flat">Kirim</a>
                        </div> -->
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Cutting</th>
                                    <th>Menjahit</th>
                                    <th>Perakitan</th>
                                    <th>Quality</th>
                                </tr>
                            </thead>
                            <tbody><?php $no = 1;?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td>12/34/12323</td>
                                    <td>100</td>
                                    <td>100</td>
                                    <td>76</td>
                                    <td>Good</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $("#addButton").click(function () {
            $("#tambahBox").slideToggle();
        });
    });
</script>
<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')
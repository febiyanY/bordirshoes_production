@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_produksi')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rencana Produksi
            <!-- <small>Produksi</small> -->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Input Rencana Produksi</h4>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-sm btn-primary btn-flat" id="addButton">Tambah
                                Rencana Produksi</button>
                        </div>
                    </div>
                    <div class="box-body" id="tambahBox" style="display:none">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kain</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" name="kain" id="exampleFormControlSelect1">
                                                <option value="beludru sulam">Beludru Sulam</option>
                                                <option value="satin sulam">Satin Sulam</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="number" name="cutting" class="form-control" id="inputPassword"
                                                placeholder="Jumlah">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Benang</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="benang" class="form-control" id="inputPassword"
                                                placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Sol</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="sol" class="form-control" id="inputPassword"
                                                placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Lem</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lem" class="form-control" id="inputPassword"
                                                placeholder="Jumlah">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Lapis Taiwan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lapis_taiwan" class="form-control"
                                                id="inputPassword" placeholder="Jumlah">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="kategori" id="kategori"
                                                onchange="changeSize()">
                                                <option value="dewasa">Dewasa</option>
                                                <option value="anak">Anak</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Tipe</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="tipe">
                                                <option value="sepatu">Sepatu</option>
                                                <option value="sandal">Sandal</option>
                                                <option value="selop">Selop</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Ukuran</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" name="ukuran" id="ukuranSelect">
                                                <?php for($x=36;$x<=43;$x++) { ?>
                                                <option value="{{$x}}">{{$x}}</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jumlah" class="form-control" id="inputPassword"
                                                placeholder="Jumlah">
                                        </div>
                                    </div>
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
                        <h4 class="box-title">View Rencana Produksi</h4>
                        <!-- <div class="box-tools pull-right">
                            <a href="#" class="btn btn-sm btn-primary btn-flat">Kirim</a>
                        </div> -->
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th colspan="2">Kain</th>
                                    <th rowspan="2">Benang</th>
                                    <th rowspan="2">Lem</th>
                                    <th rowspan="2">Sol</th>
                                    <th rowspan="2">Bahan Lapis Taiwan</th>
                                    <th rowspan="2">Status Anak/Dewasa</th>
                                    <th rowspan="2">Ukuran</th>

                                </tr>
                                <tr>
                                    <th>Beludru Sulam</th>
                                    <th>Beludru Sulam</th>
                                </tr>
                            </thead>
                            <tbody><?php $no = 1;?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td>234</td>
                                    <td>100</td>
                                    <td>100</td>
                                    <td>76</td>
                                    <td>234</td>
                                    <td>436</td>
                                    <td>status ??</td>
                                    <td>43</td>
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

    function changeSize() {
        var kat = document.getElementById('kategori').value;
        var size = document.getElementById('ukuranSelect');
        var text = "";
        var start, end = 0;
        if (kat == 'dewasa') {
            start = 36;
            end = 43;
        } else {
            start = 24;
            end = 28;
        }
        var i;
        for (i = start; i <= end; i++) {
            text += "<option value='" + i + "'>" + i + "</option>";

        }
        size.innerHTML = text;
    }
</script>
<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')
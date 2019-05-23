@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_produksi')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dalam Proses Produksi
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Order</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody><?php $no = 1;?>
                                @foreach($product as $rw)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td class="idPem">{{$rw->idPemesanan}}</td>
                                    <td>{{$rw->tanggal}}</td>
                                    <td><button type="button"  class="btn btn-sm btn-primary btn-flat isDone">
                                            Selesai </button></td>

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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Konfirmasi proses produksi selesai ? <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="spanId" type="button" class="btn btn-primary" onclick="">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.isDone').on('click', function () {
            var id = $(this).closest('tr').find('.idPem').text();
            var link = "location.href='selesai/konfirmasi/" + id + "'";
            // alert(link);
            $('#spanId').attr('onclick', link);
            $('#exampleModal').modal('show');
        });
    });
</script>
<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')
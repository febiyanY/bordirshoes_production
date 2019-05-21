@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_produksi')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Request Produksi
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('accounting/kirimtagihan')}}" method="post" enctype="multipart/form-data">
                    <div class="box">

                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-12">
                                <div class="box-body table-responsive">
                                    <h5 style="text-align:center">Produksi ID ({{$detail[0]->idPemesanan}})</h5>
                                    <input type="hidden" name="idPemesanan" value="{{$detail[0]->idPemesanan}}">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col"> </th>

                                                <th scope="col">Produk</th>
                                                <th scope="col">Ukuran</th>
                                                <th scope="col" class="text-center">Jumlah</th>
                                                <th scope="col" class="text-right">Harga</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total=0;$totalQty=0?>
                                            @foreach($detail as $cp)
                                            <tr>
                                                <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>

                                                <td>{{$cp->productName}}</td>
                                                <td>{{$cp->size}}</td>
                                                <td>{{$cp->quantity}}</td>
                                                <td class="text-right">Rp. {{$cp->totalPrice}}</td>
                                                <!-- <td class="text-right"><a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td> -->
                                            </tr>
                                            <?php 
                                            $total=$total+($cp->totalPrice);
                                            $totalQty=$totalQty+($cp->quantity);
                                            
                                            ?>
                                            @endforeach

                                            <tr>
                                                <td></td>

                                                <td></td>
                                                <td><strong>Total Barang</strong></td>
                                                <td><strong>{{$totalQty}}</strong></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>

                                </div>

                            </div>


                        </div>

                    </div>
                    <div class="box">

                        <div class="row">

                            <div class="col-12">
                                <div class="box-body table-responsive">
                                    <h5 style="text-align:center">Bahan yang diButuhkan</h5>
                                    <table class="table table-bordered table-hover dataTable">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Produk</th>
                                                <th rowspan="2">Ukuran</th>
                                                <th rowspan="2">Jumlah</th>
                                                <th colspan="2">Kain</th>
                                                <th rowspan="2">Benang</th>
                                                <th rowspan="2">Lem</th>
                                                <th rowspan="2">Sol</th>
                                                <th rowspan="2">Bahan Lapis Taiwan</th>


                                            </tr>
                                            <tr>
                                                <th>Beldru Sulam</th>
                                                <th>Satin Sulam</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $no = 1;?>
                                            @foreach($display as $dis)
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td>{{$dis['nama']}}</td>
                                                <td>{{$dis['ukuran']}}</td>
                                                <td>{{$dis['jumlah']}}</td>
                                                <td>{{$dis['satin']}}</td>
                                                <td>{{$dis['beldru']}}</td>
                                                <td>{{$dis['benang']}}</td>
                                                <td>{{$dis['lem']}}</td>
                                                <td>{{$dis['sol']}}</td>
                                                <td>{{$dis['taiwan']}}</td>



                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                    <!-- 
                                    <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit"
                                        value="Proses"> -->
                                </div>

                            </div>


                        </div>

                    </div>


                    <div class="box">

                        <div class="row">

                            <div class="col-12">
                                <div class="box-body table-responsive">
                                    <h5 style="text-align:center">Stock bahan setelah di proses</h5>
                                    <table class="table table-bordered table-hover dataTable">
                                        <thead>
                                            <tr>

                                                <th colspan="2">Kain</th>
                                                <th rowspan="2">Benang</th>
                                                <th rowspan="2">Lem</th>
                                                <th rowspan="2">Sol</th>
                                                <th rowspan="2">Bahan Lapis Taiwan</th>


                                            </tr>
                                            <tr>
                                                <th>Beldru Sulam</th>
                                                <th>Satin Sulam</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                @foreach($stock as $dis)
                                                <td>{{$dis}}</td>
                                                @endforeach
                                            </tr>



                                        </tbody>
                                    </table>

                                    <!-- <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit"
                                            value="Proses"> -->
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="box">

                        <div class="row">

                            <div class="col-12">
                                <div class="box-body table-responsive">


                                    <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit"
                                        value="Proses">
                                </div>

                            </div>


                        </div>

                    </div>



            </div>
            </form>
        </div>

</div>
</section>
</div>

<script>


</script>
<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')
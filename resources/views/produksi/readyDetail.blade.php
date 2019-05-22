@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_produksi')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Detail Siap Produksi
            <small></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{url('produksi/ready/detail/send')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box">

                        <div class="row">

                            <div class="col-12">
                                <div class="box-body table-responsive">
                                    <h5 style="text-align:center">Bahan yang diButuhkan ID ({{$detail[0]->idPemesanan}})</h5>
                                    <input type="hidden" name="idPemesanan" value="{{$detail[0]->idPemesanan}}">
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
                                        <tbody><?php $no = 1;
                                            $satin=0;$beldru=0;$benang=0;$lem=0;$sol=0;$taiwan=0;    
                                            
                                            ?>
                                            @foreach($display as $dis)
                                            <?php $satin+=$dis['satin'];
                                            $beldru+=$dis['beldru'];
                                            $benang+=$dis['benang'];
                                            $lem+=$dis['lem'];
                                            $sol+=$dis['sol'];
                                            $taiwan+=$dis['taiwan']; ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td>{{$dis['nama']}}</td>
                                                <td>{{$dis['ukuran']}}</td>
                                                <td>{{$dis['jumlah']}}</td>
                                                <td>{{$dis['beldru']}}</td>
                                                <td>{{$dis['satin']}}</td>
                                                
                                                <td>{{$dis['benang']}}</td>
                                                <td>{{$dis['lem']}}</td>
                                                <td>{{$dis['sol']}}</td>
                                                <td>{{$dis['taiwan']}}</td>



                                            </tr>

                                            @endforeach
                                            <tr>
                                                <td colspan="4" style="text-align:center">
                                                    <b><p>Total Bahan yang diButuhkan</p></b>
                                                </td>
                                                <td>{{$beldru}}</td>
                                                <input type="hidden" name="nama[]" value="Kain beldru">
                                                <input type="hidden" name="jumlah[]" value="{{$beldru}}">
                                                <td>{{$satin}}</td>
                                                <input type="hidden" name="nama[]" value="Kain satin sutra">
                                                <input type="hidden" name="jumlah[]" value="{{$satin}}">
                                                
                                                <td>{{$benang}}</td>
                                                <input type="hidden" name="nama[]" value="Benang sulam">
                                                <input type="hidden" name="jumlah[]" value="{{$benang}}">
                                                <td>{{$lem}}</td>
                                                <input type="hidden" name="nama[]" value="lem">
                                                <input type="hidden" name="jumlah[]" value="{{$lem}}">
                                                <td>{{$sol}}</td>
                                                <input type="hidden" name="nama[]" value="Sol karet sepatu">
                                                <input type="hidden" name="jumlah[]" value="{{$sol}}">
                                                <td>{{$taiwan}}</td>
                                                <input type="hidden" name="nama[]" value="Kain lapis dalam taiwan">
                                                <input type="hidden" name="jumlah[]" value="{{$taiwan}}">

                                            </tr>


                                        </tbody>
                                    </table>
                                    
                                    <!-- <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit"
                                        value="Request Bahan"> -->
                                </div>

                            </div>


                        </div>

                    </div>
                    <div class="box">

                            <div class="row">
    
                                <div class="col-12">
                                    <div class="box-body table-responsive">
                                        
                                        
                                        <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit"
                                            value="Produksi">
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
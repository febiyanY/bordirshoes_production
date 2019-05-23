@include('template/header')

<!-- Left side column. contains the logo and sidebar -->
@include('template/sidebar_logistik')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengiriman
      <small>Siap pengiriman</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
            <form action="{{url('logistik/ready/send')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    {{csrf_field()}}
                    <div class="box-body table-responsive" style="padding:2%">
                    <div class="col-12">
    
    
                        <div class="table-responsive">
                            <h5 style="text-align:left;margin-top:2%">Pengiriman Barang</h5>
                            <!-- <h5 style="text-align:center">ID ({{$detail[0]->idPemesanan}})</h5> -->
                            <input type="hidden" name="idPemesanan" value="{{$detail[0]->idPemesanan}}">
                            <input type="hidden" name="kota" value="{{$detail[0]->Kota}}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td scope="col"> <b>Kota</b> </td>
                                        <td scope="col">{{ucfirst($detail[0]->Kota)}} </td>
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"> <b>Nama</b> </td>
                                        <td scope="col">{{ucfirst($detail[0]->namaCustomer)}} </td>
                                        <input type="hidden" name="namaCustomer" value="{{$detail[0]->namaCustomer}}">
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"> <b>Alamat Pengiriman</b> </td>
                                        <td scope="col">{{$detail[0]->Alamat}} </td>
                                        <input type="hidden" name="alamat" value="{{$detail[0]->Alamat}}">
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>
    
                            </table>
                        </div>
    
    
                        <div class="table-responsive">
                            <h5 style="text-align:left;margin-top:2%">Detail Pesanan</h5>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"> </th>
    
                                        <th scope="col">Produk</th>
                                        <th scope="col">Ukuran</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                               
                                $total=0;
                             ?>
                                    @foreach($detail as $cp)
                                    <tr>
                                        <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
    
                                        <td>{{$cp->productName}}</td>
                                        <td>{{$cp->size}}</td>
                                        <td>{{$cp->quantity}}</td>
                                       
                                    </tr>
                                    
                                    @endforeach
    
                                   
                                </tbody>
                            </table>
                        </div>
    
    
                        <div class="table-responsive">
    
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td scope="col"> <b>Jasa Pengiriman</b> </td>
                                        <td scope="col">
                                            <select name="kurir" class="form-control">
                                                <option>JNE</option>
                                                <option>J&T</option>
                                            </select>
                                        </td>
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                    </tr>
                                    <tr>
                                        <td scope="col"> <b>Biaya Pengiriman</b> </td>
                                        <td scope="col">Rp.20.000 </td>
                                        <input type="hidden" name="ongkir" value="20000">
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                    </tr>
                                    
                                </thead>
    
                            </table>
                        </div>
    
    
                    </div>
                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
    
                                <!-- <label for=""> Bukti pembayaran</label><br>
                                <a target="_blank" href="{{asset($detail[0]->buktiPembayaran)}}">
                                    <img style="height:100px; width:100px" src="{{asset($detail[0]->buktiPembayaran)}}" />
                                </a> -->
    
                            </div>
    
                            <div class="col-sm-12 col-md-6 text-right">
    
                                <label for=""> <br></label>
                                <input class="btn btn-lg btn-block btn-success text-uppercase" type="submit" value="Send">
    
                            </div>
    
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>
      </div>
      
    </div>
  </section>
</div>


<!-- /.content-wrapper -->

<!-- Main Footer -->
@include('template/footer')
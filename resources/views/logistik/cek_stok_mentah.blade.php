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
                    <th colspan="3" style="text-align: center;">Kain</th>
                    <th colspan="2" style="text-align: center;">Benang</th>
                    <th rowspan="2" style="text-align: center;">Sol Sepatu</th>
                    <th rowspan="2" style="text-align: center;">Tanggal</th>
                    <th rowspan="2" style="text-align: center;">Barang masuk / keluar</th>
                  </tr>
                  <tr>
                    <th>Satin sutra</th>
                    <th>Lapis taiwan</th>
                    <th>Beldru</th>
                    <th>Bordir</th>
                    <th>Sulam</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $column = ['Kain satin sutra','Kain lapis dalam taiwan','Kain beldru','Benang bordir','Benang sulam','Sol karet sepatu','tanggal','jenis'];
                $data = [0,0,0,0,0,0,"",""];

                $it = 0;
                $id = "";
                foreach($act as $rw){
                    if($id!=$rw->activity_id){
                      
                      $id = $rw->activity_id;
                      if($it!=0){
                        echo "<tr>";
                        
                        for($j=0;$j<8;$j++){
                          echo "<td>".$data[$j]."</td>";
                        }
                        echo "</tr>";
                        $data[0]=0;
                        $data[1]=0;
                        $data[2]=0;
                        $data[3]=0;
                        $data[4]=0;
                        $data[5]=0;
                        $data[6]="";
                        $data[7]="";
                        
                      }
                      for($x=0;$x<8;$x++){
                        if($rw->nama == $column[$x]){
                          $data[$x] = $rw->jumlah+ $data[$x];
                        }
                      }
                      $it=1;


                    }else{
                      $data[6] = $rw->tanggal;
                      $data[7] = $rw->jenis;
                      for($x=0;$x<8;$x++){
                        if($rw->nama == $column[$x]){
                          $data[$x] = $rw->jumlah + $data[$x];
                        }
                      }
                    }
                }
                echo "<tr>";
                        
                        for($j=0;$j<8;$j++){
                          echo "<td>".$data[$j]."</td>";
                        }
                        echo "</tr>";



                ?>




                  <tr style="text-align: center; background: cyan;">
                    <td colspan="8">Sisa barang</td>
                  </tr>
                  <tr>
                    @foreach($mentah as $row)
                    <td>{{$row->jumlah}}</td>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template/footer')
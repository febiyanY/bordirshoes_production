  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_logistik')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Stok
          <small>Barang Pendukung</small>
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
                    <th>Lem</th>
                    <th>Gunting</th>
                    <th>Jarum</th>
                    <th>Kantong plastik</th>
                    <th>Kardus</th>
                    <th>Rol meteran</th>
                    <th>Tanggal</th>
                    <th>Barang masuk / keluar</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                $column = ['lem','gunting','jarum','kantong plastik','kardus','rol meteran','tanggal','jenis'];
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
                  @foreach($pendukung as $row)
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
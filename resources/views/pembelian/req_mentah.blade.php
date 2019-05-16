  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_pembelian')

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
          <?php $lop = "";
          $it = 0; ?>
          @foreach($req as $row)
          <?php if($row->request_id!=$lop) { 
            $lop = $row->request_id; 
            if ($it!=0) { ?> 
              </tbody>
                </table>
            </div>
          </div>
          </form>
            <?php  } 
            $it++;
            ?>
            <form action="{{url('/pembelian/proses_req_mentah')}}" method="post">
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <input type="hidden" name="request_id" value="{{$row->request_id}}">
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">{{$row->tanggal}}</h4>
              <div class="box-tools pull-right">
                <button type="submit"  class="btn btn-sm btn-primary btn-flat">Proses</button>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Barang Mentah</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->jumlah}}</td>
                  </tr>

         <?php } else { ?>
                  <tr>
                    <td></td>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->jumlah}}</td>
                  </tr>

          <?php } ?>
          
          
                  
                
          @endforeach
          </tbody>
                </table>
            </div>
        </div>
        </form>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('template/footer')
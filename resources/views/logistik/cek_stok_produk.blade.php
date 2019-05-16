  @include('template/header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('template/sidebar_logistik')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dewasa
        <small>Barang Produk</small>
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
                    <th colspan="35" style="text-align: center;">Dewasa</th>
                  </tr>
                  <tr>
                    <th colspan="8" style="text-align: center;">Bordir</th>
                    <th colspan="8" style="text-align: center;">Sulam</th>
                    <th colspan="8" style="text-align: center;">Selop</th>
                    <th colspan="8" style="text-align: center;">Sandal</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2" colspan="2">Barang masuk / keluar</th>
                  </tr>
                  <tr>
                    <?php for($i=0;$i<4;$i++){?>
                    <th>36</th>
                    <th>37</th>
                    <th>38</th>
                    <th>39</th>
                    <th>40</th>
                    <th>41</th>
                    <th>42</th>
                    <th>43</th>
                    <?php }?>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=0;$i<20;$i++){?>
                  <tr>
                    <?php for($j=0;$j<34;$j++){?>
                    <td></td>
                    <?php }?>
                  </tr>
                  <?php }?>


                  <tr style="text-align: center; background: cyan;">
                    <td colspan="35">Sisa barang</td>
                  </tr>
                  <tr>
                    <!-- <?php for($j=0;$j<35;$j++){?>
                    <td></td>
                    <?php }?> -->
                    @foreach($product as $row)

                    <td>{{$row->stok}}</td>

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
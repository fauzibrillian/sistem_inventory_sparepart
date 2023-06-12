<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sistem Inventory Sparepart 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        @role('admin')
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Admin
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
        @else
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          User
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
        @endrole
      </div>
      @role('admin')
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li >
            <a href="/supplier">
              <i class="nc-icon nc-single-02"></i>
              <p>Master Supplier</p>
            </a>
          </li>
          {{-- <li >
            <a href="/sparepart">
              <i class="nc-icon nc-briefcase-24"></i>
              <p>Master Sparepart</p>
            </a>
          </li> --}}
          <li>
            <a href="/monitoring">
              <i class="nc-icon nc-tile-56"></i>
              <p>Monitoring</p>
            </a>
          </li>
          <li>
            <a href="/transaksi">
              <i class="nc-icon nc-bell-55"></i>
              <p>Transaksi</p>
            </a>
          </li>
          <li>
            <a href="/pengembalian">
              <i class="nc-icon nc-simple-remove"></i>
              <p>pengembalian</p>
            </a>
          </li>
          <li>
            <a href="/pegawai">
              <i class="nc-icon nc-badge"></i>
              <p>Master Pegawai</p>
            </a>
          </li>
          <li class="active">
            <a href="/abcmodel">
              <i class="nc-icon nc-money-coins"></i>
              <p>ABC Model</p>
            </a>
          </li>
        </ul>
      </div>
      @else
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li  >
            <a href="/supplier">
              <i class="nc-icon nc-single-02"></i>
              <p>Master Supplier</p>
            </a>
          </li>
          <li class="active">
            <a href="/monitoring">
              <i class="nc-icon nc-tile-56"></i>
              <p>Monitoring</p>
            </a>
          </li>
          <li>
            <a href="/pengembalian">
              <i class="nc-icon nc-simple-remove"></i>
              <p>pengembalian</p>
            </a>
          </li>
        </ul>
      </div>
      @endrole
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Sistem Inventory Sparepart Mobil</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="btn btn-danger"> Log out </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Forecasting Sparepart </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" table-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Tanggal
                      </th>
                      <th>
                        Nama Sparepart
                      </th>
                      <th>
                        Kode Sparepart
                      </th>
                      <th>
                        Qty
                      </th>
                      <th>
                        Tipe Mobil
                      </th>
                      <th>
                        Harga Satuan
                      </th>
                      <th>
                        Penyerapan Dana ( Harga Satuan x Qty )
                      </th>
                      <th>
                        Presentase Penyerapan
                      </th>
                      <th>
                        Kategori
                      </th>
                    </thead>
                    <tbody>
                      @foreach ($abcmodel as $key=>$x)
                      <tr>
                        <td>
                          {{$key+1}}
                        </td>
                        <td>
                          {{$x->tanggal}}
                        </td>
                        <td>
                          {{$x->nama_sparepart}}
                        </td>
                        <td>
                          {{$x->kode_sparepart}}
                        </td>
                        <td>
                          {{$x->qty}}
                        </td>
                        <td>
                          {{$x->merk}}
                        </td>
                        <td>
                          {{formatrupiah($x->harga)}}
                        </td>
                        <td>
                          {{formatrupiah($x->hasil)}}
                        </td>
                        <td>
                          {{decimal($x->presentase)}}
                        </td>
                        <td>
                          {{$x->keterangan}}
                        </td>
                        <td> 
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                      <tfoot class="table-footer">
                            <tr>
                              <td colspan="2">Total Pemakaian Dana</td>
                              <td></td>
                              <td></td>
                              <td>{{$total_qty}}</td>
                              <td></td>
                              <td></td>
                              <td>{{formatrupiah($total)}}</td>
                              <td></td>
                              <td>
                              <a href="/sparepart-prediction" class="btn btn-warning"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fa-solid fa-chart-line" viewBox="0 0 512 512">
                                  <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/>
                                </svg>
                              </a>
                              </td>
                            </tr>
                      </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });

    var bulanInput = document.getElementById("bulanInput");

    // Mengatur nilai default ke bulan saat ini
    var today = new Date();
    var month = today.getMonth() + 1;
    var year = today.getFullYear();
    var defaultValue = year + "-" + ("0" + month).slice(-2);
    bulanInput.value = defaultValue;

    // Menangkap perubahan nilai input
    bulanInput.addEventListener("change", function() {
        // Mendapatkan nilai bulan dan tahun dari input
        var value = bulanInput.value;
        var selectedMonth = parseInt(value.split("-")[1]);

        // Melakukan sesuatu dengan nilai bulan yang dipilih
        console.log("Bulan yang dipilih:", selectedMonth);
        bulanInput.value=selectedMonth;
    });
  </script>
</body>

</html>

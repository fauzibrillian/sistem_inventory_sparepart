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
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/paper-dashboard.css?v=2.0.1')}}" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('assets/demo/demo.css')}}" />
</head>

<body class="">
  <div class="wrapper ">
    @role('admin')
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('assets/img/logo-small.png')}}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Super User
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
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
          <li class="active ">
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
        </ul>
      </div>
    </div>
    @else
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          User
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="/">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
            <a href="/supplier">
              <i class="nc-icon nc-single-02"></i>
              <p>Master Supplier</p>
            </a>
          </li>
          <li>
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
    </div>
    @endrole
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
            <div class="card" >
                <div class="card-body">
                    <h4 class="card-title">Edit Data Penerimaan</h4>
                    <form action="{{route('penerimaan.update',$penerimaan->id )}}" method="POST">
                      @csrf
                      @method('put')
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputnama">Tanggal</label>
                            <input type="date" class="form-control" id="inputnama" required name="tanggal" value="{{old('tanggal') ?? $penerimaan->tanggal}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputkode">Nama Sparepart</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="nama_sparepart">
                              @foreach($transaksi as $key=>$y)
                                <option value="{{$y->id}}"{{ old('nama_sparepart') == $y->id ? 'selected' : null }}>{{$y->nama_sparepart}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputharga">Kode Sparepart</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kode_sparepart">
                              @foreach($transaksi as $key=>$y)
                                <option value="{{$y->id}}"{{ old('kode_sparepart') == $y->id ? 'selected' : null }}>{{$y->kode_sparepart}}</option>
                              @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputtipe">Merk Mobil</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="merk">
                              @foreach($transaksi as $key=>$y)
                                <option value="{{$y->id}}"{{ old('merk') == $y->id ? 'selected' : null }}>{{$y->merk}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputtipe">Qty</label>
                            <input type="qty" class="form-control" id="inputtipe" required name="qty" value="{{old('qty') ?? $penerimaan->qty}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputtipe">Nama Penerima Sparepart</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="pegawai_id">
                              @foreach($pegawai as $key=>$y)
                                <option value="{{$y->id}}"{{ old('pegawai_id') == $y->id ? 'selected' : null }}>{{$y->nama_pegawai}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="inputtipe">Nama Supplier</label>
                          <select class="form-control" id="exampleFormControlSelect1" name="supplier_id">
                            @foreach($supplier as $key=>$y)
                              <option value="{{$y->id}}"{{ old('supplier_id') == $y->id ? 'selected' : null }}>{{$y->nama_supplier}}</option>
                            @endforeach
                          </select>
                      </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/penerimaan" class="btn btn-danger"> Back </a>
                    </form>
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
  </script>
</body>

</html>

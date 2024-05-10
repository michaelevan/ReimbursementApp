<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons">track_changes</i> <strong>Reimbursement</strong></a>

		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li><a class="dropdown-button waves-effect waves-dark" href="{{ route('logout')}}" data-activates="dropdown1"><i class="fa fa-sign-out"></i> <b>Logout</b></a></li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="/direktur" class="active-menu waves-effect waves-dark"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" >
		    <div class="header">
                <h1 class="page-header">
                    Welcome, {{ auth()->user()->nama }}
                </h1>
		    </div>
            <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                            Daftar Pengajuan Reimbursement
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="border: 1px solid; width: 5%; text-align: center">No</th>
                                            <th class="border: 1px solid; width: 15%; text-align: center">Nama Staff</th>
                                            <th class="border: 1px solid; width: 15%; text-align: center">Tanggal</th>
                                            <th class="border: 1px solid; width: 15%; text-align: center">Jenis Reimbursement</th>
                                            <th class="border: 1px solid; width: 15%; text-align: center">Deskripsi</th>
                                            <th class="border: 1px solid; width: 15%; text-align: center">Status Pembayaran</th>
                                            <th class="border: 1px solid; width: 10%; text-align: center">Files</th>
                                            <th class="border: 1px solid; width: 10%; text-align: center">Aksi <br>(Terima/Tolak)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div style="display: none">{{ $i = 1 }}</div>
                                            @foreach ($listReimbursement as $list)
                                            <tr>
                                                <td class="align-middle text-center text-sm">
                                                    {{$i++}}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{$list->nipUser->nama}}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{date('d F Y', strtotime($list->tanggal))}}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{$list->nama_reimbursement}}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    {{$list->deskripsi}}
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($list->status_pembayaran == 0)
                                                        Menunggu Konfirmasi Pembayaran
                                                    @elseif ($list->status_pembayaran == 1)
                                                        Pembayaran Diterima
                                                    @elseif ($list->status_pembayaran == 2)
                                                        Pembayaran Ditolak
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <a href="{{ asset('images/form/'.$list->files) }}" onclick="return showImage('{{ asset('images/form/'.$list->files) }}')">
                                                        <i class="material-icons">folder</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    @if ($list->status_pembayaran == 0)
                                                        <form method="post" style="display: flex; justify-content: center">
                                                            @csrf
                                                            <a href="{{ url("finance/terimaPembayaran/".$list->id) }}">
                                                                <i class="material-icons">check</i><br>Terima
                                                            </a>&nbsp;&nbsp;&nbsp;
                                                            <a href="{{ url("finance/tolakPembayaran/".$list->id) }}">
                                                                <i class="material-icons">close</i><br>Tolak
                                                            </a>
                                                        </form>
                                                    @else
                                                        Selesai
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="materialize/js/materialize.min.js"></script>
    <script src="js/dataTables/jquery.dataTables.js"></script>
    <script src="js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    @if(session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success"
            });
    </script>
    @elseif ($errors->any())
        <script>
            Swal.fire({
                title: "Failed!",
                text: "{{ $errors->first('error') }}",
                icon: "error"
            });
        </script>
    @endif
    <script src="js/custom-scripts.js"></script>
</body>
</html>

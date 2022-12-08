<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layout.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Perkara</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Perkara</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Perkara</h3>

                        <div class="card-tools">
                            <a class="btn btn-success btn-sm" href="{{ route('add-perkara') }}">
                                <i class="fas fa-plus-square">
                                </i> Tambah Data
                            </a>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Perkara</th>
                                    <th>Terdakwa</th>
                                    <th>Hakim</th>
                                    {{-- <th>Tanggal Sidang</th> --}}
                                    <th>Ruang Sidang</th>
                                    <th>Klasifikasi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($dtPerkara as $item)
                                <tr>
                                    <td><a>{{ $loop->iteration }}</a></td>
                                    <td><a>{{ $item->no_perkara}}</a></td>
                                    <td><a>{{ $item->terdakwa}}</a></td>
                                    <td><a>{{ $item->nama_hakim}}</a></td>
                                    <td><a>{{ $item->tgl_sidang}}</a></td>
                                    <td><a>{{ $item->nama_ruang}}</a></td>
                                    <td><a>{{ $item->klasifikasi_perkara}}</a></td>

                                    <td class="project-actions text-right">
                                        <a class="btn btn-warning btn-sm" href="{{ route('show-perkara', $item->id) }}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{ route('edit-perkara', $item->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        {{-- <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a> --}}
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('delete-perkara', $item->id) }}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            @include('layout.footer')
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @include('layout.script')
    @include('sweetalert::alert')
</body>

</html>

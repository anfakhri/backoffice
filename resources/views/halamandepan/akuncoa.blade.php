<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('template.head',['title'=>'Akun COA'])

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        {{-- @include('template.sidebar') --}}

        <!-- Content Wrapper. Contains page content -->
        <div class="">
            <!-- Content Header (Page header) -->
            <section class="content-header">

            </section>
            <!-- /.content-header -->

            {{-- modal Tambah Akun Coa --}}
            <div class="modal fade" id="modalTambahcoa" tabindex="-1" aria-labelledby="modalTambahcoa"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="text-center">Tambah Data Akun COA</h5>
                        </div>
                        <form action="{{ route('tambahakuncoa') }}" method="post">
                            <div class="modal-body">

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Nama COA</label>
                                    <input type="text" id="coaname" name="coaname" autocomplete="off"
                                        class="form-control" required placeholder="Nama COA">
                                </div>
                                <div class="form-group">
                                    <label for="">Tipe</label>
                                    <input type="text" id="tipe" name="tipe" class="form-control" autocomplete="off"
                                        required placeholder="Tipe ">
                                </div>
                                <div class="form-group">
                                    <label for="">Departemen</label>
                                    <input type="text" id="dept" name="dept" autocomplete="off" class="form-control"
                                        required placeholder="Nama Departemen">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--end modal Tambah Coa --}}

            {{-- modal Edit Akun Coa --}}
            @foreach($dtCoa as $item)
            <div class="modal fade" id="modalEditcoa{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditcoa"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="text-center">Edit Data Akun COA</h5>
                        </div>
                        <form action="{{ route('updatecoa',$item->id) }}" method="post">
                            <div class="modal-body">

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Nama COA</label>
                                    <input type="text" id="coaname" name="coaname" autocomplete="off"
                                        class="form-control" required placeholder="Nama COA"
                                        value="{{ $item->nama_coa }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Tipe</label>
                                    <input type="text" id="tipe" name="tipe" class="form-control" autocomplete="off"
                                        required placeholder="Tipe" value="{{ $item ->tipe }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Departemen</label>
                                    <input type="text" id="dept" name="dept" autocomplete="off" class="form-control"
                                        required placeholder="Nama Departemen" value="{{ $item ->dept }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            {{--end modal Edit Coa --}}

            {{-- modal import Akun Coa --}}
            <div class="modal fade" id="modalImportcoa" tabindex="-1" aria-labelledby="modalImportcoa"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="text-center">Import Data Akun COA</h5>
                        </div>
                        <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Import File </label>
                                    <input type="file" id="file" name="file" class="form-control-file">
                                </div>
                                <button type="submit" class="btn btn-primary">Import Data</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--end modal import Coa --}}

            <!-- Main content -->
            <section class="content" style="margin-top: 50px; margin-bottom: 50px">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Daftar Akun COA</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Daftar Akun COA</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">COA</h3>
                                </div>
                                <div>
                                    <!-- /button import -->
                                    <div class="card-footer">
                                        <button type="button" data-toggle="modal" data-target="#modalImportcoa"
                                            class="btn btn-primary">Import Data Coa</button>
                                    </div>
                                </div>

                                <!-- /.card-header -->
                                @if(Session::has('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <ul>
                                        <li>
                                            <strong> {{Session::get('message')}}</strong>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Akun Coa</th>
                                                <th>Nama COA</th>
                                                <th>Type</th>
                                                <th>Departemen</th>
                                                <th colspan="2" style="text-align: center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dtCoa as $item)

                                            <tr data-id={{ $item->id }}>
                                                <td>{{$loop->iteration}}</td>
                                                <td contenteditable="{{ $item->saldoCoa == null ? false : true }}">
                                                    {{$item->akun_coa}}</td>
                                                <td contenteditable>
                                                    {{$item->nama_coa}}</td>
                                                <td contenteditable>{{$item->tipe}}</td>
                                                <td contenteditable>{{$item->dept}}</td>
                                                {{-- <td>
                                                    <a href="{{ url($item->id,'editcoa') }}">
                                                        <button type="button"
                                                            class="btn btn-block bg-gradient-success btn-xs">Ubah</button>
                                                    </a>
                                                    <button type="button"
                                                        class="btn btn-block bg-gradient-success btn-xs"
                                                        data-toggle="modal" data-target="#modalEditcoa{{ $item->id }}">
                                                        <i class="fas fa-edit"></i> Ubah</button>
                                                </td>--}}
                                                <td>
                                                    @if($item->saldoCoa->saldo_awal == 0 )
                                                    <button type="button"
                                                        class="btn btn-block bg-gradient-danger btn-xs"
                                                        data-toggle="modal" data-target="#modalHapus{{ $item->id }}">
                                                        <i class="fas fa-trash"></i> Hapus</button>
                                                    @endif
                                                </td>
                                                <td> <button type="button"
                                                        class="btn btn-block bg-gradient-success btn-xs"
                                                        onclick="saveData({{ $item->id }})">
                                                        <i class="fas fa-edit"></i> Edit </button>
                                                </td>
                                            </tr>
                                            {{-- modal delete --}}
                                            <div class="modal fade" id="modalHapus{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="modalHapus" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="text-center">Apakah anda yakin ingin menghapus
                                                                data <b>{{ $item->nama_coa }}</b> ini ? </h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{route('hapuscoa',$item->id)}}"
                                                                method="post">
                                                                @method('delete')
                                                                {{ csrf_field() }}
                                                                <button type="submit"
                                                                    class="btn btn-primary">Hapus</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end modaldelete --}}
                                            @endforeach
                                            </tfoot>
                                    </table>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /button -->
                                <div class="card-footer">
                                    <button type="button" data-toggle="modal" data-target="#modalTambahcoa"
                                        class="btn btn-primary">Tambah</button>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->


            </section>


            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

        @include('template.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script>
        function saveData(id) {
        var akunCoa = document.querySelector("tr[data-id='" + id + "'] td:nth-child(2)").innerText;
        var namaCoa = document.querySelector("tr[data-id='" + id + "'] td:nth-child(3)").innerText;
        var type = document.querySelector("tr[data-id='" + id + "'] td:nth-child(4)").innerText;
        var departemen = document.querySelector("tr[data-id='" + id + "'] td:nth-child(5)").innerText;

        // console.log({akunCoa, namaCoa, type, departemen})

        var data = {
        _token: '{{ csrf_token() }}',
        _method: 'POST',
        akun_coa: akunCoa,
        nama_coa: namaCoa,
        tipe: type,
        dept: departemen
        };

        // console.log(data)

        $.ajax({
        url: '/updatecoa/' + id,
        type: 'POST',
        async: false,
        data: data,
        success: function(data) {
        // tampilkan pesan sukses atau redirect ke halaman lain
        alert('Data Successfully updated')
        console.log(data)
        },
        error: function(xhr) {
        // tampilkan pesan error
        console.log(xhr)
        },
        });
        }
    </script>
    @include('template.script')


</body>

</html>
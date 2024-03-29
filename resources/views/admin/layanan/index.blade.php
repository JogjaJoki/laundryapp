@extends('admin.layout.app')
@section('content')
    <div class="container-fluid my-3" style="padding-left: 1%;">
        <a href="{{ route('admin.layanan.add') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Layanan Laundry</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Layanan</th>
                                        <th>Jenis Layanan</th>
                                        <th>Nama Layanan</th>
                                        <th>Estimasi</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan as $index => $row)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td class="nipRow">{{ $row->kode }}</td>
                                            <td class="nameRow">{{ $row->jenis->nama }}</td>
                                            <td class="nameRow">{{ $row->nama }}</td>
                                            <td class="nameRow">{{ $row->estimasi }} Hari</td>
                                            <td class="nameRow">{{ $row->harga }}</td>
                                            <td>
                                                <a href="{{ route('admin.layanan.edit', ['kode' => $row->kode]) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.layanan.delete', ['kode' => $row->kode]) }}"
                                                    onclick="return confirm('Are you sure?'); return false;"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nipRows = document.querySelectorAll('.nipRow');
            const nameRows = document.querySelectorAll('.nameRow');
            const passUtama = localStorage.getItem('passUtama');

            nipRows.forEach(function (nipRow) {
                const encryptedNip = nipRow.textContent;
                const decryptedNip = decryptWithBlowfish(passUtama, encryptedNip);
                nipRow.textContent = decryptedNip;
            });

            nameRows.forEach(function (nameRow) {
                const encryptedName = nameRow.textContent;
                const decryptedName = decryptWithBlowfish(passUtama, encryptedName);
                nameRow.textContent = decryptedName;
            });

            function decryptWithBlowfish(key, data) {
                const bf = new Blowfish(key);
                console.log(key)
                let decrypted = bf.decrypt(data);
                decrypted = bf.trimZeros(decrypted); 
                return decrypted; 
            }
        });
    </script>
@endsection

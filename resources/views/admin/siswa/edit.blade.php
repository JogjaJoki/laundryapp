@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Data Siswa</h3>
                        </div>
                        @if (session('nis-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('nis-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.siswa.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $siswa->NIS }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomor Induk Siswa</label>
                                    <input type="text" value="{{ $siswa->NIS }}" name="nis" class="form-control" placeholder="NIS" required>
                                </div>
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select name="kelas" class="form-control" id="">
                                        @foreach($kelas as $k)
                                            <option value="{{ $k->id }}" <?= $siswa->id_kelas == $k->id ? 'selected' : '' ?>>{{ $k->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" value="{{ $siswa->nama }}" name="nama" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control" id="">
                                        <option value="pria" <?= $siswa->gender == 'pria' ? 'selected' : '' ?>>Pria</option>
                                        <option value="wanita" <?= $siswa->gender == 'wanita' ? 'selected' : '' ?>>Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" value="{{ $siswa->tempat_lahir }}" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" value="{{ $siswa->tanggal_lahir }}" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" value="{{ $siswa->alamat }}" name="alamat" class="form-control" placeholder="Alamat" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.siswa.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

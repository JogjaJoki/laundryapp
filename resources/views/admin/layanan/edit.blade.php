@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Data Layanan</h3>
                        </div>
                        @if (session('nip-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('nip-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.layanan.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kode" value="{{ $layanan->kode }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Jenis Layanan</label>
                                    <select name="kode_jenis" class="form-control" id="">
                                        @foreach($jenis as $j)
                                            <option value="{{ $j->kode }}" <?= $j->kode == $layanan->kode_jenis ? 'selected' : '' ?>>{{ $j->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="{{ $layanan->nama }}" class="form-control" placeholder="Nama Layanan" required>
                                </div>
                                <div class="form-group">
                                    <label>Estimasi Layanan ( day )</label>
                                    <input type="number" min="1" step="1" value="{{ $layanan->estimasi }}" name="estimasi" class="form-control" placeholder="Estimasi Pengerjaan" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga Layanan</label>
                                    <input type="number" min="1000" step="100" value="{{ $layanan->harga }}" name="harga" class="form-control" placeholder="Harga Layanan" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.layanan.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

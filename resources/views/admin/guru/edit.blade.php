@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Data Guru</h3>
                        </div>
                        @if (session('nip-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('nip-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.guru.update') }}" id="formAddGuruu" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $guru->NIP }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nomor Induk Pegawai</label>
                                    <input type="text" value="{{ $guru->NIP }}" name="nip" class="form-control" placeholder="NIP" required>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ $guru->name }}" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" value="{{ $guru->email }}" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.guru.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nipField = document.getElementsByName('nip')[0];
            const nameField = document.getElementsByName('name')[0];
            const passUtama = localStorage.getItem('passUtama');


            const encryptedNip = nipField.value;
            const decryptedNip = decryptWithBlowfish(passUtama, encryptedNip);
            nipField.value = decryptedNip;

            const encryptedName = nameField.value;
            const decryptedName = decryptWithBlowfish(passUtama, encryptedName);
            nameField.value = decryptedName;

            function decryptWithBlowfish(key, data) {
                const bf = new Blowfish(key);
                console.log(key)
                let decrypted = bf.decrypt(data);
                decrypted = bf.trimZeros(decrypted); 
                return decrypted; 
            }
        });

        const submitButton = document.getElementById('submitBtn');
        const formAddGuruu = document.getElementById('formAddGuruu');

        submitButton.addEventListener('click', function (event) {
            event.preventDefault();
            
            // Ambil data dari formulir
            // const id = document.getElementsByName('id')[0].value;
            const nip = document.getElementsByName('nip')[0].value;
            const name = document.getElementsByName('name')[0].value;
            const email = document.getElementsByName('email')[0].value;
            const password = document.getElementsByName('password')[0].value;

            // Ambil kunci dari local storage
            const passUtama = localStorage.getItem('passUtama');

            // Enkripsi data dengan Blowfish
            const encryptedNip = encryptWithBlowfish(passUtama, nip);
            const encryptedName = encryptWithBlowfish(passUtama, name);
            const encryptedEmail = email;
            const encryptedPassword = password;

            // Gantikan nilai input dengan nilai terenkripsi
            document.getElementsByName('nip')[0].value = encryptedNip;
            document.getElementsByName('name')[0].value = encryptedName;
            document.getElementsByName('email')[0].value = encryptedEmail;
            document.getElementsByName('password')[0].value = encryptedPassword;

            // Submit formulir
            // document.forms[0].submit();
            formAddGuruu.submit();
        });

        function encryptWithBlowfish(key, data) {
            const bf = new Blowfish(key);
            const encrypted = bf.encrypt(data);
            return encrypted; 
        }
    </script>
@endsection

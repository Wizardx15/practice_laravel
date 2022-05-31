<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h2 class="mr-auto">Tabel Mahasiswa</h2>
                        <a href="{{ route('student.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                    </div>
                    @if(session()->has('pesan'))
                    <div class="alert alert-success">
                        {{ session()->get('pesan') }}
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $mahasiswa)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td><img height="30px" src="{{url('')}}/{{$mahasiswa->image}}" class="rounded" alt=""></td>
                                <td><a href="{{ route('student.show',['student' => $mahasiswa->id]) }}">{{$mahasiswa->nim}}</a></td>
                                <td>{{$mahasiswa->name}}</td>
                                <td>{{$mahasiswa->gender == 'P'?'Perempuan':'Laki-laki'}}</td>
                                <td>{{$mahasiswa->department}}</td>
                                <td>{{$mahasiswa->address == '' ? 'N/A' : $mahasiswa->address}}</td>
                            </tr>
                            @empty
                            <td colspan="6" class="text-center">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-outline-dark"><a href="{{route('login.logout')}}">LogOut</a></button>
                </div>
            </div>
        </div>
    </body>
</html>

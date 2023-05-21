<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Kode ini Mendefinisikan judul halaman berdasarkan variabel
        $pageTitle yang dilewatkan dari kontroler  --}}
    <title>{{ $pageTitle }}</title>
    {{-- untuk memanggil css bootstrap --}}
    @vite('resources/sass/app.scss')
</head>

<body>
    {{-- taq nav untuk navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            {{-- link haref untuk mengarahkan ke route home --}}
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data
                Master</a>

            {{-- hamburger --}}
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    {{-- link haref untuk mengarahkan ke route home --}}
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    {{-- link haref untuk mengarahkan ke route employees dan diteruskan ke kontroler lalui ke view
                        folder employees lalu ke file index --}}
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}"
                            class="nav-link active">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">
                {{-- link haref untuk mengarahkan ke route profile dan diteruskan ke kontroler lalui
                    ke view file profile --}}
                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i
                        class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                {{-- Kode ini Mendefinisikan variabel $pageTitle yang dilewatkan dari kontroler.  --}}
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    {{-- link haref untuk mengarahkan ke route employees dan diteruskan ke kontroler lalui ke view
                        folder employees lalu ke file create --}}
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Create Employee</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            {{-- Tabel untuk menampilkan data karyawan --}}
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    {{--  Baris header tabel --}}
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Position</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Looping melalui setiap karyawan dalam data employees  --}}
                    @foreach ($employees as $employee)
                        <tr>
                            {{-- Kolom untuk menampilkan nama depan karyawan  --}}
                            <td>{{ $employee->firstname }}</td>
                            {{-- Kolom untuk menampilkan nama belakang karyawan --}}
                            <td>{{ $employee->lastname }}</td>
                            {{-- Kolom untuk menampilkan email karyawan --}}
                            <td>{{ $employee->email }}</td>
                            {{-- Kolom untuk menampilkan usia karyawan --}}
                            <td>{{ $employee->age }}</td>
                            {{-- Kolom untuk menampilkan posisi karyawan --}}
                            <td>{{ $employee->position_name }}</td>
                            <td>
                                <div class="d-flex">
                                    {{-- Tombol untuk menampilkan detail karyawan --}}
                                    <a href="{{ route('employees.show', ['employee' => $employee->employee_id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi-person-lines-fill"></i></a>
                                    {{-- Tombol untuk mengedit karyawan --}}
                                    <a href="{{ route('employees.edit', ['employee' => $employee->employee_id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>

                                    <div>
                                        {{-- Form untuk menghapus karyawan --}}
                                        <form
                                            action="{{ route('employees.destroy', ['employee' => $employee->employee_id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            {{-- Tombol untuk menghapus karyawan --}}
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                                    class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- untuk memanggil  bootstrap --}}
    @vite('resources/js/app.js')
</body>

</html>

@extends('layout.main')
<link rel="stylesheet" href="{{ asset('css/talentsearch.css') }}">
@section('title', 'Talent Search')

@section('content')

{{-- Navbar --}}
    <div class="nav">
        <div class="container">
            <div class="navbar-tengah">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link" href="/employer/jobvacancy/apllicant"><b>Job Vacancy</b></a>
                            <a class="nav-link" href="#"><b>My Candidates</b></a>
                            <a class="nav-link active" href="/employer/talentsearch"><b>Talent Search</b></a>
                            <a class="nav-link" href="#"><b>Online Testing Configuration</b></a>
                            <a class="nav-link" href="#"><b>Client Managament</b></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
{{-- EndNavbar --}}  

{{-- Search --}}
    <div class="container">
        <div class="search">
            <div class="row">
                <div class="col-md-10">
                    <form method="get" action="/employer/talentsearch/cari">
                        <div class="form-bg">
                            <input class="form-control" type="search" name="cari" value="{{ old('cari') }}" placeholder="Search by Name, Institution Name, or Job Title" aria-label="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{-- EndSearch --}}


{{-- Card --}}
        @foreach ($data_siswa as $d)
            <div class="card">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-center"><b><a href="/employer/talentsearch/profile">{{ $d->nama }}</a></b></h5>
                                <p class="text-center">{{ $d->gender }} | {{ \Carbon\Carbon::parse($d->tanggal_lahir)->diffForHumans(null, true) }}</p>
                                <a href="/employer/talentsearch/{{ $d->id }}/profile"><img class="profil" src="{{ asset('img/profil.png') }}" alt=""></a>
                                <p class="text-center" id="teks">Registered on {{ \Carbon\Carbon::parse($d->created_at)->diffForHumans(null, true) }}</p>
                            </div>
                            <div class="col-md-5">
                                <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                                <p class="teks1">{{ $d->pekerjaan->posisi }}</p>
                                <p class="kanan">at {{ $d->pekerjaan->nama_perusahaan }}</p>
                                <p class="lamakerja">{{ $d->berakhir_kerja-$d->mulai_kerja }} yrs of experience</p>

                                <img class="kiri" src="{{ asset('img/suitcase.png') }}" alt="">
                                <p class="teks1">{{ $d->pekerjaan->posisi }}</p>
                                <p class="kanan">at {{ $d->pekerjaan->nama_perusahaan }}</p>
                                <p class="lamakerja">{{ $d->berakhir_kerja-$d->mulai_kerja }} yrs of experience</p>

                                <img class="kiri" src="{{ asset('img/edu.png') }}" alt="">
                                <p class="teks">{{ $d->pendidikan->nama_sekolah }}</p>
                                <p class="kanan">{{ $d->pendidikan->jurusan }} {{ $d->pendidikan->nilai }}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="/employer/talentsearch/{{ $d->id }}/kirim_pdf">
                                    <button type="button" id="btn" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        FORWARD RESUME
                                    </button>
                                </a>
                                {{-- <a href="/employer/talentsearch/{{ $d->id }}/offer"> --}}
                                    <button type="button" id="btn1" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal1">
                                        OFFER A JOB
                                    </button>
                                <p id="alamat">{{ $d->tempat_lahir }}</p> 
                                <img id="imglocation" src="{{ asset('img/location.png') }}" alt="">
                                <p id="gaji">IDR {{ $d->mingaji }} - IDR {{ $d->maxgaji }}</p>
                                <img id="imgsalary" src="{{ asset('img/salary.png') }}" alt="">
                            </div>
                        </div>
                    </div>

                    {{-- Modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">  
                    <p class="text-center">Forward Resume to:</p>
                <div class="modal-body">
                <form method="POST" action="{{ route('email/send') }}" enctype="multipart/form-data">
                 @csrf
                    <input class="form-control text-center" type="text" name="nama" placeholder="Email Address" aria-label="Search">
                    <input type="file" class="inputfile" name="file">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    <input id="pi" type="submit" class="btn">
                </form>
                </div>
                </div>
            </div>
            </div>

            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">  
                    <p class="text-center">Are you sure you want to offer a job to this applicant?</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                    <a href="/employer/jobvacancy/apllicant">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1">YES</button>
                    </a>
                </div>
                </div>
            </div>
            </div>
    {{-- EndModal --}}
        @endforeach
        </div>
    {{-- EndCard --}}  
   

    

@endsection


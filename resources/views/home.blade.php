@extends('layouts.app')

@section('content')
    <h1 class="text-center mb-4">Welcome to the Travel Explore Dashboard</h1>

    <!-- Stats Card Section -->
    <div class="row">
        <!-- Karyawan -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Karyawan</h5>
                    <p class="card-text">
                        {{ $karyawanCount ?? 2 }} Karyawan
                    </p>
                    <a href="{{ route('karyawan.index') }}" class="btn btn-primary">Lihat Karyawan</a>
                </div>
            </div>
        </div>

        <!-- Penggajian -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Penggajian</h5>
                    <p class="card-text">
                        {{ $penggajianCount ?? 2 }} Penggajian
                    </p>
                    <a href="{{ route('penggajian.index') }}" class="btn btn-primary">Lihat Penggajian</a>
                </div>
            </div>
        </div>

        <!-- HR -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">HR</h5>
                    <p class="card-text">
                        {{ $hrCount ?? 2 }} HR
                    </p>
                    <a href="{{ route('hr.index') }}" class="btn btn-primary">Lihat HR</a>
                </div>
            </div>
        </div>

        <!-- Jadwal Kerja -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Kerja</h5>
                    <p class="card-text">
                        {{ $jadwalKerjaCount ?? 2 }} Jadwal Kerja
                    </p>
                    <a href="{{ route('jadwalkerja.index') }}" class="btn btn-primary">Lihat Jadwal Kerja</a>
                </div>
            </div>
        </div>
    </div>
@endsection

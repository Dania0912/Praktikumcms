@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">Welcome to <span class="text-primary">Travel Explore</span> Dashboard</h1>
    <p class="text-muted">Manage your data efficiently and easily</p>
</div>

<!-- Stats Cards -->
<div class="row g-4">
    @php
        $cards = [
            ['title' => 'Karyawan', 'count' => $karyawanCount ?? 2, 'route' => route('karyawan.index'), 'icon' => 'bi-person-badge'],
            ['title' => 'Penggajian', 'count' => $penggajianCount ?? 2, 'route' => route('penggajian.index'), 'icon' => 'bi-cash-stack'],
            ['title' => 'HR', 'count' => $hrCount ?? 2, 'route' => route('hr.index'), 'icon' => 'bi-people-fill'],
            ['title' => 'Cuti', 'count' => $cutiCount ?? 2, 'route' => route('cuti.index'), 'icon' => 'bi-calendar-check'],
            ['title' => 'Jadwal Kerja', 'count' => $jadwalKerjaCount ?? 2, 'route' => route('jadwalkerja.index'), 'icon' => 'bi-clock-history'],
        ];
    @endphp

    @foreach($cards as $card)
        <div class="col-lg-4 col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center">
                    <i class="bi {{ $card['icon'] }} fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">{{ $card['title'] }}</h5>
                    <p class="card-text text-muted">{{ $card['count'] }} Data</p>
                    <a href="{{ $card['route'] }}" class="btn btn-outline-primary btn-sm">Lihat {{ $card['title'] }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

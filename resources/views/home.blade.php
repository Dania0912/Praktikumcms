@extends('layouts.app')

@section('content')
<div class="bg-gradient bg-light py-5 px-4 rounded-4 shadow-sm mb-5">
  <div class="row align-items-center justify-content-between">
    <div class="col-lg-7 text-start">
      <h1 class="fw-bold display-4 mb-3 text-dark">Welcome to <span class="text-primary">Travel Explore</span></h1>
      <p class="fs-5 text-muted mb-4">
        Smart tools to manage <strong>employees, payroll, HR, and leave data</strong> in one dashboard.
      </p>
      <a href="{{ route('karyawan.index') }}" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
        Mulai Kelola Data
      </a>
    </div>
  </div>
</div>

@php
    $cards = [
        ['title' => 'Karyawan', 'count' => $karyawanCount ?? 0, 'route' => route('karyawan.index'), 'icon' => 'bi-person-badge'],
        ['title' => 'Penggajian', 'count' => $penggajianCount ?? 0, 'route' => route('penggajian.index'), 'icon' => 'bi-cash-stack'],
        ['title' => 'HR', 'count' => $hrCount ?? 0, 'route' => route('hr.index'), 'icon' => 'bi-people-fill'],
        ['title' => 'Cuti', 'count' => $cutiCount ?? 0, 'route' => route('cuti.index'), 'icon' => 'bi-calendar-check'],
        ['title' => 'Jadwal Kerja', 'count' => $jadwalKerjaCount ?? 0, 'route' => route('jadwalkerja.index'), 'icon' => 'bi-clock-history'],
    ];
@endphp

<div class="row g-4 justify-content-center">
  @foreach($cards as $card)
    <div class="col-lg-3 col-md-6">
      <div class="card border-0 shadow rounded-4 h-100 hover-shadow bg-white">
        <div class="card-body text-center py-4">
          <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mb-3" style="width: 60px; height: 60px;">
            <i class="bi {{ $card['icon'] }} text-primary fs-4"></i>
          </div>
          <h5 class="fw-semibold text-dark mb-1">{{ $card['title'] }}</h5>
          <p class="text-muted mb-3">{{ $card['count'] }} Data</p>
          <a href="{{ $card['route'] }}" class="btn btn-outline-primary btn-sm rounded-pill">
            Lihat {{ $card['title'] }}
          </a>
        </div>
      </div>
    </div>
  @endforeach
</div>


@endsection


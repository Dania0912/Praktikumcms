@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <!-- Card Total Karyawan -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">Total Karyawan</h5>
          <h3 class="card-text">{{ $totalKaryawan }}</h3>
        </div>
      </div>
    </div>

    <!-- Card Total Penggajian Bulan Ini -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">Penggajian Bulan Ini</h5>
          <h3 class="card-text">Rp {{ number_format($totalGaji, 0, ',', '.') }}</h3>
        </div>
      </div>
    </div>

    <!-- Card Jumlah Cuti Aktif -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">Cuti Aktif</h5>
          <h3 class="card-text">{{ $jumlahCutiAktif }}</h3>
        </div>
      </div>
    </div>

    <!-- Card Jadwal Kerja Aktif -->
    <div class="col-lg-3 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-body text-center">
          <h5 class="card-title">Jadwal Kerja Aktif</h5>
          <h3 class="card-text">{{ $jadwalAktif }}</h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Transaksi Gaji Terbaru -->
  <div class="row">
    <div class="col-md-6 col-lg-4 order-2 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Transaksi Gaji Terbaru</h5>
          <div class="dropdown">
            <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="#">Bulan Ini</a>
              <a class="dropdown-item" href="#">Tahun Ini</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            @foreach($transaksiGaji as $transaksi)
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <img src="{{ asset('assets/img/icons/unicons/wallet.png') }}" alt="Wallet" class="rounded">
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">{{ $transaksi->karyawan->nama }}</small>
                    <h6 class="mb-0">{{ $transaksi->keterangan }}</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0">Rp {{ number_format($transaksi->jumlah, 0, ',', '.') }}</h6>
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

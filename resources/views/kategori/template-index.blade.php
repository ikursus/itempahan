@extends('layouts.template-induk')

@section('section-page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">
        Kategori
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <span class="d-none d-sm-inline">
          <a href="{{ route('kategori.index')}}" class="btn">
            Senarai Kategori
          </a>
        </span>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Tambah Kategori
        </a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
        </a>
      </div>
    </div>
  </div>
@endsection

@section('section-page-body')
<div class="row row-deck row-cards">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kategori</h3>
        </div>
        <div class="card-body border-bottom py-3">

            <ul>
                @foreach ($senaraiKategori as $kategori)

                    <li>{{ $kategori->name }}</li>

                    @if ($kategori->child->isNotEmpty())
                        @include('kategori.template-sub-kategori', ['child' => $kategori->child])
                    @endif

                @endforeach
            </ul>

        </div>
        <div class="card-footer d-flex align-items-center">

        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.template-induk')

@section('section-page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Overview
      </div>
      <h2 class="page-title">
        File Manager
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <span class="d-none d-sm-inline">
          <a href="{{ route('file-manager.index')}}" class="btn">
            Senarai Fail
          </a>
        </span>
        <a href="{{ route('file-manager.create') }}" class="btn btn-primary d-none d-sm-inline-block">
          <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
          Tambah Fail
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
<form action="{{ route('file-manager.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row row-deck row-cards">

    <div class="col-12">

            <div class="card">
                <div class="card-header">
                <h3 class="card-title">File Manager</h3>
                </div>
                <div class="card-body border-bottom py-3">

                    @include('layouts.template-alerts')

                    <input type="file" name="fail_upload[]" class="form-control" multiple>

                </div>
                <div class="card-footer d-flex align-items-center">
                    <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                </div>
            </div>
    </div>
</div>
</form>
@endsection

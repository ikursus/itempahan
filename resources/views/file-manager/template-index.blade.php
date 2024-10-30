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
<div class="row row-deck row-cards">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">File Manager</h3>
        </div>
        <div class="card-body border-bottom py-3">


            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                    <thead>
                        <tr>
                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                        <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                        </th>
                        <th>Nama Asal Fail</th>
                        <th>Lokasi Fail</th>
                        <th>Preview Fail</th>
                        <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($senaraiFiles as $file)
                        <tr>
                            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $file->nama_fail_asal }}</td>
                            <td>{{ $file->lokasi_fail }}</td>
                            <td>
                                {{--
                                Kaedah ini boleh digunakan tetapi kurang sesuai
                                kerana blade perlu memproses dan membaca extension file.
                                Sebaiknya simpan rekod jenis extension fail sewaktu rekod
                                disimpan di dalam database
                                 --}}
                                @php
                                    $fileExt = pathinfo($file->lokasi_fail, PATHINFO_EXTENSION);
                                    $extensionImage = ['jpg', 'jpeg', 'png', 'gif'];
                                @endphp

                                @if (in_array($fileExt, $extensionImage))
                                    <img src="{{ asset($file->lokasi_fail) }}" class="img-fluid rounded" alt="Preview" width="100" height="100" />
                                @else
                                    Tiada Preview
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('file-manager.show', $file->hash_id) }}" class="btn btn-sm btn-primary">Download</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{ $senaraiFiles->links() }}

        </div>
        <div class="card-footer d-flex align-items-center">

        </div>
      </div>
    </div>
  </div>
@endsection

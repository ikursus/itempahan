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
                  <th>Invoice Subject</th>
                  <th>Client</th>
                  <th>VAT No.</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Price</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                  <td><span class="text-secondary">001401</span></td>
                  <td><a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
                  <td>
                    <span class="flag flag-xs flag-country-us me-2"></span>
                    Carlson Limited
                  </td>
                  <td>
                    87956621
                  </td>
                  <td>
                    15 Dec 2017
                  </td>
                  <td>
                    <span class="badge bg-success me-1"></span> Paid
                  </td>
                  <td>$887</td>
                  <td class="text-end">
                    <span class="dropdown">
                      <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                          Action
                        </a>
                        <a class="dropdown-item" href="#">
                          Another action
                        </a>
                      </div>
                    </span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>

        </div>
        <div class="card-footer d-flex align-items-center">

        </div>
      </div>
    </div>
  </div>
@endsection

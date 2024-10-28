@extends('layouts.template-induk')

@section('section-page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Email
      </div>
      <h2 class="page-title">
        Hantar Email
      </h2>
    </div>
  </div>
@endsection

@section('section-page-body')
<div class="row row-deck row-cards">


    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Kandungan Email</h3>
            </div>


            <form action="{{ route('hantar.email') }}" method="POST">
                @csrf
                <div class="card-body border-bottom py-3">

                    <div class="mb-3 row">
                        <label class="required">Tajuk Email</label>
                        <input type="text" class="form-control" name="tajuk_email" required>
                    </div>

                    <div class="mb-3 row">
                        <label class="required">Kandungan Email</label>
                        <textarea class="form-control" name="kandungan_email" required></textarea>
                    </div>

                </div>

                <div class="card-footer d-flex align-items-center">
                    <button type="submit" class="btn btn-primary">Hantar</button>
                    <a href="{{ route('dashboard.pelanggan') }}" class="btn btn-link">Kembali</a>
                </div>
            </form>
        </div>

    </div>
  </div>
@endsection

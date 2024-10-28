<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ config('app.name') }}</title>
    <!-- CSS files -->
    <link href="{{ asset('themes/tabler') }}/dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="{{ asset('themes/tabler') }}/dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="{{ asset('themes/tabler') }}/dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="{{ asset('themes/tabler') }}/dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="{{ asset('themes/tabler') }}/dist/css/demo.min.css?1692870487" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{ asset('themes/tabler') }}/dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset('themes/tabler') }}/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </div>
        <div class="card card-md">
            <div class="card-body">

                @yield('isi-kandungan-utama')

            </div>
        </div>
        <div class="text-center text-secondary mt-3">

            @yield('isi-kandungan-bawah')
            
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('themes/tabler') }}/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="{{ asset('themes/tabler') }}/dist/js/demo.min.js?1692870487" defer></script>
  </body>
</html>

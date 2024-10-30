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
        <form class="card card-md" action="./" method="get" autocomplete="off" novalidate>
          <div class="card-body text-center">
            <div class="mb-4">
              <h2 class="card-title">{{ config('app.name') }}</h2>
              <p class="text-secondary">Selamat Datang</p>
            </div>
            <div class="mb-4">
                Sila login ke akaun anda
            </div>
            <div>
              <a href="{{ route('login') }}" class="btn btn-primary w-100">
                <!-- Download SVG icon from http://tabler-icons.io/i/lock-open -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" /><path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M8 11v-5a4 4 0 0 1 8 0" /></svg>
                Login
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('themes/tabler') }}/dist/js/tabler.min.js?1692870487" defer></script>
    <script src="{{ asset('themes/tabler') }}/dist/js/demo.min.js?1692870487" defer></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- General CSS Files -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
<div id="app">
    <div class="main-wrapper">
        @include('layouts.elements.navbar')

        <div class="main-sidebar">
            @include('layouts.elements.sidebar')
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <router-view></router-view>
                <vue-progress-bar></vue-progress-bar>
            </section>
        </div>

        @include('layouts.elements.footer')

    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/stisla/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/stisla/stisla.js') }}"></script>
<script src="{{ asset('js/stisla/scripts.js') }}"></script>
<script src="{{ asset('js/stisla/custom.js') }}"></script>
<script src="{{ asset('js/stisla/page/forms-advanced-forms.js') }}"></script>



<!-- Page Specific JS File -->
</body>
</html>

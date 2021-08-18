<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }} | CareClick</title>
				<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-sans min-h-screen w-full bg-center" @if( Request::path() === '/login' || Request::path() === '/register' )  style="background: url('images/bg.jpg') no-repeat; background-size: cover;" @endif>
			<div id="app">
				<navb>
					<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 {{ Request::path() === '/login' || Request::path() === '/register' ? 'mt-6' : ' '}}">
						<!-- Replace with your content -->
						@yield('content')
						<!-- /End replace -->
					</div>
				</navb>
			</div>	
			
			<script>
				window.user = {!! json_encode(auth()->user()) !!};
				window.active = "{!! Request::path() !!}";
				window.title = "{!! $title !!}"
			</script>
			<script src="{{ asset('js/app.js') }}" async defer></script>
			
    </body>
</html>

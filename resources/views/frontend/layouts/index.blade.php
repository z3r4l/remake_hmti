<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Meta Tag Position --}}
    <meta name="geo.position" content="1.1325; 104.0443">
    <meta name="geo.placename" content="Batam, Kepulauan Riau, Indonesia">
    <meta name="geo.region" content="Indonesia">

    {{-- Meta Tag Keyword --}}
    <meta name="keywords" content="HMTI UIS Adalah, Himpunan uis, UIS, uis, Ibnu Sina Batam, Himatri uis, Himatri Universitas Ibnu Sina, Himatri Ibnu Sina, Teknik Informatika Ibnu Sina, Teknik Informatika Univesitas Ibnu Sina">
    
    {{-- Meta Tag Description artikel --}}
    
    <meta name="description" content="{{ $descartikel }}">

    {{-- Meta Tag Artikel For Share --}}

    <meta property="og:title" content="{{ $titleartikel }}">
    <meta property="og:description" content="{{ $descartikel }}">


    <!-- Google / Search Engine Tags -->
    <title>{{ $title }}</title>
    <link rel=" stylesheet" href="/frontend/css/home.css">
    <link rel="icon" type="image/x-icon" href="https://i.postimg.cc/3WMWymN2/LOGO-HMTI-UIS-NEW-2020.png">
    
    {{-- Start CDN Icon Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  {{-- End CDN Icon Bootstrap --}}

  {{-- Start CDN CSS Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  {{-- End CDN CSS Bootstrap --}}
  {{-- Start CDN Jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  {{-- END CDN Jquery --}}
</head>

<body>

  {{-- Start Navbar --}}
  <x-frontend.navbar />
  {{-- End Navbar --}}

  {{-- Start Verification Email --}}
      @if (Auth::check() && !Auth::user()->email_verified_at)
        <div class="alert alert-danger mb-n1 text-center " role="alert">
            Anda belum verifikasi, Verifikasi email anda
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="text-danger text-decoration-none  btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang Verifikasi') }}</button>.
            </form>
        </div>
      @endif
  {{-- End Verification Email --}}
  

  <div id="up-to-top">
    <span><img src="/frontend/img/icon/up.svg" alt=""></span>
  </div>
  {{-- Start Isi Content --}}
  <div>
    
    {{ $slot }}
    
  </div>
 
  {{-- End Isi Content --}}

  {{-- Start Footer --}}
  <x-frontend.footer />
  {{-- End Footer --}}

  {{-- START Script Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  {{-- END Script Bootstrap --}}

  {{--START Script Scroll Button Top --}}
  <script src="/frontend/js/ButtonToTop.js"></script>
  {{--END Script Scroll Button Top --}}

  {{-- Start Ajax Script Infinite Scroll --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


  {{-- END Ajax Script Infinite Scroll --}}

  {{-- Start CDN Lazy Load --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
    integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  {{-- END CDN Lazy Load --}}

</body>
</html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assetsfront/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assetsfront/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assetsfront/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsfront/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsfront/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsfront/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsfront/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsfront/css/main.css') }}" rel="stylesheet">

    <!-- Sticky -->
    <style>
        .sticky-konsul {
            position: fixed;
            z-index: 9;
            display: block;
            width: 90px;
            height: 280px;
            background: #fff;
            top: 30%;
            right: 0;
            border-radius: 16px 0 0 16px;
            box-shadow: rgb(44 112 174 / 50%) -8px 5px 20px -2px
        }

        .konsul {
            font-weight: 600;
            font-size: 13px;
            text-align: center;
            line-height: 16px;
            margin-bottom: 15px;
            background: rgb(6, 6, 179);
            border-radius: 16px 0 0 0;
            color: white;
            padding-top: 15px;
            padding-right: 5px;
            padding-left: 5px;
            padding-bottom: 10px;
        }
        
        .konsul .btn {
            color: white;
            padding: 3px;
        }

        .float {
            font-size: 13px;
            line-height: 16px;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 400
        }

        .float img {
            margin: auto
        }

        img.myfloat {
            margin: auto
        }

        a.myfloat span {
            color: #000;
            font-weight: 550;
        }

        @media only screen and (max-width:600px) {

          .sticky-konsul {
              position: fixed;
              z-index: 9;
              display: flex;
              width: -webkit-fill-available;
              height: 60px;
              background: #fff;
              bottom: 0 !important;
              top: auto;
              right: auto;
              padding: 0;
              border-radius: 16px 16px 0 0;
              box-shadow: rgb(44 112 174 / 50%) -8px 5px 20px -2px;
              margin: auto
          }

          .konsul {
              text-align: left;
              padding: 15px;
              margin: 0;
              background: blue;
              border-radius: 16px 0 0 0;
              color: white
          }

          .konsul .btn {
            color: white;
            padding-right: 30px;
            padding-left: 30px;
            }

          .float {
              font-size: 13px;
              line-height: 16px;
              text-align: left;
              margin: auto;
              font-weight: 400;
              padding: 5px 5px 5px 5px;
              width: 30%
          }

          a.myfloat {
              margin: 0;
              display: flex;
          }

          a.myfloat span {
              padding: 10px;
          }
      }

    </style>
</head>

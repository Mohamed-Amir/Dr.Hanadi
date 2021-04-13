<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <!-- Responsive Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>DR.HANADI YOUSIF</title>
    <!-- Fav Icons -->
    <link rel="shortcut icon" href="/Fronted/images/favicon.png" type="image/x-icon">

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Fronted/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/Fronted/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Fronted/css/menu.css">
    <link rel="stylesheet" href="/Fronted/css/leaflet.css">
    <link rel="stylesheet" href="/Fronted/css/flaticon.css">
    <link rel="stylesheet" href="/Fronted/css/animate.min.css">
    <link rel="stylesheet" href="/Fronted/css/spacing.min.css">
    <link rel="stylesheet" href="/Fronted/css/magnific-popup.css">
    <link rel="stylesheet" href="/Fronted/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/Fronted/css/style.css">
    <link rel="stylesheet" href="/Fronted/css/responsive.css">
    <script src="https://kit.fontawesome.com/e0387e9a75.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

@include('Fronted.layouts.header')

@yield('content')

@include('Fronted.layouts.footer')

<a class="to-top" href="/">
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</a>

@yield('script')

<!--Common JS Plugin-->
<script src="/Fronted/js/bootstrap.min.js"></script>
<script src="/Fronted/js/owl.carousel.min.js"></script>
<script src="/Fronted/js/isotope.pkgd.min.js"></script>
<script src="/Fronted/js/jquery.magnific-popup.min.js"></script>
<script src="/Fronted/js/parallax.min.js"></script>
<script src="/Fronted/js/leaflet.min.js"></script>
<script src="/Fronted/js/wow.js"></script>

<!-- Custom script -->
<script src="/Fronted/js/script.js"></script>
@yield('script')


@include('Admin.includes.scripts.AlertHelper')

    <script>
        $('#NewsForm').submit(function (e) {
            e.preventDefault();
            $("#save").attr("disabled", true);

            Toset('applying your request', 'info', 'processing your request ', false);
            var formData = new FormData($('#NewsForm')[0]);
            $.ajax({
                url: '/News',
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status == 1) {

                        $("#save").attr("disabled", false);

                        $.toast().reset('all');
                        swal(data.message, {
                            icon: "success",
                        });
                       $('#NewsForm')[0].reset();

                        $("#save").attr("disabled", false);
                    }
                }
            });
        })
    </script>
</body>
</html>



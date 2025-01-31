<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Page</title>
    @notifyCss
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('dashboard.partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column offset-md-2" style="margin-top: 100px; margin-bottom: 20px;background-color:white">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('dashboard.partials.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div style="z-index: 0;" class="container-fluid">

                    <!-- di sini adalah heading -->

                    <!-- isi konten -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('dashboard.partials.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @notifyJs
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Add this to your <body> before closing tag -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="{{asset('js/sb-admin-2.js')}}"></script>

    <script>
        //Jquery
        // Ketika tombol "Lihat Ijazah" diklik
        $('#imageModal').on('show.bs.modal', function(event) {
            // Ambil URL gambar dari tombol yang diklik
            var button = $(event.relatedTarget); // Tombol yang diklik
            var gambarUrl = button.data('ijazah'); // Ambil data gambar yang disimpan dalam tombol

            // Set gambar URL ke dalam elemen gambar di modal
            var modalGambar = $(this).find('#modalGambar');
            modalGambar.attr('src', gambarUrl);
        });
    </script>
    <script>
        document.getElementById('add-aspect-btn').addEventListener('click', function() {
            const container = document.getElementById('aspek-nilai-container');
            const newAspect = document.createElement('div');
            newAspect.classList.add('form-check', 'mb-2');
            newAspect.innerHTML = `
                <input type="text" class="form-control mb-2" name="new_aspects[]" placeholder="Nama Aspek Baru">
            `;
            container.appendChild(newAspect);
        });
    </script>
</body>

</html>
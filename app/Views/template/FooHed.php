<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        /* Center the loader */
        /* CSS untuk bintang */
        .rating {
            font-size: 24px;
            /* Ukuran bintang */
        }

        .rating input[type="radio"] {
            display: none;
            /* Sembunyikan radio button asli */
        }

        .rating label {
            cursor: pointer;
            color: gray;
            /* Warna bintang kosong */
        }

        .rating input[type="radio"]:checked+label {
            color: gold;
            /* Warna bintang terpilih */
        }


        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 120px;
            height: 120px;
            margin: -76px 0 0 -76px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
    </style>

</head>

<body onload="myFunction()" style="margin:0;">

    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="myDiv">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Foohed</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php if (logged_in()) : ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link active"><?= $username; ?> !</a>
                            </li>
                        <?php else : ?>
                            <p></p>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Layanan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/minuman">Minuman</a></li>
                            <li><a class="dropdown-item" href="/makanan">Makanan</a></li>
                            <li><a class="dropdown-item" href="#">Desert</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Menempatkan elemen "Search" di sebelah kanan -->
                <form class="d-flex ml-auto order-lg-last" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!-- Menempatkan elemen "Login" di sebelah kanan -->
                <ul class="navbar-nav ml-auto order-lg-last">
                <?php include(APPPATH . 'Views/template/Loginbutton.php'); ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="loader"></div>


    <?= $this->renderSection('content'); ?>

    <footer class="fixed-bottom bg-dark text-white text-center py-2" id="myDiv1" style="display: none;">
        &copy; Foohead Inc. <?= Date('Y') ?>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    <script>
        $(document).ready(function() {
            // Event handler untuk saat bintang rating diklik
            $('.star').on('click', function() {
                const rating = $(this).data('rating1');
                const makananId = $(this).data('makanan-id');
                $(this).addClass('selected');
                $(this).prevAll().addClass('selected');
                $(this).nextAll().removeClass('selected');
                $('button[data-makanan-id="' + makananId + '"]').data('rating11', rating); // Update nilai rating pada tombol Rate
            });

            // Event handler untuk saat tombol Rate diklik
            $('.rate-button').on('click', function() {
                const rating = $(this).data('rating1');
                const makananId = $(this).data('makanan-id');
                $.ajax({
                    url: '/rate/' + makananId + '/' + rating, // Sesuaikan dengan URL yang sesuai
                    type: 'POST',
                    success: function(response) {
                        if (response.success) {
                            alert('Rating berhasil disimpan.');
                            // Di sini Anda dapat melakukan pembaruan tampilan jika diperlukan
                        } else {
                            alert('Gagal menyimpan rating.');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan pada server.');
                    }
                });
            });
        });
    </script>



    <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 1000);
            myVar = setTimeout(Showp2, 1000);
        }

        function showPage() {
            document.getElementById("myDiv").style.display = "block";
            document.getElementById("myDiv1").style.display = "block";
            document.getElementById("myDivss").style.display = "block";
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDivssssd2").style.display = "block";
        }

        function Showp2() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDivs").style.display = "block";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
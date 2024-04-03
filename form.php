<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: pages-login.php");
    exit;
}

// Menggunakan file koneksi.php untuk melakukan koneksi ke database
include 'koneksi.php';
include 'sidebar.php';

// Query database untuk mengambil data tugas
$sql = "SELECT * FROM task";
$result = mysqli_query($koneksi, $sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    // Melakukan sesuatu dengan hasil query (misalnya, menampilkan data dalam tabel)
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi database
mysqli_close($koneksi);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>To Do List</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon2.png" rel="icon" />
    <link href="assets/img/apple-touch-icon2.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo2.png" alt="" />
                <span class="d-none d-lg-block">todolist.</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">Faiz Tedjo</span> </a><!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Faiz Tedjo</h6>
                            <span>Mahasiswa</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li> -->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> -->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->


    <!-- ######################################################################################################### -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contact</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section contact">

            <div class="row gy-4">

                <div class="col-xl">

                    <div class="col-xl">
                        <div class="card p-4">
                            <form id="contactForm" class="php-email-form">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required />
                                <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required />
                                <textarea id="message" name="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>

        </section>

    </main><!-- End #main -->
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Faizzz</span></strong> All Rights
            Reserved
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            const labelInput = document.querySelector('input[name="label"]');
            const isiInput = document.querySelector('input[name="isi"]');
            const prioritasSelect = document.querySelector('select[name="prioritas"]');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const taskId = this.getAttribute('data-id');
                    const label = this.getAttribute('data-label'); // Ambil nilai dari atribut data-label
                    const isi = this.getAttribute('data-isi'); // Ambil nilai dari atribut data-isi
                    const prioritas = this.getAttribute('data-prioritas'); // Ambil nilai dari atribut data-prioritas

                    labelInput.value = label; // Isi nilai label ke dalam input label
                    isiInput.value = isi; // Isi nilai isi ke dalam input isi
                    prioritasSelect.value = prioritas; // Isi nilai prioritas ke dalam select prioritas

                    // Set action form untuk edit_task.php dengan method POST
                    document.querySelector('form').setAttribute('action', 'edit_task.php');

                    // Buat input hidden untuk menyimpan id task yang akan di-edit
                    const idInput = document.createElement('input');
                    idInput.setAttribute('type', 'hidden');
                    idInput.setAttribute('name', 'id');
                    idInput.setAttribute('value', taskId);
                    document.querySelector('form').appendChild(idInput);
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil semua tombol hapus dan menambahkan event listener
            var deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = this.getAttribute('data-id');
                    if (confirm("Are you sure you want to delete this task?")) {
                        // Mengirim permintaan AJAX untuk menghapus tugas
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'hapus_task.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            var response = JSON.parse(xhr.responseText);
                            if (response.status === 'success') {
                                // Refresh halaman setelah berhasil menghapus
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        };
                        xhr.onerror = function() {
                            console.error("Request failed.");
                        };
                        xhr.send('id=' + id);
                    }
                });
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".complete-btn").click(function() {
                var taskId = $(this).data("id");
                $.ajax({
                    url: "tandai_task.php",
                    type: "POST",
                    data: {
                        id: taskId
                    },
                    success: function(response) {}
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("contactForm");
            var nameInput = document.getElementById("name");
            var emailInput = document.getElementById("email");

            // Mengambil nilai dari Local Storage jika ada
            var savedName = localStorage.getItem("contactName");
            var savedEmail = localStorage.getItem("contactEmail");

            // Jika nilai ada, isi input dengan nilai yang tersimpan
            if (savedName) {
                nameInput.value = savedName;
            }
            if (savedEmail) {
                emailInput.value = savedEmail;
            }

            // Event listener saat form disubmit
            form.addEventListener("submit", function(event) {
                event.preventDefault();

                var name = nameInput.value;
                var email = emailInput.value;

                // Menyimpan nilai nama dan email ke Local Storage
                localStorage.setItem("contactName", name);
                localStorage.setItem("contactEmail", email);

                // Mengambil nilai pesan dari textarea
                var message = document.getElementById("message").value;

                // Membuat pesan untuk ditampilkan dalam alert
                var alertMessage = "\nName: " + name + "\n\nEmail: " + email + "\n\nMessage: " + message;

                // Menampilkan pesan dalam alert
                alert(alertMessage);

                // Anda juga bisa melakukan submit form secara asynchronous ke server di sini jika diperlukan
            });
        });
    </script>

</body>

</html>
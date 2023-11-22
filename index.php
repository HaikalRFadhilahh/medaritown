<?php
require('./adminpanel/database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Temukan rumah impian Anda melalui landing page profesional dan galeri perumahan yang memukau di MedariTown.">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />

  <link rel="stylesheet" href="./assets/fonts/fonts.css" />
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>Medaritown House</title>
</head>

<body class="overflow-x-hidden">
  <!-- Navbar Start -->
  <nav id="mynav" class="fixed z-10 w-screen h-1/3 max-h-16 md:max-h-20 bg-primary-color">
    <div class="container flex items-center justify-center h-full mx-auto lg:justify-between lg:px-10">
      <h1 class="text-3xl font-bold text-white font-poppins">Logo</h1>
      <ul class="justify-between hidden w-2/5 text-sm font-medium text-white lg:flex font-poppins">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./gallery.php">Galeri</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Lokasi</a></li>
        <li><a href="#">Dokumen</a></li>
      </ul>
    </div>
  </nav>
  <!-- Navbar End -->
  <!-- Banner Content Start -->
  <header class="relative w-screen h-screen">
    <img src="./assets/img/gambar-header.webp" alt="Home Image" class="object-cover w-full h-full brightness-75 md:object-fill" />
    <div class="absolute top-0 flex flex-col items-center justify-center w-full h-full gap-3 px-4 md:px-0">
      <h2 class="text-3xl font-bold text-center text-white font-poppins">
        Jelajahi Koleksi Rumah Mewah Kami
      </h2>
      <p class="w-full text-base font-normal text-center text-white sm:w-1/2 lg:w-1/3 font-poppins">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
        vulputate libero et velit interdum, ac aliquet odio mattis. Class
        aptent taciti sociosqu ad litora torquent per conubia nostra, per
        inceptos himenaeos.
      </p>
    </div>
  </header>
  <!-- Banner Content End -->

  <!-- Section Tentang Kami Start -->
  <?php
  $q = "select * from bio";
  $res = mysqli_query($conn, $q)->fetch_assoc();
  ?>
  <section>
    <h2 class="mt-8 text-2xl font-bold text-center md:mt-12 md:text-3xl text-primary-color">Tentang Kami</h2>
    <div class="px-12 py-8 text-center text-primary-color flex flex-col gap-2">
      <?php echo html_entity_decode($res['keterangan']) ?>
    </div>
  </section>
  <!-- Section Tentang Kami End -->

  <!-- Section Keunggulan Kami Start -->
  <section class="py-8 mt-6 md:py-6 md:mt-0">
    <h2 class="text-2xl font-bold text-center text-primary-color md:text-3xl">Keunggulan Kami</h2>
    <div class="md:flex md:justify-center md:px-12 md:gap-8">
      <div class="py-4">
        <div class="flex items-center gap-10 px-12 mt-6 md:mt-16">
          <img src="./assets/icons/inovatif-icn.webp" alt="keunggulan">
          <div class="flex flex-col gap-2">
            <h2 class="text-lg font-bold text-primary-color md:text-xl lg:text-2xl">Desain Inovatif</h2>
            <p class="text-primary-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="flex items-center gap-10 px-12 mt-6 md:mt-16">
          <img src="./assets/icons/lokasi-icon.webp" alt="keunggulan">
          <div class="flex flex-col gap-2">
            <h2 class="text-lg font-bold text-primary-color md:text-xl lg:text-2xl">Lokasi Strategis</h2>
            <p class="text-primary-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="flex items-center gap-10 px-12 mt-6 md:mt-16">
          <img src="./assets/icons/lingkungan-icn.webp" alt="keunggulan">
          <div class="flex flex-col gap-2">
            <h2 class="text-lg font-bold text-primary-color md:text-xl lg:text-2xl">Lingkungan Terjaga</h2>
            <p class="text-primary-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
      <div class="md:py-4">
        <div class="flex items-center gap-10 px-12 mt-2 md:mt-16">
          <img src="./assets/icons/fasilitas-icn.webp" alt="keunggulan">
          <div class="flex flex-col gap-2">
            <h2 class="text-lg font-bold text-primary-color md:text-xl lg:text-2xl">Fasilitas Modern</h2>
            <p class="text-primary-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="flex items-center gap-10 px-12 mt-6 md:mt-16">
          <img src="./assets/icons/pelayanan-icn.webp" alt="keunggulan">
          <div class="flex flex-col gap-2">
            <h2 class="text-lg font-bold text-primary-color md:text-xl lg:text-2xl">Pelayanan Unggul</h2>
            <p class="text-primary-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="flex items-center gap-10 px-12 mt-6 md:mt-16">
          <img src="./assets/icons/keamanan-icn.webp" alt="keunggulan">
          <div class="flex flex-col gap-2">
            <h2 class="text-lg font-bold text-primary-color md:text-xl lg:text-2xl">Keamanan Terjaga</h2>
            <p class="text-primary-color">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section Keunggulan Kami End -->

  <!-- Section Slider Start -->
  <?php
  $q = "select * from slider";
  $res = mysqli_query($conn, $q);
  if (0 < $res->fetch_assoc()) {
  ?>
    <section>
      <div class="px-2 py-4">
        <div class="px-8 swiper mySwiper">
          <div class="py-16 swiper-wrapper">
            <?php foreach ($res as $d) { ?>
              <div class="flex flex-col items-center justify-center px-8 swiper-slide md:px-16 md:flex md:flex-row md:gap-20">
                <img src="./adminpanel/<?php echo $d['image'] ?>" alt="slider1" class="w-72 md:w-96 lg:w-[450px] aspect-square rounded-lg bg-center bg-auto">
                <div class="text-center md:text-start">
                  <h2 class="mt-6 text-2xl font-bold md:text-3xl text-primary-color"><?php echo $d['title'] ?></h2>
                  <p class="mt-4 text-primary-color"><?php echo $d['description'] ?>
                  </p>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="swiper-pagination min-h-[48px] min-w-[48px] items-end flex justify-center"></div>
        </div>
      </div>
    </section>
  <?php } ?>
  <!-- Section Slider End -->

  <!-- Section Lokasi Start -->
  <section class="px-8">
    <h2 class="mt-12 mb-4 text-2xl font-bold text-center text-primary-color md:text-3xl">Lokasi Kami</h2>
    <div>
      <p class="mb-8 text-center text-primary-color">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere
        ullam iste aperiam.
        Quo,
        blanditiis deserunt?
      </p>
      <div class="flex justify-center w-full h-[35rem] pb-16 mt-6 hover:cursor-zoom-in">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1883707432808!2d110.40727397514776!3d-7.769839677072766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5993dcd3a59f%3A0xb4f5bab3a939f52b!2sJl.%20Seturan%20Raya%2C%20Kledokan%2C%20Caturtunggal%2C%20Kec.%20Depok%2C%20Kabupaten%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sen!2sid!4v1700219152201!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" class="w-full" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </section>
  <!-- Section Lokasi End -->

  <!-- Footer Start -->
  <footer class="bg-icon-color md:h-1/2">
    <div class="md:flex md:gap-24 md:justify-center md:items-start">
      <div class="px-8 py-16 md:py-8 md:w-1/3 md:ml-12">
        <h2 class="text-2xl font-bold text-center text-white md:flex md:justify-start">Logo</h2>
        <p class="mt-4 text-center text-white md:text-left">Lorem ipsum, dolor sit amet consectetur
          adipisicing elit. Tempora,
          aspernatur.</p>
      </div>
      <div class="-mt-6 md:px-8 md:py-16 md:w-1/3">
        <h2 class="text-2xl font-bold text-center text-white">Ikuti Kami</h2>
        <div class="flex justify-center gap-4 mt-2 md:mt-4">
          <a href=""><img src="./assets/icons/facebook-icn.webp" alt="sosmed" class="w-12"></a>
          <a href=""><img src="./assets/icons/instagram-icn.webp" alt="sosmed" class="w-12"></a>
        </div>
      </div>
      <div class="pb-20 mt-8 md:mt-10 md:w-1/3">
        <h2 class="text-2xl font-bold text-center text-white">Kontak Kami</h2>
        <div>
          <div class="flex items-center justify-center gap-2 mt-4">
            <a href=""><img src="./assets/icons/telepon-icn.webp" alt="contact" class="w-12"></a>
            <h4 class="text-white">0812-3456-7890</h4>
          </div>
          <div class="flex items-center justify-center gap-2 mt-4">
            <a href=""><img src="./assets/icons/whatsapp-icn.webp" alt="contact" class="w-12"></a>
            <h4 class="text-white">0812-3456-7890</h4>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->

  <!-- Navigation For Mobile Start -->
  <nav class="fixed bottom-0 z-20 flex items-center justify-center w-screen lg:hidden h-14 bg-primary-color">
    <ul class="flex items-center justify-center w-full h-full gap-16 px-2">
      <li>
        <a href="./gallery.php">
          <img src="./assets/icons/galeri-icn.webp" alt="galeri" class="w-8">
        </a>
      </li>
      <li>
        <a href="./index.php">
          <img src="./assets/icons/home-icn.webp" alt="home" class="w-8">
        </a>
      </li>
      <li>
        <a href="#">
          <img src="./assets/icons/dokumen-icn.webp" alt="document" class="w-8">
        </a>
      </li>

    </ul>
  </nav>
  <!-- Navigation For Mobile End -->

  <!-- Javascript -->
  <!-- Swiper JS -->
  <script src="./assets/js/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      observer: true,
      ResizeObserver: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

  <script src="./assets/js/script.js"></script>
</body>

</!DOCTYPE>
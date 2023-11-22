<?php
require('./adminpanel/database/connection.php');
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
  <section class="w-screen h-[calc(100%-4rem)] relative">
    <img src="./assets/img/gambar-header.webp" alt="Home Image" class="w-full h-full brightness-75 object-cover lg:object-fill" />
    <div class="w-full h-full absolute top-0 flex flex-col justify-center items-center gap-3 px-4 md:px-0">
      <h2 class="font-poppins text-3xl font-[600] text-center text-white">
        Jelajahi Koleksi Rumah Mewah Kami
      </h2>
      <p class="w-full sm:w-1/2 lg:w-1/3 text-center font-poppins text-white text-md font-normal">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc
        vulputate libero et velit interdum, ac aliquet odio mattis. Class
        aptent taciti sociosqu ad litora torquent per conubia nostra, per
        inceptos himenaeos.
      </p>
    </div>
  </section>
  <!-- Banner Content End -->

  <!-- Section Tentang Kami Start -->
  <section>
    <h2 class="font-bold text-2xl mt-8 md:mt-12 text-center">Galeri Rumah Kami</h2>
    <div class="px-12">
      <p class="text-center mt-4 mb-8">Beberapa macam pilihan rumah yang ada di perumahan kami.</p>
    </div>
  </section>



  <!--Galery Rumah Start-->
  <?php
  $q = "select * from gallery";
  $res = mysqli_query($conn, $q);
  ?>
  <section class="w-screen">
    <div class="container mx-auto flex flex-wrap gap-y-3 lg:gap-y-6 lg:px-10">
      <?php if (0 >= $res->fetch_assoc()) { ?>
        <div class="container mx-auto flex justify-center items-center py-2">
          <h2 class="text-2xl font-poppins font-semibold text-center">Coming Soon: A Sneak Peek into Our Gallery of Elegance!</h2>
        </div>
      <?php } else { ?>
        <?php foreach ($res as $d) { ?>

          <div class="w-full lg:w-1/2 py-2 px-3 flex flex-col justify-center items-center gap-y-3">
            <img src="./adminpanel/<?php echo $d['image'] ?>" alt="Gallery Images" class="w-3/4 lg:w-2/4 rounded-lg aspect-square bg-auto bg-center object-cover">
            <h2 class="text-center text-poppins text-xl capitalize font-semibold"><?php echo $d['title'] ?></h2>
            <p class="text-center w-3/4"><?php echo $d['description'] ?></p>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
  </section>

  <!--Galery Rumah End-->

  <!-- Section Lokasi Start -->
  <section>
    <h2 class="font-bold text-2xl text-center mb-4 mt-12">Lokasi Kami</h2>
    <div>
      <p class="text-center mb-8">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere ullam iste aperiam.
        Quo,
        blanditiis deserunt?
      </p>
      <div class="p-8 w-full flex justify-center hover:cursor-zoom-in -mt-6 h-3/4">
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
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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

</html>
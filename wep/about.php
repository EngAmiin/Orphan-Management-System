<?php
session_start();
// echo $_SESSION['type'];
if (!isset($_SESSION['type'])) {
  ?>

 
   <!-- About Section - Home Page -->
      <section id="about" class="about">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row align-items-xl-center gy-5">

            <div class="col-xl-5 content">
              <h3>About Us</h3>
              <!-- <h2>Ducimus rerum libero reprehenderit cumque</h2> -->
              <p>kuso dhawaada bilciye Waxaan ka shaqaynaa qurxinta deegaanka iyo Bilicda Dalka .
                " Soo aruuri caagaga/Bacaha oo hel dhibco kuna badalo adeeg bilaash ah"
              </p>
              <a href="#" class="read-more"><span>Adeegyadeena </span><i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="col-xl-7">
              <div class="row gy-4 icon-boxes">

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-recycle"></i>
                    <h3>⁠Dib-u warshadaynta Caagaga/Bacaha</h3>
                    <p>waxan kaa iibsan doona caagadaha oo loogu talagalay in dib loo warshadeyo si an u ilaalino
                      deegankena oona uga ilaalino awal marina waxan kaga dhigo dona khashin qaadid oo free ah
                      muwadinkednow</p>
                  </div>
                </div> <!-- End Icon Box -->

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-trash2-fill"></i>
                    <h3>Qaadida Qashinka</h3>
                    <p>waxan kugu xiro doona shirkadaha khashinada qaada si khashinkada lgaga qaado xili walbo xiligad
                      ubaahato</p>
                  </div>
                </div> <!-- End Icon Box -->
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-exclamation-octagon-fill"></i>
                    <h3>⁠soo gudbinta qashin daadinta sharci darada ah</h3>
                    <p>waxana ka hor tagi doona khashinada sida sharci daradaha loogu daadiyo wadooyinka adigo noogu soo
                      gudbin doona qeybta dacweynta(reportka) waxana kgu awal marin doona muwadinkeenow in an rate kaada
                      kordhino

                    </p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-buildings-fill"></i>
                    <h3>⁠isku xir shirkadaha iyo wazarada</h3>
                    <p>waxan isku xiri doona muwadinka iyo shirkadaha sido kale shirkadaha iyo wazarada</p>
                  </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                  <div class="icon-box">
                    <i class="bi bi-buildings-fill"></i>
                    <h3>Hel Dhibco Abaal marin</h3>
                    <p>Markasta ood so gudbiso Baco/Caagag/Qashin waxaad helaysa dhibco abaal marineed oo laguugu badalayo
                      Adeeg bilaash ah.</p>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>

      </section><!-- End About Section -->

<?php
}
?>
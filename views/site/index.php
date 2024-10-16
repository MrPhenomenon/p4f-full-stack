<!-- Hero Section -->


<section id="hero" class="hero section dark-background">

    <img src="<?= Yii::getAlias('@web/images/hero-bg.jpg') ?>" alt="">

      <div class="container">
        <h2>A <strong>Bright</strong> Future<br>Awaits <strong>You</strong></h2>

      </div>

    </section>

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="19728" data-purecounter-duration=".3"
                class="purecounter"></span>
              <span>+</span>
              <p>Satisfied Customers</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1237" data-purecounter-duration=".3"
                class="purecounter"></span>
              <span>+</span>
              <p>Downloads</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="95" data-purecounter-duration=".3"
                class="purecounter"></span>
              <span>%</span>
              <p>Success Rate</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1394" data-purecounter-duration=".3"
                class="purecounter"></span>
              <p>Exams</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section>

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row ">

          <div class="col-lg-7 content">
            <h3>Voluptatem dignissimos provident quasi corporis</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. In molestias architecto non omnis provident,
              accusamus veritatis nemo dignissimos facilis illo, <br>voluptas temporibus vero tenetur ab quibusdam eius
              dolore totam! Modi aut dolores beatae quidem magnam qui repudiandae excepturi <br>tempore quae nesciunt
              odit aperiam distinctio eius amet impedit, alias itaque ipsa! </p>
          </div>

          <div class="col-lg-5">
            <img src="<?= Yii::getAlias('@web/images/about.jpg') ?>" class="img-fluid" alt="">
          </div>
        </div>
      </div>

    </section>

    <!-- Why Us Section -->
    <section id="why-us" class="section ">
        <div class="why-us min-vw-100">
      <div class="container">

        <div class="row gy-4">

          <div class="box">
            <h3 class="text-center">
              Features that Set Us Apart
            </h3>

            <ul>
              <li>
                <i class="bi bi-check-circle"></i>
                <span class="fw-bolder">Cutting-edge Real Exam Simulations</span>
                <p>
                  With Pass4Future, you can tailor your exam preparation plan to your unique needs. We offer two
                  formats, PDF and web-based practice exam software, that make your certification exam preparation a
                  personalized and efficient experience.
                </p>
              </li>
              <li>
                <i class="bi bi-check-circle"></i>
                <span class="fw-bolder">Prepare for Your Exam On the Go</span>
                <p>
                  With Pass4Future, you can tailor your exam preparation plan to your unique needs. We offer two
                  formats, PDF and web-based practice exam software, that make your certification exam preparation a
                  personalized and efficient experience.
                </p>
              </li>
              <li>
                <i class="bi bi-check-circle"></i>
                <span class="fw-bolder">Experience Excellence with a Free Demo</span>
                <p>
                  With Pass4Future, you can tailor your exam preparation plan to your unique needs. We offer two
                  formats, PDF and web-based practice exam software, that make your certification exam preparation a
                  personalized and efficient experience.
                </p>
              </li>
              <li>
                <i class="bi bi-check-circle"></i>
                <span class="fw-bolder">Multiple Formats for Personalized Learning Paths</span>
                <p>
                  With Pass4Future, you can tailor your exam preparation plan to your unique needs. We offer two
                  formats, PDF and web-based practice exam software, that make your certification exam preparation a
                  personalized and efficient experience.
                </p>
              </li>
            </ul>

          </div>

        </div>

      </div>
    </div>
    </section><!-- /Why Us Section -->

    <!-- Popular Section -->
    <section id="vendors" class="vendors section">
      <div class="container section-title">
        <h2>vendor-item</h2>
        <p>Popular Among Candidates</p>
      </div><!-- End Section Title -->
      <div class="container">
   
        <div class="row gy-4">
        <?php foreach ($vendors as $vendor): ?>

          <div class="col-lg-3 col-md-4 col-6">
            <div class="vendor-item">
              <h3>
              <a href="<?= \yii\helpers\Url::to(['site/exam', 'id' => $vendor->id]) ?>">
              <?= htmlspecialchars($vendor->name) ?>
                </a>
              </h3>
            </div>
          </div><!-- End Feature Item -->
          <?php endforeach; ?>
        </div>
     
      </div>

    </section>
    <!-- /Popular Section -->

    <!-- FAQ -->
    <section id="faq">
      <div class="container">
        <div class="section-title pb-1">
          <h2>Frequently Asked</h2>
          <p>Questions</p>
        </div>

        <!-- Accordion component -->
        <div class="accordion" id="accordion">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                aria-expanded="true" aria-controls="collapseOne">
                For how long my Product will remain valid for claiming support?
              </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse " aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  We provide product support for 90 days from the date of purchase (for Basic Plan). However, you can
                  optionally buy the extended support and product updates for upto 12 months.
                </p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                aria-expanded="true" aria-controls="collapseOne">
                How often are your products updated?
              </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse " aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  We provide product support for 90 days from the date of purchase (for Basic Plan). However, you can
                  optionally buy the extended support and product updates for upto 12 months.
                </p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                aria-expanded="true" aria-controls="collapseOne">
                Is your update free? 
              </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse " aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  We provide product support for 90 days from the date of purchase (for Basic Plan). However, you can
                  optionally buy the extended support and product updates for upto 12 months.
                </p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                aria-expanded="true" aria-controls="collapseOne">
                There has been an update but when I download I still got the old version. What should I do? 
              </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse " aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>
                  We provide product support for 90 days from the date of purchase (for Basic Plan). However, you can
                  optionally buy the extended support and product updates for upto 12 months.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <!-- /FAQ -->


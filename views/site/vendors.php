<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Exams</h1>
          <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas
            consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit
            quaerat ipsum dolorem.</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <a href="index.html">Home</a></li>
        <li class="current">Exams</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<section id="allvendors" class="allvendors container section mt-5">
  <div class="row section-title">
    <div class="col-12 col-md-8">
      <p>All Vendors</p>
    </div>

    <div class="col-12 col-md-4">
      <div class="search">
        <i class="bi bi-search"></i>
        <input type="text" class="form-control" placeholder="Search">
        <button class="btn btn-primary">Search</button>
      </div>
    </div>


  </div>
  </div><!-- End Section Title -->
  <div class="container">
    <div class="row gy-4 text-start fw-lighter">
      <?php foreach ($vendors as $vendor): ?>

        <div class="col-lg-4 col-md-6 col-12 ">
          <div class="allvendor-item">

            <h3>
              <a href="<?= \yii\helpers\Url::to(['site/exam', 'id' => $vendor->id]) ?>">
                <?= htmlspecialchars($vendor->name) ?>
              </a>
            </h3>

            <!-- Flex container to align the new divs horizontally at the end -->
            <div class="vendor-info">
              <div class="certifications-exams">
                <div class="total-certifications">
                  Total Certificates: <?= htmlspecialchars($vendor->total_certifications) ?>
                </div>
                <div class="total-exams">
                  Total Exams: <?= htmlspecialchars($vendor->total_exams) ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- End vendor Item -->
    </div>

  </div>
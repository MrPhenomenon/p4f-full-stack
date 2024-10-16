<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Contact</h1>
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
        <li><a href="index.html">Home</a></li>
        <li class="current">Contact</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section mt-5">

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-4">
        <div class="info-item d-flex" -delay="300">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h3>Address</h3>
            <p>A108 Adam Street, New York, NY 535022</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" -delay="400">
          <i class="bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Call Us</h3>
            <p>+1 5589 55488 55</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex" -delay="500">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Email Us</h3>
            <p>info@example.com</p>
          </div>
        </div><!-- End Info Item -->


      </div>


      <div class="col-lg-8">

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
          <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
          </div>
        <?php endif; ?>
        
        <form action="<?= \yii\helpers\Url::to(['site/contact']) ?>" method="post" class="php-email-form" -delay="200">
          <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="ContactForm[name]" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" name="ContactForm[email]" placeholder="Your Email" required>
            </div>
            <div class="col-md-12">
              <input type="text" class="form-control" name="ContactForm[subject]" placeholder="Subject" required>
            </div>
            <div class="col-md-12">
              <textarea class="form-control" name="ContactForm[body]" rows="6" placeholder="Message"
                required></textarea>
            </div>
            <div class="col-md-12 text-center">
              <button type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>

      <!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->

</main>
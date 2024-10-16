<?php use yii\bootstrap5\Html;
?>

<!-- Courses Course Details Section -->
<section id="courses-course-details" class="courses-course-details section container">
  <div class="d-flex justify-content-center">
    <h4 class="text-center fw-semibold">
      Updated
      <?= HTML::encode($exams[0]->vendor->name) ?>
      Certification Exams Questions
    </h4>

    <button class="ms-5 btn btn-primary add-to-cart" data-id="<?= $exams[0]->vendor->id ?>">Add to Cart</button>
  </div>
  <hr>
  <?php foreach ($exams as $exam): ?>
    <div class="container">
      <h3>
        <?= HTML::encode($exam->name) ?>
      </h3>
      <div class="row">
        <div class="col-lg-8">
          <img class="mb-4" src="img/course-1.jpg" alt="">

          <p>
            <?= nl2br(HTML::encode($exam->description)) ?>
          </p>
        </div>
        <div class="col-lg-4">

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Registration Code</h5>
            <p>
              <?= substr($exam->registration_code, 0, 2) . '-' . substr($exam->registration_code, 2, 5) . ' ' . substr($exam->registration_code, 5); ?>
            </p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Questions:</h5>
            <p>
              <?= HTML::encode($exam->number_of_questions) ?>
            </p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Updated On:</h5>
            <p>
              <?= HTML::encode($exam->updated_on) ?>
            </p>
          </div>

          <div class="course-info d-flex justify-content-between align-items-center">
            <h5>Take the Interactive Exam</h5>
            <div class="btn ">Start exam</div>
          </div>

        </div>
      </div>
      <hr>
    <?php endforeach; ?>

  </div>

</section>

<script>
  document.querySelector('.add-to-cart').addEventListener('click', function () {
    const vendorId = this.getAttribute('data-id');

    // Create form data
    const formData = new FormData();
    formData.append('id', vendorId);

    fetch('<?= yii\helpers\Url::to(["cart/add"]) ?>', {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-Token': '<?= Yii::$app->request->csrfToken ?>'
      }
    })
      .then(response => response.json())
      .then(data => {
     
        if (data.success) {
          
          let currentCount = parseInt($("#cart-item-count").text());
          $("#cart-item-count").text(currentCount + 1);

          alert('Item added to cart!');
        } else {
          alert(data.message);
        }
      })
      .catch(error => console.error('Error:', error));
  });

</script>
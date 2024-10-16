<?php
use yii\helpers\Html;
?>

<section  id="footer" class="w-100 mt-auto">
    <div class="container text-center text-white">
      <p>&copy; 2024</p>
    </div>
  </section>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

    <?= Html::jsFile('@web/js/purecounter.js') ?>


  <!-- Main JS File -->
  <?= Html::jsFile('@web/js/main.js') ?>
</body>

</html>
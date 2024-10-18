<?php
use yii\helpers\Url;
?>

<div id="cart-body" class="vh-100">
    <section class="container">
        <div class="row">
            <div class="col-xl-7 ">
                <div id="cart" class="shadow">
                    <h2>Shoping Cart
                        (<span id="total_items"><?= count($cartItems) ?></span>)
                    </h2>

                    <?php if (count($cartItems) == 0): ?>
                        <p id="empty_cart_message">Your cart is empty.</p>
                    <?php else:
                        $subtotal = 0;
                        foreach ($cartItems as $item):

                            if ($item->vendor)
                                ;
                            ?>
                            <div class="row order-item ">
                                <button class="remove-btn" data-id="<?= $item->id ?>" onclick="removeFromCart(this)">
                                    <svg width="30" height="30" viewBox="0 0 15 15" fill="#ffff"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.877075 7.49988C0.877075 3.84219 3.84222 0.877045 7.49991 0.877045C11.1576 0.877045 14.1227 3.84219 14.1227 7.49988C14.1227 11.1575 11.1576 14.1227 7.49991 14.1227C3.84222 14.1227 0.877075 11.1575 0.877075 7.49988ZM7.49991 1.82704C4.36689 1.82704 1.82708 4.36686 1.82708 7.49988C1.82708 10.6329 4.36689 13.1727 7.49991 13.1727C10.6329 13.1727 13.1727 10.6329 13.1727 7.49988C13.1727 4.36686 10.6329 1.82704 7.49991 1.82704ZM9.85358 5.14644C10.0488 5.3417 10.0488 5.65829 9.85358 5.85355L8.20713 7.49999L9.85358 9.14644C10.0488 9.3417 10.0488 9.65829 9.85358 9.85355C9.65832 10.0488 9.34173 10.0488 9.14647 9.85355L7.50002 8.2071L5.85358 9.85355C5.65832 10.0488 5.34173 10.0488 5.14647 9.85355C4.95121 9.65829 4.95121 9.3417 5.14647 9.14644L6.79292 7.49999L5.14647 5.85355C4.95121 5.65829 4.95121 5.3417 5.14647 5.14644C5.34173 4.95118 5.65832 4.95118 5.85358 5.14644L7.50002 6.79289L9.14647 5.14644C9.34173 4.95118 9.65832 4.95118 9.85358 5.14644Z"
                                            fill="#357ab8" />
                                    </svg>
                                </button>

                                <div class="col-md-2 col-4 order-md-1 order-1 course-img">
                                    <img class="img-fluid rounded-3" src="img/certification.jpg" width="100px" alt="">
                                </div>
                                <div class="col-md-5 col-sm-7 order-md-2 order-3">
                                    <h5>
                                        <?= $item->vendor->name ?>
                                        Certification Exams
                                    </h5>
                                    <h6>Product Included:</h6>
                                    <div class="item d-flex">
                                        <img src="<?= Yii::getAlias('@web/images/cart/pdf.png') ?>" alt="pdf" width="20px"
                                            height="20px">
                                        <p class="product-name"><span>Question and Answers (PDF)</span></p>
                                    </div>
                                    <div class="item d-flex">
                                        <img src="<?= Yii::getAlias('@web/images/cart/desktop.png') ?>" alt="pdf" width="20px"
                                            height="20px">
                                        <p class="product-name"><span>Desktop Practical Text Software</span></p>
                                    </div>
                                </div>
                                <div class="col-md-5 col-8 order-md-3 order-2 text-end ">
                                    <h5>Price: &dollar;
                                        <span class="order-item-price"><?= $item->vendor->price ?></span>
                                    </h5>

                                    <select class="form-select form-select-sm" aria-label="Small select example">
                                        <option selected>3 Month Product Updates</option>
                                        <option value="1">6 Month Product Updates</option>
                                        <option value="2">12 Month Product Updates</option>
                                    </select>
                                    <select class="form-select form-select-sm mt-2" aria-label="Small select example">
                                        <option selected>Indivisual 2 PCs</option>
                                        <option value="1">Corporate 10 PCs</option>
                                        <option value="2">Trainer 25 PCs</option>
                                    </select>
                                </div>
                            </div>
                            <?php $subtotal += $item->vendor->price; ?>
                        <?php endforeach; ?>

                    </div>
                </div>


                <div class="col-xl-5 ">
                    <div id="summary" class="shadow">
                        <h2>Order Summary</h2>
                        <hr>

                        <div class="d-flex justify-content-between">
                            <h5>Subtotal</h5>
                            <h5>&dollar;<span id="subtotal-value"><?= $subtotal ?></span></h5>
                            <!-- Use the id for easy access -->
                        </div>

                        <div class="d-flex justify-content-between">
                            <h5>Discount</h5>
                            <h5>&dollar;<span>0.00</span></h5>
                        </div>

                        <hr>
                        <div class="coupon">
                            <h2>Promo Code</h2>
                            <div class="coupon-input d-flex justify-content-between">
                                <input type="text" class="form-control" name="" id="" placeholder="Enter Code" />
                                <button class="btn btn-primary">Apply</button>
                            </div>

                        </div>
                    </div>
                    <div id="billing" class="shadow my-4">
                        <h2>Payment Details</h2>
                        <hr>
                        <form action="<?= yii\helpers\Url::to(['cart/process']) ?>" method="POST" id="payment-form">

                            <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>"
                                value="<?= Yii::$app->request->csrfToken ?>">
                            <div id="card-element" class="my-3"><!-- A Stripe Element will be inserted here. --></div>
                            <div id="card-errors" role="alert"><!-- display form errors. --></div>
                            <!-- Button trigger modal -->

                            <div class="text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Pay Now
                                </button>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirm Payment</h1>

                                    </div>
                                    <div class="modal-body">
                                        <p>You are about to be charged <strong>&dollar;<span
                                                    id="chargeAmount"><?= $subtotal ?></span></strong></p>

                                        <p>This action is irreversible. Please confirm that you wish to proceed with the
                                            payment.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="cancel" type="button" class="btn btn-secondary bg-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button id="confirmPayment" type="submit" class="btn btn-primary">
                                            <span id="loader" class="spinner-border visually-hidden spinner-border-sm"
                                                aria-hidden="true"></span>
                                            <span id="paynow">Process</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        <?php endif; ?>
</div>
</div>
</section>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>

    var removeFromCartUrl = '<?= Url::to(["cart/remove"]) ?>';

    var stripe = Stripe('pk_test_51Q9lXZF80WCmgfZEd8zuKAjOx9Z4vBqHh9rsfgmWT8a95B0dKETSwYLqrHC1wC0qqFIBH9ahpQrQAw9zdrfT9stR003UILjP9K');
    var elements = stripe.elements();

    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');

    // This event listener is for the modal's confirm button
    document.getElementById("confirmPayment").addEventListener("click", function () {

        document.getElementById('paynow').textContent = 'Confirming..'
        document.getElementById('loader').classList.remove('visually-hidden');
        document.getElementById('confirmPayment').disabled = true

        stripe.createToken(cardElement).then(function (result) {

            if (result.error) {
                // Show error in #card-errors
                document.getElementById('card-errors').textContent = result.error.message;

                document.getElementById('paynow').textContent = 'Error, please try again'
                document.getElementById('confirmPayment').classList.add('bg-danger')
                document.getElementById('loader').classList.add('visually-hidden');

            } else {
                // Send the token to your server
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    });

    document.getElementById("cancel").addEventListener("click", function () {
        document.getElementById('paynow').textContent = 'Process'
        document.getElementById('confirmPayment').classList.remove('bg-danger')
        document.getElementById('loader').classList.add('visually-hidden')
        document.getElementById('confirmPayment').disabled = false

    })
</script>
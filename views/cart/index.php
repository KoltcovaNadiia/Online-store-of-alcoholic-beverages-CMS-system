<?php
/** @var array $cart */

use core\Core;
use models\User;

Core::getInstance()->pageParams['title'] = 'Cart';
?>

<div class="container-fluid mt-5">
    <h1 class="mb-5 text-center fw-bold">Your Shopping Cart</h1>
    <?php if (empty($cart)) : ?>
        <div class="text-center col-12">
            <p class="mb-3 fs-5 text-muted">Your cart is empty</p>
            <a href="/product/" class="btn btn-dark rounded-pill px-4 py-2">Start Shopping</a>
        </div>
    <?php else : ?>
        <form action="" method="post" class="p-0">
            <div class="row">
                <!-- Cart Table -->
                <div class="col-lg-8">
                    <table class="table cart-table shadow-sm">
                        <thead class="table-light">
                            <tr>
                                <th class="text-uppercase fs-6 text-secondary">Product</th>
                                <th class="text-uppercase fs-6 text-secondary text-center">Quantity</th>
                                <th class="text-uppercase fs-6 text-secondary text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart['products'] as $index => $row) : ?>
                                <tr class="product align-middle">
                                    <td class="d-flex align-items-center gap-3">
                                        <div class="text-center">
                                            <?php if ($row['product']['photo']) : ?>
                                                <img src="/files/product/<?= $row['product']['photo'] ?>" class="img-fluid rounded shadow-sm" alt="<?= htmlspecialchars($row['product']['name']) ?>" style="width: 80px; height: 80px; object-fit: cover;">
                                            <?php else : ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="lightgrey">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                                </svg>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1"><?= htmlspecialchars($row['product']['name']) ?></h6>
                                            <p class="mb-0 text-muted"><?= htmlspecialchars($row['product']['short_description']) ?></p>
                                            <strong class="text-primary">$<?= number_format($row['product']['price'], 2) ?></strong>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" class="form-control rounded-pill text-center" min="1" max="<?= $row['product']['count'] ?>" name="count" id="count<?= $index ?>" value="<?= $row['count'] ?>" style="max-width: 80px;">
                                    </td>
                                    <td class="text-end">
                                        <strong class="text-success">$<?= number_format($row['product']['price'] * $row['count'], 2) ?></strong>
                                        <div>
                                            <a href="/cart/index/remove/<?= $row['product']['id'] ?>" class="btn btn-outline-danger rounded-pill px-3 py-1 mt-2">Remove</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Order Summary -->
                <div class="col-lg-4">
                    <div class="card shadow-sm p-4">
                        <h4 class="fw-bold">Order Summary</h4>
                        <hr>
                        <p class="mb-2">Subtotal <strong class="float-end">$<?= number_format($cart['total_price'], 2) ?></strong></p>
                        <p class="mb-2">Shipping <strong class="float-end text-muted">Calculated at checkout</strong></p>
                        <hr>
                        <h5 class="fw-bold mb-4">Total <strong class="float-end text-success">$<?= number_format($cart['total_price'], 2) ?></strong></h5>
                        <button type="submit" class="btn btn-primary rounded-pill w-100 py-2">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

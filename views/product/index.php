<?php
/** @var array $products */

/** @var array $categories */

use core\Core;
use models\User;

Core::getInstance()->pageParams['title'] = 'Add product page'
?>

<div class="row mb-5 mt-5">
    <div class="col-10">
        <h2 class="fw-bold">Product List</h2>
    </div>
    <?php if (User::isAdmin()) : ?>
        <div class="col-2 text-end">
            <a href="/product/add" class="btn btn-primary rounded-0">Add Product</a>
        </div>
    <?php endif; ?>
</div>

<div class="row">
    <div class="col">
        <div class="row g-4">
            <?php foreach ($products as $product) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm rounded-3 border-0 product-card">
                        <a href="/product/view/<?= $product['id'] ?>" class="text-decoration-none">
                            <div class="card-img-top">
                                <?php if ($product['photo']) : ?>
                                    <img src="/files/product/<?= $product['photo'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                <?php else : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="lightgrey"
                                         class="img-fluid" width="100" height="120" viewBox="-4 -4 25 25">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="text-muted">
                                <a href="/category/view/<?= $product['category_id'] ?>" class="text-secondary text-decoration-none">
                                    <?= \models\Category::getCategoryById($product['category_id'])['name'] ?>
                                </a>
                            </p>
                            <p class="text-success">$<?= number_format($product['price'], 2) ?></p>
                            <div class="details">
                                <p><strong>In Stock:</strong> <?= $product['count'] > 0 ? 'Yes' : 'No' ?></p>
                                <p><strong>Amount:</strong> <?= $product['count'] ?></p>
                                <p><strong>Description:</strong> <?= htmlspecialchars($product['short_description']) ?></p>
                            </div>
                            <?php if (User::isAdmin()) : ?>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="/product/edit/<?= $product['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <a href="/product/delete/<?= $product['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>





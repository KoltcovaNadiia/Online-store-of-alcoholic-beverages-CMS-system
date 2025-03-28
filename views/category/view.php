<?php
/** @var array $category */
/** @var array $products */

use core\Core;
use models\User;

Core::getInstance()->pageParams['title'] = $category['name'];
?>

<div class="row header my-5">
    <h1 class="col"><?= htmlspecialchars($category['name']) ?></h1>
    <?php if (User::isAdmin()) : ?>
        <div class="col text-end">
            <a href="/product/add/<?= $category['id'] ?>" class="btn btn-primary rounded-pill shadow-sm">Add Product</a>
        </div>
    <?php endif; ?>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <?php foreach ($products as $product) : ?>
        <div class="col">
            <div class="card shadow-sm h-100 rounded">
                <div class="card-img-top text-center p-3">
                    <a href="/product/view/<?= $product['id'] ?>">
                        <?php if ($product['photo']) : ?>
                            <img src="/files/product/<?= $product['photo'] ?>"
                                 class="img-fluid rounded"
                                 style="height: 250px; object-fit: cover;"
                                 alt="<?= htmlspecialchars($product['name']) ?>">
                        <?php else : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="lightgrey"
                                 class="img-fluid" viewBox="-1.5 -1.5 20 20" style="height: 250px;">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark">
                        <a href="/product/view/<?= $product['id'] ?>"
                           class="text-decoration-none"><?= htmlspecialchars($product['name']) ?></a>
                    </h5>
                    <p class="text-muted mb-2">$<?= $product['price'] ?></p>
                    <p class="text-secondary mb-2">
                        <a href="/category/view/<?= $product['category_id'] ?>"
                           class="text-decoration-none"><?= htmlspecialchars(\models\Category::getCategoryById($product['category_id'])['name']) ?></a>
                    </p>
                </div>
                <?php if (User::isAdmin()) : ?>
                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                        <a href="/product/edit/<?= $product['id'] ?>" class="btn btn-outline-primary btn-sm rounded-pill">Edit</a>
                        <a href="/product/delete/<?= $product['id'] ?>"
                           class="btn btn-outline-danger btn-sm rounded-pill"
                           onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

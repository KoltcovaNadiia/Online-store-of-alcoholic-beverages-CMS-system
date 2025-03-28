<?php
/** @var array $rows */

use core\Core;
use models\User;

Core::getInstance()->pageParams['title'] = 'Categories';
?>

<div class="row header my-5">
    <h2 class="col">Category List</h2>
    <?php if (User::isAdmin()) : ?>
        <div class="col text-end">
            <a href="/category/add" class="btn btn-primary rounded-pill shadow-sm">Add Category</a>
        </div>
    <?php endif; ?>
</div>

<div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($rows as $row) : ?>
        <div class="col">
            <div class="card shadow-sm h-100">
                <div class="row g-0">
                    <div class="col-md-4 text-center p-3">
                        <?php if ($row['photo']) : ?>
                            <img src="../files/category/<?= $row['photo'] ?>"
                                 class="img-fluid rounded-start"
                                 style="height: 200px; object-fit: cover;"
                                 alt="<?= htmlspecialchars($row['name']) ?>">
                        <?php else : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="lightgrey"
                                 class="img-fluid" viewBox="-1.5 -1.5 20 20" style="height: 200px;">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                            <p class="card-text text-muted"><?= htmlspecialchars($row['description']) ?></p>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-between align-items-center">
                            <a href="/category/view/<?= $row['id'] ?>" class="btn btn-dark rounded-pill">Expand</a>
                            <?php if (User::isAdmin()) : ?>
                                <div>
                                    <a href="/category/edit/<?= $row['id'] ?>" class="btn btn-outline-primary btn-sm rounded-pill">Edit</a>
                                    <a href="/category/delete/<?= $row['id'] ?>"
                                       class="btn btn-outline-danger btn-sm rounded-pill"
                                       onclick="return confirm('Are you sure you want to delete this category?')">
                                        Delete
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

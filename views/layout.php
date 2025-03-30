<?php
/** @var string $title */
/** @var string $siteName */
/** @var string $content */
/** @var int $cart */
/** @var array $categories */

use models\Category;
use models\User;

// Ініціалізація користувача
$user = User::isUserAuthenticated() ? User::getCurrentAuthenticatedUser() : null;

// Функція для безпечного виводу даних
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($siteName ?? 'Cool Sip CMS') ?> | <?= e($title ?? 'Welcome') ?></title>
    <link rel="stylesheet" href="/public/light/css/Low.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            Cool Sip <img src="/files/img/Cool Sip.png" alt="Logo" width="35" height="35" class="ms-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/product">Products</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" data-bs-toggle="dropdown">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <?php if (!empty($categories)) : ?>
                            <?php foreach ($categories as $category) : ?>
                                <li>
                                    <a class="dropdown-item" href="/category/view/<?= e($category['id']) ?>">
                                        <?= e($category['name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="#">No categories found</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
            <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div class="ms-3">
                <?php if ($user): ?>
                    <a href="/user" class="btn btn-primary">Profile</a>
                <?php else: ?>
                    <a href="/user/register" class="btn btn-outline-dark">Sign Up</a>
                <?php endif; ?>
            </div>
            <a href="/cart" class="btn btn-outline-secondary position-relative ms-3">
                <i class="bi bi-cart"></i>
                <?php if (!empty($cart)) : ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                        <?= count($cart) ?>
                    </span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</nav>

<div class="container my-4">
    <?= $content ?? '<p class="text-center fs-5">Welcome to Cool Sip CMS. Explore our collection of beverages!</p>' ?>
</div>

<footer class="py-4 mt-auto">
    <div class="container text-center">
        <p class="mb-2">&copy; <?= date('Y') ?> Cool Sip, Inc. All rights reserved.</p>
        <ul class="nav justify-content-center">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="/product" class="nav-link px-2 text-muted">Products</a></li>
        </ul>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- Cookie Consent -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>

<script>
window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    palette: {
      popup: { background: "#2e2e2e" },
      button: { background: "#f1d600" }
    },
    theme: "classic",
    position: "bottom-right",
    type: "opt-in",
    content: {
      message: "Ми використовуємо cookies для покращення вашого досвіду на сайті.",
      dismiss: "Прийняти все",
      deny: "Відхилити",
      allow: "Дозволити cookies",
      link: "Детальніше",
      href: "/privacy-policy.html"
    },
    onStatusChange: function(status) {
      console.log("Cookie статус:", status); // accepted / denied
    }
  });
});
</script>



</body>
</html>

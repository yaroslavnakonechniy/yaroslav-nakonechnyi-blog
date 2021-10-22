<?php
/** @var \Nakonechnyi\Framework\View\Renderer $this */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>yaroslav-nakonechnyi-blog</title>
    <style>
        header,
        main,
        footer {
            border: 1px dashed black;
        }

        .post-list {
            display: flex;
        }

        .post-list .product {
            max-width: 30%;
        }
    </style>
</head>
<body>
<header>
    <a href="/" title="yaroslav-nakonechnyi-blog">
        <img src="/logo.jpg" alt="Blog Logo" width="200"/>
    </a>
    <nav>
        <?= $this->render(\Nakonechnyi\Blog\Block\CategoryList::class) ?>
    </nav>
</header>

<main>
    <?= $this->render($this->getContent()) ?>
</main>

<footer>
    <nav>
        <ul>
            <li>
                <a href="/about-us">About Us</a>
            </li>
            <li>
                <a href="/terms-and-conditions">Terms & Conditions</a>
            </li>
            <li>
                <a href="/contact-us">Contact Us</a>
            </li>
        </ul>
    </nav>
    <p>© Default Value 2021. All Rights Reserved.</p>
</footer>
</body>
</html>

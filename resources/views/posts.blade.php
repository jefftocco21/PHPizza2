<!doctype html>

<title>My Blog</title>
<link rel="stylesheet" href="app.css">

<body>
    <?php foreach ($posts as $post) : ?>
    <article>
    <h1><a href="/posts/my-first-post">My First Post</a></h1>
        <?= $post; ?>
    </article>
    <?php endforeach; ?>
</body>

</html>
<?php foreach ($newsList as $news):?>

    <div class="news">
        <h3>
            <a href="<?=route('news.show', ['id' => $news['id']]) ?>"> <?= $news['title'] ?></a>
        </h3>
        <p>Category: <em><?= $news['category']['name'] ?></em> </p>
        <img src="<?= $news['image'] ?>">
        <br>
        <p>Author: <em><?= $news['author'] ?></em></p>
        <p>Status: <em><?= $news['status'] ?></em></p>
        <p><?=$news['description'] ?></p>
    </div>
    <hr>

<?php endforeach; ?>


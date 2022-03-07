<div class="news">
        <h3><?= $news['title'] ?></h3>
        <p>Category: <em><?= $news['category']['name'] ?></em> </p>
        <img src="<?= $news['image'] ?>">
        <br>
        <p>Author: <em><?= $news['author'] ?></em></p>
        <p>Status: <em><?= $news['status'] ?></em></p>
        <p><?=$news['description'] ?></p>
</div>
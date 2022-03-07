<?php foreach ($categoryList as $category):?>

<h3>
<a href="<?=route('categories.show', ['id' => $category['id']]) ?>"> <?= $category['name'] ?></a>
</h3>

<?php endforeach; ?>
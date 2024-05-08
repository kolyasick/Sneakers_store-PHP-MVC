<h1 class="text-3xl mb-5 font-bold">Редактирование категории</h1>
<?php if(!empty($error)): ?>
    <div class="bg-red p-3 border border-red-300"><?= $error?></div>
    <?php endif; ?> 
<form action="/admin/category/<?= $category->getId() ?>/edit" method="post" class="w-2/4">
    <label class="font-semibold" for="name">Название категории</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" type="text" name="title" id="title" value="<?= $_POST['title'] ?? $category->getTitle() ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="text">Описание категории</label><br>
    <textarea class="border border-gray-400 border rounded-md w-full p-1" name="description" id="description" cols="50" rows="5"><?= $_POST['description'] ?? $category->getDescription() ?></textarea><br>
    <br>
    <input class="border px-3 py-1 border-gray-400 border rounded-md cursor-pointer transition hover:bg-gray-300" type="submit" value="Редактировать">
</form>
<h1 class="text-3xl mb-5 font-bold">Редактирование товара</h1>
<?php if(!empty($error)): ?>
    <div class="bg-red p-3 border border-red-300"><?= $error?></div>
    <?php endif; ?> 
<form action="/myProject2.loc/admin/product/<?= $product->getId() ?>/edit" method="post" class="w-2/4">
<label class="font-semibold" for="name"></label><br>
    
    <label class="font-semibold" for="category_id">Категория товара</label><br>
    <select class="border border-gray-400 border rounded-md mb-3 p-1"  name="category_id" id="">
    <option selected value="<?= $category_once->getId() ?>"><?= $category_once->getTitle() ?></option>
        <?php foreach($categories as $category): ?>
            <? if(($category_once->getTitle() !== $category->getTitle())): ?>
            <option value="<?= $category->getId() ?>"><?= $category->getTitle() ?></option>
            <? endif; ?>
        <?php endforeach; ?>
    </select>
<br>
    <label class="font-semibold" for="name">Название товара</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" type="text" name="title" value="<?= $_POST['title'] ??  $product->getTitle() ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="name">Предназначение товара</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" type="text" name="content" value="<?= $_POST['content'] ?? $product->getContent() ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="name">Цена товара</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" type="number" name="price" value="<?= $_POST['price'] ?? $product->getPrice() ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="name">Старая цена товара</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" type="number" name="oldPrice" value="<?= $_POST['oldPrice'] ?? $product->getOldPrice() ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="name">Картинка товара(url)</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" type="text" name="img" value="<?= $_POST['img'] ?? $product->getImg() ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="text">Описание товара</label><br>
    <textarea class="border border-gray-400 border rounded-md w-full p-1" name="description" id="description" cols="50" rows="5"><?= $_POST['description'] ?? $product->getDescription() ?></textarea><br>
    <br>
    <input class="border px-3 py-1 border-gray-400 border rounded-md cursor-pointer transition hover:bg-gray-300" type="submit" value="Изменить">
</form>
<h1 class="text-3xl mb-5 font-bold">Создание новой статьи</h1>
<?php if(!empty($error)): ?>
    <div style="backround-color: red"><?= $error?></div>
    <?php endif; ?>
<form action="/articles/add" method="post">
    <label class="font-semibold" for="name">Название статьи</label><br>
    <input class="border border-gray-400 border rounded-md" type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="text">Текст статьи</label><br>
    <textarea class="border border-gray-400 border rounded-md" name="text" id="text" cols="80" rows="10"><?= $_POST['text'] ?? '' ?></textarea><br>
    <br>
    <input class="border px-3 py-1 border-gray-400 border rounded-md cursor-pointer transition hover:bg-gray-300" type="submit" value="Создать">
</form>
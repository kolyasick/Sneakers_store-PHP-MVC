<h1 class="text-3xl mb-5 font-bold">Добавление отзыва</h1>
<?php if(!empty($error)): ?>
    <div class="bg-red-400 p-3 border border-red-400 inline-block"><?= $error?></div>
    <?php endif; ?> 
<form class="w-1/3" action="/review/add" method="post" class="w-2/4">
<br>
    <label class="font-semibold" for="name">Ваше имя</label><br>
    <input class="border border-gray-400 border rounded-md w-full p-1" placeholder="Иван" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
    <br>
    <label class="font-semibold" for="name">Текст</label><br>
    <textarea class="border border-gray-400 border rounded-md w-full p-1" name="text" cols="30" rows="3"><?= $_POST['text'] ?? ''?></textarea><br>
    <br>
    <label class="font-semibold" for="name">Оценка</label><br>
    <select class="border border-gray-400 border rounded-md mb-3 p-1"  name="rating" >
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br>
    <br>
    <input class="border px-3 py-1 border-gray-400 border rounded-md cursor-pointer transition hover:bg-gray-300" type="submit" value="Добавить">
</form>
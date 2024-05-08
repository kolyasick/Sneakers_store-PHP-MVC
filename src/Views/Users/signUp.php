<div class="flex flex-col items-center">
<h1 class="text-3xl mb-5 font-bold">Регистрация</h1>
<?php if (!empty($error)): ?>
    <div style="
        background: red; 
        max-width: fit-content; 
        padding: 15px; 
        margin: 15px 0; 
        color: white;
        border-radius: 20px;
    "><?= $error ?></div>
<?php endif; ?>
<form class="border border-gray-400 border rounded-xl p-5 w-1/4" action="/users/register" method="POST">
    <input class="border border-gray-400 border rounded-md p-1 w-full" type="text" placeholder="Имя" name="nickname" value="<?= isset($_POST['nickname']) ? $_POST['nickname'] : ''?>"><br><br>
    <input class="border border-gray-400 border rounded-md p-1 w-full" type="text" placeholder="Почта" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>"><br><br>
    <input class="border border-gray-400 border rounded-md p-1 w-full" type="password" placeholder="Пароль" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''?>"><br><br>
    <input class="border border-gray-400 border rounded-md p-1 w-full" type="password" placeholder="Подтвердите пароль" name="repeat_password"><br><br>
    <input class="border border-gray-400 border rounded-md px-3 py-1 cursor-pointer transition hover:bg-gray-300 w-full" type="submit" value="Зарегистрироваться">
    <div class="mt-5 flex gap-2">
            <p>Есть аккаунт?</p>
            <a class="underline text-blue-500" href="/users/login">Войти</a>
        </div>
</form>

</div>
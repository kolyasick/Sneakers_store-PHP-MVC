<div class="flex flex-col items-center">
    <h1 class="text-3xl mb-5 font-bold">Вход</h1>
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
    <form class="border border-gray-400 border rounded-xl p-5 w-1/4" action="/myProject2.loc/users/login" method="POST">
        <input class="border border-gray-400 border rounded-md p-1 w-full" type="text" placeholder="email" name="email" value="<?= $_POST['email'] ?? ''?>"><br><br>
        <input class="border border-gray-400 border rounded-md p-1 w-full" type="password" placeholder="password" name="password" value="<?= $_POST['password'] ?? ''?>"><br><br>
        <input class="border border-gray-400 border rounded-md px-3 py-1 cursor-pointer transition hover:bg-gray-300 w-full" type="submit" value="Войти">
        <div class="mt-5 flex gap-2">
            <p>Нет аккунта?</p>
            <a class="underline text-blue-500" href="/myProject2.loc/users/register">Зарегистрироваться</a>
        </div>
    </form>
</div>
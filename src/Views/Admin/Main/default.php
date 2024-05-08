



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sneakers</title>
</head>
<body>
    
<div class="bg-white w-4/5 m-auto rounded-xl shadow-xl mt-14">
    
    <header class="flex justify-between border-b border-slate-200 px-10 py-8 container mx-auto">
        <div class="flex items-center gap-4">
        <img src="/public/logo.png" alt="Logo" class="w-10">
        <div class="">
            <h2 class="text-xl font-bold uppercase">
            <a href="/">PHP Sneakers</a>
            </h2>
            <p class="text-slate-400">Магазин лучших кроссовок</p>
        </div>
        </div>

        <ul class="flex items-center gap-10">

            <li class="flex items-center gap-3 cursor-pointer text-gray-500 hover:text-black">
                <img src="/public/profile.svg" alt="Profile">
                <span>
                    <a href="/users/login" class="fs-6 btn btn-outline-success text-success btn-profile"> 
                        <?= !empty($user) ? 'Привет, ' . $user->getNickname() : 'Войдите на сайт' ?>
                    </a>
                </span>
            </li>
            <li class="gap-3 cursor-pointer text-red-500 hover:text-black">
                <span>
                    <a class="" href='<?= !empty($user) ? '/users/logout' : '#' ?>'>
                        <?= !empty($user) ? 'Выйти' : '' ?>
                    </a>
                </span>
            </li>
        </ul>
    </header>

    <div class="p-10 main-wrapper">
        <h2 class="text-3xl font-bold mb-8">ПАНЕЛЬ АДМИНИСТРАЦИИ</h2> 

        
        <main class="mt-10 flex">
          <?php if (!empty($user) && $user->getRole() === 'admin') : ?> 

            <div style="min-height: 600px;" class="w-1/4 h-auto border border-slate-400 rounded-md mr-5 bg-gray-700">
                <ul class="text-gray-200 text-center">
                    <li class="border-b border-slate-400 p-2 rounded- hover:bg-slate-600 transition <?= (strpos($_GET['route'], 'admin/category/') !== false) ? 'bg-slate-600' : '' ?>">
                        <a class="block" href="/admin/category/all">Категории</a>
                    </li>
                    <li class="border-b border-slate-400 p-2 rounded- hover:bg-slate-600 transition <?= (strpos($_GET['route'], 'admin/product/') !== false) ? 'bg-slate-600' : '' ?>">
                        <a class="block" href="/admin/product/all">Товары</a>
                    </li>
                    <li class="border-b border-slate-400 p-2 rounded- hover:bg-slate-600 transition <?= (strpos($_GET['route'], 'admin/order/') !== false) ? 'bg-slate-600' : '' ?>">
                        <a class="block" href="/admin/order/all">Заказы</a>
                    </li>
                    <li class="border-b border-slate-400 p-2 rounded- hover:bg-slate-600 transition <?= (strpos($_GET['route'], 'admin/reviews/') !== false) ? 'bg-slate-600' : '' ?>">
                        <a class="block" href="/admin/review/all">Отзывы</a>
                    </li>
                </ul>
            </div>
            <div class="w-3/4 border border-slate-500 rounded-md p-3">
                <?= $content ?>
            </div>

            <?php else : ?>

            <h1 class="font-bold text-3xl text-red-500 text-center">ДОСТУП ЗАПРЕЩЕН</h1>

            <?php endif ?>
        </main>


    </div>
</div>
</body>
<script src="/js/main.js"></script>
</html>
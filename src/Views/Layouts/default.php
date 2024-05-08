<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/myProject2.loc/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sneakers</title>
</head>
<body class="bg-slate-200">
    
<div class="bg-white w-4/5 m-auto rounded-xl shadow-xl mt-14">
    
    <header class="flex justify-between border-b border-slate-200 px-10 py-8 container mx-auto">
        <div class="flex items-center gap-4">
        <img src="/myProject2.loc/public/logo.png" alt="Logo" class="w-10">
        <div class="">
            <h2 class="text-xl font-bold uppercase">
            <a href="/myProject2.loc/">PHP Sneakers</a>
            </h2>
            <p class="text-slate-400">Магазин лучших кроссовок</p>
        </div>
        </div>

        <ul class="flex items-center gap-10">
            <?php if (!empty($user) && $user->getRole() == 'admin') : ?>
                <li class="flex items-center gap-3 cursor-pointer text-gray-500 hover:text-black">
                    <a class="flex items-center gap-3" href="/myProject2.loc/admin">
                        <b class="cart">-> Админ-панель</b>
                    </a>
                </li>
            <?php endif ?>

            <li class="flex items-center gap-3 cursor-pointer text-gray-500 hover:text-black">
                <a class="flex items-center gap-3" href="/myProject2.loc/cart">
                    <img src="/myProject2.loc/public/cart.svg" alt="Cart">
                    <b class="cart">Корзина</b>
                </a>
            </li>

            <li class="flex items-center gap-3 cursor-pointer text-gray-500 hover:text-black">
                <img src="/myProject2.loc/public/profile.svg" alt="Profile">
                <span>
                    <a href="/myProject2.loc/<?= !empty($user) ? 'personal' : 'users/login' ?>" class="fs-6 btn btn-outline-success text-success btn-profile"> 
                        <?= !empty($user) ? 'Привет, ' . $user->getNickname() : 'Войдите на сайт' ?>
                    </a>
                </span>
            </li>
            <li class="gap-3 cursor-pointer text-red-500 hover:text-black">
                <span>
                    <a class="" href='<?= !empty($user) ? '/myProject2.loc/users/logout' : '#' ?>'>
                        <?= !empty($user) ? 'Выйти' : '' ?>
                    </a>
                </span>
            </li>
        </ul>
    </header>

    <div class="p-10 main-wrapper">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-bold mb-8"></h2> 

            <?php if (isset($_GET['route'])) : ?>

            <div class="flex gap-4">
                <select class=" select py-2 px-3 border rounded-md outline-none">
                    <option value="sortByName">По названию</option>
                    <option value="sortByPrice">По цене (дешевые)</option>
                    <option value="-sortByPrice">По цене (дорогие)</option>
                </select>

                <div class="relative">
                    <img class="absolute left-4 top-3" src="/myProject2.loc/public/search.svg" alt="Search">
                    <form action='/myProject2.loc/search?='<?= isset($_GET['q']) ? $_GET['q'] : ''; ?> >
                    <input id="search-input" value="<?= isset($_GET['q']) ? $_GET['q'] : ''; ?>" name="q" class="border rounded-md py-2 pl-11 pr-4 outline-none focus:border-gray-400 transition" placeholder="Поиск...">
                    </form>
                </div>
            </div>
            <?php endif ?>
        </div>
        
        <main class="mt-6">
            <?=$content ?> 
             
        </main>


    </div>
</div>

<div class="cart-wrapper hidden">
    <div class="fixed top-0 left-0 h-full w-full bg-black z-10 opacity-70"></div>
    <div class="cart-body bg-white w-96 h-full fixed right-0 top-0 z-20 p-8">
        <div class="flex items-center gap-5 mb-8">
            <svg  id="close-cart" class="cart-close opacity-30 cursor-pointer transition rotate-180 hover:opacity-100 hover:-translate-x-1" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 7H14.7143" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.71436 1L14.7144 7L8.71436 13" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h2 class="text-2xl font-bold">Корзина</h2>
        </div>

        <div class="section__cart-cardlist flex flex-col flex-1 gap-4">
           
        </div>

        <div class="flex flex-col gap-4 mt-7">
            <div class="flex gap-2">
                <span>Итого:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="total-price"></b>
            </div>

            <div class="flex gap-2">
                <span>Налог 5%:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax"></b>
            </div>

            <button  class="mt-4 bg-lime-500 w-full rounded-xl py-3 text-white cursor-pointer disabled:bg-slate-300 hover:bg-lime-600 transition active:bg-lime-700">
            Оформить заказ
            </button>
        </div>
    </div>
</div>

      <script src="/myProject2.loc/js/main.js"></script>
</body>
</html>

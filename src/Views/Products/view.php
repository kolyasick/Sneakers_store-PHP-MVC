<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
        <li>
            <a class="" href="/myProject2.loc/">Главная</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/myProject2.loc/product/all">Товары</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/myProject2.loc/product/all">Категории</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/myProject2.loc/categories/<?= $categories->getId() ?>"><?= $categories->getTitle() ?></a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="text-gray-400" href=""><?= $products->getTitle() ?></a>
        </li>
    </ul>
</div>

<div class="grid grid-cols-3 gap-5 items-end justify-center">
    <div class="relative bg-white border border-slate-200 rounded-3xl p-8 cursor-pointer transition hover:shadow-xl">
        <img src="/myProject2.loc/public/like-1.svg" alt="Like 1" class="absolute top-8 left-8">
        <a href="/myProject2.loc/product/<?= $products->getId() ?>"><img src="/myProject2.loc/public/sneakers/<?= $products->getImg() ?>" alt="Sneaker"></a>
        <p class="mt-2 font-semibold"><?= $products->getTitle() ?></p>
        <p class="mt-2"><?= $products->getContent() ?></p>
        <p class="mt-2"><b>Категория: </b><?= $categories->getTitle() ?></p>
        <div class="my-5">
        <h2 class="text-slate-400">
            Кроссовки унисекс, универсальные, красивые и очень удобные как для повседневного использования так и для профессионального спорта.
        </h2>
    </div>
        <div class="flex justify-between mt-5 mb-10">
            <div class="flex flex-col">
                <span class="text-slate-400">Цена:</span>
                <b><?= $products->getPrice() ?> руб.</b>
                <s><?= $products->getOldPrice() ?></s>
            </div>
        </div>
                <a href=<?= (isset($_SESSION['cart'][$products->getId()])) ? "/myProject2.loc/cart/delete-from-cart/" . $products->getId() : "/myProject2.loc/cart/add-to-cart/" . $products->getId(); ?> class="border p-3 rounded-xl text-white <?= (isset($_SESSION['cart'][$products->getId()])) ? "bg-gray-200 border-gray-200" : "bg-lime-500 border-lime-500" ?>" >
                <?= (isset($_SESSION['cart'][$products->getId()])) ? "В корзине" : "Добавить в корзину" ?>
            </a>
    </div>

</div>

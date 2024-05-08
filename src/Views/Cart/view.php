<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
        <li>
            <a href="/myProject2.loc/">Главная</a>
        </li>
        <li>
            >
        </li>
        <li>
            <a href="/myProject2.loc/product/all">Товары</a>
        </li>
        <li>
            >
        </li>
        <li>
            <a class="text-gray-400" href="/myProject2.loc/product/all">Корзина</a>
        </li>
    </ul>
</div>

<h1 class="font-bold text-3xl mb-10">Содержание корзины:</h1>


<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart']))  : ?>

<div class="grid grid-cols-4 gap-5">
    <?php foreach ($_SESSION['cart'] as $key => $value): ?>

                <div class="relative bg-white border border-slate-200 rounded-3xl p-8 cursor-pointer transition hover:-translate-y-2 hover:shadow-xl">
                    <a href="/myProject2.loc/cart/delete-in-cart/<?= $value['id']; ?>"><img src="/myProject2.loc/public/close.svg" alt="Like 1" class="absolute top-8 left-8"></a>
                    <img src="/myProject2.loc/public/sneakers/<?= $value['img']; ?>" alt="Sneaker">
                    <p class="mt-2 font-semibold"><?=  $value['title']; ?></p>
                    <p></p>
                    <div class="flex justify-between mt-5">
                        <div class="flex flex-col">
                            <span class="text-slate-400">Цена:</span>
                            <b><?=  $value['price']; ?> руб.</b>
                            <s></s>
                        </div>
                        <div class="flex gap-2 align-end justify-center">
                            <a href="/myProject2.loc/cart/delete/<?= $value['id']; ?>"><img width="30" class="border border-slate-300 rounded-md" src="/myProject2.loc/public/minus.svg" alt="Plus"></a>
                            <p class="text-center font-light"><b> <?= $value['qty'] ?></b></p>
                            <a class="addToCartPlus" href="/myProject2.loc/cart/add/<?= $value['id']; ?>"><img src="/myProject2.loc/public/plus.svg" alt="Plus"></a>
                        </div>
                    </div>
                </div>
    <?php endforeach; ?>
</div>

<p class=" mt-3">
    <b>Сумма: </b> <?= !(($_SESSION['cart.sum']) < 0) ? $_SESSION['cart.sum'] : $_SESSION['cart.sum'] = 0 ?> руб
    <br><br><a href="/myProject2.loc/cart/clear" class="bg-red-500 text-white p-3 rounded-md">Очистить корзину</a>
    <a href="/myProject2.loc/cart/order" class="bg-lime-500 text-white p-3 rounded-md">ОФормить заказ</a>
</p>

<?php else : ?>
    <div class="flex flex-col items-center ">
        <h2 class=" w-full text-2xl text-center">Корзина пуста</h2>
        <img class="mt-7" width="100" src="/myProject2.loc/public/emoji-2.png" alt="">
        <a style="text-decoration: none" class="text-blue-500 underline bg-blue-200 p-3 rounded mt-5" href="/myProject2.loc">Набрать товаров</a>
    </div>
    
<?php endif; ?>

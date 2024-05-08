
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

<?php if(isset($_SESSION['cart'])): ?>
    <div class="flex justify-between">
        <h1 class="font-bold text-3xl mb-10">Оформление заказа</h1>
        <h2 class="text-2xl font-bold mb-5">Ваш заказ</h2>
    </div>
    <div class="flex gap-5">
    <form class="border border-gray-300 border rounded-xl w-2/3 p-5 inline-block" action="/myProject2.loc/cart/order/post" method="POST">
        <input class="bg-gray-200 w-full border rounded-md p-2" type="text" placeholder="ФИО" name="name" value="">
        <input class="bg-gray-200 w-full rounded-md p-2 mt-5" type="e-mail" placeholder="e-mail" name="email" value="">
        <input class="bg-gray-200 w-full rounded-md p-2 mt-5" type="tel" placeholder="Телефон" name="phone" value="">
        <input class="bg-gray-200 w-full rounded-md p-2 mt-5" type="text" placeholder="Адрес доставки" name="address" value="">
        <textarea class="bg-gray-200 w-full border rounded-md p-2 mt-5" name="note" placeholder="Комментарий" cols="30" rows="5"></textarea>
        <input class="mt-5 bg-lime-500 w-full rounded-md py-3 text-white cursor-pointer disabled:bg-slate-300 hover:bg-lime-600 hover:shadow-lg transition active:bg-lime-700" type="submit" value="Оформить заказ">
    </form>

    <div class="border border-gray-300 border rounded-xl w-1/3 p-5 flex flex-col justify-between gap-4 relative">
        <div>

        <p class="text-2xl mt-5">Товары:
        </p>
        </div>

        
    <?php foreach ($_SESSION['cart'] as $key => $value): ?>
        <?php if (!$value['qty'] == 0)  : ?>
            <div class="card flex items-center border border-slate-200 p-4 rounded-xl gap-4">
                <img src="/myProject2.loc/public/sneakers/<?= $value['img']; ?>" class="w-25 h-20">
                <div class="flex flex-col">
                    <p class="mt-2"><?=  $value['title']; ?></p>
                    <div class="flex justify-between mt-2">
                        <b><?=  $value['price']; ?> руб.</b>
                    </div>
                    <p><?= $value['qty'] ?> шт.</p>
                </div>
                <img class="close-img opacity-40 hover:opacity-100 cursor-pointer transition" src="/myProject2.loc/public/close.svg">
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="self-end w-full ">
            <div class="justify-self-end mb-5">
                <p class="mt-6 font-semibold">Есть промокод на скидку?</p>
                <div class="flex gap-2 align-center"> 
                    <input class="bg-gray-200 w-2/3 border rounded-md mt-2 p-2" type="text" placeholder="Ввести промокод" name="name" value="">
                    <img class="-ms-11 mt-2" src="/myProject2.loc/public/checked.svg" alt="">
                </div>
            </div>
            <div class="flex gap-2 justify-self-end">
                <span>Кол-во:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax">
                    <?php 
                        $totalQty = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $totalQty += $value['qty'];
                        }
                        echo $totalQty . ' шт.';
                    ?>
                </b>
            </div>
            <div class="flex gap-2 justify-self-end">
                <span>Налог 5%:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax"><?php echo intval($_SESSION['cart.sum'] * 0.05) ?> руб.</b>
            </div>
            <div class="flex gap-2 justify-self-end">
                <span>Сумма с учетом налога:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax"><?php echo intval(($_SESSION['cart.sum'])) ?> руб.</b>
            </div>
    </div>
    </div>
    </div>
    <?php else : ?>
        <div class="flex justify-between">
        <h1 class="text-3xl mb-5 font-bold">Оформление заказа</h1>
        <h2 class="text-2xl font-bold mb-5">Ваш заказ</h2>
    </div>
    <div class="flex gap-5">
    <form class="border border-gray-300 border rounded-xl w-2/3 p-5 inline-block" action="/myProject2.loc/cart/order/post" method="POST">
        <input class="bg-gray-200 w-full border rounded-md p-2" type="text" placeholder="ФИО" name="name" value="">
        <input class="bg-gray-200 w-full rounded-md p-2 mt-5" type="e-mail" placeholder="e-mail" name="email" value="">
        <input class="bg-gray-200 w-full rounded-md p-2 mt-5" type="tel" placeholder="Телефон" name="phone" value="">
        <input class="bg-gray-200 w-full rounded-md p-2 mt-5" type="text" placeholder="Адрес доставки" name="address" value="">
        <textarea class="bg-gray-200 w-full border rounded-md p-2 mt-5" name="note" placeholder="Комментарий" cols="30" rows="5"></textarea>
        <input class="mt-5 bg-lime-500 w-full rounded-md py-3 text-white cursor-pointer disabled:bg-slate-300 hover:bg-lime-600 hover:shadow-lg transition active:bg-lime-700" type="submit" value="Оформить заказ">
    </form>

    <div class="border border-gray-300 border rounded-xl w-1/3 p-5 flex flex-col justify-between gap-4 relative">
        <div>

        <p class="text-2xl mt-5">Товары:
        </p>
        </div>

        


    <div class="self-end w-full ">
            <div class="justify-self-end mb-5">
                <p class="mt-6 font-semibold">Есть промокод на скидку?</p>
                <div class="flex gap-2 align-center"> 
                    <input class="bg-gray-200 w-2/3 border rounded-md mt-2 p-2" type="text" placeholder="Ввести промокод" name="name" value="">
                    <img class="-ms-11 mt-2" src="/myProject2.loc/public/checked.svg" alt="">
                </div>
            </div>
            <div class="flex gap-2 justify-self-end">
                <span>Кол-во:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax">
                </b>
            </div>
            <div class="flex gap-2 justify-self-end">
                <span>Налог 5%:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax"></b>
            </div>
            <div class="flex gap-2 justify-self-end">
                <span>Сумма с учетом налога:</span>
                <div class="flex-1 border-b border-dashed"></div>
                <b id="tax"></b>
            </div>
    </div>
    </div>
    </div>
<?php endif; ?> 

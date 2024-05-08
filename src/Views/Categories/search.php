<?php if (!empty($searchProducts)) : ?>


<div class=" mb-10">
    <h1 class="font-normal text-3xl">
        <span class="font-bold text-3xl">Запрос по поиску: </span>"<?= $_GET['q'] ?>"
    </h1>
</div>

<div class="grid grid-cols-4 gap-5">

<?php 
    foreach ($searchProducts as $product) : 
?> 
         <div class="relative bg-white border border-slate-200 rounded-3xl p-8 cursor-pointer transition hover:-translate-y-2 hover:shadow-xl">
                <img src="/myProject2.loc/public/like-1.svg" alt="Like 1" class="absolute top-8 left-8">
                <a href="/myProject2.loc/product/<?= $product->getId() ?>"><img src="/myProject2.loc/public/sneakers/<?= $product->getImg() ?>" alt="Sneaker"></a>
                <p class="mt-2 font-semibold"><?= $product->getTitle() ?></p>
                <p><?= $product->getContent() ?></p>
                <div class="flex justify-between mt-5">
                    <div class="flex flex-col">
                        <span class="text-slate-400">Цена:</span>
                        <b><?= $product->getPrice() ?> руб.</b>
                        <s><?= $product->getOldPrice() ?></s>
                    </div>
                    <a class="addToCart" href="/myProject2.loc/cart/add/<?= $product->getId() ?>"><img src="/myProject2.loc/public/plus.svg" alt="Plus"></a>
                </div>
            </div>
<?php 
    endforeach; ?>
</div> 


<?php else : ?> 

<h1>По запросу ничего не найдено</h1>

<?php endif ?>
<div class=" flex justify-center w-full text-lg" >

    <div class="flex justify-center flex-col items-start w-1/2 bg-white border border-slate-400 rounded-3xl p-8 cursor-pointer transition hover:-translate-y-2 hover:shadow-xl align-center">

        <img src="/public/like-1.svg" alt="Like 1" class="absolute top-8 left-8 self-end">

        <img  width="300" src="/public/sneakers/<?= $product->getImg()?>" alt="Sneaker">
        <p class="mb-5"><?= $product->getImg()?></p>
        <span class="text-slate-400 mt-1">Название:</span>
        <p class=""><?= $product->getTitle()?></p>
        <span class="text-slate-400 mt-1">Категория:</span>
        <p class=""><?= $category->getTitle()?></p>
        <span class="text-slate-400 mt-1">Предназначение:</span>
        <p class=""><?= $product->getContent() ?></p>
        <span class="text-slate-400 mt-1">Описание:</span>
        <p class=""><?= $product->getDescription() ?></p>

        <span class="text-slate-400">Цена:</span>
        <b><?= $product->getPrice()?></b>
        <span class="text-slate-400">Старая цена:</span>
        <s><?= $product->getOldPrice()?></s>


</div>
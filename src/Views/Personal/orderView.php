<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
        <li>
            <a class="" href="/myProject2.loc/">Главная</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/myProject2.loc/personal">Профиль</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/myProject2.loc/personal/orders">Заказы</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="text-gray-400" href="/myProject2.loc/product/all">Подробнее</a>
        </li>
    </ul>
</div>

<h1 class="font-bold text-3xl mb-10">Мои последние заказы</h1>
<?php if(!empty($error)): ?>
    <div class="bg-red p-3 border border-red-300"><?= $error?></div>
    <?php endif; ?> 
<h1>


<table class="w-full">
  <tr>
    <th class="pb-5">№</th>
    <th class="pb-5">Название</th>
    <th class="pb-5">Цена</th>
    <th class="pb-5">Кол-во</th>
    <th class="pb-5">Сумма</th>
  </tr>
  <?php $num = 0 ?>
    <?php foreach($orders as $order) : ?>
    <tr class="border border-slate-400 text-center">
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= $num += 1 ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $order->getTitle() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $order->getPrice() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= ($order->getQty() == null) ? 0 : $order->getQty() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= number_format($order->getTotal()) ?> руб.</td>  
    </tr>
    <?php endforeach ?>
</table>

<div class="grid grid-cols-4 gap-5 mt-10">
  
  

<?php foreach($products as $productsss): ?>

    <?php foreach($productsss as $product) : ?>
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
                </div>
            </div>
  
    
<?php endforeach; ?>
<?php endforeach; ?>
</div>
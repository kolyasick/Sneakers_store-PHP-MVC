<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
    <li>
            <a class="" href="/">Главная</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/personal">Профиль</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="text-gray-400" href="">Заказы</a>
        </li>
    </ul>
</div>

<h1 class="font-bold text-3xl mb-10">Мои последние заказы</h1>
<?php if(!empty($error)): ?>
    <div class="bg-red p-3 border border-red-300"><?= $error?></div>
    <?php endif; ?> 
<h1>

<?php if(!empty($orders)): ?>

<table class="w-full mb-10">
  <tr>
    <th class="pb-5">№</th>
    <th class="pb-5">Почта</th>
    <th class="pb-5">Телефон</th>
    <th class="pb-5">Адрес</th>
    <th class="pb-5">Кол-во</th>
    <th class="pb-5">Сумма</th>
    <th class="pb-5">Статус</th>
  </tr>
  <?php $num = 0 ?>
    <?php foreach($orders as $order) : ?>
    <tr class="border border-slate-400 text-center">
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= $num += 1 ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/6"><?= $order->getEmail() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $order->getPhone() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/6"><?= $order->getAddress() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= ($order->getQty() == null) ? 0 : $order->getQty() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= number_format($order->getTotal()) ?> руб.</td>  
      <td class=" flex justify-center border-y-0 px-2 py-3 w-1/8 text-center">
        <img width="30" src="/public/<?= ($order->getStatus() == 0) ? 'time-left.png' : 'checked.svg' ?>" alt="">
      </td>
    </tr>
    <?php endforeach ?>
</table>

<a class=" mt-10 border border-slate-400 p-3 hover:bg-slate-400 transition" href="/personal/<?= $order->getId() ?>/orders/view">
  Подробнее
</a>
<?php else: ?>
  <div class="flex flex-col items-center ">
        <h2 class=" text-3xl font-semibold text-red-500">У вас нет заказов</h2>
        <img class="mt-7" width="100" src="/public/emoji-2.png" alt="">
        <a style="text-decoration: none" class="text-blue-500 underline bg-blue-200 p-3 rounded mt-5" href="">Набрать товаров</a>
    </div>
<?php endif; ?>
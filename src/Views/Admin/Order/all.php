<h1 class="font-semibold text-3xl mb-10 text-center">Все заказы</h1>
<?php if(!empty($error)): ?>
    <div class="bg-red p-3 border border-red-300"><?= $error?></div>
    <?php endif; ?> 
<table class="w-full">
  <tr>
    <th class="pb-5">№</th>
    <th class="pb-5">Почта</th>
    <th class="pb-5">Телефон</th>
    <th class="pb-5">Адрес</th>
    <th class="pb-5">Кол-во</th>
    <th class="pb-5">Сумма</th>
    <th class="pb-5"></th>
    <th class="pb-5"></th>
    <th class="pb-5">Статус</th>
  </tr>
  <?php $num = 0 ?>
  <?php foreach ($orders as $order) : ?>
    
    <tr class="border border-slate-400 text-center">
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= $num += 1 ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $order->getEmail() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $order->getPhone() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $order->getAddress() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= ($order->getQty() == null) ? 0 : $order->getQty() ?></td>
      <td class="border border-slate-400 px-2 py-3 w-1/10"><?= number_format($order->getTotal()) ?> руб.</td>
      <td class="border border-slate-400 px-2 py-3 w-1/8">
        <a class="block" href="/admin/order/<?= $order->getId() ?>/view">
          <img width="30" src="/public/magnifier.png" alt="">
        </a>
      </td>
      <td class="px-2 py-3 w-1/10">
        <a class="block" href="/admin/order/<?= $order->getId() ?>/delete">
          <img width="30" src="/public/bin.png" alt="">
        </a>
      </td>      
      <td class="border border-slate-400 flex justify-center border-y-0 px-2 py-3 w-1/8 text-center">
        <img width="30" src="/public/<?= ($order->getStatus() == 0) ? 'time-left.png' : 'checked.svg' ?>" alt="">
      </td>
      <td class="px-2 py-3 w-1/8">
        <form action="/admin/order/<?= $order->getId() ?>/edit" method="post">
         <input type="hidden" name="status" value="<?= ($order->getStatus() == 0) ? 1 : 0 ?>">
          <button type="submit" class="<?= ($order->getStatus() == 0) ? "bg-lime-500" : "bg-red-500" ?>  w-full rounded-md py-1 text-white cursor-pointer disabled:bg-slate-300 hover:<?= ($order->getStatus() == 0) ? "bg-lime-600" : "bg-red-600" ?> hover:shadow-lg transition active:bg-lime-700">
          <?= ($order->getStatus() == 0) ? "Выполнить" : "Отменить" ?>
          </button>
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
</table>




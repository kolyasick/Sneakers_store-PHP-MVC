<h1 class="font-semibold text-3xl mb-10 text-center">Товары</h1>
<table class="w-full">
  <tr>
    <th class="pb-5">№</th>
    <th class="pb-5">Название</th>
    <th class="pb-5">Категория</th>
    <th class="pb-5">Описание</th>
    <th class="pb-5">Цена</th>

  </tr>
  <?php $num = 0 ?>
  <?php foreach ($products as $product) : ?>
    
    <tr class="border border-slate-400 text-center">
      <td class="border border-slate-400 px-2 py-3"><?= $num += 1 ?></td>
      <td class="border border-slate-400 px-2 py-3"><?= $product->getTitle() ?></td>
      <td class="border border-slate-400 px-2 py-3">
      
      </td>
      <td class="border border-slate-400 px-2 py-3"><?= $product->getContent() ?></td>
      <td class="border border-slate-400 px-2 py-3"><?= number_format($product->getPrice()) ?> руб.</td>
      <td class="px-2 py-3 w-1/10 flex justify-around border-0">
        <a class="block" href="/admin/product/<?= $product->getId() ?>/view">
          <img width="30" src="/public/magnifier.png" alt="">
        </a>
        <a class="block" href="/admin/product/<?= $product->getId() ?>/edit">
          <img width="30" src="/public/pencil.png" alt="">
        </a>
        <a class="block" href="/admin/product/<?= $product->getId() ?>/delete">
          <img width="30" src="/public/bin.png" alt="">
        </a>
      </td>  
    </tr>
  <?php endforeach; ?>
</table>
<a class="inline-block border-2 border-slate-400 p-3 mt-5 hover:bg-slate-300 transition font-semibold text-center" href="/admin/product/add">Добавить товар</a>
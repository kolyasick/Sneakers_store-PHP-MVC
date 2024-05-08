<h1 class="font-semibold text-3xl mb-10 text-center">Категории</h1>
<table class="w-full">
  <tr>
    <th>№</th>
    <th>Категория</th>
    <th>Название</th>
    <th>Описание</th>
  </tr>
  <?php $num = 0 ?>
  <?php foreach ($categories as $category) : ?>
  <tr class="border border-slate-400 text-center">
    <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $num += 1 ?></td>
    <td class=""></td>
    <td class="border border-slate-400 px-2 py-3 w-2/6"><?= $category->getTitle() ?></td>
    <td class="border border-slate-400 px-2 py-3 w-2/6"><?= $category->getDescription() ?></td>
    <td class="px-2 py-3 border border-slate-400 w-1/8 flex justify-around border-0">
      <a class="block" href="/admin/category/<?= $category->getId() ?>/view">
        <img width="30" src="/public/magnifier.png" alt="">
      </a>
      <a class="block" href="/admin/category/<?= $category->getId() ?>/edit">
        <img width="30" src="/public/pencil.png" alt="">
      </a>
      <a class="block" href="/admin/category/<?= $category->getId() ?>/delete">
        <img width="30" src="/public/bin.png" alt="">
      </a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<h1 class="font-semibold text-3xl mb-10 text-center mt-12">Подкатегории</h1>
<table class="w-full">
  <tr>
    <th>№</th>
    <th>Категория</th>
    <th>Название</th>
    <th>Описание</th>
  </tr>
  <?php $num = 0 ?>
  <?php foreach ($subcategories as $subcategory) : ?>
    <tr class="border border-slate-400 text-center">
  <td class="border border-slate-400 px-2 py-3 w-1/8"><?= $num += 1 ?></td>
  <td>
    <?php foreach ($categories as $cat) : ?>
      <?php if($cat->getId() == $subcategory->getParentId()) : ?>
        <?= $cat->getTitle() ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </td>
  <td class="border border-slate-400 px-2 py-3 w-2/6"><?= $subcategory->getTitle() ?></td>
  <td class="border border-slate-400 px-2 py-3 w-2/6"><?= $subcategory->getDescription() ?></td>
  <td class="px-2 py-3 border border-slate-400 w-1/8 flex justify-around border-0">
    <a class="block" href="/admin/category/<?= $subcategory->getId() ?>/view">
      <img width="30" src="/public/magnifier.png" alt="">
    </a>
    <a class="block" href="/admin/category/<?= $subcategory->getId() ?>/edit">
      <img width="30" src="/public/pencil.png" alt="">
    </a>
    <a class="block" href="/admin/category/<?= $subcategory->getId() ?>/delete">
      <img width="30" src="/public/bin.png" alt="">
    </a>
  </td>
</tr>
  <?php endforeach; ?>
</table>

<a class="inline-block border-2 font-semibold border-slate-400 p-3 mt-5 hover:bg-slate-300 transition text-center"  href="/admin/category/add">Добавить категорию</a>
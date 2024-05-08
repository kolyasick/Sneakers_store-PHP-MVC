<h1 class="font-semibold text-2xl text-center">Просмотр категории</h1>

<div class="flex flex-col mt-5 flex-wrap mx-auto items-center justify-center">
   <a class="w-1/2 border rounded-md border-gray-400 p-3 mb-2 text-center" href="/categories/<?= $category->getId() ?>">
    <div class="/categories/<?= $category->getId() ?>">
            <h2 class="category-title text-2xl font-bold mb-2 text-gray-700"><p><?= $category->getTitle() ?></p></h2>
            <p><?= $category->getDescription()?></p>
        </div>
   </a>
   <a class="border rounded-md border-red-600 p-1 text-red-700 hover:bg-red-600 hover:text-white mb-2 text-center transition" href="/admin/category/all">Назад</a>
</div>


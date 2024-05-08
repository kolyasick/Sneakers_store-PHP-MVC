<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
        <li>
            <a class="" href="/myProject2.loc/">Главная</a>
        </li>
        <li>
            >
        </li>
        <li>
            <a class="text-gray-400" href="/myProject2.loc/product/all">Товары</a>
        </li>
    </ul>
</div>

<h2 class="font-bold text-3xl mb-10">Категории:</h2>
<div class="flex mb-5 gap-3 mx-auto items-center justify-start">
<?php foreach ($categories as $category) : ?>
   <a class="w-1/4 border rounded-md border-gray-400 p-3 mb-2 text-center hover:bg-gray-300 transition" href="/myProject2.loc/categories/<?= $category->getId() ?>">
    <div class="/myProject2.loc/categories/<?= $category->getId() ?>">
            <h2 class="category-title text-2xl font-bold mb-2 text-gray-700"><p><?= $category->getTitle() ?></p></h2>
            <p><?= $category->getDescription()?></p>
        </div>
   </a>
        

<?php endforeach; ?>
</div>


<div class="grid grid-cols-4 gap-5">
  
    
<?php 
    foreach ($products as $product) : 
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
                    <a class="addToCart" 
                        href="<?= (isset($_SESSION['cart'][$product->getId()])) ? "/myProject2.loc/cart/delete-from-cart/" . $product->getId() : "/myProject2.loc/cart/add-to-cart/" . $product->getId() ?>">
                        <img src="<?= (isset($_SESSION['cart'][$product->getId()])) ? "/myProject2.loc/public/checked.svg" : "/myProject2.loc/public/plus.svg" ?>" alt="Plus">
                    </a>
                </div>
            </div>
  
            
            
<?php 
    endforeach; ?>
</div>

<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
        <li>
            <a href=""></a>
        </li>
        <li>
            <a class="" href="">Главная</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="" href="/product/all">Категории</a>
        </li>
        <li>
           >
        </li>
            <?php foreach($categories as $c): ?>
                <?php if ($_GET['route'] == 'categories/' . $c->getId()) : ?>
            <li>
                <a class="text-gray-400" href="/categories/<?= $c->getId()?>"><?= $c->getTitle()  ?> </a>
            </li>
            <?php endif ?>
            <?php endforeach; ?>
        <li>
            <?php foreach($subcategories as $s): ?>
                <?php if ($_GET['route'] == 'categories/' . $s->getId()) : ?>
            <li>
                <a class="" href="/categories/<?= $s->getParentId()?>">
                    <?php foreach($categories as $b): ?>
                        <?php if($b->getId() == $s->getParentId()) : ?>
                    <?= $b->getTitle() ?> </a> 
                    <li>></li>
                    <a class="text-gray-400" href="/categories/<?= $b->getId()?>"><?= $s->getTitle()  ?> </a> 
                    <?php endif ?>
                    <?php endforeach ?>
            </li>
            <?php endif ?>
            <?php endforeach; ?>
        </li>
        
    </ul>
</div>

<h2 class="font-bold text-3xl mb-10">Категории:</h2>
<div class="flex mb-5 gap-3 mx-auto items-center justify-start">
<?php foreach ($categories as $cat) : ?>
   <a class="w-1/4 border rounded-md border-gray-400 p-3 mb-2 text-center hover:bg-gray-300 transition <?php if($cat->getTitle() == $category->getTitle()) echo 'bg-gray-300'?>" href="<?= $cat->getId() ?>">
    <div class="">
            <h2 class="category-title text-2xl font-bold mb-2 text-gray-700"><p><?= $cat->getTitle() ?></p></h2>
            <p><?= $cat->getDescription()?></p>
        </div>
   </a>
        

<?php endforeach; ?>
</div>

<div class="flex mb-5 gap-3 mx-auto items-center justify-start">
<?php foreach ($subcategories as $subcat) : ?>
    <?php if ($category->getId() == $subcat->getParentId()) : ?>
   <a class="w-1/4 hover:bg-gray-300 border rounded-md border-gray-400 p-3 mb-2 text-center <?php if($subcat->getTitle() == $category->getTitle()) echo 'bg-gray-300'?>" href="<?= $subcat->getId() ?>">
    <div class="">
            <h2 class="category-title text-2xl font-bold mb-2 text-gray-700"><p><?= $subcat->getTitle() ?></p></h2>
            <p><?= $subcat->getDescription()?></p>
        </div>
   </a>
        
   <?php endif; ?>
<?php endforeach; ?>

</div>
    
<h2 class="text-2xl font-semibold mb-5"><?= $category->getTitle() ?></h2>


<div class="grid grid-cols-4 gap-5">
    
<?php 
    $productsFound = false;
    foreach ($products as $product) : 
        if ($product !== null) :
            $productsFound = true; 
?> 
            <div class="relative bg-white border border-slate-200 rounded-3xl p-8 cursor-pointer transition hover:-translate-y-2 hover:shadow-xl">
                <img src="/public/like-1.svg" alt="Like 1" class="absolute top-8 left-8">
                <a href="/product/<?= $product->getId() ?>"><img src="/public/sneakers/<?= $product->getImg() ?>" alt="Sneaker"></a>
                <p class="mt-2 font-semibold"><?= $product->getTitle() ?></p>
                <p><?= $product->getContent() ?></p>
                <div class="flex justify-between mt-5">
                    <div class="flex flex-col">
                        <span class="text-slate-400">Цена:</span>
                        <b><?= $product->getPrice() ?> руб.</b>
                        <s><?= $product->getOldPrice() ?></s>
                    </div>
                    <a class="addToCart" 
                        href="
                        <?= (isset($_SESSION['cart'][$product->getId()])) ? "/cart/delete-from-cart/" . $product->getId() : "/cart/add-to-cart/" . $product->getId() ?>">
                        <img 
                        src=
                        "<?= (isset($_SESSION['cart'][$product->getId()])) ? "/public/checked.svg" : "/public/plus.svg" ?>" alt="Plus">
                    </a>
                </div>
            </div>
<?php 
        endif;
    endforeach; 

    if (!$productsFound) :
?>
        

</div>

<!-- <div class="w-full mx-auto">
    <p class="font-semibold mt-5 text-center">В этой категории нет товаров</p>
    <img class="mx-auto mt-3" src="/public/emoji-1.png" width="80" alt="">
</div> -->
<?php endif; ?>


<section style="margin-top: -100px;" class="cover container rounded-xl text-slate-200 flex py-10 items-center w-full">

   <div class="cover__left-side relative w-1/2 h-4/6 border rounded-xl border-slate-200 p-5 ms-10 bg-white p-6 rounded-xl shadow-lg backdrop-blur-lg backdrop-filter backdrop-blur-lg bg-opacity-10" >
        <h1 style="padding-top: 1.3em;" class="text-5xl font-bold">Магазин лучших кроссовок</h1>
        <p class="text-xl mt-8">Мы позиционируемся на продаже самых брендированных и качественных кроссовок во всем мире!</p>
        <div class="flex gap-4 mt-10 items-center absolute bottom-10">
            <a class="border border-slate-200 p-4 rounded-md" href="/product/all">Каталог товаров</a>
           
            <a class="" href="">О нас</a>
        </div>
    </div>

</section>

<h1 class="font-bold text-4xl my-10 text-slate-700">Список наших спонсоров и брендов</h1>

<section class="brends__cover my-10">


</section>

<section class="my-10">
<h1 class="font-bold text-4xl mb-10 text-slate-700">Акции этой недели</h1>

<div class="grid grid-cols-4 gap-5">
  
    
<?php 
    foreach ($products as $product) : 
?>
    <div class="relative bg-white border border-slate-200 rounded-3xl p-8 cursor-pointer transition hover:-translate-y-2 hover:shadow-xl">
                <img src="/public/like-1.svg" alt="Like 1" class="absolute top-8 left-8">
                <a href="/product/<?= $product->getId() ?>"><img src="/public/sneakers/<?= $product->getImg() ?>" alt="Sneaker"></a>
                <p class="mt-2 font-semibold"><?= $product->getTitle() ?></p>
                <p><?= $product->getContent() ?></p>
                <div class="flex justify-between mt-5">
                    <div class="flex flex-col">
                        <span class="text-slate-400">Цена:</span>
                        <b class=""><?= $product->getPrice() ?> руб.</b>
                        <s class="text-red-700"><?= $product->getOldPrice() ?></s>
                    </div>
                    <a class="addToCart" 
                        href="<?= (isset($_SESSION['cart'][$product->getId()])) ? "/cart/delete-from-cart/" . $product->getId() : "/cart/add-to-cart/" . $product->getId() ?>">
                        <img src="<?= (isset($_SESSION['cart'][$product->getId()])) ? "/public/checked.svg" : "/public/plus.svg" ?>" alt="Plus">
                    </a>
                </div>
            </div>
  
            
            
<?php 
    endforeach; ?>
</div>
</section>

<section>
<h1 class="font-bold text-4xl my-10 text-slate-700">Категории товаров</h1>
<div class="flex mb-5 gap-3 mx-auto items-center justify-evenly">
<?php foreach ($categories as $category) : ?>
   <a class="w-1/4 hover:bg-gray-300 transition border rounded-md border-gray-400 p-3 mb-2 text-center" href="/categories/<?= $category->getId() ?>">
    <div class="/categories/<?= $category->getId() ?>">
            <h2 class="category-title text-2xl font-bold mb-2 text-gray-700"><p><?= $category->getTitle() ?></p></h2>
            <p><?= $category->getDescription()?></p>
        </div>
   </a>
        
<?php endforeach; ?>
</div>
</section>

<section id="reviews">
    <h1 class="font-bold text-4xl my-10 text-slate-700">Отзывы покупателей</h1>
    
<div class="grid grid-cols-4 gap-5">
  
    
  <?php 
      foreach ($reviews as $review) : 
  ?>
  <?php if ($review->getIsConfirmed() == 1): ?>
    <div class="relative bg-white border border-slate-200 rounded-md p-8 text-center mb-10">
        <h2 class="font-semibold text-lg text-center mb-5"><?= $review->getName() ?></h2>
        <p class="mb-5"><?= $review->getText() ?></p>
        <img width="100" class="absolute -bottom-7 left-2 text-start" src="
        <?= ($review->getRating() == 1) ? '/public/1r.png' : '' ?>
        <?= ($review->getRating() == 2) ? '/public/2r.png' : '' ?>
        <?= ($review->getRating() == 3) ? '/public/3r.png' : '' ?>
        <?= ($review->getRating() == 4) ? '/public/4r.png' : '' ?>
        <?= ($review->getRating() == 5) ? '/public/5r.png' : '' ?>
        " alt="">
    </div>
              
              
  <?php 
  endif;
      endforeach; ?>
  </div>

  <?php function checkEmail($orders, $email) {
    foreach ($orders as $order) {
        if ($order->getEmail() === $email) {
            return true;
        }
    }
    return false;
}

$emailToCheck = isset($user) ? $user->getEmail() : '';
$hasEmail = checkEmail($orders, $emailToCheck);
?>

  <?php if (!empty($user && $hasEmail)): ?>
  <a class="border border-slate-400 p-3 rounded-md hover:bg-slate-400 transition" href="/review/add">Добавить отзыв</a>
  <?php endif; ?>
</section>






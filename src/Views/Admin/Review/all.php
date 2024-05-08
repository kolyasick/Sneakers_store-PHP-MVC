<section id="reviews">
    <h1 class="font-bold text-4xl my-10 text-slate-700">Непроверенные отзывы</h1>
    
    
<div class="grid grid-cols-4 gap-5">
  
    
  <?php 
      foreach ($reviews as $review) : 
  ?>
  <?php if ($review->getIsConfirmed() == 0): ?>
    <a href="/admin/review/<?= $review->getId() ?>/view" class="">
    <div class="relative bg-white border border-slate-400 rounded-md p-8 text-center mb-10 transition hover:-translate-y-2 hover:shadow-xl">
        <h2 class="font-semibold text-lg text-center mb-5"><?= $review->getName() ?></h2>
        <p class="mb-5 w-full"><?= $review->getText() ?></p>
        <img width="100" class="absolute -bottom-7 left-2 text-start" src="
        <?= ($review->getRating() == 1) ? '/public/1r.png' : '' ?>
        <?= ($review->getRating() == 2) ? '/public/2r.png' : '' ?>
        <?= ($review->getRating() == 3) ? '/public/3r.png' : '' ?>
        <?= ($review->getRating() == 4) ? '/public/4r.png' : '' ?>
        <?= ($review->getRating() == 5) ? '/public/5r.png' : '' ?>
        " alt="">
    </div>
    </a>           
              
  <?php 
  endif;
      endforeach; ?>
  </div>

</section>

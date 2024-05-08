<div class="relative bg-white border border-slate-200 rounded-md p-8 text-center mb-10 w-3/4 mx-auto">
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
    <div class="w-3/4 mx-auto flex gap-2">
        <form action="/admin/review/<?= $review->getId() ?>/confirm" method="post">
            <input type="hidden" name="is_confirmed" value="1">
            <button type="submit" class="border border-slate-400 p-3 rounded-xl hover:bg-slate-400" href="">Выложить</button>
        </form>
        <a href="/admin/review/<?= $review->getId() ?>/delete" class="border border-red-600 p-3 rounded-xl hover:text-white hover:bg-red-600">Удалить</a>
    </div>
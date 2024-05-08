<div class="border rounded-md border-gray-400 p-3 mb-2">
    <h2 class="text-2xl font-bold mb-2 text-gray-700"><a style='text-decoration: none;' href="/articles/<?= $article->getId()?>"><?= $article->getName() ?></a></h2>
    <p><?= $article->getText()?></p>
</div>
<p class="border rounded-md border-gray-400 p-3 mb-2"> Автор: <?= $article->getAuthor()->getNickName() ?></p>
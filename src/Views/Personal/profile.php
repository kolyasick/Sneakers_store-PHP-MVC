<div class="text-center w-full mx-auto">
    <ul class="flex gap-1 items-center justify-center">
        <li>
            <a class="" href="/">Главная</a>
        </li>
        <li>
           >
        </li>
        <li>
            <a class="text-gray-400" href="/personal">Профиль</a>
        </li>
    </ul>
</div>

<h1 class="font-bold text-3xl mb-10">Мой профиль</h1>


<div class="flex gap-5">
<div class="w-1/3 border border-slate-400 rounded-xl flex items-center justify-between py-4 flex-col">
  <div class="p-5 h-auto w-3/5 flex justify-center">
    <img width="150" src="/public/user.png" alt="">
  </div>
  <hr class=" border-slate-400 mb-5 w-4/5">
  <div class="text-lg">
    <p><b>Имя: </b><?= $user->getNickname() ?></p>
    <p><b>Почта: </b><?= $user->getEmail() ?></p>
    <p class="mb-3"><b>Дата регистрации: </b><?= $user->getCreatedAt() ?></p>
    <a class="border border-gray-400 border rounded-md px-3 py-1 cursor-pointer transition hover:bg-gray-300 w-full" href="/personal/<?= $user->getId() ?>/orders">Мои заказы</a>
  </div>
</div>
<div class="flex">
<form class="border border-gray-400 border rounded-xl p-5 mb-10 inline-block h-full" action="/personal/<?= $user->getId() ?>/edit" method="POST">
    <input class="border border-gray-400 border rounded-md p-1" type="text" placeholder="Имя" name="nickname" value="<?= isset($_POST['nickname']) ? $_POST['nickname'] : $user->getNickname()?>"><br><br>
    <input class="border border-gray-400 border rounded-md p-1" type="text" placeholder="Почта" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : $user->getEmail()?>"><br><br>
    <input class="border border-gray-400 border rounded-md p-1" type="text" placeholder="Текущий пароль" name="password" value=""><br><br>
    <input class="border border-gray-400 border rounded-md p-1" type="text" placeholder="Новый пароль" name="new_password"><br><br>
    <input class="border border-gray-400 border rounded-md p-1" type="text" placeholder="Повторите пароль" name="repeat_password"><br><br>
    <input class="border border-gray-400 border rounded-md px-3 py-1 cursor-pointer transition hover:bg-gray-300 w-full" type="submit" value="Изменить">
</form> <br>
<?php if(!empty($message)): ?>
    <div class="bg-green-600 text-white px-4 py-4  border border-green-300 inline relative h-1/8 self-end ms-2 rounded-xl">
        <p><?= $message?></p>
        <a class="absolute -top-2 -right-2 text-xl" href="/personal">
            <img width="40" src="/public/krest.svg" alt="">
        </a>
    </div>
<?php endif ?> 
<?php if(!empty($error)): ?>
    <div class="bg-red-600 text-white px-4 py-4 border border-red-300 inline relative h-1/8 self-end ms-2 rounded-xl">
    <p><?= $error?></p>
        <a class="absolute -top-2 -right-2 text-xl" href="/personal">
            <img width="40" src="/public/krest.svg" alt="">
        </a>
    </div>
<?php endif ?> 
</div>
</div>



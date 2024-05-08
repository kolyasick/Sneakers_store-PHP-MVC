<h1 class="font-semibold text-3xl mb-10 text-center">Просмотр заказа</h1>


<div class="text-center border border-slate-400 rounded-md w-1/2 mx-auto flex flex-col justify-center items-center ">
    <div class="container p-3">
        <h2 class="font-bold text-center text-2xl mb-10">Заказ №<?= $order->getId() ?></h2>
        <p class="mt-1 text-start"><b>Имя:</b> <?= $order->getName() ?></p>
        <p class="mt-1 text-start"><b>Почта:</b> <?= $order->getEmail() ?></p>
        <p class="mt-1 text-start"><b>Телефон:</b> <?= $order->getPhone() ?></p>
        <p class="mt-1 text-start"><b>Адрес:</b> <?= $order->getAddress() ?></p>
        <p class="mt-1 text-start"><b>Кол-во:</b> <?= ($order->getQty() == null) ? 0 : $order->getQty() ?></p>
        <p class="mt-1 text-start"><b>Сумма:</b> <?= $order->getTotal() ?> руб.</p>
        <p class="mt-1 text-start"><b>Статус:</b> <?= ($order->getStatus() == 0) ? 'Ожидает' : 'Выполнен' ?></p>
        <p class="mt-1 text-start"><b>Сообщение:</b> <?= $order->getNote() ?></p>
        <p class="mt-1 text-start mb-5"><b>Время создания:</b> <?= $order->getCreatedAt() ?></p>
        <a class="bg-red-500 hover:bg-red-900 transition text-white rounded-md px-3 py-1" href="/admin/order/all">Назад</a>
    </div>
</div>
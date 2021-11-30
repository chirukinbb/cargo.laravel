<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<!--main page-->
<main class="pt-10 pb-20" id="page">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold">Біржа вантажів</h1>
        <div class="flex flex-col pt-4 pb-8 gap-y-2 lg:w-2/3 xl:w-1/2">
            <div id="modal">
                <button class="border-none rounded bg-blue-600 text-white font-bold py-2 px-8 inline-block mr-auto" v-on:click="showModal">
                    Додати
                </button>
                <div class="fixed inset-0 flex items-center justify-center" v-bind:class="{ hidden:isHidden }" style="background: rgba(0, 0, 0, 0.4)">
                    <!--    modal body-->
                    <div class="bg-white w-1/3 p-5 flex flex-col gap-4 relative">
                        <!--        close button-->
                        <button class="absolute right-5 top-5 h-4 w-4" v-on:click="hideModal">
                            <span class="bg-gray-300 absolute transform rotate-45 block h-0.5 w-4"></span>
                            <span class="bg-gray-300 absolute transform -rotate-45 block h-0.5 w-4"></span>
                        </button>
                        <!--        title-->
                        <h2 class="text-xl font-bold">Нове замовлення</h2>
                        <!--        form-->
                        <form class="flex flex-col gap-y-6">
                            <ul v-if="errors.length">
                                <button class="absolute right-5 top-5 h-4 w-4" v-on:click="hideErrors">
                                    <span class="bg-gray-300 absolute transform rotate-45 block h-0.5 w-4"></span>
                                    <span class="bg-gray-300 absolute transform -rotate-45 block h-0.5 w-4"></span>
                                </button>
                                <h3>Your order data contains some errors:</h3>
                                <li v-for="error in errors" v-text="error"></li>
                            </ul>
                            <div class="grid grid-cols-2 gap-4">
                                <label>
                                    <input class="border rounded py-2 px-4 w-full" type="text" v-model="cargo.from" placeholder="Звідки">
                                </label>
                                <label>
                                    <input class="border rounded py-2 px-4 w-full" type="text" v-model="cargo.to" placeholder="Куди">
                                </label>
                                <label>
                                    <input class="border rounded py-2 px-4 w-full" type="text" v-model="cargo.name" placeholder="Назва вантажу">
                                </label>
                                <label>
                                    <input class="border rounded py-2 px-4 w-full" type="text" v-model="cargo.weight" placeholder="Вага, кг">
                                </label>
                                @csrf
                            </div>
                            <button class="border-none rounded bg-blue-600 text-white font-bold py-2 px-8 inline-block ml-auto" v-on:click="createCargo">
                                Додати
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="table">
                <div class="">Всього: <span v-text="count"></span> вантажів</div>
                <div class="w-full border divide-y">
                    <div class="grid grid-cols-5 font-bold">
                        <div class="py-1 px-4">Дата</div>
                        <div class="py-1 px-4 col-span-2">Маршрут</div>
                        <div class="py-1 px-4">Вантаж</div>
                        <div class="py-1 px-4">Вага</div>
                    </div>
                    <div class="divide-y flex flex-col" v-for="cargo in cargos" v-on:click="openMap(cargo.id)" :key="cargo.id" style="cursor: pointer">
                        <div class="divide-y" v-bind:class="{ border:cargo.isOpen, 'border-blue-600':isOpen }">
                            <div class="w-full grid grid-cols-5">
                                <div class="py-1 px-4" v-text="cargo.date"></div>
                                <div class="py-1 px-4 col-span-2" v-text="cargo.route"></div>
                                <div class="py-1 px-4" v-text="cargo.name"></div>
                                <div class="py-1 px-4" v-text="cargo.weight"></div>
                            </div>
                            <div class="h-80" v-if="cargo.isOpen">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5441169.1233852515!2d26.69303850676986!3d48.248575770282166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d1d9c154700e8f%3A0x1068488f64010!2sUkraine!5e0!3m2!1sen!2sru!4v1636544003860!5m2!1sen!2sru"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--TODO Для відображення модалу видалити класс hidden у наступного блоку-->
<!--modal overlay-->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

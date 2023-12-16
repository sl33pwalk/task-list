<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Создать задачу</title>
</head>

<body>
    <form class="max-w-sm mx-auto" method="POST" action="{{url('tasks/'.$task->id)}}">
        @method('put')
        @csrf
        <div class="mb-5">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название</label>
            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $task->title }}">
        </div>
        <div class="mb-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
            <input type="text" name="description" id="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $task->description }}">
        </div>

        <!-- <div class="mb-5"> -->
        <!-- <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Статус</label> -->
        <!-- <input type="text" name="completed" id="completed" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $task->completed }}"> -->
        <!-- </div> -->

        <div class="mb-5">
            <label for="status-select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Статус:</label>

            <select name="completed" id="completed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Выполнено" {{ $task->completed == 'Выполнено' ? 'selected' : '' }}>Выполнено</option>
                <option value="Не выполнено" {{ $task->completed == 'Не выполнено' ? 'selected' : '' }}>Не выполнено</option>
            </select>
        </div>

        <button onclick="location.href='/'" type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Назад</button>

        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Изменить</button>
</body>

</html>

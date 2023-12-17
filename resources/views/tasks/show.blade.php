<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Задача</title>
</head>
<body>
    <div class="h-screen flex items-center justify-center gap-5">
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>{{ $task->title }}</li>
            <li>{{ $task->description }}</li>
            <li>{{ $task->completed }}</li>
        </ul>
        <div class="flex gap-5">
            <button onclick="location.href='/'" type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Назад</button>
        
            <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" href="{{ route('tasks.edit', $task->id) }}">
                Изменить
            </a>

            {{ Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) }}
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Удалить</button>
            {{ Form::close() }}
        </div>
    </div>
</body>
</html>
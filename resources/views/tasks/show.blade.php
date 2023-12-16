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
    <div class="h-screen flex items-center justify-center">
        <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>{{ $task->title }}</li>
            <li>{{ $task->description }}</li>
            <li>{{ $task->completed }}</li>
        </ul>
        <button onclick="location.href='/'" type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">Назад</button>
    </div>
</body>
</html>
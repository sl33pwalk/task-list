<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
    <title>Task List</title>
</head>

<body>

    Возможность сортировки задач по статусу и дате создания.

    <div class="container mt-4">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Задача
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Описание
                        </th>
                        <th scope="col" class="px-6 py-3" data-column="completed" data-direction="asc">
                            <a href="" class="sort-by-column">Статус</a>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button class="sort-by-date">Дата создания</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr class=bg-white border-b dark:bg-gray-800 dark:border-gray-700>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ $task->title }}</a>
                        </td>
                        <td class="px-6 py-4 description">
                            {{ $task->description }}
                        </td>
                        <td class="px-6 py-4 {{ $task->completed === 'Выполнено' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $task->completed }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $task->created_at }}
                        </td>
                        <td>
                            <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" href="{{ route('tasks.edit', $task->id) }}">
                                Изменить
                            </a>
                        </td>
                        <td>
                            {{ Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) }}
                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Удалить</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ url('tasks/create') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Создать
            новый</a>
</body>

</html>

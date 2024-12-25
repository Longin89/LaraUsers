<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
{

    // МЕТОД ВЫВОДА ДАННЫХ

    public function index(int $perPage = 5):object
    {
        // Получение данных в массив

        $users = User::paginate($perPage)->toArray();

        // Формирование ответа, если все хорошо

        return response()->json([
            'data' => $users['data'],
            'meta' => [
                'CurrentPage' => $users['current_page'],
                'LastPage' => $users['last_page'],
                'PerPage' => $perPage,
                'TotalElements' => $users['total'],
            ]
        ]);
    }


    // МЕТОД ДОБАВЛЕНИЯ ПОЛЬЗОВАТЕЛЯ

    public function store(StoreRequest $request):object
    {
        $data = $request->validated();
        $user = User::create($data);
        return UserResource::make($user);
    }

    // МЕТОД ВЫВОДА ОТДЕЛЬНОГО ПОЛЬЗОВАТЕЛЯ

    public function show(int $id):object
    {
        // Пробуем найти запись по ид и вывести ее

        $user = User::find($id);

        // Если запись не найдена - выводим соответствующую ошибку

        if (!$user) {
            return response()->json([
                'message' => 'Запись с указанным ID не найдена'
            ], 404);
        } else {
            return $user;
        }
    }

    // МЕТОД ДОБАВЛЕНИЯ ОТДЕЛЬНОЙ ЗАПИСИ

    public function update(UpdateRequest $request, int $id)
    {
            // Проверяем наличие записи с указанным ID и выводим, если они найдены

            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'message' => 'Запись не найдена',
                ], 404);
            }

            else {

                // Валидируем входные данные

                $validatedData = $request->validated();

                // Обновляем только те поля, которые были отправлены в запросе и существуют

                $user->update(array_intersect_key($validatedData, $user->getAttributes()));
            }
    }

    // МЕТОД ДЛЯ УДАЛЕНИЯ ОТДЕЛЬНОЙ ЗАПИСИ

    public function destroy(int $id):object
    {

        // Ищем запись, если ее нет - выводим ошибку

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Запись не найдена'
            ], 404);
        } else {
            $user->delete();
            return response()->json([
                'message' => 'Запись успешно удалена',
            ], 200);
        }
    }
}

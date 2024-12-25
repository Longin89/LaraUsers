<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

//  Контроллер используется для вынесения в отдельный файл документации для Swagger

/**
 *
 * @OA\Info(
 *      title="Users API",
 *      version="1.0.0"
 * ),
 *
 * @OA\PathItem(
 *      path="/api/"
 * ),
 *
 * @OA\Post(
 *     path="/api/users",
 *     summary="Добавить нового пользователя",
 *     tags={"Users"},
 *
 *  @OA\RequestBody(
 *      @OA\JsonContent(
 *          allOf={
 *              @OA\Schema(
 *                  @OA\Property(property="name", type="string", example="Ivan Ivanov"),
 *                  @OA\Property(property="email", type="email", example="test@mail.ru"),
 *                  @OA\Property(property="password", type="string", example="qwerty"),
 *                  @OA\Property(property="ip", type="string", example="192.168.1.1"),
 *                  @OA\Property(property="comment", type="string", example="Some comment..."),
 *                  )
 *                }
 *              )
 *            ),
 *
 * @OA\Response(
 *      response=201,
 *      description="Запись успешно создана",
 *      @OA\JsonContent(
 *      @OA\Property(property="data", type="object",
 *          @OA\Property(property="name", type="string", example="Ivan Ivanov"),
 *          @OA\Property(property="email", type="email", example="test@mail.ru"),
 *          @OA\Property(property="ip", type="string", example="192.168.1.1"),
 *          @OA\Property(property="comment", type="string", example="Some comment..."),
 *          @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z"),
 *          @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *          @OA\Property(property="id", type="integer", example=1),
 *          ),
 *        ),
 *      ),
 *
 * @OA\Get(
 *  path="/api/users",
 *  summary="Вывести список всех пользователей и пагинацию",
 *  tags={"Users"},
 * @OA\Response(
 *  response=200,
 *  description="Список пользователей",
 *  @OA\JsonContent(
 *       @OA\Property(property="data", type="array", @OA\Items(
 *          @OA\Property(property="id", type="integer", example=1),
 *          @OA\Property(property="name", type="string", example="Ivan Ivanov"),
 *          @OA\Property(property="email", type="email", example="test@mail.ru"),
 *          @OA\Property(property="ip", type="string", example="192.168.1.1"),
 *          @OA\Property(property="comment", type="string", example="Some comment..."),
 *          @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z"),
 *          @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *       ),
 *     ),
 *
 *          ),
 *        ),
 *      ),
 *
 * @OA\Get(
 *      path="/api/users/{user}",
 *      summary="Вывести пользователя по ID",
 *      tags={"Users"},
 * @OA\Parameter(
 *      description="User ID",
 *      in="path",
 *      name="user",
 *      required=true,
 *      example=1
 *      ),
 *
 * @OA\Response(
 *      response=200,
 *      description="Успешный вывод пользователя",
 *      @OA\JsonContent(
 *              @OA\Property(property="id", type="integer", example=1),
 *              @OA\Property(property="name", type="string", example="Ivan Ivanov"),
 *              @OA\Property(property="email", type="email", example="test@mail.ru"),
 *              @OA\Property(property="ip", type="string", example="192.168.1.1"),
 *              @OA\Property(property="comment", type="string", example="Some comment..."),
 *              @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z"),
 *              @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z")
 *              ),
 *            ),
 *          ),
 *
 * @OA\Put(
 *      path="/api/users/{user}",
 *      summary="Обновить информацию о пользователе по ID",
 *      tags={"Users"},
 *      @OA\Parameter(
 *          description="User ID",
 *          in="path",
 *          name="user",
 *          required=true,
 *          example=1
 *      ),
 *
 * @OA\RequestBody(
 *   @OA\JsonContent(
 *      allOf={
 *          @OA\Schema(
 *              @OA\Property(property="name", type="string", example="Ivan Ivanov"),
 *              @OA\Property(property="email", type="email", example="test@mail.ru"),
 *              @OA\Property(property="password", type="string", example="qwerty"),
 *              @OA\Property(property="ip", type="string", example="192.168.1.1"),
 *              @OA\Property(property="comment", type="string", example="Some comment..."),
 *                    )
 *                  }
 *                )
 *              ),
 *
 * @OA\Response(
 *      response=200,
 *      description="Запись успешно обновлена",
 *      @OA\JsonContent(
 *          @OA\Property(property="data", type="object",
 *          @OA\Property(property="id", type="integer", example=1),
 *          @OA\Property(property="name", type="string", example="Ivan Ivanov"),
 *          @OA\Property(property="email", type="email", example="test@mail.ru"),
 *          @OA\Property(property="ip", type="string", example="192.168.1.1"),
 *          @OA\Property(property="comment", type="string", example="Some comment..."),
 *          @OA\Property(property="created_at", type="string", format="date-time", example="2023-11-14T14:53:10.000000Z"),
 *          @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-14T14:53:10.000000Z"),
 *                      ),),
 *                    ),
 *                  ),
 *                ),
 *
 * @OA\Delete(
 *      path="/api/users/{user}",
 *      summary="Удалить пользователя по ID",
 *      tags={"Users"},
 * @OA\Parameter(
 *      description="User ID",
 *      in="path",
 *      name="user",
 *      required=true,
 *      example=1
 * ),
 *
 * @OA\Response(
 *      response=200,
 *      description="Запись успешно удалена",
 *      @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Запись успешно удалена"),
 *              ),
 *            ),
 *          ),
 */
class SwaggerController extends Controller {}

<?php

namespace Documentation\Swagger\Auth;

use Documentation\Swagger\Swagger;

class Auth extends Swagger
{
    /**
     * @OA\Post(
     *    path="/api/login",
     *    tags={"Auth"},
     *    summary="Login User",
     *    security={{"passport":{}}},
     *     @OA\RequestBody(
     *      @OA\JsonContent(
     *        example={
     *          "email":"test@mail.com",
     *          "password":"123456",
     *        },
     *      ),
     *      @OA\Schema(
     *          type="object",
     *          required={
     *                    "email",
     *                    "password",
     *                  },
     *          @OA\Property(property="email", type="string"),
     *          @OA\Property(property="password", type="string"),
     *      ),
     *    ),
     *    @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *              "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiNGNmNTdhNzU2MmYwNjUxOWEwOGI3OWNjMTY0ZDY0YjE0MDViMjgzNjVjNjk5MTZmZjhjODBiYmU3YTVjZmIyZGRkODNkODU0ODgzODY5NTciLCJpYXQiOjE2ODIxMzcxNjQuNzgxMjcxLCJuYmYiOjE2ODIxMzcxNjQuNzgxMjczLCJleHAiOjE3MTM3NTk1NjQuNzc1MjkyLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.eU14-zGDWR855LvvUUxvN8ClhFP_tAwy-vW5NrI794i5-iY-0cBaHFY8K-RFX_eFXErWfT7sfBdGuRUhVTdwwwJ_deKPO8NvvuRWnvVR_FxN0eoW8Uh9o92qgR84pjlua1KdBgIQoz8E9bUxT1d_ga1wiyeKG_9eITm-Z99OdC-h51o7spEDBuD41uQpnf3jfSUwvb-4a3R2UfTu-IEHst0yhTNZErYK9fABXADUIRbD7B1zf6nRXcfTqgAjTvGi5GGI4JkFgJX1DLh5-zYjBPNdFzxard2VqsZdqTDJm604klt0L99oS7zEvzuEaJzKXZU1NdmzrCmpCaTX9Lm9cy2SZhPKUlXiCRvPgHHDAmI2RKkbEANxvklUZT-97SzoljBl55L4bMYN5BKCnr6j4BR7CH78TLGw0LYp1IvHsqPduoL-tlOl0xpBr4JDm39YYhY4cAOc9J9JP_G4TrIvzTAKz68ODov87GLGY-ORHGxaFqRuWKJE7rZC2zQyLjytOu4YSS4A6LPTEZcqaoltIO6IgL0YI_0UyL-uVgrrOdozHcv9hCCs5DK218_HpQPQpisdjH1Wp334sFFRiU7rHDqh4J9x52miFRzENSfupk4Nbk9pPyZb9ay7vJ5xWNkcNuj1SM6C-b4as9SIUSe-pBb3iX2IpjgPxdt92omMYho",
     *              }
     *          }
     *      ),
     *   ),
     *     @OA\Response(
     *       response=400,
     *       description="Resource Not Found",
     *       @OA\JsonContent(
     *           example={
     *               "status": "fail",
     *               "message": "unknown_account",
     *           }
     *       ),
     *     ),
     *    @OA\Response(
     *       response=422,
     *       description="Unprocessable content",
     *       @OA\JsonContent(
     *           example={
     *               "errors": {
     *                  "The email field is required.",
     *                  "The password field is required.",
     *               }
     *           }
     *       ),
     *     ),
     * ),
     */
    public function login()
    {
        # code...
    }


    /**
     * @OA\Get(
     *    path="/api/auth/me",
     *    tags={"Auth"},
     *    summary="Detail Data User Login",
     *    security={{"passport":{}}},
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *              "id": "1",
     *              "name": "Margarett Braun",
     *              "email": "zelma93@example.net",
     *              "email_verified_at": null,
     *              "created_at": "2023-04-11T14:50:33.000000Z",
     *              "updated_at": "2023-04-11T14:50:33.000000Z"
     *              }
     *          }
     *      ),
     *   ),
     *     @OA\Response(
     *       response=401,
     *       description="Unauthorized",
     *       @OA\JsonContent(
     *           example={
     *               "status": "fail",
     *               "message": "unauthorized",
     *           }
     *       ),
     *     ),
     * ),
     */
    public function me()
    {
        # code...
    }
}
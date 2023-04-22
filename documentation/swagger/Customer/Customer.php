<?php

namespace Documentation\Swagger\Customer;

use Documentation\Swagger\Swagger;

class Customer extends Swagger
{
    /**
     * @OA\Get(
     *    path="/api/auth/customers",
     *    tags={"Customer"},
     *    summary="Get list all customer",
     *    security={{"passport":{}}},
     *    @OA\Parameter(
     *      name="search",
     *      in="query",
     *      description="Search name of customer",
     *      @OA\Schema(
     *          type="string",
     *      )
     *   ),
     *    @OA\Parameter(
     *      name="perPage",
     *      in="query",
     *      description="limit per page",
     *      @OA\Schema(
     *          type="string",
     *      )
     *   ),
     *    @OA\Parameter(
     *      name="page",
     *      in="query",
     *      description="page of the data",
     *      @OA\Schema(
     *          type="string",
     *      )
     *   ),
     *    @OA\Parameter(
     *      name="order",
     *      in="query",
     *      description="order for asc or desc",
     *      @OA\Schema(
     *          type="string",
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *              "status": "success",
     *              "data": {
     *              "current_page": 1,
     *              "first_page_url": "http://localhost:8080/api/auth/customers?page=1",
     *              "from": 1,
     *              "last_page": 1,
     *              "last_page_url": "http://localhost:8080/api/auth/customers?page=1",
     *              "links": {
     *                      {
     *                          "url": null,
     *                          "label": "&laquo; Previous",
     *                          "active": false
     *                      },
     *                      {
     *                          "url": "http://localhost:8080/api/auth/customers?page=1",
     *                          "label": "1",
     *                          "active": true
     *                      },
     *                      {
     *                          "url": null,
     *                          "label": "Next &raquo;",
     *                          "active": false
     *                      }
     *                  },
     *              "next_page_url": null,
     *              "path": "http://localhost:8080/api/auth/customers",
     *              "per_page": 10,
     *              "prev_page_url": null,
     *              "to": 1,
     *              "total": 2,
     *              "data":{
     *                  {
     *                      "uuid": "ab4a6519-cd35-4755-a345-8408b7f4bf16",
     *                      "name": "coba",
     *                      "phone_number": "0863633",
     *                      "email": "coba@mail.com",
     *                      "postal_code": "112",
     *                      "address": "Jl dulu aja gang pacar"
     *                  },
     *                  {
     *                      "uuid": "de3d524f-1733-4dae-8094-1a013c349350",
     *                      "name": "Margarett Braun",
     *                      "phone_number": "+1 (903) 490-1546",
     *                      "email": "zelma93@example.net",
     *                      "postal_code": "07970-9425",
     *                      "address": "4778 Vicky Heights\nDarenbury, IA 09538"
     *                  }
     *              }
     *          }
     *         }
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
    public function index()
    {
    }

    /**
     * @OA\Get(
     *    path="/api/auth/customers/{uuid}",
     *    tags={"Customer"},
     *    summary="Detail Customer",
     *    security={{"passport":{}}},
     *   @OA\Parameter(
     *      name="uuid",
     *      in="path",
     *      @OA\Schema(
     *          type="string",
     *      ),
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *              "uuid": "de3d524f-1733-4dae-8094-1a013c349350",
     *              "name": "Margarett Braun",
     *              "phone_number": "+1 (903) 490-1546",
     *              "email": "zelma93@example.net",
     *              "postal_code": "07970-9425",
     *              "address": "4778 Vicky Heights\nDarenbury, IA 09538"
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
     *     @OA\Response(
     *       response=400,
     *       description="Resource Not Found",
     *       @OA\JsonContent(
     *           example={
     *               "status": "fail",
     *               "message": "resource_not_found",
     *           }
     *       ),
     *     ),
     * ),
     */
    public function getByUuid()
    {
        # code...
    }

    /**
     * @OA\Post(
     *    path="/api/auth/customers/{uuid}",
     *    tags={"Customer"},
     *    summary="Update Data Customer",
     *    security={{"passport":{}}},
     *    @OA\Parameter(
     *      name="uuid",
     *      in="path",
     *      @OA\Schema(
     *          type="string",
     *      ),
     *   ),
     *     @OA\RequestBody(
     *      @OA\JsonContent(
     *        example={
     *          "name":"Budi Susilo",
     *          "phone_number":"081234567",
     *          "email":"test@mail.com",
     *          "postal_code":"22457",
     *          "address":"Jalan aja dulu",
     *        },
     *      ),
     *      @OA\Schema(
     *          type="object",
     *          required={"name",
     *                    "phone_number",
     *                    "email",
     *                    "postal_code",
     *                    "address"
     *                  },
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="phone_number", type="string"),
     *          @OA\Property(property="email", type="string"),
     *          @OA\Property(property="postal_code", type="string"),
     *          @OA\Property(property="address", type="string"),
     *      ),
     *    ),
     *    @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *              "uuid": "de3d524f-1733-4dae-8094-1a013c349350",
     *              "name": "Budi Susilo",
     *              "phone_number": "081234567",
     *              "email": "test@mail.com",
     *              "postal_code": "22457",
     *              "address": "Jalan aja dulu"
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
     *     @OA\Response(
     *       response=400,
     *       description="Resource Not Found",
     *       @OA\JsonContent(
     *           example={
     *               "status": "fail",
     *               "message": "resource_not_found",
     *           }
     *       ),
     *     ),
     *    @OA\Response(
     *       response=422,
     *       description="Unprocessable content",
     *       @OA\JsonContent(
     *           example={
     *               "errors": {
     *                  "The name field is required.",
     *                  "The phone number field is required.",
     *                  "The email field is required.",
     *                  "The postal code field is required.",
     *                  "The address field is required."
     *               }
     *           }
     *       ),
     *     ),
     * ),
     */
    public function update()
    {
        # code...
    }

    /**
     * @OA\Post(
     *    path="/api/auth/customers/",
     *    tags={"Customer"},
     *    summary="Store Data Customer",
     *    security={{"passport":{}}},
     *     @OA\RequestBody(
     *      @OA\JsonContent(
     *        example={
     *          "name":"Budi Susilo",
     *          "phone_number":"081234567",
     *          "email":"test@mail.com",
     *          "postal_code":"22457",
     *          "address":"Jalan aja dulu",
     *        },
     *      ),
     *      @OA\Schema(
     *          type="object",
     *          required={"name",
     *                    "phone_number",
     *                    "email",
     *                    "postal_code",
     *                    "address"
     *                  },
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="phone_number", type="string"),
     *          @OA\Property(property="email", type="string"),
     *          @OA\Property(property="postal_code", type="string"),
     *          @OA\Property(property="address", type="string"),
     *      ),
     *    ),
     *    @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *              "uuid": "de3d524f-1733-4dae-8094-1a013c349350",
     *              "name": "Budi Susilo",
     *              "phone_number": "081234567",
     *              "email": "test@mail.com",
     *              "postal_code": "22457",
     *              "address": "Jalan aja dulu"
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
     *     @OA\Response(
     *       response=422,
     *       description="Unprocessable content",
     *       @OA\JsonContent(
     *           example={
     *               "errors": {
     *                  "The name field is required.",
     *                  "The phone number field is required.",
     *                  "The email field is required.",
     *                  "The postal code field is required.",
     *                  "The address field is required."
     *               }
     *           }
     *       ),
     *     ),
     * ),
     */
    public function store()
    {
        # code...
    }

    /**
     * @OA\Delete(
     *    path="/api/auth/customers/{uuid}",
     *    tags={"Customer"},
     *    summary="Delete Data Customer",
     *    security={{"passport":{}}},
     *   @OA\Parameter(
     *      name="uuid",
     *      in="path",
     *      @OA\Schema(
     *          type="string",
     *      ),
     *   ),
     *   @OA\Response(
     *      response=204,
     *      description="No content",
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
     *     @OA\Response(
     *       response=400,
     *       description="Resource Not Found",
     *       @OA\JsonContent(
     *           example={
     *               "status": "fail",
     *               "message": "resource_not_found",
     *           }
     *       ),
     *     ),
     * ),
     */
    public function delete()
    {
        # code...
    }
}
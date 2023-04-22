<?php

namespace Documentation\Swagger\Option;

use Documentation\Swagger\Swagger;

class Option extends Swagger
{
    /**
     * @OA\Get(
     *    path="/api/auth/options",
     *    tags={"Option"},
     *    summary="Get list all option",
     *    security={{"passport":{}}},
     *    @OA\Parameter(
     *      name="search",
     *      in="query",
     *      description="Search name of option",
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
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *              "status": "success",
     *              "data": {
     *              "current_page": 1,
     *              "first_page_url": "http://localhost:8080/api/auth/options?page=1",
     *              "from": 1,
     *              "last_page": 1,
     *              "last_page_url": "http://localhost:8080/api/auth/options?page=1",
     *              "links": {
     *                      {
     *                          "url": null,
     *                          "label": "&laquo; Previous",
     *                          "active": false
     *                      },
     *                      {
     *                          "url": "http://localhost:8080/api/auth/options?page=1",
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
     *              "path": "http://localhost:8080/api/auth/options",
     *              "per_page": 10,
     *              "prev_page_url": null,
     *              "to": 1,
     *              "total": 2,
     *              "data":{
     *                  {
     *                      "uuid": "ab4a6519-cd35-4755-a345-8408b7f4bf16",
     *                      "name": "Drum",
     *                  },
     *                  {
     *                      "uuid": "de3d524f-1733-4dae-8094-1a013c349350",
     *                      "name": "Botol",
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
        # code...
    }

    /**
     * @OA\Get(
     *    path="/api/auth/options/{uuid}",
     *    tags={"Option"},
     *    summary="Detail Option",
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
     *              "name": "Drum",
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
}
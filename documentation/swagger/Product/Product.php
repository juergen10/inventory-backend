<?php

namespace Documentation\Swagger\Product;

use Documentation\Swagger\Swagger;

class Product extends Swagger
{
    /**
     * @OA\Get(
     *    path="/api/auth/products",
     *    tags={"Product"},
     *    summary="Get list all product",
     *    security={{"passport":{}}},
     *    @OA\Parameter(
     *      name="search",
     *      in="query",
     *      description="Search name of product",
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
     *              "first_page_url": "http://localhost:8080/api/auth/products?page=1",
     *              "from": 1,
     *              "last_page": 1,
     *              "last_page_url": "http://localhost:8080/api/auth/products?page=1",
     *              "links": {
     *                      {
     *                          "url": null,
     *                          "label": "&laquo; Previous",
     *                          "active": false
     *                      },
     *                      {
     *                          "url": "http://localhost:8080/api/auth/products?page=1",
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
     *              "path": "http://localhost:8080/api/auth/products",
     *              "per_page": 10,
     *              "prev_page_url": null,
     *              "to": 1,
     *              "total": 2,
     *              "data":{
     *                  {
     *                      "uuid": "98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *                      "name": "Product 1",
     *                      "description": "Contoh product 1",
     *                      "created_at": "2023-04-19T07:11:43.000000Z",
     *                      "updated_at": "2023-04-19T07:11:43.000000Z",
     *                      "variants": {
     *                          "id": 1,
     *                          "uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                          "product_uuid": "98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *                          "variant_uuid": "98f7837c-8e3e-4c17-be35-3393b55fe17a",
     *                          "sku": "sku 123",
     *                          "price": 1000,
     *                          "stock": 10,
     *                          "weight": 10,
     *                          "created_at": "2023-04-19T07:11:43.000000Z",
     *                          "updated_at": "2023-04-19T07:11:43.000000Z",
     *                          "images": {
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                          },
     *                          "option": {
     *                              "id": 1,
     *                              "uuid": "98f75609-49e0-4677-8bbf-1b4dddc5d62f",
     *                              "name": "Botol",
     *                              "created_at": "2023-04-19T05:04:37.000000Z",
     *                              "updated_at": "2023-04-19T05:04:37.000000Z",
     *                              "laravel_through_key": "98f7837c-8e57-4cac-a35d-36f781b413f7"
     *                          }
     *                      }
     *                  },
     *                  {
     *                      "uuid": "98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *                      "name": "Product 1",
     *                      "description": "Contoh product 1",
     *                      "created_at": "2023-04-19T07:11:43.000000Z",
     *                      "updated_at": "2023-04-19T07:11:43.000000Z",
     *                      "variants": {
     *                          "id": 1,
     *                          "uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                          "product_uuid": "98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *                          "variant_uuid": "98f7837c-8e3e-4c17-be35-3393b55fe17a",
     *                          "sku": "sku 123",
     *                          "price": 1000,
     *                          "stock": 10,
     *                          "weight": 10,
     *                          "created_at": "2023-04-19T07:11:43.000000Z",
     *                          "updated_at": "2023-04-19T07:11:43.000000Z",
     *                          "images": {
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              
     *                              },
     *                              {
     *                              "id": 1,
     *                              "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                              "name": "imange.png",
     *                              "is_primary": 1,
     *                              "created_at": null,
     *                              "updated_at": null,
     *                              "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                          },
     *                          "option": {
     *                              "id": 1,
     *                              "uuid": "98f75609-49e0-4677-8bbf-1b4dddc5d62f",
     *                              "name": "Jan Casper",
     *                              "created_at": "2023-04-19T05:04:37.000000Z",
     *                              "updated_at": "2023-04-19T05:04:37.000000Z",
     *                              "laravel_through_key": "98f7837c-8e57-4cac-a35d-36f781b413f7"
     *                          }
     *                      }
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
     *    path="/api/auth/products/{uuid}",
     *    tags={"Product"},
     *    summary="Detail Product",
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
     *               "data": {
     *                  "uuid": "98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *                  "name": "Product 1",
     *                  "description": "Contoh product 1",
     *                  "created_at": "2023-04-19T07:11:43.000000Z",
     *                  "updated_at": "2023-04-19T07:11:43.000000Z",
     *                  "variants": {
     *                      {
     *                          "id": 1,
     *                          "uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                          "product_uuid": "98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *                          "variant_uuid": "98f7837c-8e3e-4c17-be35-3393b55fe17a",
     *                          "sku": "sku 123",
     *                          "price": 1000,
     *                          "stock": 10,
     *                          "weight": 10,
     *                          "created_at": "2023-04-19T07:11:43.000000Z",
     *                          "updated_at": "2023-04-19T07:11:43.000000Z",
     *                          "images": {
     *                              {
     *                                  "id": 1,
     *                                  "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                                  "name": "imange.png",
     *                                  "is_primary": 1,
     *                                  "created_at": null,
     *                                  "updated_at": null,
     *                                  "imageUrl": "http://localhost/products/imange.png"
     *                              },
     *                              {
     *                                  "id": 2,
     *                                  "product_variant_uuid": "98f7837c-8e57-4cac-a35d-36f781b413f7",
     *                                  "name": "imange.png",
     *                                  "is_primary": null,
     *                                  "created_at": null,
     *                                  "updated_at": null,
     *                                  "imageUrl": "http://localhost/products/imange.png"
     *                              }
     *                          },
     *                      "option": {
     *                          "id": 1,
     *                          "uuid": "98f75609-49e0-4677-8bbf-1b4dddc5d62f",
     *                          "name": "Jan Casper",
     *                          "created_at": "2023-04-19T05:04:37.000000Z",
     *                          "updated_at": "2023-04-19T05:04:37.000000Z",
     *                          "laravel_through_key": "98f7837c-8e57-4cac-a35d-36f781b413f7"
     *                          }
     *                      }
     *                  }
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
    }

    /**
     * @OA\Post (
     *      path="/api/auth/products/image/upload",
     *      tags={"Product"},
     *      summary="Upload Product Image",
     *      security={{"passport":{}}},
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      type="file",
     *                      property="image"
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="object",
     *              example={
     *                  "status": "success",
     *                  "data": {
     *                      "filename": "99045e3c-5f5b-4b40-bf45-4a1e5376d8f7-1682440399.png",
     *                      "url": "http://localhost:8080/images/products/99045e3c-5f5b-4b40-bf45-4a1e5376d8f7-1682440399.png"
     *                  }
     *              }
     *          )
     *      ),
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
     *    @OA\Response(
     *       response=422,
     *       description="Unprocessable content",
     *       @OA\JsonContent(
     *           example={
     *               "errors": {
     *                  "The image field is required.",
     *                  "The image field must be an image.",
     *                  "The image field must be a file of type: jpeg, png, jpg."
     *               }
     *           }
     *       ),
     *     ),
     * )
     */
    public function uploadImage()
    {
        # code...
    }
}
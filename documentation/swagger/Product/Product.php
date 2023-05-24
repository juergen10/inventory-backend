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
     *                          "fund": 1001,
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
     *                          "fund": 10001,
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
     *                          "fund": 10001,
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

    /**
     * @OA\Post(
     *    path="/api/auth/products/",
     *    tags={"Product"},
     *    summary="Store Data Product",
     *    security={{"passport":{}}},
     *     @OA\RequestBody(
     *      @OA\JsonContent(
     *        example={
     *          "name":"Product 2",
     *          "description":"description",
     *          "variants":{
     *              {
     *                  "price": 10000,
     *                  "sku": "sku13ss23",
     *                  "stock": 10,
     *                  "weight": 10,
     *                  "fund": 10001,
     *                  "variant_uuid": "00fe4393-b2ba-4f85-8aed-e283ae8f1ab1",
     *                  "option_uuid": "98f75609-49e0-4677-8bbf-1b4dddc5d62f",
     *                  "images": {
     *                      "image-1.jpg",
     *                      "image-2.jpg",
     *                      "image-3.jpg",
     *                      "image-4.jpg",
     *                      "image-5.jpg",
     *                  }
     *              },
     *          }
     *        },
     *      ),
     *      @OA\Schema(
     *          type="object",
     *          required={"name",
     *                    "description",
     *                    "variants"
     *                  },
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="variants", type="array")
     *      ),
     *    ),
     *    @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *                  "uuid": "9908568a-b4bd-481c-a85a-8a901bdbc2d7",
     *                  "name": "Product 2",
     *                  "description": "description",
     *                  "created_at": "2023-04-27T15:55:07.000000Z",
     *                  "updated_at": "2023-04-27T15:55:07.000000Z",
     *                  "variants": {
     *                      "id": 6,
     *                      "uuid": "9908568a-b5c3-4f98-a45e-e6c5b1de33e6",
     *                      "product_uuid": "9908568a-b4bd-481c-a85a-8a901bdbc2d7",
     *                      "variant_uuid": "00fe4393-b2ba-4f85-8aed-e283ae8f1ab1",
     *                      "sku": "sku13ss23",
     *                      "price": 10000,
     *                      "fund": 10001,
     *                      "stock": 10,
     *                      "weight": 10,
     *                      "created_at": "2023-04-27T15:55:07.000000Z",
     *                      "updated_at": "2023-04-27T15:55:07.000000Z",
     *                      "images": {
     *                          {
     *                          "id": 12,
     *                          "product_variant_uuid": "9908568a-b5c3-4f98-a45e-e6c5b1de33e6",
     *                          "name": "image-1.jpg",
     *                          "is_primary": 1,
     *                          "created_at": "2023-04-27T15:55:07.000000Z",
     *                          "updated_at": "2023-04-27T15:55:07.000000Z",
     *                          "imageUrl": "http://localhost:8080/products/image-1.jpg"
     *                          },
     *                          {
     *                          "id": 13,
     *                          "product_variant_uuid": "9908568a-b5c3-4f98-a45e-e6c5b1de33e6",
     *                          "name": "image-2.jpg",
     *                          "is_primary": 1,
     *                          "created_at": "2023-04-27T15:55:07.000000Z",
     *                          "updated_at": "2023-04-27T15:55:07.000000Z",
     *                          "imageUrl": "http://localhost:8080/products/image-2.jpg"
     *                          },
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
     *    @OA\Response(
     *       response=422,
     *       description="Unprocessable content",
     *       @OA\JsonContent(
     *           example={
     *               "errors": {
     *                  "The name field is required.",
     *                  "The description field is required.",
     *                  "The variants field is required.",
     *                  "The variants.0.sku has already been taken.",
     *                  "The variants.0.images field must not have more than 5 items.",
     *                  "The selected variants.1.variant_uuid is invalid.",
     *                  "The variants.0.sku field has a duplicate value.",
     *                  "The variants.0.price field must be greater than fund."
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
     * @OA\Post(
     *    path="/api/auth/sku/check",
     *    tags={"Product"},
     *    summary="Check SKU Product",
     *    security={{"passport":{}}},
     *     @OA\RequestBody(
     *      @OA\JsonContent(
     *        example={
     *          "sku":"Product2",
     *          "product_uuid":"98f7837c-8b52-4cb8-a0bb-7d1f9610ee64",
     *        },
     *      ),
     *      @OA\Schema(
     *          type="object",
     *          required={"sku"},
     *          @OA\Property(property="sku", type="string")
     *      ),
     *    ),
     *   @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
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
     *               "message": "sku_exist",
     *           }
     *       ),
     *     ),
     * ),
     */
    public function checkSKU()
    {
        # code...
    }

    /**
     * @OA\Delete(
     *    path="/api/auth/products/{uuid}",
     *    tags={"Product"},
     *    summary="Delete Product",
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
     *      description="Success",
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
    public function removeProduct()
    {
        # code...
    }

    /**
     * @OA\Delete(
     *    path="/api/auth/products/variants/{uuid}",
     *    tags={"Product"},
     *    summary="Delete Product Variant",
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
     *      description="Success",
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

    public function removeVariant()
    {
        # code...
    }

    /**
     * @OA\Post(
     *    path="/api/auth/products/{uuid}",
     *    tags={"Product"},
     *    summary="Update Data Product",
     *    security={{"passport":{}}},
     *     @OA\RequestBody(
     *      @OA\JsonContent(
     *        example={
     *          "name":"Product 2",
     *          "description":"description",
     *          "variants":{
     *              {
     *                  "uuid": "00fe4393-b2ba-4f85-8aed-e283ae8f1ab1",
     *                  "price": 10000,
     *                  "sku": "sku13ss23",
     *                  "stock": 10,
     *                  "weight": 10,
     *                  "fund": 10001,
     *                  "variant_uuid": "00fe4393-b2ba-4f85-8aed-e283ae8f1ab1",
     *                  "option_uuid": "98f75609-49e0-4677-8bbf-1b4dddc5d62f",
     *                  "images": {
     *                      "image-1.jpg",
     *                      "image-2.jpg",
     *                      "image-3.jpg",
     *                      "image-4.jpg",
     *                      "image-5.jpg",
     *                  }
     *              },
     *          "deleted_image": {
     *              "aaa.png"
     *              },
     *          "deleted_variant": {
     *              "98f75609-49e0-4677-8bbf-1b4dddc5d62f"
     *              }
     *          }
     *        },
     *      ),
     *      @OA\Schema(
     *          type="object",
     *          required={"name",
     *                    "description",
     *                    "variants"
     *                  },
     *          @OA\Property(property="name", type="string"),
     *          @OA\Property(property="description", type="string"),
     *          @OA\Property(property="variants", type="array")
     *      ),
     *    ),
     *    @OA\Response(
     *      response=200,
     *      description="Success",
     *      @OA\JsonContent(
     *         example={
     *           "status": "success",
     *            "data": {
     *                  "uuid": "9908568a-b4bd-481c-a85a-8a901bdbc2d7",
     *                  "name": "Product 2",
     *                  "description": "description",
     *                  "created_at": "2023-04-27T15:55:07.000000Z",
     *                  "updated_at": "2023-04-27T15:55:07.000000Z",
     *                  "variants": {
     *                      "id": 6,
     *                      "uuid": "9908568a-b5c3-4f98-a45e-e6c5b1de33e6",
     *                      "product_uuid": "9908568a-b4bd-481c-a85a-8a901bdbc2d7",
     *                      "variant_uuid": "00fe4393-b2ba-4f85-8aed-e283ae8f1ab1",
     *                      "sku": "sku13ss23",
     *                      "price": 10000,
     *                      "fund": 10001,
     *                      "stock": 10,
     *                      "weight": 10,
     *                      "created_at": "2023-04-27T15:55:07.000000Z",
     *                      "updated_at": "2023-04-27T15:55:07.000000Z",
     *                      "images": {
     *                          {
     *                          "id": 12,
     *                          "product_variant_uuid": "9908568a-b5c3-4f98-a45e-e6c5b1de33e6",
     *                          "name": "image-1.jpg",
     *                          "is_primary": 1,
     *                          "created_at": "2023-04-27T15:55:07.000000Z",
     *                          "updated_at": "2023-04-27T15:55:07.000000Z",
     *                          "imageUrl": "http://localhost:8080/products/image-1.jpg"
     *                          },
     *                          {
     *                          "id": 13,
     *                          "product_variant_uuid": "9908568a-b5c3-4f98-a45e-e6c5b1de33e6",
     *                          "name": "image-2.jpg",
     *                          "is_primary": 1,
     *                          "created_at": "2023-04-27T15:55:07.000000Z",
     *                          "updated_at": "2023-04-27T15:55:07.000000Z",
     *                          "imageUrl": "http://localhost:8080/products/image-2.jpg"
     *                          },
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
     *    @OA\Response(
     *       response=422,
     *       description="Unprocessable content",
     *       @OA\JsonContent(
     *           example={
     *               "errors": {
     *                  "The name field is required.",
     *                  "The description field is required.",
     *                  "The variants field is required.",
     *                  "The variants.0.sku has already been taken.",
     *                  "The variants.0.images field must not have more than 5 items.",
     *                  "The selected variants.1.variant_uuid is invalid.",
     *                  "The variants.0.sku field has a duplicate value.",
     *                  "The variants.0.price field must be greater than fund."
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
}
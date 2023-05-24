<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'variants' => 'required|array',
            'deleted_variant' => 'sometimes|required|array',
            'deleted_image' => 'sometimes|required|array',
            'variants.*.variant_uuid' => 'required|exists:variants,uuid',
            'variants.*.uuid' => 'sometimes|required|uuid',
            'variants.*.option_uuid' => 'required|exists:options,uuid',
            'variants.*.images' => 'sometimes|required|array|max:5',
            'variants.*.price' => 'required|integer',
            'variants.*.sku' => 'required|string|alpha_dash|distinct:strict',
            'variants.*.stock' => 'required|integer',
            'variants.*.weight' => 'required|integer',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'errors' => $validator->errors()->all(),
        ], 422);

        throw new ValidationException($validator, $response);
    }
}
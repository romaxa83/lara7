<?php

namespace App\Patterns\Dto;

use Illuminate\Http\Request;

class CreateProductDtoFactory
{
    public static function fromRequest(Request $request): ProductDto
    {
        return self::fromArray($request->all());
    }

    public static function fromArray(array $data): ProductDto
    {
        $dto = new ProductDto();

        $dto->id = $data['id'];
        $dto->name = $data['name'];
        $dto->categoryId = $data['categoryId'];

        return $dto;
    }
}

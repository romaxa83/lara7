<?php

namespace App\Patterns\Dto;

use Illuminate\Http\Request;

class ProductDto3
{
    public int $id;
    public string $name;
    public int $categoryId;

    public static function createFromRequest(Request $request): self
    {
        return self::createFromArray($request->all());
    }

    public static function createFromArray(array $data): self
    {
        $dto = new self();

        $dto->id = $data['id'];
        $dto->name = $data['name'];
        $dto->categoryId = $data['categoryId'];

        return $dto;
    }
}

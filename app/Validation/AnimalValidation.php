<?php

namespace App\Validation;

class AnimalValidation
{
    public static function create(): array
    {
        return [
            'name' => [
                'rules'  => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required' => 'Nazwa jest wymagana',
                ],
            ],
            'species' => 'required|min_length[2]',
            'age'     => 'permit_empty|integer|greater_than_equal_to[0]',
        ];
    }

    public static function update(): array
    {
        return [
            'name'    => 'required|min_length[2]',
            'species' => 'required|min_length[2]',
            'age'     => 'permit_empty|integer',
        ];
    }
}

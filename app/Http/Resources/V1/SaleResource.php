<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'sale',
            'id' => $this->id,
            'attributes' => [
                'date' => $this->date,
                'theater' => $this->when($request->routeIs('sales.index'), $this->showing->theater->name),
                'movie' => $this->when($request->routeIs('sales.index'), $this->showing->movie->name),
                'currency' => $this->currency,
                'amount' => $this->amount,
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
            ],
            'relationships' => $this->when($request->routeIs('sales.show'),[
                'movie' => [
                    'data' => [
                        'type' => 'movie',
                        'id' => $this->showing->movie->id,
                        'attributes' => [
                            'name' => $this->showing->movie->name,
                            'genre' => $this->showing->movie->genre,
                            'language' => $this->showing->movie->language
                        ]
                    ]
                ],
                'theater' => [
                    'data' => [
                        'type' => 'theater',
                        'id' => $this->showing->theater->id,
                        'attributes' => [
                            'name' => $this->showing->theater->name,
                            'location' => $this->showing->theater->location,
                        ]
                    ]
                ]
            ]),
            'links' => [
                ['self' => route('sales.show', ['sale'=>$this->id])]
            ]
        ];
    }
}

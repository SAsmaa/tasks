<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'row_id'         => $this->row_id,
            'title'       => $this->title,
            'description'    => $this->description,
            'due_date'    => $this->due_date,
            'tags'    => $this->tags,
            'par_cat_id'    => (int) $this->par_cat_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

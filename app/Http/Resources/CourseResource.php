<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'course_ref' => $this->course_ref,
            'title' => $this->title,
            'description' => $this->description,
            'credits' => $this->credits,
            'instructor' => $this->instructor,
            'created_at' => $this->created_at?->format('Y-m-d'),
        ];
    }
}

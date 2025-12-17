<?php


namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'course_ref' => $this->course_ref,
            'description' => $this->description,
            'credits' => $this->credits,
            'instructor' => $this->instructor,
            'created_at' => $this->created_at,
        ];
    }
}

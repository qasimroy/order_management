<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "source_id"=> $this->source_id,
            "business_id"=> $this->business_id,
            "first_name"=> $this->first_name,
            "last_name"=> $this->last_name,
            "phone"=> $this->phone,
            "email"=> $this->email,
            "contact_no"=> $this->contact_no,
            "address1"=> $this->address1,
            "address2"=> $this->address2,
            "city"=> $this->city,
            "country"=> $this->country,
            "country_code"=> $this->country_code,
            "zip"=> $this->zip,
            "taxable"=> $this->taxable,
            "gender"=> $this->gender,
            "dob"=> $this->dob,
            "annivarsary_date"=> $this->annivarsary_date,
            "info1"=> $this->info1,
            "info2"=> $this->info2,
            "info3"=> $this->info3,
            "info4"=> $this->info4,
            "created_by"=> $this->created_by,
            "updated_by"=> $this->updated_by,
            "created_at"=> $this->created_at,
            "updated_at"=> $this->updated_at,
            "source"=> new SourceResource($this->whenLoaded('source')),
            "business"=> new BusinessResource($this->whenLoaded('business'))
        ];
    }
}

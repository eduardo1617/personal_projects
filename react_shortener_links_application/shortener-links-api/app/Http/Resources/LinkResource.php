<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hash' => $this->hash,
            'short_link' => url('s/'.$this->hash),
            'url' => $this->url,
            'user_id' => UserResource::make($this->whenLoaded('user')),
            'total_clicks' => $this->whenLoaded('clicks')->count(),
            'clicks_per_month' =>$this->whenLoaded('clicks')->groupBy(
                function ($date){
                    return Carbon::parse($date->created_at)->format('M');
                }
            )->map->count(),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}

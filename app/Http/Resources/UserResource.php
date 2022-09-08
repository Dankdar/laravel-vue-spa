<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            // 'name' => $this->name,
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'two_factor' => $this->hasEnabledTwoFactorAuthentication(), // required in Vue for TwoFactoreAuthentication.
            'phno' => $this->phno,
            // 'pfp' =>$this->pfp,
            'balance' => $this->balance,
        ];
    }
}

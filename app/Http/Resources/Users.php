<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Users extends JsonResource
{
    // haydovchini o'ziga boradigani
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $medinfo = $this->medicalinfo->last();
        $medinfo->doctor_name = User::find($this->medicalinfo->last()->doctor_id)->name;

        $texinfo = $this->texinfo->last();
        $texinfo->technician_name = User::find($this->texinfo->last()->technician_id)->name;

        return [
            'id' => $this->id,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'profile' => $this->profile,
            'medicalinfo' => $this->medicalinfo->last(),
            'texinfo' => $this->texinfo->last(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    //Permission not linked with this profile

    public function permissionsAvailable($filter = null)
    {
        $this->id;
        $permissions = Permission::whereNotIn('permissions.id', function ($query) {
            $query->select('permission_id');
            $query->from('permission_profile');
            $query->whereRaw("profile_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('permission.name', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $permissions;
    }
}

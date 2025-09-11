<?php

namespace App\Model\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use DB;

class TagGroup extends Model
{
    public function canEdit()
    {
        return Auth::guard('admin')->user()->id = $this->create_by;
    }

    public function canDelete()
    {
        return true;
    }

    public function tags() {
        return $this->hasMany(Tag::class, 'group_id');
    }

    public static function searchByFilter($request)
    {
        $result = self::with('tags');

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function getForSelect()
    {
        return self::select(['id', 'name'])
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id)
    {
        return self::with('tags')->where('id', $id)
            ->firstOrFail();
    }

    public static function getDataForShow($id)
    {
        return self::where('id', $id)
            ->firstOrFail();
    }


}

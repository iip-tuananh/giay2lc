<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;

class AboutUsWhyChooseCriteria extends Model
{
    protected $table = 'about_us_why_choose_criterias';
    protected $fillable = ['about_us_id', 'sort', 'title', 'content','title_en', 'content_en'];

    public function image()
    {
        return $this->morphOne(File::class, 'model');
    }

    public function removeFromDB() {
        if ($this->image) $this->image->removeFromDB();
        $this->delete();
    }
}

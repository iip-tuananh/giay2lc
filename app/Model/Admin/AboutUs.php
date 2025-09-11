<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use App\Helpers\FileHelper;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = ['name', 'slug', 'youtube_link', 'description', 'content', 'mission', 'vision', 'core_values', 'raw_material_area', 'home_title', 'home_description', 'home_why_choose_title', 'home_why_choose_description'];

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function home_image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'home_image');
    }

    public function home_why_choose_image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'home_why_choose_image');
    }

    public function image_mission()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image_mission');
    }

    public function image_vision()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image_vision');
    }

    public function image_core_values()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image_core_values');
    }

    public function image_raw_material_area()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image_raw_material_area');
    }

    public function galleries()
    {
        return $this->hasMany(AboutUsGallery::class, 'about_us_id', 'id');
    }

    public function why_choose_criterias()
    {
        return $this->hasMany(AboutUsWhyChooseCriteria::class, 'about_us_id', 'id');
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'image',
            'home_image',
            'home_why_choose_image',
            'image_mission',
            'image_vision',
            'image_core_values',
            'image_raw_material_area',
            'galleries',
        ]);

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function getDataForEdit($id)
    {
        return self::with([
            'image',
            'home_image',
            'home_why_choose_image',
            'image_mission',
            'image_vision',
            'image_core_values',
            'image_raw_material_area',
            'galleries' => function ($q) {
                $q->select(['id', 'about_us_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            },
            'why_choose_criterias' => function ($q) {
                $q->with(['image'])
                    ->orderBy('sort', 'ASC');
            },
        ])->where('id', $id)
            ->firstOrFail();
    }

    public function canDelete()
    {
        return true;
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }

            $deleted = AboutUsGallery::where('about_us_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, AboutUsGallery::class, null);
                    $item->image->removeFromDB();
                }
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = AboutUsGallery::find($g['id']);
                else $gallery = new AboutUsGallery();

                $gallery->about_us_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) {
                        FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, AboutUsGallery::class, null);
                        $gallery->image->removeFromDB();
                    }
                    $file = $g['image'];
                    FileHelper::uploadFileToCloudflare($file, $gallery->id, AboutUsGallery::class, null);
                }
            }
        } else {
            $galleries = $this->galleries;
            foreach ($galleries as $gallery) {
                if ($gallery->image) {
                    FileHelper::deleteFileFromCloudflare($gallery->image, $gallery->id, AboutUsGallery::class, null);
                    $gallery->image->removeFromDB();
                }
            }
            $this->galleries()->delete();
        }
    }

    public function syncWhyChooseCriteria($why_choose_criterias)
    {
        if ($why_choose_criterias) {
            $exist_ids = [];
            foreach ($why_choose_criterias as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }

            $deleted = AboutUsWhyChooseCriteria::where('about_us_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::deleteFileFromCloudflare($item->image, $item->id, AboutUsWhyChooseCriteria::class, null);
                    $item->image->removeFromDB();
                }
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($why_choose_criterias); $i++) {
                $g = $why_choose_criterias[$i];

                if (isset($g['id'])) $why_choose_criteria = AboutUsWhyChooseCriteria::find($g['id']);
                else $why_choose_criteria = new AboutUsWhyChooseCriteria();

                $why_choose_criteria->about_us_id = $this->id;
                $why_choose_criteria->sort = $i;
                $why_choose_criteria->title = $g['title'];
                $why_choose_criteria->content = $g['content'];
                $why_choose_criteria->title_en = $g['title_en'];
                $why_choose_criteria->content_en = $g['content_en'];

                $why_choose_criteria->save();

                if (isset($g['image'])) {
                    if ($why_choose_criteria->image) {
                        FileHelper::deleteFileFromCloudflare($why_choose_criteria->image, $why_choose_criteria->id, AboutUsWhyChooseCriteria::class, null);
                        $why_choose_criteria->image->removeFromDB();
                    }
                    $file = $g['image'];
                    FileHelper::uploadFileToCloudflare($file, $why_choose_criteria->id, AboutUsWhyChooseCriteria::class, null);
                }
            }
        } else {
            $why_choose_criterias = $this->why_choose_criterias;
            foreach ($why_choose_criterias as $g) {
                if ($g->image) {
                    FileHelper::deleteFileFromCloudflare($g->image, $g->id, AboutUsWhyChooseCriteria::class, null);
                    $g->image->removeFromDB();
                }
            }
            $this->why_choose_criterias()->delete();
        }
    }
}

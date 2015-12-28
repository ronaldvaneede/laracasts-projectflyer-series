<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'flyer_photos';

    protected $fillable = ['path', 'thumbnail_path', 'name'];

    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    public static function named($name)
    {
        return (new static)->saveAs($name);
    }

    public function baseDir()
    {
        return 'files/photos';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;

        $this->path = $this->baseDir() .'/'. $name;
        $this->thumbnail_path = $this->baseDir() .'/tn-'. $name;
    }
}

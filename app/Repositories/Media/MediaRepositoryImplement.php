<?php

namespace App\Repositories\Media;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Media;

class MediaRepositoryImplement extends Eloquent implements MediaRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Media $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
}

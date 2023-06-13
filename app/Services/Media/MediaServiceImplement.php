<?php

namespace App\Services\Media;

use LaravelEasyRepository\Service;
use App\Repositories\Media\MediaRepository;

class MediaServiceImplement extends Service implements MediaService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(MediaRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)
}

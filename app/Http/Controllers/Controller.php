<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function photoUpload($photo, $upload_path)
    {
        if ($photo->hasfile('logo')) {
            $image = $photo->file('logo');
            $upload_path = public_path() . $upload_path;
            $logo = $image->getClientOriginalName();
            $image->move($upload_path, $logo);
            return $logo;
        }
    }

    public function photoUploadMany($photo, $upload_path)
    {
        if ($photo->hasfile('logo')) {
            $image = $photo->file('logo');
            $upload_path = public_path() . $upload_path;
            $logo = $image->getClientOriginalName();
            $image->move($upload_path, $logo);
            return $logo;
        }
    }
}
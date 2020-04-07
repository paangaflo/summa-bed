<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait UploadTrait
{
    public function uploadOne(UploadedFile $image, $imageFileName, $disk = 'public')
    {
        $s3 = \Storage::disk('s3');
        $filePath = '/manage-companies/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), $disk);
    }
}
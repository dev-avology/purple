<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class UploadService
{
    public function handleUploadedImages(UploadedFile $file, $destinationPath, $availableExtensions)
    {
        $isValid = $this->validateFileExtension($file->getClientOriginalExtension(), $availableExtensions);

        if ($isValid) {
            $fileName = rand() . '' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            return $fileName;
        }
        return false;
    }

    private function validateFileExtension($fileExtension, $availableExtensions) {
        return array_search($fileExtension, $availableExtensions);
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ProductImageUploadService implements ImageUploadServiceInterface
{
    public function uploadImage($files)
    {
        $uploadedImages = [];

        foreach ($files as $file) {
            $filename = uniqid() . '.' . $file->extension();
            $file->storeAs('product_images', $filename, 'public');
            $uploadedImages[] = 'product_images/' . $filename;
        }
        return json_encode($uploadedImages);
    }


}

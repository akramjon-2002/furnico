<?php
namespace App\Services;

class PostImageUploadService implements ImageUploadServiceInterface {
    public function uploadImage($file)
    {

        $filename = uniqid() . '.' . $file->extension();
        $file->storeAs('post_images', $filename, 'public');
        return 'post_images/' . $filename;
    }
}

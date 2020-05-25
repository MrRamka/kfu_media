<?php


namespace App\Model;


class UploadedImage extends Model
{
    public static function tableName(): string
    {
        return 'uploaded_image';
    }
}
<?php


namespace mediaparser\Actions\post;


class UploadAction
{
    public function run()
    {
        $url = $_GET['url'] ?? null;
        if (!$url) exit;

        $filename = uniqid() . '_' . array_reverse(explode('/', $url))[0];

        $uploaddir = wp_upload_dir();
        $uploadfile = $uploaddir['path'] . '/' . $filename;

        $contents = file_get_contents($url);
        $savefile = fopen($uploadfile, 'w');
        fwrite($savefile, $contents);
        fclose($savefile);
        die($uploaddir['url'] . '/' . $filename);
    }
}
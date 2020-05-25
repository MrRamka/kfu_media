<?php


namespace mediaparser\Actions\post;


class GetAction
{
    public function run()
    {
        global $wpdb;

        $url = $_GET['url'] ?? null;
        $newMd5 = $_GET['md5'] ?? null;
        if (!$url) die(json_encode(['error' => 'URL is empty']));

        $postID = $wpdb->get_var($wpdb->prepare('SELECT `post_id` FROM `' . $wpdb->postmeta . '` WHERE `meta_key`="parsed_url" AND `meta_value`="%s"', $url));
        if ($postID) {
            $md5 = $wpdb->get_var($wpdb->prepare('SELECT `meta_value` FROM `' . $wpdb->postmeta . '` WHERE `meta_key`="parsed_md5" AND `post_id`="%d"', $postID));
            if ($md5 != $newMd5) {
                $uploaded = $wpdb->get_var('SELECT COUNT(*) FROM ' . $wpdb->prefix . 'parsed_posts WHERE md5=' . $newMd5);
                if ($uploaded)
                    die(json_encode(['status' => -1]));
                else
                    die(json_encode(['status' => 1, 'post_id' => $postID]));
            } else
                die(json_encode(['status' => -1]));
        }

        die(json_encode(['status' => 0]));

    }
}
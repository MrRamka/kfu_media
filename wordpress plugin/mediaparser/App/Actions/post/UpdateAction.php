<?php


namespace mediaparser\Actions\post;


class UpdateAction
{
    public function run()
    {
        global $wpdb;
        if (!isset($_POST['content'])) return false;
        $data = $_POST;
        $id = (int)$_GET['id'] ?? null;

        $post = get_post($id);
        if (!$post) return false;

        $md5 = $wpdb->get_var($wpdb->prepare('SELECT `meta_value` FROM `' . $wpdb->postmeta . '` WHERE `meta_key`="parsed_md5" AND `post_id`="%d"', $post->ID));
        if ($data['md5'] == $md5) return false;
        $md5 = $wpdb->get_var($wpdb->prepare('SELECT `md5` FROM `' . $wpdb->prefix . 'parsed_posts` WHERE `post_id`="%d"', $post->ID));
        if ($data['md5'] == $md5) return false;

        $wpdb->insert($wpdb->prefix . 'parsed_posts', [
            'post_id' => $id,
            'post_content' => stripslashes($data['content']),
            'author' => $data['author'],
            'category' => $data['category'],
            'label' => $data['label'],
            'link' => $data['link'],
            'md5' => $data['md5'],
            'parser' => $data['parser'],
            'datetime' => time(),
            'post_date' => $data['date'],
        ]);
    }
}
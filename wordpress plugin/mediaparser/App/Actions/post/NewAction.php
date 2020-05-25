<?php


namespace mediaparser\Actions\post;


class NewAction
{
    public function run()
    {
        if (!isset($_POST['title'])) return false;

        $data = $_POST;

        $postID = wp_insert_post([
            'post_title' => $data['title'],
            'post_author' => 1, //todo set author
            'post_content' => '<!-- wp:paragraph -->' . $data['content'] . '<!-- /wp:paragraph -->',
            'post_status' => 'pending',
            'post_type' => 'post',
            //  'post_date' => date('Y-m-d H:i:s', $data['date']),
            //  'post_date_gmt' => gmdate('Y-m-d H:i:s', $data['date']),
        ]);

        if ($postID) {
            if ($data['author'])
                add_post_meta($postID, 'parsed_author', $data['author']);
            if ($data['category'])
                add_post_meta($postID, 'parsed_category', $data['category']);
            add_post_meta($postID, 'parsed_parser', $data['parser']);
            add_post_meta($postID, 'parsed_url', $data['link']);
            add_post_meta($postID, 'parsed_md5', $data['md5']);

            die(['status' => true, 'post' => $postID]);
        } else die(['status' => false]);
    }
}
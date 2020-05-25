<?php


namespace mediaparser\Actions\post;


class PublishAction
{
    public function run()
    {
        global $wpdb;
        $id = (int)$_GET['id'] ?? null;
        $version = $wpdb->get_row('SELECT * FROM `' . $wpdb->prefix . 'parsed_posts` WHERE `id`=' . $id, 'ARRAY_A');
        if (!$version) exit;

        if (!current_user_can('edit_post', $version['post_id'])) exit;

        $post = get_post($version['post_id'], 'ARRAY_A');
        $post['post_content'] = '<!-- wp:paragraph -->'.$version['post_content'].'<!-- /wp:paragraph -->';

        $postID = wp_update_post($post);
        update_post_meta($post['ID'], 'parsed_md5', $version['md5']);
        if ($version['author'])
            update_post_meta($post['ID'], 'parsed_author', $version['author']);
        if ($version['category'])
            update_post_meta($post['ID'], 'parsed_category', $version['category']);

        if ($postID) {
            $wpdb->query('DELETE FROM `' . $wpdb->prefix . 'parsed_posts` WHERE `id`=' . $id);
            die('success');
        }
        exit;
    }
}
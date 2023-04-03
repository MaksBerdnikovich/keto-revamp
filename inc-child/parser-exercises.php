<?php
if (class_exists('WP_CLI')) {
    \WP_CLI::add_command('exercises', 'add_workouts_command');
    \WP_CLI::add_command('vimeo', 'link_vimeo_command');
}

function add_workouts_command($args, $assoc_args)
{
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $wp_upload_dir = wp_upload_dir();
    $workoutsUrl = $wp_upload_dir['baseurl'] . '/workouts.json';
    $workoutsData = file_get_contents($workoutsUrl);
    $json = json_decode($workoutsData, true);
    $addedWorkouts = [];
    foreach ($json as $item) {
        foreach ($item['workouts'] as $exercise) {
            $title = $exercise['title'];
            if (in_array($title, $addedWorkouts)) {
                continue;
            }
            $difficulty = $exercise['difficulty'];
            $difficulty = str_replace('width: ', '', $difficulty);
            $difficulty = str_replace('%;', '', $difficulty);
            $difficulty = round($difficulty);
            $time = str_replace('Duration ', '', $exercise['time']);
            $post_data = [
                'post_title'   => wp_strip_all_tags($title),
                'post_content' => $exercise['description'],
                'post_status'  => 'publish',
                'post_author'  => 1,
                'post_type'    => 'exercise',
            ];

            $postId = wp_insert_post($post_data);
            update_field('video_url', $exercise['video'], $postId);
            update_field('difficulty', $difficulty, $postId);
            update_field('time', $time, $postId);

            $image = $exercise['image'];
            if ($image) {
                $image = trim($image, '\'');
                $image = "https://ketocycle.diet/" . $image;

                $imageId = attach_exercise_image(str_replace(' ', '_', $title) . '.png', $image);
                if ($imageId) {
                    set_post_thumbnail($postId, $imageId);
                }
            }

            $addedWorkouts[] = $title;
        }
    }
}

function attach_exercise_image($filename, $imageUrl)
{
    $wp_upload_dir = wp_upload_dir();
    $imageData = file_get_contents($imageUrl);
    if (! $imageData) {
        return false;
    }
    $file = $wp_upload_dir['path'] . '/' . $filename;
    file_put_contents($file, $imageData);
    $wpFiletype = wp_check_filetype($filename, null);
    $attachment = [
        'post_mime_type' => $wpFiletype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'publish',
    ];
    $attachmentId = wp_insert_attachment($attachment, $file);
    $attachmentMetadata = wp_generate_attachment_metadata($attachmentId, $file);
    wp_update_attachment_metadata($attachmentId, $attachmentMetadata);

    return $attachmentId;
}

function link_vimeo_command()
{
    $wp_upload_dir = wp_upload_dir();

    $workoutsUrl = $wp_upload_dir['baseurl'] . '/videos.json';
    $workoutsData = file_get_contents($workoutsUrl);
    $json = json_decode($workoutsData, true);
    foreach ($json['data'] as $item) {
        $html = $item['embed']['html'];
        $html = str_replace('<iframe src="', '', $html);
        $html = explode('"', $html);
        $embed = $html[0];
        global $wpdb;
        $id = $wpdb->get_var($wpdb->prepare("SELECT id from $wpdb->posts WHERE post_type=%s AND post_title=%s",'exercise',  $item['name']));
        if ($id) {
            update_field('vimeo_embed', $embed, $id);
        }
    }
}

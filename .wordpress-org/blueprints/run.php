<?php require '/wordpress/wp-load.php';

$url = 'https://plugins.svn.wordpress.org/audio-on-every-block/assets/blueprints/sample.mp3';
$filename = basename($url);

// Array zum Speichern der Bild-Daten vorbereiten
$attachment_data = array(
    'post_mime_type' => 'audio/mp3',
    'post_title' => 'example.mp3',
    'post_content' => '',
    'post_status' => 'inherit'
);
$upload_file = wp_upload_bits( $filename, null, file_get_contents( $url ));
// Datei aktualisieren und der Variante zuordnen
$attach_id = wp_insert_attachment($attachment_data, $upload_file['file'] );

wp_update_post(array('ID' => 1, 'post_title' => 'Audio on every Block example', 'post_content' => '<!-- wp:paragraph {"audioPlaybackId":'.$attach_id.'} --><p>Test the functionality of Audio on every block. We have already added an example on this paragraph block.</p><!-- /wp:paragraph -->'));
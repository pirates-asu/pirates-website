<?php
require "database.php";
$db = new DB();

if (isset($_POST['add_course'])) {

    $c_name = $db->escapeString($_POST['course_name']);
    $c_auth = $db->escapeString($_POST['course_author']);
    $c_link = $db->escapeString($_POST['course_link']);

    $cadd = $db-> addCourse($c_name, $c_auth, $c_link, 0);
    if ($cadd)
        ack_added(0);
}

if (isset($_POST['add_video'])) {
    $v_name = $db->escapeString($_POST['video_name']);
    $v_link = $db->escapeString($_POST['video_link']);
    $c_id = $db->escapeString($_POST['course_with_vid']);
    
    $vadd = $db->addVideo($v_name, $v_link, $c_id);
    if ($vadd)
        ack_added(1);
}

if (isset($_POST['remove_course'])) {
    $course_id = $db->escapeString($_POST['courses']);
    $course_rem = $db->removeCourse($course_id);
    ack_removed($course_rem, 0);
}

if (isset($_POST['remove_video'])) {
    $video_id = $db->escapeString($_POST['videos']);
    $vid_rem = $db->removeVideo($video_id, NULL);
    ack_removed($vid_rem, 1);
}

?>
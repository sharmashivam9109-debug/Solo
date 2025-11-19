<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $url = $_POST["url"];
    $filename = uniqid().".mp4";

    $cmd = "yt-dlp -o '$filename' '$url'";
    shell_exec($cmd);

    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=$filename");
    readfile($filename);
    unlink($filename);
    exit;
}
?>

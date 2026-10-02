<?php
/**
 * Converts project screenshots (PNG) to optimized JPEGs.
 * Run: php scripts/optimize-shots.php
 */
$dir = __DIR__ . '/../public/assets/img/projects';
$files = glob($dir . '/*.png');

foreach ($files as $src) {
    $base = pathinfo($src, PATHINFO_FILENAME);
    $dst  = $dir . '/' . $base . '.jpg';

    $info = getimagesize($src);
    if ($info === false) {
        echo "skip (not image): $base\n";
        continue;
    }

    $im = @imagecreatefrompng($src);
    if ($im === false) {
        echo "skip (decode fail): $base\n";
        continue;
    }

    $w = imagesx($im);
    $h = imagesy($im);

    // Scale down to max width 1000px
    $max = 1000;
    $scale = min($max / $w, 1);
    $nw = (int) round($w * $scale);
    $nh = (int) round($h * $scale);

    $canvas = imagecreatetruecolor($nw, $nh);
    // Flatten transparency onto white
    $white = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $white);
    imagecopyresampled($canvas, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);

    imagejpeg($canvas, $dst, 82);

    imagedestroy($im);
    imagedestroy($canvas);

    printf("%-32s %dx%d -> %s.jpg (%d KB)\n", $base, $w, $h, $base, (int) (filesize($dst) / 1024));
}

echo "done\n";

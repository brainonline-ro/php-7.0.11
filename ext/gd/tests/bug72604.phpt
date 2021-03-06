--TEST--
Bug #72604 (imagearc() ignores thickness for full arcs)
--SKIPIF--
<?php
if (!extension_loaded('gd')) die('skip requires ext/gd');
if (!(imagetypes() & IMG_PNG)) die('skip requires PNG support');
?>
--FILE--
<?php
$im = imagecreatetruecolor(100, 100);
imagesetthickness($im, 5);
imagearc($im, 50, 50, 90, 90, 0, 360, 0xffffff);
ob_start();
imagegd($im);
$imagestring = ob_get_clean();
echo md5($imagestring);
?>
--EXPECT--
4f5080080a774efe4fc8d55cd4a5849c

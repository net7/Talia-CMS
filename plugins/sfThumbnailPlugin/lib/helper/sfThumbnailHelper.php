<?php

/**
 * Get the path of a generated thumbnail for any given image
 *
 * @param string $source
 * @param int $width
 * @param int $height
 * @param boolean $absolute
 * @return string
 */
function thumbnail_path($source, $width, $height, $absolute = false)
{
	$thumbnails_dir = sfConfig::get('app_sfThumbnail_thumbnails_dir', 'uploads/thumbnails');
	
	$width = intval($width);
	$height = intval($height);
	
	if (substr($source, 0, 1) == '/') {
		$realpath = sfConfig::get('sf_web_dir') . $source;
	} else {
		$realpath = sfConfig::get('sf_web_dir') . '/images/' . $source;
	}
	
	$real_dir = dirname($realpath);
	$thumb_dir = '/' . $thumbnails_dir . substr($real_dir, strlen(sfConfig::get('sf_web_dir')));
	$thumb_name = preg_replace('/^(.*?)(\..+)?$/', '$1_' . $width . 'x' . $height . '$2', basename($source));
	
	$img_from = $realpath;
	$thumb = $thumb_dir . '/' . $thumb_name;
	$img_to = sfConfig::get('sf_web_dir') . $thumb;
	
	if (!is_dir(dirname($img_to))) {
		if (!mkdir(dirname($img_to), 0777, true)) {
			throw new Exception('Cannot create directory for thumbnail : ' . $img_to);
		}
	}
	
	if (!is_file($img_to) || filemtime($img_from) > filemtime($img_to)) {
		$thumbnail = new sfThumbnail($width, $height);
		$thumbnail->loadFile($img_from);
		$thumbnail->save($img_to);
	}
	
	return image_path($thumb, $absolute);
}

/**
 * Get the <img> tag to include a thumbnail into your web page
 *
 * @param string $source
 * @param int $width
 * @param int $height
 * @param mixed $options
 * @return string
 */
function thumbnail_tag($source, $width, $height, $options = array())
{
	$img_src = thumbnail_path($source, $width, $height, false);
	return image_tag($img_src, $options);
}

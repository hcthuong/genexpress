<?php
/******** class_resize.php ***********
Creator		: Bruno VIBERT
E-mail		: bvibert@mytracer.com
Date		: 01/20/2003
Version    : First and last
Descripton : Copy uploaded image keeping aspect ratio
*********************************/
class resize
{
	var $iOrig = array();		// uploaded image
	var $iNew = object;			// image created object

	// Contructor resize( ARRAY postimage [, INT mawWidth, INT maxHeight])
	// Resize the uploaded image and sets width and/or height to the maximum
	// value, keeping the aspect ratio
	// ie resize( var, 100, 50 ) an image that size is 200x50 will return an image of 100x25
	function resize( $postImage, $maxWidth = 10000, $maxHeight = 10000 )
	{
		global $_FILES;
		$this -> iOrig = $_FILES[ $postImage ];
		$this -> type = $this -> imageType( );
		$picInfos = getimagesize( $this -> iOrig[ 'tmp_name' ] );
		$width = $picInfos[0];
		$height = $picInfos[1];
		if( $width > $maxWidth & $height <= $maxHeight )
		{
			$ratio = $maxWidth / $width;
		}
		elseif( $height > $maxHeight & $width <= $maxWidth )
		{
			$ratio = $maxHeight / $height;
		}
		elseif( $width > $maxWidth & $height > $maxHeight )
		{
			$ratio1 = $maxWidth / $width;
			$ratio2 = $maxHeight / $height;
			$ratio = ($ratio1 < $ratio2)? $ratio1:$ratio2;
		}
		else
		{
			$ratio = 1;
		}
		$nWidth = floor($width*$ratio);
		$nHeight = floor($height*$ratio);
		//echo "$nWidth - $nHeight";exit;
		if( $this -> type == 'JPG' )
			 $origPic = imagecreatefromjpeg( $this -> iOrig[ 'tmp_name' ] );
		elseif( $this -> type == 'PNG' )
	 		$origPic = imagecreatefrompng( $this -> iOrig[ 'tmp_name' ] );
	 	elseif( $this -> type == 'GIF' )
	 		$origPic = imagecreatefromgif( $this -> iOrig[ 'tmp_name' ] );

		$this -> iNew = imagecreatetruecolor($nWidth,$nHeight);
		ImageCopyResized($this -> iNew, $origPic, 0, 0, 0, 0, $nWidth, $nHeight, $width, $height);

	}

	// function imageType(); return JPG/PNG (so cool !)
	function imageType( )
	{
		if( eregi( "jpeg", $this -> iOrig[ 'type' ]) ) // JPG
			 return "JPG";
		elseif( eregi( "png", $this -> iOrig[ 'type' ] ) ) // PNG
	 		return "PNG";
	 	elseif( eregi( "gif", $this -> iOrig[ 'type' ] ) ) // GIF
	 		return "GIF";
	}
	// function saveTo( STRING name [, STRING path ] )
	// save the new image in the specified path, with the specified name
	function saveTo( $name = '', $path = "./" )
	{
		if( empty( $name ) )
			echo "name!";
		elseif( !is_dir( $path ) )
			echo "$path is not a directory!";
		else
		{
			if( $this -> type == 'JPG' )
				imagejpeg( $this -> iNew, $path.$name, 100 );
			elseif( $this -> type == 'PNG' )
				imagepng( $this -> iNew, $path.$name, 9 );
			elseif( $this -> type == 'GIF' )
				imagegif( $this -> iNew, $path.$name );
		}
	}

}
?>
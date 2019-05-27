<?php

class parseResource {
	public $resourcePath;
	public $key;
	public $error;
	public $alias;
	function getResourcePath() {
	return $this->resourcePath;
}
function getKey() {
	return $this->key;
}
function getAlias() {
	return $this->alias;
}
function setResourcePath($path) {
	//echo "in set PATH";
	$this->resourcePath = $path;
}
function setAlias($alias) {
	//echo "in set ALIAS";
	$this->alias = $alias;
}
function setKey($key) {
	//echo "in set key";
	$this->key = $key;
}
function createCGZFromCGN() {
	{
		//echo "<br/><br/><br/><br/>".$this->key."<br/><br/><br/>".$this->alias."<br/><br/>".$this->resourcePath;
		$filenameInput = $this->getResourcePath () . "resource.cgn";
		$handleInput = fopen ( $filenameInput, "r" );
		$contentsInput = fread ( $handleInput, filesize ( $filenameInput ) );
		$filenameOutput = $this->getResourcePath () . "resource.cgz";
		//echo "filenameOutput" . $filenameOutput;
		
	//	@unlink ( $filenameOutput );
		$handleOutput = fopen ( $filenameOutput, "w" );
		// $inByteArray = $this->getBytes ( $contentsInput );
		//echo "<br/><br/>POOJA". $this->key."<br/>";
		$dec = $this->decryptData ( $contentsInput, $this->key ); // Decrypts data 3-DES ECB MODE
		                                                          // $dec=decrypt($inByteArray);
		                                                          // $outByteArray = $this->simpleXOR ( $inByteArray );
		                                                          // fwrite ( $handleOutput, $this->getString ( $dec ) );
		//echo "<br/><br/>". $this->key."<br/>" . $contentsInput . "<br/><br/><br/>" . $dec . "<br/><br/><br/>";
		fwrite ( $handleOutput, $dec );
		
		fclose ( $handleInput );
		fclose ( $handleOutput );
	}
	return true;
}
function readZip() {
	$s = "";
	{
		$filenameInput = $this->getResourcePath () . "resource.cgz";
		$zipentry;
		$i = 0;
		$zip = new ZipArchive ();
		$zp = $zip->open ( $filenameInput );
		// var_dump($zp);
		if ($zp === TRUE) {
			$zip->extractTo ( $this->resourcePath );
			$zip->close ();
		} else {
			echo 'failed';
			$this->error = "Failed to unzip file";
		}
		// echo $this->error;
		 if (strlen ( $this->error ) === 0) {
			$xmlNameInput = $this->resourcePath . $this->getAlias () . ".xml";
			$xmlHandleInput = fopen ( $xmlNameInput, "r" );
			$xmlContentsInput = fread ( $xmlHandleInput, filesize ( $xmlNameInput ) );
			fclose ( $xmlHandleInput );
			unlink ( $xmlNameInput );
			$s = $xmlContentsInput;
			$S = $s = $this->decryptData ( $s, $this->key );
			// $s = $this->getString ( $this->getBytes ( $s ) );
			// $s = $this->getString ( $this->simpleXOR ( $this->getBytes ( $s ) ) );
		} else {
			$this->error = "Unable to open resource";
		} 
		// echo "DATA FROM ALIAS.XML IS ----> ".var_dump($s);
		return $s;
	}
}


function decryptData($data, $key) {
	$data = mcrypt_decrypt ( MCRYPT_3DES, $key, $data, MCRYPT_MODE_ECB );
	$block = mcrypt_get_block_size ( 'tripledes', 'ecb' );
	$len = strlen ( $data );
	$pad = ord ( $data [$len - 1] );
	$decr = substr ( $data, 0, strlen ( $data ) - $pad );
	// echo $decr . "<br/><br/><br/><br/>";
	return $decr;
}
/*
 * function decrypt($plaintext, $key) {
 * $cipher = new Crypt_TripleDES ( CRYPT_DES_MODE_ECB );
 * $block = mcrypt_get_block_size ( 'tripledes', 'ecb' );
 * $cipher->setKey ( $key );
 * $cryptText = $cipher->decrypt ( $cipher->encrypt ( $plaintext ) );
 *
 * echo $cryptText;
 * return $cryptText;
 * }
 */
function getBytes($s) {
	$hex_ary = array ();
	$size = strlen ( $s );
	for($i = 0; $i < $size; $i ++)
		$hex_ary [] = chr ( ord ( $s [$i] ) );
	return $hex_ary;
}
function getString($byteArray) {
	$s = "";
	foreach ( $byteArray as $byte ) {
		$s .= $byte;
	}
	return $s;
}
function StartsWith($Haystack, $Needle) {
	// Recommended version, using strpos
	return strpos ( $Haystack, $Needle ) === 0;
}
function EndsWith($Haystack, $Needle) {
	// Recommended version, using strpos
	return strrpos ( $Haystack, $Needle ) === strlen ( $Haystack ) - strlen ( $Needle );
}
function xor_string($string) {
	$buf = '';
	$size = strlen ( $string );
	for($i = 0; $i < $size; $i ++)
		$buf .= chr ( ord ( $string [$i] ) ^ 255 );
	return $buf;
}
}

?>
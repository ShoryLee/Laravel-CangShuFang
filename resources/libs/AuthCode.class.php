<?php
//开启session，存储验证码值
session_start();
header("content-type:image/png");
//验证码类
class AuthCode {
	private $height = 30;	//验证码图片高度
	private $width = 100;		//验证码图片宽度
	private $codeNum = 4;	//验证码字符个数
	private $pixels = 300;	//干扰点
	private $lines = 3;		//线条数
	private $characters = null;//验证码字符
	private $img = null;//图像资源句柄
	
/* 	//包含5个参数
	//验证码 高度、宽度、字符数、干扰点、线条
	public function __construct($height,$width,$codeNum,$pixels,$lines){
		//判断用户设置验证码图片大小
		if(isset($height) && isset($width)){
			if($height > 20 && $height < 200 && $width > 10 && $width <500 ){
				$this->height = $height;
				$this->width = $width;	
			}
		}else{
			$this->height = 30;
			$this->width = 100;			
		}
		//判断用户输入验证码字符数
		if(isset($codeNum)){
			if($codeNum > 3 && $codeNum < 6){
				$this->codeNum = $codeNum;
			}
		}else{
			$this->codeNum = 4;
		}
		//判断用户数输入干扰信息
		if(isset($pixels) && isset($lines)){
			if($pixels > 50 && $pixels < 1000 && $lines > 1 && $lines < 5){
				$this->pixels = $pixels;
				$this->lines = $lines;
			}	
		}else{
			$this->pixels = 200;
			$this->lines = 3;			
		}
	} */
	
	/*
	 *创建验证码背景
	 */
	private function bgColor(){
		$this->img = imagecreatetruecolor($this->width,$this->height);
		$whiteColor = imagecolorallocate($this->img,255,255,255);
		imagefill($this->img,0,0,$whiteColor);
	}
	
	/*
	 *创建验证码
	 */
	 private function createCode(){
		for($i=0;$i<$this->codeNum;$i++){
			$fontSize = 5;
			$fontColor = imagecolorallocate($this->img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
			$oneCode = mt_rand(0,69);
			$allCode = array_merge(range(1,9),range('a','z'),range(1,9),range('A','Z'));
			$this->characters .= $allCode[$oneCode];
			$x = ($i*$this->width/$this->codeNum) + mt_rand(5,10);
			$y = mt_rand(5,10);
			imagestring($this->img,$fontSize,$x,$y,$allCode[$oneCode],$fontColor);		
		}
		$_SESSION['authCode'] = strtolower($this->characters);
	 }
	 
	/*
	 *创建干扰点
	 */	 
	 private function createPixels(){
		 for($i=0;$i<$this->pixels;$i++){
			$pixelColor = imagecolorallocate($this->img,mt_rand(50,250),mt_rand(50,250),mt_rand(50,250));
			imagesetpixel($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),$pixelColor);
		 }
	 }

	/*
	 *创建干扰线条
	 */
	private function createLines(){
		for($i=0;$i<$this->lines;$i++){
			$x1 = mt_rand(0,10);
			$y1 = mt_rand(0,$this->height);
			$x2 = mt_rand($this->width-10,$this->width);
			$y2 = mt_rand(0,$this->height);
			$lineColor = imagecolorallocate($this->img,mt_rand(190,255),mt_rand(190,255),mt_rand(190,255));
			imageline($this->img,$x1,$y1,$x2,$y2,$lineColor);
		}
	}
	 
	/*
	 *输出验证码，并销毁
	 */
	public function outputCode(){
		$this->bgColor();
		$this->createPixels();
		$this->createLines();
		$this->createCode();
		imagepng($this->img);
		imagedestroy($this->img);
	}
}

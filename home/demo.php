<?php
  class demo{
      public $width=100;
      public $height=32;
      public $letter='3456789uytrewqplkjhgfdsamnbvcxPUYTREWQLKJHGFDSAMNBVCX';
      public $letterNum=4;
      public $lineNum=5;
      public $pixNum=30;
      public $result;  // 记录验证码
      public $fontFile ='msyh.ttf';  // 修改
      public $img;

      private function create(){
          $this->img = imagecreatetruecolor($this->width,$this->height);
          $arr = $this->bgColor();
          $color = imagecolorallocate($this->img,$arr[0],$arr[1],$arr[2]);
          imagefill($this->img,0,0,$color);
      }

      private function drawLine(){
          for($i=0;$i<$this->lineNum;$i++){
              $x = mt_rand(0,$this->width/2);
              $y = mt_rand(0,$this->height/2);
              $x1 = mt_rand($this->width/2,$this->width);
              $y1 = mt_rand($this->height/2,$this->height);
              $arr = $this->bgColor();
              $color = imagecolorallocate($this->img,$arr[2],$arr[1],$arr[0]);
              imageline($this->img,$x,$y,$x1,$y1,$color);
          }
          for($i=0;$i<$this->pixNum;$i++){
              $x = mt_rand(0,$this->width);
              $y = mt_rand(0,$this->height);
              $arr = $this->bgColor();
              $color = imagecolorallocate($this->img,$arr[2],$arr[1],$arr[0]);
              imagesetpixel($this->img,$x,$y,$color);
          }
      }

      private function drawChar(){
          $this->getChar();
          $x= $this->width / $this->letterNum;
          $y = $this->height/2;
          for($i=0;$i<$this->letterNum;$i++){
              $arr = $this->textColor();
              $color = imagecolorallocate($this->img,$arr[2],$arr[1],$arr[0]);
              imagettftext($this->img,mt_rand(15,20),mt_rand(-15,15),$x*$i+5,mt_rand($y,$y+10),$color,$this->fontFile,$this->result[$i]);
          }
      }

      private function getChar(){
          $len = strlen($this->letter)-1;
          for($i=0;$i<$this->letterNum;$i++){
              $this->result .= substr($this->letter,mt_rand(0,$len),1);
          }
          $this->result = strtolower($this->result);
      }


      public function bgColor(){
          $arr[0] = mt_rand(0,127);
          $arr[1] = mt_rand(0,127);
          $arr[2] = mt_rand(0,127);
          return $arr;
      }
      public function textColor(){
          $arr[0] = mt_rand(128,255);
          $arr[1] = mt_rand(128,255);
          $arr[2] = mt_rand(0,255);
          return $arr;
      }

      function output(){
          header('Content-type:image/png');
          $this->create();
          $this->drawLine();
          $this->drawChar();
          imagepng($this->img);

//          ob_start();
//          imagepng($this->img);
//          $contents =  ob_get_contents();
//          ob_end_clean();
//          echo base64_encode($contents);
          imagedestroy($this->img);
      }
  }

  $c = new demo();
  $c->output();
  session_start();
  $_SESSION['img'] =$c->result;

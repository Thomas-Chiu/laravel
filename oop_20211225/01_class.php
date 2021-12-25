<?php
// 建立 class
class Rectangle
{
  // 屬性 (預設值)
  public $width = 100;
  // 私有變數
  private $height = 100;
  // 靜態變數
  public static $count = 0;


  // 初始化
  public function __construct(int $widthInput, int $heightInput)
  {
    // 驗證
    if ($widthInput > 0) {
      $this->width = $widthInput;
    }
    if ($heightInput > 0) {
      $this->height = $heightInput;
    }
    // 靜態無 this，用 self
    self::$count++;
    echo "我是 Rectangle 物件 " . self::$count . "<br>";
  }

  public function getArea()
  {
    return $this->width * $this->height;
  }

  public function printProps()
  {
    echo "長 = $this->width <br>";
    echo "寬 = $this->height <br>";
    echo "面積 = " . $this->getArea() . "<hr>";
  }
}


// 建立實體 (物件)
$obj = new Rectangle(500, 250);
echo $obj->printProps();

// 每次 new 都是新物件，重複會合併
$obj2 = new Rectangle("250", "125");
$obj2 = new Rectangle("250", "125");
$obj2 = new Rectangle("250", "125");
echo $obj2->printProps();

$obj3 = new Rectangle(-10, -50);
echo $obj3->printProps();
// 物件無權限存取 private 變數
echo $obj3->height;
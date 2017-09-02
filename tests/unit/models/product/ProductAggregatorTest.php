<?php
use app\modules\product\models\admin\Product;
use app\modules\product\models\ProductAggregator;

class ProductAggregatorTest extends \Codeception\Test\Unit {
    /**
     * @var \UnitTester
     */
    protected $product;
    protected $productAggregator;

    protected function _before() {
        $this->product = Product::find()->one();
//        $this->productAggregator = new ProductAggregator($this->product);
    }

    protected function _after() {
        unset($this->product);
        unset($productAggregator);
    }

    // tests
    public function testSquare() {

        $class = new ReflectionClass('app\modules\product\models\ProductAggregator');
        $setSquare = $class->getMethod('setSquare');
        $setSquare->setAccessible(true);
        $length = $class->getProperty('length');
        $length->setAccessible(true);
        $width = $class->getProperty('width');
        $width->setAccessible(true);
        $productAggregator = new productAggregator($this->product);

        $length->setValue($productAggregator, null);
        $width->setValue($productAggregator, null);
        $setSquare->invoke($productAggregator);
        $this->assertEquals(NULL, $productAggregator->square);

        $length->setValue($productAggregator, null);
        $width->setValue($productAggregator, 1000);
        $setSquare->invoke($productAggregator);
        $this->assertEquals(NULL, $productAggregator->square);

        $length->setValue($productAggregator, 1000);
        $width->setValue($productAggregator, null);
        $setSquare->invoke($productAggregator);
        $this->assertEquals(NULL, $productAggregator->square);

        $length->setValue($productAggregator, 1000);
        $width->setValue($productAggregator, 1000);
        $setSquare->invoke($productAggregator);
        $this->assertEquals(1, $productAggregator->square);

    }
}
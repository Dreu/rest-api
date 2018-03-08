<?php
/**
 * Created by PhpStorm.
 * User: gassama
 * Date: 08/03/18
 * Time: 13:58
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\LogicException;

class ProductTest extends TestCase
{
    public function testcomputeTVAFoodProduct() {

        $product = new Product('Un Produit', Product::FOOD_PRODUCT, 20);

        $this->assertSame(1.1, $product->computeTVA());

    }

    public function testOtherTypeComputeTVA() {

        $product = new Product("Un autre produit", 'Autre Type', 20);

        $this->assertSame(3.92, $product->computeTVA());

    }

    public function testNegativeComputeTva() {

        $product = new Product('Test', Product::FOOD_PRODUCT, -20);

        $this->expectException('LogicException');

        $product->computeTVA();

    }

}
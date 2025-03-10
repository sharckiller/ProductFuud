<?php 
    namespace App\Tests\Entity;
    use App\Entity\Product;
    use PHPUnit\Framework\TestCase;
    class ProductTest extends TestCase{
        public function testDefault(){
            $product=new Product ('pomme','food',1);
            $this->assertSame(0.055,$product ->computeTVA());
            
        }
        public function testFr(){
            $product=new Product ('banana','fruit',1);
            $this->assertSame(0.196,$product ->computeTVA());
        }

        public function testInvalid(){
            $p = new product("pomme","fruit",-5);
            $this -> expectException("Exception");
            $p -> computeTVA();
        }

        /**
         * @dataProvider pricesforfood
         */

         public function testMultiPrices($prix,$TVA){
            $p = new Product ("produit","food",$prix);
            $this -> assertSame($TVA,$p ->computeTVA());
         }

         public function pricesForFood(){
            return [[0,0.0,0],[1.0,0.055],[10.0,0.55],[20.0,1.1]];
         }
    }
?>
<?php

namespace BigCommerce\Tests\Api\Catalog\Products;

use BigCommerce\Tests\BigCommerceApiTest;

class VariantsApiTest extends BigCommerceApiTest
{
    public function testHasProductAndVariantId(): void
    {
        $expectedProductId = 12;
        $expectedVariantId = 32;

        $variantApi = $this->getApi()->catalog()->product($expectedProductId)->variant($expectedVariantId);
        $this->assertEquals($expectedProductId, $variantApi->getParentResourceId());
        $this->assertEquals($expectedVariantId, $variantApi->getResourceId());
    }

    public function testCanGetProductVariant(): void
    {
        $productId = 192;
        $variantId = 384;
        $this->setReturnData('catalog__products__variants__384__get.json');

        $variantResponse = $this->getApi()->catalog()->product($productId)->variant($variantId)->get();
        $this->assertEquals($productId, $variantResponse->getProductVariant()->product_id);
        $this->assertEquals($variantId, $variantResponse->getProductVariant()->id);
    }

    public function testCanGetAllProductVariants(): void
    {
        $productId = 192;
        $this->setReturnData('catalog__products__variants__get_all.json');

        $variantsResponse = $this->getApi()->catalog()->product($productId)->variants()->getAll();
        $this->assertEquals(3, $variantsResponse->getPagination()->total);
        $this->assertCount(3, $variantsResponse->getProductVariants());
    }
}

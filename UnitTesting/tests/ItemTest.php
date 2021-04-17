<?php
use App\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testNewItemHasEmptyTitle()
    {
        $item = new Item;
        $this->assertSame($item->title, '');
    }

    public function testGetSlagMethodReturnString()
    {
        $item = new Item;
        $this->assertIsString($item->getSlug());
    }

    public function testGetSlagReturnUnderScorizedTitle()
    {
        $item = new Item;
        $item->title = "This is test";
        $this->assertSame($item->getSlug(), 'This_is_test');
    }
}
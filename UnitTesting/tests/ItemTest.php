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
}
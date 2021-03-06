<?php
use Recipe_Finder\Item;

class ItemTest extends \PHPUnit_Framework_TestCase
{
	public function testSetName()
	{
		$item = new Item();
		$item->setName('test_name');
		$this->assertEquals('test_name',$item->getName());
	}

	public function testSetExpiration()
	{
		$item = new Item();
		$item->setExpiration('30/03/2015');
		$this->assertEquals('1427634000',$item->getExpiration());
	}

	/**
     * @expectedException        \Exception
     * @expectedExceptionMessage Item expiration date should be in the following format dd/mm/yyyy
     */
    public function testSetExpirationException()
    {
		$item = new Item();
		$item->setExpiration('asdas/asdas/2020');
		$item->getExpiration();
    }

    public function testIsExpired()
	{
		$item = new Item();
		$item->setExpiration('20/02/2021');
		$this->assertEquals(true, $item->isExpired());
		$item->setExpiration('20/02/2021');
		$this->assertEquals(false, $item->isExpired());
	}

    public function testIncreaseAmount()
    {
    	$item = new Item();
		$item->setAmount('10');
		$item->increaseAmount('5');
		$this->assertEquals('15',$item->getAmount());
    }

    /**
     * @expectedException        \Exception
     * @expectedExceptionMessage Item unit can be only of, grams, ml or slices
     */
    public function testSetUnit()
    {
    	$item = new Item();
		$item->setUnit('asdas');
    }
}

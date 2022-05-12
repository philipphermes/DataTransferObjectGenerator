<?php

namespace App\GeneratedDataTransferObjects;

class ProductTest 
{
	/** @var \App\Test\Test[] $testList*/
	private array $testList;

	private \App\Test\Test $test;

	private float $price;

	private int $quantity;

	/** 
	 * @return \App\Test\Test[]
	 */
	public function getTestList(): array
	{
		return $this->testList;
	}

	/** 
	 * @param \App\Test\Test[] $testList
	 * @return $this
	 */
	public function setTestList(array $testList): self
	{
		$this->testList = $testList;

		return $this;
	}

	public function addTest(\App\Test\Test $test): self
	{
		$this->testList[] = $test;

		return $this;
	}

	public function getTest(): \App\Test\Test
	{
		return $this->test;
	}

	public function setTest(\App\Test\Test $test): self
	{
		$this->test = $test;

		return $this;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function setPrice(float $price): self
	{
		$this->price = $price;

		return $this;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	public function setQuantity(int $quantity): self
	{
		$this->quantity = $quantity;

		return $this;
	}
}
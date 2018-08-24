<?php

namespace Ns\Afterbuy\Model\GetShopProducts;

use JMS\Serializer\Annotation as Serializer;
use Ns\Afterbuy\Model\FloatType;

/**
 * Class AdditionalPrice
 */
class AdditionalPrice
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("DefinitionId")
     * @var int
     */
    protected $definitionId;




	/**
	 * @Serializer\Type("string")
	 * @Serializer\SerializedName("Name")
	 * @var string
	 */
	protected $name;



	/**
	 * @Serializer\Type("Ns\Afterbuy\Model\FloatType")
	 * @Serializer\SerializedName("Value")
	 * @var FloatType
	 */
	protected $value;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Pretax")
     * @var int
     */
    protected $pretax;


	/**
	 * @return int
	 */
	public function getDefinitionId(): int {
		return $this->definitionId;
	}

	/**
	 * @param int $definitionId
	 */
	public function setDefinitionId( int $definitionId ): void {
		$this->definitionId = $definitionId;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( string $name ): void {
		$this->name = $name;
	}

	/**
	 * @return float
	 */
	public function getValue() {
		return $this->value->getValue();
	}

	/**
	 * @param FloatType $value
	 */
	public function setValue( FloatType $value ): void {
		$this->value = $value;
	}

	/**
	 * @return int
	 */
	public function getPretax(): int {
		return $this->pretax;
	}


	/**
	 * @param int $pretax
	 */
	public function setPretax( int $pretax ): void {
		$this->pretax = $pretax;
	}
}

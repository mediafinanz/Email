<?php

/**
 * @name $EmailDataType
 */
namespace Email\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTEmailAttachment
{
	use TraitDataType;

	public const DTHASH = '6f482d927bafbf82e9c290657eb5c7df';

	/**
	 * @required false
	 * @var string|null
	 */
	protected $name;

	/**
	 * @required false
	 * @var string|null
	 */
	protected $file;

	/**
	 * DTEmailAttachment constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTEmailAttachment.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();
		$this->name = null;
		$this->file = null;
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTEmailAttachment.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTEmailAttachment
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTEmailAttachment.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTEmailAttachment.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
	 * @param string|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_name(?string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmailAttachment.set_name.before', $oDTValue);
		$this->name = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_file(?string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmailAttachment.set_file.before', $oDTValue);
		$this->file = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string|null
	 * @throws \ReflectionException
	 */
	public function get_name() : ?string
	{
		$oDTValue = DTValue::create()->set_mValue($this->name); 
		\MVC\Event::run('DTEmailAttachment.get_name.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string|null
	 * @throws \ReflectionException
	 */
	public function get_file() : ?string
	{
		$oDTValue = DTValue::create()->set_mValue($this->file); 
		\MVC\Event::run('DTEmailAttachment.get_file.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_name()
	{
        return 'name';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_file()
	{
        return 'file';
	}

	/**
	 * @return false|string JSON
	 */
	public function __toString()
	{
        return $this->getPropertyJson();
	}

	/**
	 * @return false|string
	 */
	public function getPropertyJson()
	{
        return json_encode(\MVC\Convert::objectToArray($this));
	}

	/**
	 * @return array
	 */
	public function getPropertyArray()
	{
        return get_object_vars($this);
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function getConstantArray()
	{
		$oReflectionClass = new \ReflectionClass($this);
		$aConstant = $oReflectionClass->getConstants();

		return $aConstant;
	}

	/**
	 * @return $this
	 */
	public function flushProperties()
	{
		foreach ($this->getPropertyArray() as $sKey => $mValue)
		{
			$sMethod = 'set_' . $sKey;

			if (method_exists($this, $sMethod)) 
			{
				$this->$sMethod('');
			}
		}

		return $this;
	}

}

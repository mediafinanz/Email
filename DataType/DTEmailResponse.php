<?php

/**
 * @name $EmailDataType
 */
namespace Email\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTEmailResponse
{
	use TraitDataType;

	public const DTHASH = '2a3a3f06dabf97c82017626b7693b4db';

	/**
	 * @required true
	 * @var bool
	 */
	protected $bSuccess;

	/**
	 * @required false
	 * @var string
	 */
	protected $sMessage;

	/**
	 * @required false
	 * @var \Exception|null
	 */
	protected $oException;

	/**
	 * DTEmailResponse constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTEmailResponse.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();
		$this->bSuccess = false;
		$this->sMessage = null;
		$this->oException = null;
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTEmailResponse.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTEmailResponse
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTEmailResponse.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTEmailResponse.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
	 * @param bool $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_bSuccess(bool $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmailResponse.set_bSuccess.before', $oDTValue);
		$this->bSuccess = (bool) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_sMessage(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmailResponse.set_sMessage.before', $oDTValue);
		$this->sMessage = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param \Exception|null $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_oException(?\Exception $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmailResponse.set_oException.before', $oDTValue);
		$this->oException = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return bool
	 * @throws \ReflectionException
	 */
	public function get_bSuccess() : bool
	{
		$oDTValue = DTValue::create()->set_mValue($this->bSuccess); 
		\MVC\Event::run('DTEmailResponse.get_bSuccess.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_sMessage() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->sMessage); 
		\MVC\Event::run('DTEmailResponse.get_sMessage.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return \Exception|null
	 * @throws \ReflectionException
	 */
	public function get_oException() : ?\Exception
	{
		$oDTValue = DTValue::create()->set_mValue($this->oException); 
		\MVC\Event::run('DTEmailResponse.get_oException.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_bSuccess()
	{
        return 'bSuccess';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_sMessage()
	{
        return 'sMessage';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_oException()
	{
        return 'oException';
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

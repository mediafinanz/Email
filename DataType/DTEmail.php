<?php

/**
 * @name $EmailDataType
 */
namespace Email\DataType;

use MVC\DataType\DTValue;
use MVC\MVCTrait\TraitDataType;

class DTEmail
{
	use TraitDataType;

	public const DTHASH = '4ccbe8295ff14072d41a3bf74b6e7f1d';

	/**
	 * @required true
	 * @var string
	 */
	protected $subject;

	/**
	 * @required true
	 * @var array
	 */
	protected $recipientMailAdresses;

	/**
	 * @required true
	 * @var string
	 */
	protected $text;

	/**
	 * @required false
	 * @var string
	 */
	protected $html;

	/**
	 * @required true
	 * @var string
	 */
	protected $senderMail;

	/**
	 * @required true
	 * @var string
	 */
	protected $senderName;

	/**
	 * @required false
	 * @var \MVC\DataType\DTArrayObject
	 */
	protected $oAttachment;

	/**
	 * DTEmail constructor.
	 * @param DTValue $oDTValue
	 * @throws \ReflectionException 
	 */
	protected function __construct(DTValue $oDTValue)
	{
		\MVC\Event::run('DTEmail.__construct.before', $oDTValue);
		$aData = $oDTValue->get_mValue();
		$this->subject = null;
		$this->recipientMailAdresses = null;
		$this->text = null;
		$this->html = null;
		$this->senderMail = null;
		$this->senderName = null;
		$this->oAttachment = null;
		$this->setProperties($oDTValue);

		$oDTValue = DTValue::create()->set_mValue($aData); 
		\MVC\Event::run('DTEmail.__construct.after', $oDTValue);
	}

    /**
     * @param array|null $aData
     * @return DTEmail
     * @throws \ReflectionException
     */
    public static function create(?array $aData = array())
    {            
        (null === $aData) ? $aData = array() : false;
        $oDTValue = DTValue::create()->set_mValue($aData);
		\MVC\Event::run('DTEmail.create.before', $oDTValue);
		$oObject = new self($oDTValue);
        $oDTValue = DTValue::create()->set_mValue($oObject); \MVC\Event::run('DTEmail.create.after', $oDTValue);

        return $oDTValue->get_mValue();
    }

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_subject(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_subject.before', $oDTValue);
		$this->subject = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param array  $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_recipientMailAdresses(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_recipientMailAdresses.before', $oDTValue);

		$this->recipientMailAdresses = $mValue;

		return $this;
	}

	/**
	 * @param array $mValue
	 * @return $this
	 * @throws \ReflectionException 
	 */
	public function add_recipientMailAdresses(array $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($this->recipientMailAdresses); 
		\MVC\Event::run('DTEmail.add_recipientMailAdresses.before', $oDTValue);

		$this->recipientMailAdresses[] = $mValue;

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_text(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_text.before', $oDTValue);
		$this->text = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_html(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_html.before', $oDTValue);
		$this->html = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_senderMail(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_senderMail.before', $oDTValue);
		$this->senderMail = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param string $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_senderName(string $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_senderName.before', $oDTValue);
		$this->senderName = (string) $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @param \MVC\DataType\DTArrayObject $mValue 
	 * @return $this
	 * @throws \ReflectionException
	 */
	public function set_oAttachment(\MVC\DataType\DTArrayObject $mValue)
	{
		$oDTValue = DTValue::create()->set_mValue($mValue); 
		\MVC\Event::run('DTEmail.set_oAttachment.before', $oDTValue);
		$this->oAttachment = $oDTValue->get_mValue();

		return $this;
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_subject() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->subject); 
		\MVC\Event::run('DTEmail.get_subject.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return array
	 * @throws \ReflectionException
	 */
	public function get_recipientMailAdresses() : array
	{
		$oDTValue = DTValue::create()->set_mValue($this->recipientMailAdresses); 
		\MVC\Event::run('DTEmail.get_recipientMailAdresses.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_text() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->text); 
		\MVC\Event::run('DTEmail.get_text.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_html() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->html); 
		\MVC\Event::run('DTEmail.get_html.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_senderMail() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->senderMail); 
		\MVC\Event::run('DTEmail.get_senderMail.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 * @throws \ReflectionException
	 */
	public function get_senderName() : string
	{
		$oDTValue = DTValue::create()->set_mValue($this->senderName); 
		\MVC\Event::run('DTEmail.get_senderName.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return \MVC\DataType\DTArrayObject
	 * @throws \ReflectionException
	 */
	public function get_oAttachment() : \MVC\DataType\DTArrayObject
	{
		$oDTValue = DTValue::create()->set_mValue($this->oAttachment); 
		\MVC\Event::run('DTEmail.get_oAttachment.before', $oDTValue);

		return $oDTValue->get_mValue();
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_subject()
	{
        return 'subject';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_recipientMailAdresses()
	{
        return 'recipientMailAdresses';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_text()
	{
        return 'text';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_html()
	{
        return 'html';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_senderMail()
	{
        return 'senderMail';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_senderName()
	{
        return 'senderName';
	}

	/**
	 * @return string
	 */
	public static function getPropertyName_oAttachment()
	{
        return 'oAttachment';
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

<?php

namespace PhpTwinfield;

class Office
{
    /**
     * @var string The code of the office.
     */
    private $code;

    /**
     * @var string The code of the country of the office.
     */
    private $countryCode;

    /**
     * @var string The name of the office.
     */
    private $name;

    public static function fromCode(string $code) {
        $instance = new self;
        $instance->setCode($code);

        return $instance;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->getCode();
    }
}

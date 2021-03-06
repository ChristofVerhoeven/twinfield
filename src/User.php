<?php

namespace PhpTwinfield;

class User
{
    /**
     * @var string The code of the user.
     */
    private $code;

    /**
     * @var string The name of the user.
     */
    private $name;

    /**
     * @var string The short name of the user.
     */
    private $shortName;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode(string $code)
    {
        $this->code = $code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getShortName()
    {
        return $this->shortName;
    }

    public function setShortName(string $value)
    {
        $this->shortName = $value;
    }
}

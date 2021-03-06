<?php

namespace PhpTwinfield;

class BrowseFieldOption
{
    /** @var string */
    private $code;

    /** @var string|null */
    private $name;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return BrowseFieldOption
     */
    public function setCode(string $code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return BrowseFieldOption
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
}

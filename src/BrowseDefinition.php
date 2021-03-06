<?php

namespace PhpTwinfield;

use PhpTwinfield\Transactions\TransactionFields\OfficeField;

class BrowseDefinition
{
    use OfficeField;

    /** @var string */
    private $code;

    /** @var string */
    private $name;

    /** @var string */
    private $shortName;

    /** @var bool */
    private $visible;

    /** @var BrowseColumn[] */
    private $columns;

    /**
     * BrowseDefinition constructor.
     */
    public function __construct()
    {
        $this->columns = [];
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return BrowseDefinition
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
     * @return BrowseDefinition
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return BrowseDefinition
     */
    public function setShortName(string $shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVisible()
    {
        return $this->visible;
    }

    /**
     * @param bool $visible
     * @return BrowseDefinition
     */
    public function setVisible(bool $visible)
    {
        $this->visible = $visible;
        return $this;
    }

    /**
     * @return BrowseColumn[]
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param BrowseColumn $column
     * @return $this
     */
    public function addColumn(BrowseColumn $column)
    {
        $this->columns[$column->getID()] = $column;
        return $this;
    }

    /**
     * @param $index
     * @return bool
     */
    public function removeColumn($index)
    {
        if (array_key_exists($index, $this->columns)) {
            unset($this->columns[$index]);
            return true;
        } else {
            return false;
        }
    }

}

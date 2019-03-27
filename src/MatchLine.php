<?php

namespace PhpTwinfield;

use Money\Money;
use Webmozart\Assert\Assert;

class MatchLine
{
    /**
     * Daybook code (e.g. "CASH").
     *
     * @var string
     */
    private $transcode;

    /**
     * Transaction number.
     *
     * @var int
     */
    private $transnumber;

    /**
     * Transaction line number.
     *
     * @var int
     */
    private $transline;

    /**
     * @var Money|null
     */
    private $matchvalue;

    /**
     * @var Money|null
     */
    private $writeoff;

    /**
     * @var Enums\WriteOffType|null
     */
    private $writeofftype;

    /**
     * Create a new matchline based on a MatchReferenceInterface.
     *
     * If you want to add a write off, add it manually with setWriteOff(). Pass $value for partial matching.
     * @see setWriteOff()
     */
    public static function addToMatchSet(MatchSet $set, MatchReferenceInterface $reference, Money $value = null)
    {
        Assert::eq($set->getOffice(), $reference->getOffice());

        $instance = new self;
        $instance->transcode   = $reference->getCode();
        $instance->transnumber = $reference->getNumber();
        $instance->transline   = $reference->getLineId();
        $instance->setMatchvalue($value);

        $set->addLine($instance);

        return $instance;
    }

    /**
     * MatchLine constructor.
     * @see addToMatchSet
     */
    private function __construct() {}

    /**
     * @return string
     */
    public function getTranscode()
    {
        return $this->transcode;
    }

    public function getTransnumber()
    {
        return $this->transnumber;
    }

    public function getTransline()
    {
        return $this->transline;
    }

    public function getMatchValue()
    {
        return $this->matchvalue;
    }

    /**
     * Optional; only for partial payments. Include an "-" on credit lines.
     */
    public function setMatchvalue(Money $matchvalue = null)
    {
        $this->matchvalue = $matchvalue;

        return $this;
    }

    public function getWriteOff()
    {
        return $this->writeoff;
    }

    /**
     * Optional; only for exchange rate differences, write-off or deduction. Include an "-" on credit lines.
     */
    public function setWriteOff(Money $amount, Enums\WriteOffType $type)
    {
        $this->writeoff = $amount;
        $this->writeofftype = $type;

        return $this;
    }

    /**
     * Add the type attribute in order to determine what to do with the match difference.
	 * @return Enums\WriteOffType|null
     */
    public function getWriteOffType()
    {
        return $this->writeofftype;
    }
}
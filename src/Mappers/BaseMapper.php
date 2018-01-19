<?php

namespace PhpTwinfield\Mappers;

use Money\Currency;
use PhpTwinfield\Office;
use PhpTwinfield\Util;
use Webmozart\Assert\Assert;

abstract class BaseMapper
{
    protected static function setFromTagValue(\DOMDocument $document, string $tag, callable $setter): void
    {
        $value = self::getValueFromTag($document, $tag);

        if ($value === null) {
            return;
        }

        if ($tag === "office") {
            \call_user_func($setter, Office::fromCode($value));
            return;
        }

        if ($tag == "startvalue") {
            $currency = new Currency(self::getValueFromTag($document, "currency"));

            \call_user_func($setter, Util::parseMoney($value, $currency));

            return;
        }

        \call_user_func($setter, $value);
    }

    protected static function getValueFromTag(\DOMDocument $document, string $tag): ?string
    {
        /** @var \DOMNodeList $nodelist */
        $nodelist = $document->getElementsByTagName($tag);

        if (sizeof($nodelist) == 0) {
            return null;
        }

        Assert::count($nodelist, 1);

        /** @var \DOMElement $element */
        $element = $nodelist[0];

        if ("" === $element->textContent) {
            return null;
        }

        return $element->textContent;
    }
}
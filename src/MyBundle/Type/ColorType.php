<?php

namespace MyBundle\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class ColorType extends Type
{
    const COLOR = 'color'; // modify to match your type name

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'color';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $temp = trim($value, '{}');

        if (empty($temp)) {
            return [];
        }

        return explode(',', $temp);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->toDecimal();
    }

    public function getName()
    {
        return self::COLOR;
    }
}

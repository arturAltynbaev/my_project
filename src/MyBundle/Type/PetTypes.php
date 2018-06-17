<?php

namespace MyBundle\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PetTypes extends Type
{
    const PET_TYPES = 'pet_types'; // modify to match your type name

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'pet_types';
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
        return self::PET_TYPES;
    }
}

<?php

namespace Src\Application\Utils\Purify;

use DateTime;

function purifyProperty($property) {
    if (is_int($property) || is_float($property)) {
        return $property;
    }
    
    if ($property instanceof \DateTime) {
        return $property->format('d/m/Y H:i:s');
    }

    return htmlspecialchars(strip_tags($property), ENT_QUOTES, 'UTF-8');
}
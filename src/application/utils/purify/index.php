<?php

namespace Src\Application\Utils\Purify;

use DateTime;

function purifyProperty($property) {
    if (is_int($property) || is_float($property)) {
        return $property;
    }

    return htmlspecialchars(strip_tags($property), ENT_QUOTES, 'UTF-8');
}

function purifyDateTime(DateTime $date) : string {
    if ($date instanceof \DateTime) {
        return $date->format('d/m/Y H:i:s');
    }

    if (is_string($date)) {
        try {
            $newDate = new \DateTime($date);
            return $newDate->format('d/m/Y H:i:s');
        } catch (\Exception $e) {
            return (new \DateTime())->format('d/m/Y H:i:s');
        }
    }

    return (new \DateTime())->format('d/m/Y H:i:s');
}
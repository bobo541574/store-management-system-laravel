<?php

namespace App\Models;

trait NameTrait
{
    /**
     * Use for naming in database seeding.
     * Limiting is 1 - 10000.
     */
    public static function setName($name, $i)
    {
        $i = $i + 1;

        if ($i > 0 && $i < 10) {
            $name = "{$name}-000" . $i;
        } elseif ($i > 9 && $i < 100) {
            $name = "{$name}-00" . $i;
        } elseif ($i > 99 && $i < 1000) {
            $name = "{$name}-0" . $i;
        } elseif ($i > 999 && $i < 10000) {
            $name = "{$name}-" . $i;
        } else {
            $name = "{$name}-0001";
        }

        return $name;
    }
}
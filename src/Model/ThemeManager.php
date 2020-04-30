<?php

namespace App\Model;

class ThemeManager extends AbstractManager
{
    const TABLE = 'theme';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}

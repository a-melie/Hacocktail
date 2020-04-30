<?php

namespace App\Model;

class ThemeHasQuestionManager extends AbstractManager
{
    const TABLE = 'theme_has_question';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}

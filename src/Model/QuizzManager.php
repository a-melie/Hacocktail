<?php


namespace App\Model;

class QuizzManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'question';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectByTheme(string $theme, int $order) :array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table .' 
            JOIN theme_has_question tinter ON question.id=tinter.question_id
            JOIN theme t ON t.id = tinter.theme_id
            WHERE t.title=\'' . $theme . '\' AND tinter.order=' .$order)->fetchAll();
    }
}

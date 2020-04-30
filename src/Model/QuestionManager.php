<?php


namespace App\Model;

class QuestionManager extends AbstractManager
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

    public function selectByTheme(string $theme, int $order): array
    {
        $query  = 'SELECT * FROM ' . self::TABLE;
        $query .= ' JOIN ' . ThemeHasQuestionManager::TABLE . ' has ON question.id = has.question_id';
        $query .= ' JOIN theme t ON t.id = has.theme_id';
        $query .= ' WHERE t.title = \'' . $theme . '\' AND has.order = ' . $order;
        $statement = $this->pdo->query($query);

        return $statement->fetchAll();
    }
}

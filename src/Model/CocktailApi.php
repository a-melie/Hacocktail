<?php

namespace App\Model;

use App\Service\Cocktail;

class CocktailApi extends AbstractApi
{
    /**
     * @return array
     */
    public function getRandomCocktail(): array
    {
        $url      = 'https://www.thecocktaildb.com/api/json/v1/' . APP_API_KEY_COCKTAIL . '/random.php';
        $cocktail = $this->get($url);
        return Cocktail::cleanArrayOneCocktail($cocktail);
    }

    /**
     * @param int $id
     * @return array
     */
    public function getCocktailById(int $id): array
    {
        $url      = 'https://www.thecocktaildb.com/api/json/v1/' . APP_API_KEY_COCKTAIL . '/lookup.php?i=' . $id;
        $cocktail = $this->get($url);
        return Cocktail::cleanArrayOneCocktail($cocktail);
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public function searchCocktailByName(string $name)
    {
        $url      = 'https://www.thecocktaildb.com/api/json/v1/' . APP_API_KEY_COCKTAIL . '/search.php?s=' . $name;
        $cocktail = $this->get($url);
        if (empty($cocktail['drinks'])) {
            $cocktailList = 'No drinks found';
        } else {
            $cocktailList = Cocktail::cleanArrayMultipleCocktails($cocktail['drinks']);
        }
        return $cocktailList;
    }
}

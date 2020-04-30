<?php

namespace App\Service;

class Cocktail
{
    public static function cleanArrayOneCocktail(array $cocktail) : array
    {
        $result['id']          = $cocktail['drinks']['0']['idDrink'];
        $result['name']        = $cocktail['drinks']['0']['strDrink'];
        $result['alcoholic']   = $cocktail['drinks']['0']['strAlcoholic'];
        $result['instruction'] = $cocktail['drinks']['0']['strInstructions'];
        $result['image']       = $cocktail['drinks']['0']['strDrinkThumb'];
        $result['ingredients'] = [
            '1'  =>  $cocktail['drinks']['0']['strIngredient1'],
            '2'  =>  $cocktail['drinks']['0']['strIngredient2'],
            '3'  =>  $cocktail['drinks']['0']['strIngredient3'],
            '4'  =>  $cocktail['drinks']['0']['strIngredient4'],
            '5'  =>  $cocktail['drinks']['0']['strIngredient5'],
            '6'  =>  $cocktail['drinks']['0']['strIngredient6'],
            '7'  =>  $cocktail['drinks']['0']['strIngredient7'],
            '8'  =>  $cocktail['drinks']['0']['strIngredient8'],
            '9'  =>  $cocktail['drinks']['0']['strIngredient9'],
            '10' =>  $cocktail['drinks']['0']['strIngredient10'],
            '11' =>  $cocktail['drinks']['0']['strIngredient11'],
            '12' =>  $cocktail['drinks']['0']['strIngredient12'],
            '13' =>  $cocktail['drinks']['0']['strIngredient13'],
            '14' =>  $cocktail['drinks']['0']['strIngredient14'],
            '15' =>  $cocktail['drinks']['0']['strIngredient15'],
        ];
        $result['measures']     = [
            '1'  =>  $cocktail['drinks']['0']['strMeasure1'],
            '2'  =>  $cocktail['drinks']['0']['strMeasure2'],
            '3'  =>  $cocktail['drinks']['0']['strMeasure3'],
            '4'  =>  $cocktail['drinks']['0']['strMeasure4'],
            '5'  =>  $cocktail['drinks']['0']['strMeasure5'],
            '6'  =>  $cocktail['drinks']['0']['strMeasure6'],
            '7'  =>  $cocktail['drinks']['0']['strMeasure7'],
            '8'  =>  $cocktail['drinks']['0']['strMeasure8'],
            '9'  =>  $cocktail['drinks']['0']['strMeasure9'],
            '10' =>  $cocktail['drinks']['0']['strMeasure10'],
            '11' =>  $cocktail['drinks']['0']['strMeasure11'],
            '12' =>  $cocktail['drinks']['0']['strMeasure12'],
            '13' =>  $cocktail['drinks']['0']['strMeasure13'],
            '14' =>  $cocktail['drinks']['0']['strMeasure14'],
            '15' =>  $cocktail['drinks']['0']['strMeasure15'],
        ];

        return $result;
    }
    public static function cleanArrayMultipleCocktails(array $cocktails) : array
    {
        $result = [];
        foreach ($cocktails as $id => $cocktail) {
            $result[$id]['id']          = $cocktail['idDrink'];
            $result[$id]['name']        = $cocktail['strDrink'];
            $result[$id]['alcoholic']   = $cocktail['strAlcoholic'];
            $result[$id]['instruction'] = $cocktail['strInstructions'];
            $result[$id]['image']       = $cocktail['strDrinkThumb'];
            $result[$id]['ingredients'] = [
                '1'  =>  $cocktail['strIngredient1'],
                '2'  =>  $cocktail['strIngredient2'],
                '3'  =>  $cocktail['strIngredient3'],
                '4'  =>  $cocktail['strIngredient4'],
                '5'  =>  $cocktail['strIngredient5'],
                '6'  =>  $cocktail['strIngredient6'],
                '7'  =>  $cocktail['strIngredient7'],
                '8'  =>  $cocktail['strIngredient8'],
                '9'  =>  $cocktail['strIngredient9'],
                '10' =>  $cocktail['strIngredient10'],
                '11' =>  $cocktail['strIngredient11'],
                '12' =>  $cocktail['strIngredient12'],
                '13' =>  $cocktail['strIngredient13'],
                '14' =>  $cocktail['strIngredient14'],
                '15' =>  $cocktail['strIngredient15'],
            ];
            $result[$id]['measures']     = [
                '1'  =>  $cocktail['strMeasure1'],
                '2'  =>  $cocktail['strMeasure2'],
                '3'  =>  $cocktail['strMeasure3'],
                '4'  =>  $cocktail['strMeasure4'],
                '5'  =>  $cocktail['strMeasure5'],
                '6'  =>  $cocktail['strMeasure6'],
                '7'  =>  $cocktail['strMeasure7'],
                '8'  =>  $cocktail['strMeasure8'],
                '9'  =>  $cocktail['strMeasure9'],
                '10' =>  $cocktail['strMeasure10'],
                '11' =>  $cocktail['strMeasure11'],
                '12' =>  $cocktail['strMeasure12'],
                '13' =>  $cocktail['strMeasure13'],
                '14' =>  $cocktail['strMeasure14'],
                '15' =>  $cocktail['strMeasure15'],
            ];
        }

        return $result;
    }
}

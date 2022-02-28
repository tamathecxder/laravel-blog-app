<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(5, 10)),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 5),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->sentence(mt_rand(25, 50)),
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(6, 12))), // using implode method to concat an array and giving a paragraph element in start untill the end of array, and then it's will do untill the paragprahs have done created
            'body' => collect($this->faker->paragraphs(mt_rand(15, 25)))
                            ->map(fn ($paragraphs) => "<p>$paragraphs</p>")->implode(''),
        ];
    }
}

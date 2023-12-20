<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
   protected $model = \App\Models\Photo::class;
    
      /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>$this->faker->word,
            'description' => $this->faker->sentence,
            'location' => $this->faker->city,
            'photo_file' => 'images/default_photo.jpg', // 例としてデフォルト値を設定
            'date_taken' => $this->faker->date,
        ];
    }
}

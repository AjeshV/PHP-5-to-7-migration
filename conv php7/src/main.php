<?php

namespace App;

use Exception;

class Main {

    public function getCategories(): array {
        return $this->getCategoryData();
    }

    private function getCategoryData(): array {
        return  [
            "celebrity",
            "science",
            "political",
            "sport",
            "religion",
            "animal",
        ];
    }

    public function getRandomJokes(int $randomNumber): string {

        $jokes = [
          "When Jon pushes a value onto a stack, it stays pushed.",
          "Drivers think twice before they dare interrupt Jon’s code.",
          "Jon Skeet does not sleep…. He waits.",
          "Jon Skeet can stop an infinite loop just by thinking about it.",
        ];

        return $jokes[$randomNumber];
    }
}

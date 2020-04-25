<?php

namespace App;

class Game
{
    /**
     * The number of frames in a game
     */
    const FRAMES_PER_GAME = 10;

    /**
     * All the rolls for the game
     *
     * @var array
     */
    protected array $rolls = [];

    /**
     * Roll the boll
     *
     * @param int $pins
     * @return void
     */
    public function roll(int $pins)
    {
        $this->rolls[] = $pins;
    }

    /**
     * Calculate the final score
     *
     * @return int
     */
    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {

            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll++;

                continue;
            }

            if ($this->isSpare($roll)) {
                $score += $this->getFrameScore($roll) + $this->spareBonus($roll);

                $roll += 2;

                continue;
            }

            $score += $this->getFrameScore($roll);

            $roll += 2;
        }

        return $score;
    }

    /**
     * Check if the current roll was a strike
     *
     * @param int $roll
     * @return bool
     */
    public function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) == 10;
    }

    /**
     * Check if the current roll was a spare
     *
     * @param int $roll
     * @return bool
     */
    public function isSpare(int $roll): bool
    {
        return $this->getFrameScore($roll) == 10;
    }

    /**
     * Calculate the score for the frame
     *
     * @param int $roll
     * @return mixed
     */
    public function getFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    /**
     * Get the bonus for a strike
     *
     * @param int $roll
     * @return int
     */
    private function strikeBonus(int $roll)
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    /**
     * Get the bonus for a spare
     *
     * @param int $roll
     * @return int
     */
    private function spareBonus(int $roll)
    {
        return $this->pinCount($roll + 2);
    }

    /**
     * Get the number of pins knocked down on a given roll
     */
    protected function pinCount(int $roll)
    {
        return $this->rolls[$roll];
    }
}
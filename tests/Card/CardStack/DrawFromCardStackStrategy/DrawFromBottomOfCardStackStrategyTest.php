<?php

namespace AlbanDurand\Snap\Tests\Card\CardStack\DrawFromCardStackStrategy;

use AlbanDurand\Snap\Card\Card;
use AlbanDurand\Snap\Card\CardStack\CardStack;
use AlbanDurand\Snap\Card\CardStack\DrawFromCardStackStrategy\DrawFromBottomOfCardStackStrategy;
use AlbanDurand\Snap\Card\Face\Face;
use AlbanDurand\Snap\Card\Suit\Suit;
use PHPUnit\Framework\TestCase;

class DrawFromBottomOfCardStackStrategyTest extends TestCase
{
    public function testExecute(): void
    {
        $strategy = new DrawFromBottomOfCardStackStrategy();

        $stack = new CardStack(
            new Card(Suit::Clubs, Face::Five),
            new Card(Suit::Spades, Face::A),
            new Card(Suit::Spades, Face::Ten)
        );

        $drawnCard = $strategy->execute($stack);

        $this->assertCount(2, $stack->getCards());
        $this->assertEquals(new Card(Suit::Clubs, Face::Five), $drawnCard);
    }
}
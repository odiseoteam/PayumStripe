<?php

namespace Tests\Prometee\PayumStripeCheckoutSession\Request\Api;

use Payum\Core\Model\Token;
use Payum\Core\Request\Convert;
use PHPUnit\Framework\TestCase;
use Prometee\PayumStripeCheckoutSession\Request\Api\ResolveWebhookEvent;

class ResolveWebhookEventTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBeSubClassOfConvert()
    {
        $resolveWebhookEvent = new ResolveWebhookEvent(new Token());

        $this->assertInstanceOf(Convert::class, $resolveWebhookEvent);
    }
}

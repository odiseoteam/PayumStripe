<?php

declare(strict_types=1);

namespace Prometee\PayumStripeCheckoutSession\Action\Api\WebhookEvent;

use Payum\Core\Action\ActionInterface;
use Prometee\PayumStripeCheckoutSession\Request\Api\WebhookEvent\WebhookEvent;
use Prometee\PayumStripeCheckoutSession\Wrapper\EventWrapperInterface;
use Stripe\Event;

abstract class AbstractWebhookEventAction implements ActionInterface
{
    /**
     * @return string[]
     */
    abstract protected function getSupportedEventTypes(): array;

    /**
     * {@inheritDoc}
     *
     * @param WebhookEvent $request
     */
    public function supports($request)
    {
        return $request instanceof WebhookEvent
            && $request->getEventWrapper() instanceof EventWrapperInterface
            && $request->getEventWrapper()->getEvent() instanceof Event
            && $this->supportsTypes($request)
        ;
    }

    /**
     * @param WebhookEvent $request
     *
     * @return bool
     */
    protected function supportsTypes(WebhookEvent $request): bool
    {
        return in_array($request->getEventWrapper()->getEvent()->type, $this->getSupportedEventTypes());
    }
}

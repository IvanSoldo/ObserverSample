<?php

namespace Inchoo\EventsObservers\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class ProductLoggerObserver implements ObserverInterface
{

    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $originalName = $product->getName();
        $id = $product->getId();
        $this->logger->info('Product viewed: ' . $id);
        $modifiedName = $originalName . ' - Modified product name';
        $product->setName($modifiedName);
    }
}

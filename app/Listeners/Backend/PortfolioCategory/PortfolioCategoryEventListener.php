<?php

namespace App\Listeners\Backend\PortfolioCategory;

/**
 * Class PortfolioCategoryEventListener.
 */
class PortfolioCategoryEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('PortfolioCategory Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('PortfolioCategory Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('PortfolioCategory Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\PortfolioCategory\PortfolioCategoryCreated::class,
            'App\Listeners\Backend\PortfolioCategory\PortfolioCategoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\PortfolioCategory\PortfolioCategoryUpdated::class,
            'App\Listeners\Backend\PortfolioCategory\PortfolioCategoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\PortfolioCategory\PortfolioCategoryDeleted::class,
            'App\Listeners\Backend\PortfolioCategory\PortfolioCategoryEventListener@onDeleted'
        );
    }
}

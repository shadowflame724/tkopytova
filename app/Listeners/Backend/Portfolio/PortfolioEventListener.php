<?php

namespace App\Listeners\Backend\Portfolio;

/**
 * Class PortfolioEventListener.
 */
class PortfolioEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Portfolio Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Portfolio Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Portfolio Deleted');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Portfolio\PortfolioCreated::class,
            'App\Listeners\Backend\Portfolio\PortfolioEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Portfolio\PortfolioUpdated::class,
            'App\Listeners\Backend\Portfolio\PortfolioEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Portfolio\PortfolioDeleted::class,
            'App\Listeners\Backend\Portfolio\PortfolioEventListener@onDeleted'
        );
    }
}

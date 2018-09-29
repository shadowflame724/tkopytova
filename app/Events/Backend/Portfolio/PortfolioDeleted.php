<?php

namespace App\Events\Backend\Portfolio;

use Illuminate\Queue\SerializesModels;

/**
 * Class PortfolioDeleted.
 */
class PortfolioDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $portfolio;

    /**
     * @param $portfolio
     */
    public function __construct($portfolio)
    {
        $this->portfolio = $portfolio;
    }
}

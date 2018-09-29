<?php

namespace App\Events\Backend\Portfolio;

use Illuminate\Queue\SerializesModels;

/**
 * Class PortfolioUpdated.
 */
class PortfolioUpdated
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

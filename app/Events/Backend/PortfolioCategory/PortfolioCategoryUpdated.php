<?php

namespace App\Events\Backend\PortfolioCategory;

use Illuminate\Queue\SerializesModels;

/**
 * Class PortfolioCategoryUpdated.
 */
class PortfolioCategoryUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $portfolioCategory;

    /**
     * @param $portfolioCategory
     */
    public function __construct($portfolioCategory)
    {
        $this->portfolioCategory = $portfolioCategory;
    }
}

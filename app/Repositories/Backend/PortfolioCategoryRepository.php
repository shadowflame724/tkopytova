<?php

namespace App\Repositories\Backend;

use App\Models\PortfolioCategory;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\PortfolioCategory\PortfolioCategoryCreated;
use App\Events\Backend\PortfolioCategory\PortfolioCategoryUpdated;


/**
 * Class PortfolioCategoryRepository.
 */
class PortfolioCategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return PortfolioCategory::class;
    }

    /**
     * @param array $data
     *
     * @return PortfolioCategory
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data): PortfolioCategory
    {
        return DB::transaction(function () use ($data) {

            $portfolioCategory = parent::create([
                'title' => $data['title']
            ]);

            if ($portfolioCategory) {
                event(new PortfolioCategoryCreated($portfolioCategory));

                return $portfolioCategory;
            }

            throw new GeneralException('Невозможно создать категорию. Пожалуйста, попробуйте позже.');
        });
    }

    /**
     * @param PortfolioCategory $portfolioCategory
     * @param array $data
     *
     * @return PortfolioCategory
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(PortfolioCategory $portfolioCategory, array $data): PortfolioCategory
    {
        return DB::transaction(function () use ($portfolioCategory, $data) {

            if ($portfolioCategory->update([
                'title' => $data['title']
            ])) {
                event(new PortfolioCategoryUpdated($portfolioCategory));

                return $portfolioCategory;
            }

            throw new GeneralException('Невозможно обновить категорию. Пожалуйста, попробуйте позже.');
        });
    }
}

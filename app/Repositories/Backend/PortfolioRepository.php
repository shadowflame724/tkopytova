<?php

namespace App\Repositories\Backend;

use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Portfolio\PortfolioCreated;
use App\Events\Backend\Portfolio\PortfolioUpdated;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * Class PortfolioRepository.
 */
class PortfolioRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Portfolio::class;
    }

    /**
     * @param array $data
     *
     * @return Portfolio
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data): Portfolio
    {
        return DB::transaction(function () use ($data) {

            if ($data['image']->isValid()) {
                $path = $this->saveImg($data['image']);
            } else {
                throw new GeneralException('Невалидное изображение портфолио. Пожалуйста, попробуйте другое.');
            }

            $portfolio = parent::create([
                'portfolio_category_id' => $data['portfolio_category_id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'path' => $path
            ]);

            if ($portfolio) {
                event(new PortfolioCreated($portfolio));

                return $portfolio;
            }

            throw new GeneralException('Невозможно создать портфолио. Пожалуйста, попробуйте позже.');
        });
    }

    /**
     * @param Portfolio $portfolio
     * @param array $data
     *
     * @return Portfolio
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        return DB::transaction(function () use ($portfolio, $data) {

            if (isset($data['image'])) {
                if ($data['image']->isValid()) {
                    Storage::delete('public/portfolio/' . $portfolio->path);
                    Storage::delete('public/portfolio/thumb_' . $portfolio->path);

                    $portfolio->path = $this->saveImg($data['image']);
                } else {
                    throw new GeneralException('Невалидное изображение портфолио. Пожалуйста, попробуйте другое.');
                }
            }

            if ($portfolio->update([
                'portfolio_category_id' => $data['portfolio_category_id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'path' => $portfolio->path
            ])) {
                event(new PortfolioUpdated($portfolio));

                return $portfolio;
            }

            throw new GeneralException('Невозможно обновить портфолио. Пожалуйста, попробуйте позже.');
        });
    }

    private function saveImg($image)
    {
        if ($image->isValid()) {
            $name = uniqid() . '.' . $image->extension();
            $image->storeAs('public/portfolio', $name);
            $thumb = Image::make($image)->fit(300);

            Storage::put('public\portfolio\thumb_' . $name, (string)$thumb->encode());
        } else {
            throw new GeneralException('Невалидное изображение портфолио. Пожалуйста, попробуйте другое.');
        }

        return $name;
    }
}

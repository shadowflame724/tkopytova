<?php

namespace App\Http\Controllers\Backend;

use App\Models\Photo;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Backend\Portfolio\PortfolioDeleted;
use App\Repositories\Backend\PortfolioRepository;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * @var PortfolioRepository
     */
    protected $portfolioRepository;

    /**
     * PortfolioController constructor.
     *
     * @param PortfolioRepository $portfolioRepository
     */
    public function __construct(PortfolioRepository $portfolioRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('backend.portfolio.index')
            ->withPortfolios($this->portfolioRepository
                ->with('portfolioCategory')
                ->orderBy('id', 'asc')
                ->paginate(25));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolio.create')->withPortfolioCategories(PortfolioCategory::pluck('title', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->portfolioRepository->create($request->only(
            'portfolio_category_id', 'title', 'description', 'image', 'photos'
        ));

        return redirect()->route('admin.portfolio.index')->withFlashSuccess('Портфолио добавлено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
//        dd($portfolio->photos);
        return view('backend.portfolio.edit')
            ->withPortfolioCategories(PortfolioCategory::pluck('title', 'id'))
            ->withPortfolio($portfolio->load('photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $this->portfolioRepository->update($portfolio, $request->only(
            'portfolio_category_id', 'title', 'description', 'image', 'photos'
        ));

        return redirect()->route('admin.portfolio.index')->withFlashSuccess('Портфолио обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $this->portfolioRepository->deleteById($portfolio->id);
        Storage::delete('public/portfolio/' . $portfolio->path);
        Storage::delete('public/portfolio/thumb_' . $portfolio->path);

        event(new PortfolioDeleted($portfolio));

        return redirect()->route('admin.portfolio.index')->withFlashSuccess('Портфолио удалено');
    }

    /**
     * Remove the specified resource from storage.
     * @param  $photoId
     * @return \Illuminate\Http\Response
     */
    public function destroyPhoto($photoId)
    {
        $photo = Photo::findOrFail((int)$photoId);
        $portfolio = $photo->portfolio;
        if ($photo->delete()) {
            Storage::delete('public/portfolio-photos/' . $photo->path);
        }

        return redirect()->route('admin.portfolio.edit', $portfolio)->withFlashSuccess('Фото удалено');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\Backend\PortfolioCategory\PortfolioCategoryDeleted;
use App\Repositories\Backend\PortfolioCategoryRepository;

class PortfolioCategoryController extends Controller
{
    /**
     * @var PortfolioCategoryRepository
     */
    protected $portfolioCategoryRepository;

    /**
     * PortfolioController constructor.
     *
     * @param PortfolioCategoryRepository $portfolioCategoryRepository
     */
    public function __construct(PortfolioCategoryRepository $portfolioCategoryRepository)
    {
        $this->portfolioCategoryRepository = $portfolioCategoryRepository;
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('backend.portfolio-category.index')
            ->withPortfolioCategories($this->portfolioCategoryRepository
//            ->with('users', 'permissions')
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
        return view('backend.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->portfolioCategoryRepository->create($request->only('title'));

        return redirect()->route('admin.portfolio-category.index')->withFlashSuccess('Категория добавлено');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioCategory $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('backend.portfolio-category.edit')
            ->withPortfolioCategory($portfolioCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PortfolioCategory $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $this->portfolioCategoryRepository->update($portfolioCategory, $request->only('title'));

        return redirect()->route('admin.portfolio-category.index')->withFlashSuccess('Категория обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioCategory $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $this->portfolioCategoryRepository->deleteById($portfolioCategory->id);
        $portfolioCategory->portfolios()->delete();

        event(new PortfolioCategoryDeleted($portfolioCategory));

        return redirect()->route('admin.portfolio-category.index')->withFlashSuccess('Категория удалена');
    }
}

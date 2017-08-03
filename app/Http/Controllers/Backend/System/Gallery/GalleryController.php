<?php

namespace SKT\Http\Controllers\Backend\System\Gallery;

use SKT\Models\System\Gallery\Gallery;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\System\Gallery\GalleryRepository;
use SKT\Http\Requests\Backend\System\Gallery\StoreGalleryRequest;
use SKT\Http\Requests\Backend\System\Gallery\ManageGalleryRequest;
use SKT\Http\Requests\Backend\System\Gallery\UpdateGalleryRequest;

/**
 * Class GalleryController.
 */
class GalleryController extends Controller
{
    /**
     * @var GalleryRepository
     */
    protected $galleries;

    /**
     * @param GalleryRepository $galleries
     */
    public function __construct(GalleryRepository $galleries)
    {
        $this->galleries = $galleries;
    }

    /**
     * @param ManageGalleryRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGalleryRequest $request)
    {
        $galleries = $this->galleries->getAll();
        
        return view('backend.system.galleries.index', compact('galleries'));
    }

    /**
     * @param ManageGalleryRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(ManageGalleryRequest $request)
    {
        return view('backend.system.galleries.create');
    }

    /**
     * @param StoreGalleryRequest $request
     *
     * @return mixed
     */
    public function store(StoreGalleryRequest $request)
    {
        $this->galleries->create($request->all());

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(trans('alerts.backend.galleries.created'));
    }

    /**
     * @param Gallery              $gallery
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function edit(Gallery $gallery, ManageGalleryRequest $request)
    {
        return view('backend.system.galleries.edit', compact('gallery'));
    }

    /**
     * @param Gallery              $gallery
     * @param UpdateGalleryRequest $request
     *
     * @return mixed
     */
    public function update(Gallery $gallery, UpdateGalleryRequest $request)
    {
        $this->galleries->update($gallery, $request->all());

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(trans('alerts.backend.galleries.updated'));
    }

    /**
     * @param Gallery              $gallery
     * @param ManageGalleryRequest $request
     *
     * @return mixed
     */
    public function destroy(Gallery $gallery, ManageGalleryRequest $request)
    {
        $this->galleries->delete($gallery);

        return redirect()->route('admin.system.gallery.index')->withFlashSuccess(trans('alerts.backend.galleries.deleted'));
    }
}
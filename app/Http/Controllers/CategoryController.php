<?php

namespace CodePublisher\Http\Controllers;

use CodePublisher\Category;
use CodePublisher\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = $this->category->all();
        //$categories = $this->category->query()->paginate(15);
        //$categories = $this->category->query()->simplePaginate(15);
        $categories = $this->category->paginate(15);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $this.validate($request, [
        //     'name' => 'required'
        // ]);

        $this->category->create($request->only('name'));

        $url = $request->get('redirect_to', route('category.index'));

        $request->session()->flash('message', 'The category was created');

        //return redirect()->route('category.index');
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $data = $request->only('name');
        $category->fill($data);
        $category->save();

        $url = $request->get('redirect_to', route('category.index'));

        $request->session()->flash('message', 'The category was updated');

        //return redirect()->route('category.index');
        return redirect()->to($url);
    }

    public function confirm($id)
    {
        $category = $this->category->findOrFail($id);

        return view('category.confirm', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $category = $this->category->findOrFail($id);

        $category->delete();

        $request->session()->flash('message', 'The category was deleted');

        $url = $request->redirect_to;

        //return redirect()->route('category.index');
        return redirect()->to($url);
    }
}

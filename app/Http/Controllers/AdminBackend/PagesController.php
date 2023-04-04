<?php

namespace App\Http\Controllers\AdminBackend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\AdminBackend\PageFormRequest;

use App\Models\Page;

class PagesController extends Controller
{
    public function edit(Page $page)
    {
        return view('admin-theme.templates.pages.edit', compact('page'));
    }

    public function update(PageFormRequest $request, Page $page)
    {
        $page->update($request->only(array_keys($page->getAttributes())));

        return redirect()->back()->with('success', 'Запись успешно обновлена');
    }
}

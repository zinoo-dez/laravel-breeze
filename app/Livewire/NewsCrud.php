<?php

namespace App\Livewire;

use App\Models\News;
use App\Models\User;
use App\Models\NewsCategory;
use App\Enums\ActiveinactiveType;
use Livewire\Component;
use Livewire\WithPagination;

class NewsCrud extends Component
{
    use WithPagination;

    public $title;
    public $content;
    public $is_featured;
    public $news_category_id;
    public $status;
    public $news_id;
    public $isOpen = false;

    public function render()
    {

        $news = News::paginate(10);
        $newsCategories = NewsCategory::all();
        $users = User::all();
        return view('livewire.news-crud', compact('news', 'newsCategories', 'users'));
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = null;
        $this->content = null;
        $this->is_featured = 0;
        $this->news_category_id = '';
        $this->status = ActiveinactiveType::Inactive->value;
        $this->news_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'nullable',
            'content' => 'nullable',
            'news_category_id' => 'required',
            'status' => 'required',
        ]);

        if (!auth()->check()) {
            session()->flash('error', 'You must be logged in to perform this action.');
            return;
        }

        News::updateOrCreate(['id' => $this->news_id], [
            'title' => $this->title,
            'content' => $this->content,
            'is_featured' => $this->is_featured,
            'news_category_id' => $this->news_category_id,
            'status' => $this->status,
            'user_id' => auth()->id(),
        ]);

        session()->flash('message', $this->news_id ? 'News updated.' : 'News created.');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $this->news_id = $id;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->is_featured = $news->is_featured;
        $this->news_category_id = $news->news_category_id;
        $this->status = $news->status;

        $this->openModal();
    }

    public function delete($id)
    {
        News::find($id)->delete();
        session()->flash('message', 'News deleted.');
    }
}

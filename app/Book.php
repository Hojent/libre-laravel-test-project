<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('/uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }
        Storage::delete('uploads/' . $this->image);
        $this->removeImage();
        $filename = 'pic' . $this->id . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/images/no-image.gif';
        }

        return '/uploads/' . $this->image;

    }

    public function getAuthor()
    {
        return ($this->category != null)
            ? $this->category->title
            : 'Нет категории';
    }

    public function getAuthorID()
    {
        return $this->author != null ? $this->author->id : null;
    }

    public function setAuthor($id)
    {
        if ($id == null) return;
        $this->author_id = $id;
        $this->save();
    }
}
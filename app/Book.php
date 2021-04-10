<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public static function add($fields)
    {
        $book = new static;
        $book->fill($fields);
        $book->save();

        return $book;
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
            return '/uploads/no-img.png';
        } else {
        return '/uploads/' . $this->image;
        }
    }

    public function getAuthor()
    {
        return ($this->author != null)
            ? $this->author->name
            : 'автор не указан';
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
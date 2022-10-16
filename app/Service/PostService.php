<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_id'])){
            $tagIds = $data['tag_id'];
            unset($data['tag_id']);
            }
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            if (isset($data['tag_id'])){
                $tagIds = $data['tag_id'];
                unset($data['tag_id']);
            };
            if (isset($data['preview_image'])) {
                Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['main_image'])) {
                Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->tags()->sync($tagIds);
            $post->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $post;
    }
}

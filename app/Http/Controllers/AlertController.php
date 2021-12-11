<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function delete(Post $post)
    {

        return back()->with(['alert' => [
            'message' => 'Are you sure you want to delete "' . $post->title . '"? You won\'t be able to get it back!',
            'red' => 'No',
            'red-action' => '',
            'blue' => 'Yes',
            'blue-action' => 'type=' . 'submit' . ' form=' . 'delete' . $post->id . '',
        ]]);
    }

    public function pub(Post $post)
    {

        return back()->with(['alert' => [
            'message' => 'Are you sure you want to publish "' . $post->title . '"?',
            'red' => 'No',
            'red-action' => '',
            'blue' => 'Yes',
            'blue-action' => 'type=' . 'submit' . ' form=' . 'pubunpub' . $post->id . ' name=' . 'state' . ' value=' . 'pub',
        ]]);
    }

    public function draft(Post $post)
    {

        return back()->with(['alert' => [
            'message' => 'Are you sure you want to unpublish "' . $post->title . '"?',
            'red' => 'No',
            'red-action' => '',
            'blue' => 'Yes',
            'blue-action' => 'type=' . 'submit' . ' form=' . 'pubunpub' . $post->id . ' name=' . 'state' . ' value=' . 'draft',
        ]]);
    }
}

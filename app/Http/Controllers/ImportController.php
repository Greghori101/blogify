<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Importers\PostImporter;
use Illuminate\Support\Facades\Auth;

class ImportController extends Controller
{
    public function import(string $source, PostImporter $importer)
    {
        $post = $importer->import($source,Auth::id());

        return redirect()->route('posts.index')
            ->with($post ? 'success' : 'error', $post ? 'Import successful' : 'Import failed or duplicate');
    }
}

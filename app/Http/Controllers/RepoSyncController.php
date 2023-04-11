<php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepoSyncController extends Controller
{
    public function syncRepo()
    {
        // use the Git command to sync the repository here
        exec('git pull');
        return view('sync-repo');
    }
}
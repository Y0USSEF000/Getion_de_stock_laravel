<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Search
        if ($search = $request->query('search')) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
        }

        // Sorting
        $sort = $request->query('sort', 'id');
        $direction = $request->query('direction', 'asc');
        $query->orderBy($sort, $direction);

        // Pagination
        $users = $query->paginate(10);

        return view('admin_users', compact('users'));
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
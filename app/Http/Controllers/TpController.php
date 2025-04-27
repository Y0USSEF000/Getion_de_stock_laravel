<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Q1
         return $stagiaires = DB::table('products')->get();

        // Q2
         //return $stagiaire = DB::table('stagiaires')->where('id', 1)->first(); 

        // Q3
        //return $nomsPrenoms = DB::table('stagiaires')->select('nom', 'prenom')->get();

        // Q4
        // php artisan tinker
        // DB::table('stagiaires')->insert([
        //     'nom' => 'Dupont',
        //     'prenom' => 'Jean',
        //     'age' => 22,
        // ]);

        // Q5
        // php artisan tinker
        // DB::table('stagiaires')->where('id', 1)->update([
        //     'age' => 23,
        // ]);

        // Q6
        // php artisan tinker
        // DB::table('stagiaires')->where('id', 1)->delete(); 

        // Q7
        // $stagiaires = DB::table('stagiaires') ->where('age', '>', 20) ->get();

        // Q8
        // $stagiaires = DB::table('stagiaires') ->orderBy('nom', 'asc') ->get(); 

        // Q9
        // $stagiaires = DB::table('stagiaires') ->where('created_at', '>', '2023-01-01') ->get(); 

        // Q10
        // $count = DB::table('stagiaires')->count(); 

        // Q11
        // $moyenneAge = DB::table('stagiaires')->avg('age'); 

        // Q12
        // return $stagiaires = DB::table('stagiaires') ->where('nom', 'Dupont') ->get(); 

        // Q13
        // $stagiaires = DB::table('stagiaires') ->where('prenom', 'like', 'J%') ->get(); 

        // Q14
        // $stagiaires = DB::table('stagiaires')->paginate(10); 

        // Q15
        // $stagiaires = DB::table('stagiaires') ->select('age', DB::raw('count(*) as total')) ->groupBy('age') ->get(); 

        // Q16
        // $stagiaires = DB::table('stagiaires') ->join('formations', 'stagiaires.id', '=', 'formations.stagiaire_id') ->select('stagiaires.*', 'formations.nom_formation') ->get(); 

        // Q17
        // DB::transaction(function () { 
        //     DB::table('stagiaires')->insert([ 
        //     'nom' => 'Martin', 
        //     'prenom' => 'Lucie', 
        //     'age' => 21,  
        // ]);

        // Q18
        // if (DB::table('stagiaires')->where('nom', 'Dupont')->exists()) {
        //     echo "Le stagiaire existe.";
        // }

        // Q19
        // $stagiaires = DB::table('stagiaires')->whereBetween('age', [20, 25])->get();

        // Q20
        // DB::table('stagiaires')->truncate();

        // Q21
        // $stagiaires = DB::table('stagiaires')->select('nom as Nom', 'prenom as Prénom')->get();

        // Q22
        // $stagiaires = DB::table('stagiaires') ->whereDate('created_at', today()) ->get(); 

        // Q23
        // $stagiaires = DB::table('stagiaires') ->where('updated_at', '>=', now()->subDays(7)) ->get(); 

        // Q24
        // $stagiaires = DB::table('stagiaires') ->where('age', '>', 20) ->orWhere('nom', 'Dupont') ->get();

        // Q25
        // $stagiaires = DB::table('stagiaires') 
        //          ->whereNull('age') 
        //          ->get(); 

        // return view('TP');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
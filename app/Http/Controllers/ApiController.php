<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
        public function login(Request $request) {
                $validated = $request->validate([
                    'email' => ['required'],
                    'password' => ['required'],
                ]);

                $user = User::where('email', $request->email)->first();

                # Check exists or not
                if(is_null($user)) {
                    return response()->json([
                        'error'=> 50001,
                        'message'=> 'User not found'
                    ], 500);   
                }

                if(!$user || !Hash::check($request->password, $user->password)) {
                    // throw ValidationException::withMessages([
                    //     'email' => ['The provided credentials are incorrect']
                    // ]);
                    return response()->json([
                        'error'=> 50002,
                        'message'=> 'Credentials are incorrect'
                    ], 500);               
                }

                $user->tokens()->delete();

                return response()->json([
                    'message' => 'Login successful',
                    'token'=> $user->createToken($request->email)->plainTextToken
                ], 200);       
        }

        public function home(Request $request) {
            $user = $request->user();
            $moduls = Modul::where('status', 'Go-live')->get();
            return response()->json([
                'data'=> [
                    'user' => $user,
                    'moduls' => $moduls,
                ],
                'message'=> ''
            ], 200);                    
        }         
        
        public function modul_detail(Request $request) {
            $id_modul = $request->route('id');
            $modul = Modul::find( $id_modul);
                return response()->json([
                    'data'=> [
                        'modul' => $modul,
                    ],
                    'message'=> ''
                ], 200);                    
        } 
  
        public function jenis_laporan(Request $request) {
                $id_ternakan = $request->route('id');
                $jenisKemaskini = JenisKemaskini::where('id_jenisTernakans', $id_ternakan)->orderBy("updated_at", "DESC")->get();
                return response()->json([
                    'data'=> [
                        'jenisKemaskini' => $jenisKemaskini,
                    ],
                    'message'=> ''
                ], 200);          
        }   
  
        public function laporan(Request $request) {
            $id_jenisKemaskini = $request->route('id');
            $aktivitis = Aktiviti::where('id_jenisKemaskini', $request->kemaskiniID)->orderBy("updated_at", "DESC")->get();
            $aktiviti_parameter = AktivitiParameter::all();

                return response()->json([
                    'data'=> [
                        'aktivitis'=> $aktivitis,
                        'aktiviti_parameter' => $aktiviti_parameter,
                    ],
                    'message'=> ''
                ], 200);                          
        }     
        
        public function laporan_add(Request $request) {
            $id_aktiviti_parameter = $request->id_aktiviti_parameter;

            try {
                $parameter = new Jawapan_parameter;
                $parameter->user_id = $request->user()->id;
                $parameter->value = $request->value;
                $parameter->aktivitiParameter_id = $id_aktiviti_parameter;
                $parameter->save();

                return response()->json([
                    'data'=> '',
                    'message'=> 'Laporan has successfully saved'
                ], 201);                  

            } catch (\Throwable $th) {
                return response()->json([
                    'data'=> '',
                    'message'=> 'Laporan failed to saved'
                ], 201);   
            }
                               
        }   
        public function user_report(Request $request) {
            $id_user = $request->user()->id;
            $id_aktiviti = $request->id_aktiviti;
            $bulan = $request->bulan;

            $jawapan_parameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')
            ->where('user_id', $idUser)->whereRelation('AktivitiParameter.aktiviti','id', $id_aktiviti)
            ->whereRelation('AktivitiParameter', 'category', $catgeory)
            ->whereMonth('created_at', '=', $bulan)->orderBy('created_at')->get();
                
                return response()->json([
                    'data'=> [
                        'jawapan_parameter' => $jawapan_parameter,
                    ],
                    'message'=> ''
                ], 200);          
        }   
  
        public function tugasan(Request $request) {
            $id_user = $request->user()->id;
            $tugasan= Senarai_tugasan::where('user_id', $user)->get();

                return response()->json([
                    'data'=> [
                        'tugasan' => $tugasan,
                    ],
                    'message'=> ''
                ], 200);          
        }   
  
        public function tugasan_detailed(Request $request) {
                $id_tugasan = $request->route('id');
                $perkara_tugasan = Perkara_Tugasan::where('tugasan_id', $id_tugasan)->get();

                return response()->json([
                    'data'=> [
                        'perkara_tugasan' => $perkara_tugasan,
                    ],
                    'message'=> ''
                ], 200);                               
        }   
  
        public function get_sitevisits(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 200);                          
        }   
        
        public function create_sitevisit(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 201);                          
        }   
  
}

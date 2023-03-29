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
        
        public function list_projects(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 200);                    
        } 
  
        public function get_project(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 200);          
        }   
  
        public function search_project(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 200);                          
        }     
        
        public function update_report(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 201);                  
        }   
  
        public function list_notifications(Request $request) {
                return response()->json([
                    'data'=> '',
                    'message'=> ''
                ], 200);          
        }   
  
        public function list_tasks(Request $request) {
                return response()->json([
                    'data'=> '',
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

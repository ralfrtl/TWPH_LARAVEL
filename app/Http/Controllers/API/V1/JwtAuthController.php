<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

/**
* @OA\Post(
*   path="/api/v1/auth/login",
*   summary="Authenticate a user then returns a JWT token.",
 *
*   tags={"Auth"},
*   @OA\Parameter(
*       name="email",
*       in="query",
*       description="Registered User's email",
*       required=true,
*       @OA\Schema(type="string")
*   ),
*   @OA\Parameter(
*       name="password",
*       in="query",
*       description="Registered User's password",
*       required=true,
*       @OA\Schema(type="string")
*   ),
*   @OA\Response(
*       response="200",
*       description="Success",
*       @OA\JsonContent(
*           type="object",
*           @OA\Property(
*               property="access_token",
*               type="string",
*               description="180 random character string",
*           ),
*           @OA\Property(
*               property="token_type",
*               type="string",
*               description="Type of token",
*           ),
*           @OA\Property(
*               property="expires_in",
*               type="string",
*               description="Duration of the generated token in seconds",
*           ),
*       )
*   ),
*   @OA\Response(response="401", description="Validation errors"),
* )
*
* @OA\Post(
*     path="/api/v1/auth/me",
*     summary="Returns the User's info.",
*     tags={"Auth"},
*     @OA\Response(
*         response="200",
*         description="Success",
*         @OA\JsonContent(
*             type="object",
*             @OA\Property(
*                 property="email",
*                 type="string",
*                 description="Email of the logged-in user",
*             ),
*             @OA\Property(
*                 property="user_level",
*                 type="integer",
*                 description="1-6",
*             )
*         )
*     ),
*     @OA\Response(response="401", description="Validation errors"),
*     security={{"bearerAuth":{}}}
*  )
*
*   @OA\Post(
*       path="/api/v1/auth/logout",
*       summary="Logouts a currently logged-in user.",
*       tags={"Auth"},
*       @OA\Response(response="200", description="Success."),
*       @OA\Response(response="401", description="Unauthorized, no logged-in user."),
*       security={{"bearerAuth":{}}}
*   )
*
*   @OA\Post(
*       path="/api/v1/auth/refresh",
*       summary="Returns a new login token. User must be logged-in to use this.",
*       tags={"Auth"},
*       @OA\Response(response="201", description="returns [token = New JWT login token]"),
*       @OA\Response(response="401", description="Unauthorized, no logged-in user."),
*       security={{"bearerAuth":{}}}
*   )
*/
class JwtAuthController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        $token = auth()->guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() . ' seconds'
        ], 200);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Environment;
use App\Issue;
use App\Traits\EmitIssueNotification;
use App\User;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use EmitIssueNotification;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {
        return \Auth::user();
    }

    /**
     * @param Request $request
     * @return \App\User|\Illuminate\Http\JsonResponse|User
     */
    public function setAlley(Request $request)
    {
        $env = Environment::all()->pluck('value', 'key');
        $user = \Auth::user();
        $alleys = $request->input('alleys');
        \Log::info($alleys);
        $alleys = explode(',', $alleys);
        $alleys = array_map('trim', $alleys);
        foreach ($alleys as $alley) {
            if ($alley < $env['minimum_alley'] && $alley > $env['maximum_alley']) {
                $data = [
                    'errMsg' => '教室号无效',
                    'id' => str_random(100),
                ];
                return response()->json($data, 500);
            }
        }
        $user->alleys = $alleys;
        $user->save();
        return $user;
    }

    public function setOpenid(Request $request)
    {
        $user = \Auth::user();
        $user->openid = $request->input('openid');
        $user->save();
        return $user;
    }

    public function getMessage()
    {
        try {
            $this->emitSmartNotification(Issue::first(), Auth::user());
        } catch (\Exception $e) {
            $data = [
                'errMsg' => $e->getMessage()
            ];
            return response()->json($data, 500);
        } catch (GuzzleException $e) {
            $data = [
                'errMsg' => $e->getMessage()
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => 'success'
        ];
        return response()->json($data, 200);
    }
}

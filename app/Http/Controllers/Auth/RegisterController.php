<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Country;
use App\Community;
use App\{Personality, PersonalityTypes};
use App\{VAK, Emotion, Hobby, Privacy, UserHobby};

use App\Services\FileManager;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:30'],
            'lastname' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'string', 'same:password'],
            'file' => "nullable|file",
            //"phone" => ['nullable', 'numeric', "size:15"],


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    


    protected function create(array $data)
    {   
        
        // $data["age"] = date_diff(date_create_from_format("Y-m-d", $data["dob"]) , date_create())->y;
        $data["name"] =  $data["firstname"] . " " . $data["lastname"];

        $country_id = Country::where("code", "=", $data["country"])->get()[0]->id;

        $personality_test_result = Personality::evaluate_test(json_decode($data["test_answers"]));
        $personality_type_id = PersonalityTypes::where("type", "=", $personality_test_result)->get()[0]->id;

        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data["phone"],
            //'avatar' => $fileName,
            'country_id' => $country_id,
            // 'personality' => $personality_type_id,
            'gender_id' => $data['gender'],
            "dob" => date_create_from_format("Y-m-d", $data["dob"]),
        ]);
        
        $fileInputKeyName = "profilePic";
        $fileManager = new FileManager();
        $fileNameUploaded = $fileManager->uploadImage( $data[$fileInputKeyName], "nullable", User::$profilePicPath);
        
        $user->avatar = $fileNameUploaded;
        $user->save();
        $personality = Personality::customCreate($user->id, $personality_test_result);
        
        $vak_type = VAK::$mbti_to_vak[$personality_test_result];
        $vak = $user->vak()->create(["$vak_type" => 2]);

        $emotion = $user->u_emotions()->create();
        $privacy = $user->privacy()->create();
        
        $recieved_hobbies = json_decode($data['hobbies']);
        Hobby::registerNewHobbies($recieved_hobbies);
        $hobbies_rows = Hobby::whereIn('name', $recieved_hobbies)->get();
        // $user_hobbies_rows = Hobby::generateUserHobbyRows($hobbies_rows);

        $user->hobbies()->attach($hobbies_rows);

        
        

        $data = User::find($user->id);

        $communityToFollow = Community::where("title", $data->personality)->get();
        $data->followed_communities()->attach($communityToFollow);
        $data->followed_communities = [$communityToFollow];

        $response = [
            'state' => 1,
            'data' => $data
        ];
        return $response;
    }
}

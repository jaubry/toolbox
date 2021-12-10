<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Configuration;
use App\Models\Employee;
use App\Models\EmployeeGroup;
use App\Models\Store;
use App\Repositories\EmployeeRepositoryInterface;

class HomeController extends Controller
{
    //

    private $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    
    public function changeCountry(Request $request)
    {
        $countryToChange = $request->input("country");

        if (!!$countryToChange && !!$countryToChange) {
            session(['country' => $countryToChange]);
        }


        //TODO : check if user can view country // except SUPER ADMIN !! (comment faire ?????)

        //$empId = $request->input("id_employee");
        return redirect()->back()->with('message','Operation Successful !');
        //return redirect()->route('home');
    }
    
    
    public function index(Request $request)
    {

        $page_title = 'Accueil';
        $page_active = 'home';
        $page_description = 'Some description for the page';

        return view('inspinia.home', compact('page_title', 'page_description', 'page_active'));
    }


    public function indexOld(Request $request)
    {

        $page_title = 'Accueil';
        $page_active = 'home';
        $page_description = 'Some description for the page';

        //$country = $request->session()->get('country');

        
        #$emps = DB::table("ws_employee")->get();

        /*
        $emps = Employee::with(['group',  
            'exclusiveStore', 
            'stores'            => function ($query) { $query->join('ws_store_lang', 'ws_employee_store.id_store', '=', 'ws_store_lang.id_store')->where('id_lang', '=', '1'); },
            'stores.storeLang' => function($query2) { $query2->where('id_lang', '=', '1')->first(); }] 
        )->get();
        */
        /*
        $emps = Employee::with(['group',  
            'exclusiveStore', 
            'stores',
            'stores.storeLang' => function($query2) { $query2->where('id_lang', '=', '1'); }] 
        )->get();
        */
        //$emps = Employee::getStores(1);
        //dd($emps[2]->stores);




         //$emps = Employee::with(['group', 'exclusiveStore', 'stores'])->get();
        //$emps = Employee::where('active', true)->orderBy('lastname')->get();

        /*$empTest = Employee::where('id_employee', 479)
            ->join('ws_employee_store', '')
            ->get();
        dd($empTest);
        */
        /*
        $i = 0;
        foreach ($emps as $emp) {
            echo "<div>-----------------------------------------------------<br>";
            var_dump($emp->firstname);
            var_dump($emp->lastname);
            foreach ($emp->stores as $value) {
                dd($value);
            }
            echo "</div>";
            $i++;
            if ($i>10) {
                exit;
            }
        }
        dd("test");
        */
        /*
        $sql = "select * from ws_employee limit 0, 10";
        $emp = DB::connection("mysql-FR")->select($sql);

        $emps = \Db::getInstance()->execute($sql);

        //dd($emp);

        foreach ($emps as $emp) {
            echo "<div>";
            var_dump($emp);
            echo "</div>";
        }
        
        */
        dd(_DB_PREFIX_);
        dd(config('mail.mailers.smtp'));

        $p = Configuration::get('_PASSWORD_MIN_LENGHT_', 4);

        dd("ok");

        $mail = "jaubry@sushishopgroup.com";
        $pwd = "Sushi2015!";
        $enc_pwd = \Tools::encrypt($pwd);

        \Tools::debug($enc_pwd, true);

        $empCurrentPwd = Employee::where('mail', '=', $mail)->first(); //->where('password', '=', $enc_pwd)->first();

        \Tools::debug($empCurrentPwd->password, true);
        
        \Tools::debug(password_verify($pwd, $empCurrentPwd->password), true);

        dd($empCurrentPwd);


		$db->where('mail', $db->escape($emp->mail));
		$db->where('password', Tools::encrypt($current_password));


        $pwd = "gfjdkg fhdskgjl fhdslgj fhsgfjkd";
        $enc_pwd = \Tools::encrypt($pwd);

        \Tools::debug($enc_pwd, true);

        return "ok";

        //return view('test', compact('page_title', 'page_description', 'page_active', 'emps'));
    }



    public function edit(int $id_employee) {

        $page_title = 'Modification utilisateur';
        $page_active = 'home';
        $page_description = 'Some description for the page';

        $emp = Employee::find($id_employee);

        return view('employee.edit', compact('page_title', 'page_description', 'page_active', 'emp'));
        

    }

    

    public function view(int $id_employee) {

        $page_title = 'Modification utilisateur';
        $page_active = 'home';
        $page_description = 'Some description for the page';

        //$emp = Employee::find($id_employee);
        $emp = $this->repository->getEmployee($id_employee);


        $groups = EmployeeGroup::orderBy('id_employee_group')->get();
        
        $stores = Store::getStores(1);

        $empStores = [];
        foreach ($emp->stores as $store) {
            array_push($empStores, $store->id_store);
        }
       

        return view('employee.view', compact('page_title', 'page_description', 'page_active', 'emp', 'empStores', 'groups', 'stores'));
       

    }

    public function saveInfos(Request $request) {
        
        $empId = $request->input("id_employee");
        $empLastname = $request->input("lastname");
        $empFirstname = $request->input("firstname");
        $empMail = $request->input("mail");
        $empActive = ($request->input("active") == "on") ? "1" : "0";

        $post_data = [
            'lastname' => $empLastname,
            'firstname' => $empFirstname,
            'mail' => $empMail,
            'active' => $empActive
        ];

        $success = $this->repository->updateEmployeeInfos($empId, $post_data);

        return response()->json([
            'success' => ($success) ? "1" : "0",
            'data' => $post_data
        ]);

    }


    public function saveStores(Request $request) {
        
        $empId = $request->input("id_employee");
        $lstStores = $request->input("lstStores");
        

        $lineStores = [];

        foreach($lstStores as $store) {
            array_push($lineStores, ['id_employee' => $empId, 'id_store' => $store]);
        }
        
        $success = $this->repository->updateEmployeeStores($empId, $lineStores);

        $stores = Store::getStoresFiltered(1, $lstStores);
        
        $lstStoresText = [];
        foreach ($stores as $store) {
            array_push($lstStoresText, $store->storeLang[0]->name);
        }

        return response()->json([
            'success' => ($success) ? "1" : "0",
            'stores' => $lstStoresText
        ]);

    }

    
    public function saveRole(Request $request) {
        
        $empId = $request->input("id_employee");
        $groupId = $request->input("user_role");

        $post_data = [
            'id_employee_group' => $groupId
        ];

        $success = $this->repository->updateEmployeeInfos($empId, $post_data);

        if ($success) {
            $groupName = EmployeeGroup::find($groupId);
            $post_data['group_name'] = $groupName->group_name;
        }

        return response()->json([
            'success' => ($success) ? "1" : "0",
            'data' => $post_data
        ]);

    }

    public function checkEmailUnique(Request $request) {
        $empMail = $request->input("mail");
        $empId = $request->input("id_employee");
        $addEmp = ($request->input("add") == "1");
        if ($addEmp) {
            $empToFind = Employee::where('mail', '=', $empMail)->first();
        } else {
            $empToFind = Employee::where('mail', '=', $empMail)->where('id_employee', '!=', $empId)->first();
        }
        return response()->json(['valid' => !!!$empToFind]);

    }
}

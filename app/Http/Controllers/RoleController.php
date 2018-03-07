<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Paymentdetails;
use App\Role;
use App\Mail\subscribed;
use App\Mail\unsubscribed;
use Auth;

use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require '../vendor/autoload.php';

class RoleController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
  public function showUpgrade(){
    return view ('upgradeDetails');
  }

public function showpayment(){
  return view ('upgrade');
}

  public function showDowngrade(){
    return view ('downgrade');
  }
  public function handlePayment(Request $request){
    $this->validate(request(), [
      'fullName' => 'required|string|max:255|unique:paymentdetails',
      'BIC' => 'required|max:11',
      'IBAN' => 'required|max:34|unique:paymentdetails',
      'Country' => 'required',
    ]);
    $user = Auth::user();
    $user_id = Auth::user()->id;
    $fullName= request('fullName');
    $BIC = request('BIC');
    $IBAN = request('IBAN');
    $country = request('Country');

    $paymentdetails = Paymentdetails::create([
      'user_id' => $user_id,
      'fullName' => $fullName,
        'BIC' => $BIC,
        'IBAN' => $IBAN,
        'country' => $country,

    ]);
    $premium_user = Role::where('name', 'premium_user')->get();
    $user->roles()->sync($premium_user);

    \Mail::to($user)->send(new subscribed($user , $paymentdetails));
    return view('upgrade');
  }



    public function upgrade(){






      // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_Jd1zNmzBUuSXSsj4AMadTJs0");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];


// Charge the user's card:d
$charge = \Stripe\Charge::create(array(
  "amount" => 999,
  "currency" => "usd",
  "description" => "subscription charge",
  "statement_descriptor" => "Secure Beyond",
  "capture" => false,
  "source" => $token,
));
$charge_id = $charge->id;

$ch = \Stripe\Charge::retrieve($charge_id );//"ch_1A9eP02eZvKYlo2CkibleoVM"
$ch->capture();
$user =  Auth::user();




return redirect()->action('ProfileController@settings');

    }
    public function downgrade(){
        $user =  Auth::user();
      $free_user = Role::where('name','free_user')->get();
      $user->roles()->sync($free_user);
      $role = $user->roles->first();
      Paymentdetails::where('user_id', $user->id)->delete();
      return redirect()->action('ProfileController@settings');

    }




public function paymentNotification(){

  $premium_users = User::withRole('premium_user')->get();
  foreach ($premium_users as $premium_user){

    \Mail::to($premium_user)->send(new payment($premium_user));
  }

}







    public function createExcel()
    {
      $admin = Auth::user();
      if ($admin->hasRole('admin')){
      $filename = 'securebeyondincassos';
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

           $sheet->setCellValue('A1', 'Bedrag');
           $sheet->setCellValue('B1', 'Machtiging Nr.');
           $sheet->setCellValue('C1', 'Datum Machtiging');
           $sheet->setCellValue('D1', 'BIC');
           $sheet->setCellValue('E1', 'IBAN');
           $sheet->setCellValue('F1', 'Naam Debiteur');
           $sheet->setCellValue('G1', 'Land');
           $sheet->setCellValue('H1', 'Omschrijving');


           header('Content-Type: application/vnd.ms-excel');
           header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); /*-- $filename is  xsl filename ---*/
           header('Cache-Control: max-age=0');


           $users =  User::get();
           $payingusers = User::withRole('premium_user')->get();

           foreach ($payingusers as $payinguser){
             $cellNr = $payinguser->id;
             $cell = 'A' . $cellNr;
             $details = Paymentdetails::where('user_id',$payinguser->id)->get();
             $BIC = $details[0]->BIC;
             $IBAN = $details[0]->IBAN;
             $fullName = $details[0]->fullName;
             $country = $details[0]->country;

            $detailsarray = array(
            'Bedrag' => '9,99',
            'Machtiging Nr.' => 'nummer',
            'Datum Machtiging' => 'dag',
            'BIC' => $BIC,
            'IBAN' => $IBAN,
            'fullName' => $fullName,
            'land' => $country,
            'omschrijving' => 'secure beyond monthly subscription',
            );

            $sheet->fromArray(
            $detailsarray,
            NULL,
            $cell
            );

      }
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); /*-- $filename is  xsl filename ---*/
      header('Cache-Control: max-age=0');

      $writer = new Xlsx($spreadsheet);

      $writer->save('php://output');
}
    }

    public function dump()
    {
      $admin = Auth::user();
      if ($admin->hasRole('admin')){
    $command;
    $dbConnection = env('DB_CONNECTION');
    $dbName = env('DB_DATABASE');
    $dbHost = env('DB_HOST');
    $dbPort = env('DB_PORT');
    $dbUsername = env('DB_USERNAME');
    $dbPassword = env('DB_PASSWORD');

    switch ($dbConnection) {
      case "mysql":
          $command = "mysqldump --user=$dbUsername --password=$dbPassword --port=$dbPort --host=$dbHost $dbName > blogdump.sql";
          break;
      case "pgsql":
          $command = "PGPASSWORD='$dbPassword' pg_dump -h $dbHost -p $dbPort -U $dbUsername $dbName > blogdump.sql";
          break;
    }

    exec($command, $output, $return_value);


   return response()->download('blogdump.sql')->deleteFileAfterSend(true);
 }
    }

    public function stats()
    {
      $admin = Auth::user();
      if ($admin->hasRole('admin')){
      return view('stats');
    } else {
      return redirect('settings');
    }
    }

    // function dumpB()
    // {
    // $users = User::all();
    //
    // foreach ($users as $user)
    // {
    //     echo $user. "<br>";
    // }
    //
    // $posts = Post::all();
    //
    // foreach ($posts as $post)
    // {
    //     echo $post. "<br>";
    // }
    //
    // exit();
    //
    //   $user      = "default";
    //   $pass      = "secret";
    //   $host      = "172.19.0.2";
    //   $name             = "default";
    //   $backup_name        = "mybackup.sql";
    //   $tables             = false;
    //
    //     $mysqli = new mysqli($host,$user,$pass,$name);
    //     $mysqli->select_db($name);
    //     $mysqli->query("SET NAMES 'utf8'");
    //
    //     $queryTables    = $mysqli->query('SHOW TABLES');
    //     while($row = $queryTables->fetch_row())
    //     {
    //         $target_tables[] = $row[0];
    //     }
    //     if($tables !== false)
    //     {
    //         $target_tables = array_intersect( $target_tables, $tables);
    //     }
    //     foreach($target_tables as $table)
    //     {
    //         $result         =   $mysqli->query('SELECT * FROM '.$table);
    //         $fields_amount  =   $result->field_count;
    //         $rows_num=$mysqli->affected_rows;
    //         $res            =   $mysqli->query('SHOW CREATE TABLE '.$table);
    //         $TableMLine     =   $res->fetch_row();
    //         $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";
    //
    //         for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0)
    //         {
    //             while($row = $result->fetch_row())
    //             { //when started (and every after 100 command cycle):
    //                 if ($st_counter%100 == 0 || $st_counter == 0 )
    //                 {
    //                         $content .= "\nINSERT INTO ".$table." VALUES";
    //                 }
    //                 $content .= "\n(";
    //                 for($j=0; $j<$fields_amount; $j++)
    //                 {
    //                     $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) );
    //                     if (isset($row[$j]))
    //                     {
    //                         $content .= '"'.$row[$j].'"' ;
    //                     }
    //                     else
    //                     {
    //                         $content .= '""';
    //                     }
    //                     if ($j<($fields_amount-1))
    //                     {
    //                             $content.= ',';
    //                     }
    //                 }
    //                 $content .=")";
    //                 //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
    //                 if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num)
    //                 {
    //                     $content .= ";";
    //                 }
    //                 else
    //                 {
    //                     $content .= ",";
    //                 }
    //                 $st_counter=$st_counter+1;
    //             }
    //         } $content .="\n\n\n";
    //     }
    //     //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
    //     $backup_name = $backup_name ? $backup_name : $name.".sql";
    //     header('Content-Type: application/octet-stream');
    //     header("Content-Transfer-Encoding: Binary");
    //     header("Content-disposition: attachment; filename=\"".$backup_name."\"");
    //     echo $content; exit;
    // }

}

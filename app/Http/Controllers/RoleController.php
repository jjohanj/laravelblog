<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Paymentdetails;
use App\Role;
use App\Mail\payment;
use Auth;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require '../vendor/autoload.php';

class RoleController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
  public function showUpgrade(){
    return view ('upgrade');
  }
  public function showDowngrade(){
    return view ('downgrade');
  }

    public function upgrade(){

      $user =  Auth::user();
      $premium_user = Role::find(2);
      $user->roles()->sync($premium_user);

      $role = $user->roles->first();
      return redirect()->action('ProfileController@settings');




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
$premium_user = Role::find(2);
$user->roles()->sync($premium_user);

$role = $user->roles->first();
return redirect()->action('ProfileController@settings');

    }
    public function downgrade(){
        $user =  Auth::user();
      $free_user = Role::find(1);
      $user->roles()->sync($free_user);
      $role = $user->roles->first();
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

           $writer = new Xlsx($spreadsheet);

           $writer->save('php://output');



    }


}

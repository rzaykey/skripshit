<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Customer;
use App\Transaction;

class SMTPController extends Controller
{
    protected $host = "mail.devours.org";
    protected $user = "info@devours.org";
    protected $pass = "Dandi.129@";
    protected $port = 465;
    protected $transaction;
    protected $customer;

    function __construct(Transaction $transaction, Customer $customer)
    {
        $this->transaction = $transaction;
        $this->customer = $customer;
    }

    public static function send($id, $type)
    {
        if($type == "transaction.confirm")
        {
            try {
                $mail = new PHPMailer(true);
	    	    $mail->SMTPDebug = 0;                                	
				$mail->isSMTP();                                     	
				$mail->Host = "mail.devours.org";												
				$mail->SMTPAuth = true;                              	
				$mail->Username = "rupaka@server.devours.org";    
				$mail->Password = "s7rLaYI==_YK";  
				$mail->SMTPSecure = 'ssl';                      
				$mail->Port = 465;                

				//Recipients
				$mail->setFrom("rupaka@server.devours.org", "Rupaka Store");
                $mail->addAddress(Customer::find($id)->email);
    

				$mail->isHTML(true); 					
				$mail->Subject = "Pesanan Dengan ID: INV-". $id. " Telah Di Konfirmasi";
				$mail->Body    = view('email.confirm', ['data' => Customer::find($id)]);	

				$mail->send();
				return back()->with('success','Message has been sent!');
			} catch (Exception $e) {
				return back()->with('error','Message could not be sent.');
			}
        }else if($type == "transaction.cancel")
        {
            try {
                $mail = new PHPMailer(true);
	    	    $mail->SMTPDebug = 0;                                	
				$mail->isSMTP();                                     	
				$mail->Host = "mail.devours.org";												
				$mail->SMTPAuth = true;                              	
				$mail->Username = "rupaka@server.devours.org";    
				$mail->Password = "s7rLaYI==_YK";  
				$mail->SMTPSecure = 'ssl';                      
				$mail->Port = 465;                

				//Recipients
				$mail->setFrom("rupaka@server.devours.org", "Rupaka Store");
                $mail->addAddress(Customer::find($id)->email);
    

				$mail->isHTML(true); 					
				$mail->Subject = "Pesanan Dengan ID: INV-". $id. " Telah Di Batalkan";
				$mail->Body    = view('email.cancel', ['data' => Customer::find($id)]);	

				$mail->send();
				return back()->with('success','Message has been sent!');
			} catch (Exception $e) {
				return back()->with('error','Message could not be sent.');
			}
        }else if($type == "transaction.sent")
        {
            try {
                $mail = new PHPMailer(true);
	    	    $mail->SMTPDebug = 0;                                	
				$mail->isSMTP();                                     	
				$mail->Host = "mail.devours.org";												
				$mail->SMTPAuth = true;                              	
				$mail->Username = "rupaka@server.devours.org";    
				$mail->Password = "s7rLaYI==_YK";  
				$mail->SMTPSecure = 'ssl';                      
				$mail->Port = 465;                

				//Recipients
				$mail->setFrom("rupaka@server.devours.org", "Rupaka Store");
                $mail->addAddress(Customer::find(Transaction::find($id)->id_customer)->email);
    

				$mail->isHTML(true); 					
				$mail->Subject = "Pesanan Dengan ID: INV-". $id. " Telah Di Kirim";
				$mail->Body    = view('email.send', ['data' => Transaction::find($id)]);	

				$mail->send();
				return back()->with('success','Message has been sent!');
			} catch (Exception $e) {
				return back()->with('error','Message could not be sent.');
			}
        }
    }
}

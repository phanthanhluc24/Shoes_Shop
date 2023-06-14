<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthenticationController extends Controller
{
    public function register()
    {
        return view('/Log.register');
    }
    public function login()
    {
        return view('/Log.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            "fullname" => 'required',
            "email" => 'required',
            "password" =>'required',
            "phone" => 'required',
        ]);
        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            "useType" => 'USR',
            'phone' => $request->phone,
        ]);
        if($user){
            return redirect()->route("login");
        }else{
            return redirect()->route("register");
        }
       
    }

    public function payment(){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/sendemail";
        $vnp_TmnCode = "UYW4DL8F"; //Mã website tại VNPAY 
        $vnp_HashSecret = "NBMPXLWMJEIKNXKKKYWZMTXWODNIGYNG"; //Chuỗi bí mật

        $vnp_TxnRef = "2679";//$_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo ="Thanh Toán" ;//$_POST['order_desc'];
        $vnp_OrderType ="billpayment"; //$_POST['order_type'];
        $vnp_Amount =1000000*100; //$_POST['amount'] * 100;
        $vnp_Locale ="vn"; //$_POST['language'];
        $vnp_BankCode ="NCB"; //$_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            exit;
        } else {
            echo json_encode($returnData);
        }
    }

}

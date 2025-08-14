<?php 
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

$google_client = new Google_Client();
?>

<?php 
 defined('BASEPATH') OR exit('no direct script access allowed');
 /**
  * 
  */
 class AdminModel extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}


    public function adminRegister()
    {
        $contact = $_POST['contact'];
        $password = $_POST['password'];

        if(empty($contact))
        {
        	echo "<script>alert('Enter the Contact.');window.location.href='".base_url('register')."'</script>";
        	return;
        }
        if(empty($password))
        {
            echo "<script>alert('Enter the password.');window.location.href='".base_url('register')."'</script>";
            return;
        }

        if (isset($_POST['registerData']))
        {
        	$checkAdmin = $this->db->query("SELECT * From register_seller WHERE contact_no = '$contact'");

        	if($checkAdmin->num_rows() > 0)
        	{
                $_SESSION['activeAdmin'] = $contact;
        		echo "<script>alert('User with this number is already registered');window.location.href='".base_url('register')."'</script>";
        		
        	}else
        	{
        		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        		$admin_details = array(
                'contact_no' => $contact,
                'password' =>$hashedPassword);

            $this->db->insert('register_seller',$admin_details);

            echo "<script>alert('Your registration Successful');window.location.href='".base_url('signin')."'</script>";
        	}
        }
    }


public function adminLogin()
{
    $loginContact = $_POST['admin_contact_no'];
    $LoginPassword = $_POST['admin_password'];

    if (isset($_POST['sendOtp']))
    {
        $fetchContact = $this->db->query("SELECT * FROM register_seller WHERE contact_no = '$loginContact' ");
        foreach ($fetchContact->result() as $row)
        {
           $hashedPassword = $row->password;

        }

        if ($fetchContact->num_rows() > 0)
        {
            
            if (password_verify($LoginPassword, $hashedPassword))
            {
                
                $_SESSION['activeAdmin'] = $loginContact;
                

                $mobile_otp = random_string('numeric',6);
                $presentTimeZone = new DateTimeZone('Asia/Kolkata');

                $defaultTime = new DateTime('now', $presentTimeZone);

                $zoneTime = $defaultTime->format('d-m-Y H:i:s');

                $this->db->where('contact_no', $loginContact);
                $this->db->update('register_seller', array(
                    'mobile_otp' => $mobile_otp,
                    'otp_generation_time' => $zoneTime,
                    'otp_expiration_time' => date('Y-m-d H:i:s',strtotime($zoneTime.'+1 minutes'))
                ));

                $sid = "ACf6ad999ecf6afb07fe22ac15cf5222be";
                $token = "1725f4edeb6a28271687ce555f13040e";
                $twilio = new Client($sid, $token);

                $customMessage = "Your OTP is " . $mobile_otp;
                $toPhone = "+91" . $loginContact;

                try
                {
                    $message = $twilio->messages->create(
                        $toPhone,
                        array(
                            "from" => "+12393504152",
                            "body" => $customMessage
                        )
                    );

                    echo "<script>alert('OTP sent to your Mobile Number.');window.location.href='" . base_url('otp_verification') . "'</script>";
                } catch (Exception $e)
                {
                    echo "<script>alert('Failed to send OTP: " . $e->getMessage() . "');window.location.href='" . base_url('signin') . "'</script>";
                }

            } else
            {
                echo "<script>alert('Incorrect password');window.location.href='" . base_url('signin') . "'</script>";
            }
        } else
        {
            echo "<script>alert('No account found with this contact number');window.location.href='" . base_url('signin') . "'</script>";
        }
    }
}

public function UpdatePassword()
{
    $contact         = $this->input->post('contact_no');
    $oldPassword     = $this->input->post('old_password');
    $newPassword     = $this->input->post('new_password');
    $confirmPassword = $this->input->post('confirm_password');

    $query = $this->db->get_where('register_seller', ['contact_no' => $contact]);

    if ($query->num_rows() > 0) {
        $user = $query->row();
        $storedPassword = $user->password;

        if (!password_verify($oldPassword, $storedPassword)) {
            echo "<script>alert('Incorrect Password'); window.location.href='" . base_url('updatePassword') . "';</script>";
            return;
        }

        if ($newPassword !== $confirmPassword) {
            echo "<script>alert('New and Confirm Passwords not matched'); window.location.href='" . base_url('updatePassword') . "';</script>";
            return;
        }

        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $this->db->where('contact_no', $contact);
        $this->db->update('register_seller', ['password' => $hashedNewPassword]);

        echo "<script>alert('Password updated successfully'); window.location.href='" . base_url('updatePassword') . "';</script>";
    } else {
        echo "<script>alert('User not found'); window.location.href='" . base_url('updatePassword') . "';</script>";
    }
}


public function OTPVerification()
{
    $enteredOTP = $_POST['recived_mobile_otp'];
    $contactNo = $_SESSION['activeAdmin'];

    $fetchMyOTP = $this->db->query("SELECT * FROM register_seller WHERE contact_no = '$contactNo'");
    foreach ($fetchMyOTP->result() as $row)
    {
        $otp = $row->mobile_otp;
        $otpExpiryTime = $row->otp_expiration_time;
        $presentTimeZone = new DateTimeZone('Asia/Kolkata');

        $defaultTime = new DateTime('now', $presentTimeZone);

        $zoneTime = $defaultTime->format('d-m-Y H:i:s');
    }

    if(isset($_POST['OTPVerify']))
    {
        if ($zoneTime > $otpExpiryTime)
        {
            echo "<script>alert('OTP TimeOut. Please try again.');window.location.href='" . base_url('signin') . "'</script>";
        }
        else
        {
            if($enteredOTP === $otp)
            {
                    $this->db->where('contact_no', $contactNo);
                    $this->db->update('register_seller', array(
                        'mobile_otp' => $enteredOTP,
                        'otp_expiration_time' => $otpExpiryTime,
                        'mobile_verified_status' => 'active'
                    ));

                    echo "<script>alert('OTP verified successfully');window.location.href='" . base_url('dashboard') . "'</script>";
            } else
            {
                echo "<script>alert('Invalid OTP. Please try again.');window.location.href='" . base_url('otp_verification') . "'</script>";
            }
        }
            
       
    }
}


// Register User

public function userRegister()
    {
        $contact = $_POST['user_contact'];
        $password = $_POST['user_password'];

        if(empty($contact) || empty($password))
        {
            echo "<script>alert('Enter the Contact and Password.');window.location.href='".base_url('registerUser')."'</script>";
            return;
        }
        

        if (isset($_POST['registerUser']))
        {
            $checkUser = $this->db->query("SELECT * From register_seller WHERE user_contact = '$contact'");

            if($checkUser->num_rows() > 0)
            {
                $_SESSION['activeAdmin'] = $contact;
                echo "<script>alert('User with this number is already registered');window.location.href='".base_url('registerUser')."'</script>";
                
            }else
            {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $user_details = array(
                'user_contact' => $contact,
                'user_pass' =>$hashedPassword);

            $this->db->insert('register_seller',$user_details);

            echo "<script>alert('Your registration Successful');window.location.href='".base_url('userSignin')."'</script>";
            }
        }
    }

// User Login

    public function userSignin()
{
    $loginContact = $_POST['user_contact_no'];
    $LoginPassword = $_POST['user_password'];

    if (isset($_POST['sendOtp']))
    {
        $fetchContact = $this->db->query("SELECT * FROM register_seller WHERE user_contact = '$loginContact' ");
        foreach ($fetchContact->result() as $row)
        {
           $hashedPassword = $row->user_pass;

        }

        if ($fetchContact->num_rows() > 0)
        {
            
            if (password_verify($LoginPassword, $hashedPassword))
            {
                
                $_SESSION['activeAdmin'] = $loginContact;
                

                $user_top = random_string('numeric',6);
                $presentTimeZone = new DateTimeZone('Asia/Kolkata');

                $defaultTime = new DateTime('now', $presentTimeZone);

                $zoneTime = $defaultTime->format('d-m-Y H:i:s');

                $this->db->where('user_contact', $loginContact);
                $this->db->update('register_seller', array(
                    'user_otp' => $user_top,
                    'otp_generation_time' => $zoneTime,
                    'otp_expiration_time' => date('Y-m-d H:i:s',strtotime($zoneTime.'+1 minutes'))
                ));

                $sid = "ACf6ad999ecf6afb07fe22ac15cf5222be";
                $token = "1725f4edeb6a28271687ce555f13040e";
                $twilio = new Client($sid, $token);

                $customMessage = "Your OTP is " . $user_top;
                $toPhone = "+91" . $loginContact;

                try
                {
                    $message = $twilio->messages->create(
                        $toPhone,
                        array(
                            "from" => "+12393504152",
                            "body" => $customMessage
                        )
                    );

                    echo "<script>alert('OTP sent to your Mobile Number.');window.location.href='" . base_url('otp_verification') . "'</script>";
                } catch (Exception $e)
                {
                    echo "<script>alert('Failed to send OTP: " . $e->getMessage() . "');window.location.href='" . base_url('userSignin') . "'</script>";
                }

            } else
            {
                echo "<script>alert('Incorrect password');window.location.href='" . base_url('userSignin') . "'</script>";
            }
        } else
        {
            echo "<script>alert('No account found with this contact number');window.location.href='" . base_url('userSignin') . "'</script>";
        }
    }
}



public function google_login()
    {
        
        $google_client->setClientId('606580917607-c21ehu9mssq5bobbndldktc1o0qfip5r.apps.googleusercontent.com');
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri('http://localhost/aadamya_pos/google_login');
        $google_client->addScope('email');
        // $google_client->addScope('profile');

        if (isset($_GET['code']))
        {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);

            if (!isset($token['error']))
            {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token',$token['access_token']);

                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();

                $this->db->where('login_oauth_uid', $data['id']);
                $query = $this->db->get('register_seller');

                if ($query->num_rows() > 0)
                {
                   $user_data = array(
                  'name' => $data['name'],
                  'email' => $data['email']
                 );
                 $this->db->where('login_oauth_uid', $data['id']);
                 $this->db->update('register_seller', $user_data);
                }
                else
                {
                 $user_data = array(
                  'login_oauth_uid' => $data['id'],
                  'name'  => $data['name'],
                  'email'  => $data['email'],
                 );
                 $this->db->insert('register_seller', $user_data);
                }

                $this->session->set_userdata('user_data',$user_data);
            }
        }

        $this->load->view('signin',$data);
 }

 public function profileDetails($id)
 {
    return $this->db->get_where('register_seller', ['id'=>$id])->row();
 }

public function AdminLogout()
{
    unset($_SESSION['activeAdmin']);
    session_unset();
    session_destroy();
    redirect(base_url('signin'));
}

    
 }
?>
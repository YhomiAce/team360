<?php
    require_once "db.php";
    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // Message
    function displayMessage($type,$msg){
        return '<div class="alert alert-'.$type.' alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong class="text-center">'.$msg.'</strong>
        </div>';
    }
    
    
    function createNewUser($conn, $name, $email, $password, $token)
{
    $sql = "INSERT INTO users (fullname,email,password,authToken) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $password, $token]);
    return true;
}
    
    function investMoney($conn,$userId, $amount, $name, $months, $bank, $acc_num)
        {   
            $date = date("Y/m/d");
            $expireAt = date('Y-m-d', strtotime($date. ' + '.$months.' months'));
            $status = 'invested'; $rate = 30; 
            $sql = "INSERT INTO investment (userId,amount,name,expiredAt,status,rate,bank,account_num) VALUES(?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$userId, $amount, $name, $expireAt, $status, $rate, $bank, $acc_num]);
            return true;
        }
    function investors ($conn, $userId)
        {
            $sql = "SELECT * FROM investment WHERE userId = :userId";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['userId'=>$userId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function activeInvestment ($conn, $userId)
        {
            $sql = "SELECT * FROM investment WHERE userId = :userId AND expired = 0";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['userId'=>$userId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        function getTotalDeposit($conn, $userId)
        {
            $sql = "SELECT SUM(amount) AS totalDeposit  FROM investment WHERE userId =?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['userId'=>$userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        function getAllUserInvestment($conn, $userId)
        {
            $sql = "SELECT amount FROM investment WHERE userId =?";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['userId'=>$userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    // editUser
    function editUser($conn,$name,$password,$id)
    {
        
        $sql = "UPDATE users SET fullname=?,password=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name,$password,$id]);
        // echo "Here 5";
        return true;
    }

    function updateUser($conn,$name,$password,$id)
    {
        $sql = "UPDATE users SET fullname = :name, password = :pass WHERE id =:userId";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["name"=>$name, "password"=>$password, "userId"=>$id]);
        return true;
    }

    // check if email exist
    function userExist($conn,$email)
    {
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // login existing user
    function login($conn,$email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // retreiving current users detatil
    function currentUser($conn,$email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function currentAdmin($conn,$email)
    {
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }


    // forgot password
    function forgot_password($conn,$token,$email)
    {
        $sql='UPDATE users SET token = :token WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['token'=>$token,'email'=>$email]);
        return true;
    }


    //reset password
    function resetPassword($conn,$token)
    {
        $sql = "SELECT * FROM users WHERE authToken =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function resetPassword2($conn,$token)
    {
        $sql = "SELECT * FROM admin WHERE authToken =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function allInvestment($conn,$userId)
    {
        $sql = "SELECT * FROM investment WHERE userId =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function myWithdrawalRequest($conn,$userId)
    {
        $sql = "SELECT * FROM withdrawals WHERE userId =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function makeWithdrawal($conn,$userId, $amount, $bank, $acct_name, $acc_num, $status)
    {
        $sql = "INSERT into withdrawals (userId, amount, bank_name, acct_number, acct_name, status) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId, $amount, $bank, $acc_num, $acct_name, $status]);
        return true;
    }


    // Update Password
    function updatePassword($conn,$token,$password,$oldToken)
    {
        $sql = 'UPDATE users SET authToken=?,password=? WHERE authToken=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token,$password,$oldToken]);
        return true;
    
    }
    function updatePassword2($conn,$token,$password,$oldToken)
    {
        $sql = 'UPDATE admin SET authToken=?,password=? WHERE authToken=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token,$password,$oldToken]);
        return true;
    
    }
    function afterVerify($conn,$email)
    {
        $sql = 'UPDATE users SET token="" WHERE email=:email';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        return true;
    
    }

    function fetchAllApprovedWithdrawal($conn) {
        $sql = "SELECT * FROM withdrawal WHERE status = 'Approved' ORDER BY id DESC LIMIT 0, 200";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function fetchAllDisapprovedWithdrawal($conn) {
        $sql = "SELECT * FROM withdrawal WHERE status = 'Disapproved' ORDER BY id DESC LIMIT 0, 200";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fetchWithdraw($conn, $id) {
        $sql = "SELECT * FROM withdrawal WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function approvePayement($conn, $id, $date) {
        $sql = "UPDATE withdrawal SET status = 'Approved', approved_date =:approve_date WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["approve_date"=>$date,"id"=>$id]);
        return true;
    }

    function disapprovePayement($conn, $id) {
        $sql = "UPDATE withdrawal SET status = 'Disapproved' WHERE id =:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["id"=>$id]);
        return true;
    }

    function updateUserBalance($conn, $userId, $balance) {
        $sql = "UPDATE users SET wallet = :balance WHERE id =:userId";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["balance"=>$balance, "userId"=>$userId]);
        return true;
    }



    

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMPT;
use PHPMailer\PHPMailer\Exception; 
function MyMailer($subject,$to,$message){
    require '../Mailer2/PHPMailer.php';
    require '../Mailer2/Exception.php';
    require '../Mailer2/SMTP.php';
    $mail = new PHPMailer(true);
    $email  ='stephanyemmitty@gmail.com';
    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->SMTPDebug  = 0;
        $mail->Username   = "9ce03db4a6eed7";                    
        $mail->Password   = "25912963b0e734";                    
        // $mail->AddEmbeddedImage('../img/kemon.png','myImg');          
        // $mail->AddEmbeddedImage('../img/chatStep.PNG','me');   
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
        $mail->Port       = 2525;

        $mail->setFrom("stephanyemmitty@gmail.com",'Volunteer');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        if($mail->send()){
            echo "sent";
        }
    }catch(Exception $e){
        echo $e;
        echo 'Oops something went wrong! please try again';
    }

}

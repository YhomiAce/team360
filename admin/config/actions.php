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
    
    
    function createNewAdmin($conn,$email,$password,$name,$token)
        {
            $sql = "INSERT INTO admin (email,password,fullname,authToken) VALUES(?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$email, $password, $name, $token]);
            return true;
        }
    

    // editUser
    function editUser($conn,$name,$password,$email,$id)
    {
        $sql    = "UPDATE admin SET fullname=?,password=?, email=? WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$name,$password,$email,$id]);
        return true;
    }

    // check if email exist
    function adminExist($conn,$email)
    {
        $sql = "SELECT email FROM admin WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // login existing user
    function login($conn,$email)
    {
        $sql = "SELECT id, email, password FROM admin WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // retreiving current users detatil
    function currentUser($conn,$email)
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


    // Update Password
    function updatePassword($conn,$token,$password,$oldToken)
    {
        $sql = 'UPDATE users SET authToken=?,password=? WHERE authToken=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$token,$password,$oldToken]);
        return true;
    
    }
    function deactivateUser($conn,$id,$to)
    {
        $sql = 'UPDATE users SET status=:_to WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id, '_to'=>$to]);
        return true;
    
    }
    function afterVerify($conn,$email)
    {
        $sql = 'UPDATE users SET token="" WHERE email=:email';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        return true;
    
    }


    function allUsers($conn)
    {
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function activeUsers($conn)
    {
        $sql = "SELECT * FROM users WHERE status = 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function deactivatedUsers($conn)
    {
        $sql = "SELECT * FROM users WHERE status = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function activeWithdrawalRequest($conn)
    {
        $sql = "SELECT * FROM withdrawals WHERE approved = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function activeInvestment($conn)
    {
        $sql = "SELECT * FROM investment WHERE expired = 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function getUserInfo($conn, $email) {
        $sql = "SELECT * FROM users WHERE email =:email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch();
        return $result;
    }




    
?>
<?php session_start(); ?>

<?php 
    $path = explode("/", $_SERVER["PHP_SELF"]);
    
    if(end($path) == "users.php" || end($path) == "add-founds.php" || end($path) == "dashboard.php"){
        include "../../config.php";
    }else{
        include("./config.php");
    }
?>
<?php 
    class CryptoCenter {
        

        function __construct(){}
        
        static function register($username, $email, $password) {
            global $pdo;
           // Prepare the SQL statement
            $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (?, ?, ?)";

            // Prepare the statement
            $stmt = $pdo->prepare($sql);

            // Bind the parameters to the prepared statement
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $password);

            // Execute the prepared statement
            $stmt->execute();

            // Check if the registration was successful
            if ($stmt->rowCount() > 0) {
                echo "Registration successful!";
            } else {
                echo "Registration failed!";
            }
        }

        static function login($email, $password) {  
            global $pdo; 

            try {
                // Prepare the SQL statement
                $sql = "SELECT * FROM `users` WHERE `email` = :email";
        
                // Prepare the statement
                $stmt = $pdo->prepare($sql);
        
                // Bind the parameter to the prepared statement
                $stmt->bindParam(':email', $email);
        
                // Execute the prepared statement
                $stmt->execute();
        
                // Check if a matching user is found
                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
                    // Verify the password
                    if (password_verify($password, $user['password'])) {
                        // Password is correct, user is authenticated
                        $_SESSION["logged_in"] = true;
                        $_SESSION["user_id"] = $user["id"];
                        $_SESSION["username"] = $user["username"];
                        $_SESSION["role"] = $user["role"];
                        header("Location: ../crypto-center.co/index.php");
                    } else {
                        // Password is incorrect
                        echo "Invalid password!";
                        return false;
                    }
                } else {
                    // No matching user found
                    echo "User not found!";
                    return false;
                }
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
                return false;
            }
        }

        function __toString(){
            return $this->email . " - " . $this->password;
        }

        static function getAllUsers() {
            global $pdo;

            $sql = "SELECT * FROM `users`";
            $stmt = $pdo->query($sql);

            $users = [];

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $users[] = $row;
            }

            return $users;
        }

        public static function deleteUser($userId) {
            global $pdo;
    
            $sql = "DELETE FROM `users` WHERE `user_id` = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
    
            $deleted = $stmt->rowCount();
    
            return $deleted;
        }

        public function updateUser($userId, $username, $email, $role) {
            global $pdo;
    
            $sql = "UPDATE `users` SET `username` = :username, `email` = :email, `role` = :role WHERE `user_id` = :userId";
            $stmt = $pdo->prepare($sql);
    
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':userId', $userId);
    
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        static function logOut() {
            unset($_SESSION["logged_in"]);
            unset($_SESSION["user_id"]);
            unset($_SESSION["username"]);
            // header("Location: login.php");
            // exit();
        }

        static function getUserBalance($userId) {
            global $pdo; 

            // Prepare the SQL query
            $stmt = $pdo->prepare("SELECT `balance` FROM `users` WHERE `id` = :userId");

            // Bind the user ID parameter
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch the balance from the result
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Return the balance
            return $row['balance'];
        }

        static function addMoney($username, $amount, $userId){
            global $pdo;

            // Retrieve user's current balance
            $currentBalance = self::getUserBalance($userId);

            // Calculate new balance
            $newBalance = $currentBalance + $amount;

            // Start a transaction
            $pdo->beginTransaction();

            try {
                // Update user's balance
                $updateSql = "UPDATE `users` SET `balance` = ? WHERE `id` = ?";
                $stmtUpdate = $pdo->prepare($updateSql);
                $stmtUpdate->execute([$newBalance, $userId]);

                // Insert transaction record
                $insertSql = "INSERT INTO `transactions` (`user_id`, `amount`) VALUES (?, ?)";
                $stmtInsert = $pdo->prepare($insertSql);
                $stmtInsert->execute([$userId, $amount]);

                // Commit the transaction
                $pdo->commit();

                header("Location: index.php");

                echo "<div class='alert alert-success' role='alert'>
                        Money added successfully to the user!
                    </div>";
            } catch (Exception $e) {
                // Rollback the transaction on error
                $pdo->rollback();

                echo "Error occurred while adding money: " . $e->getMessage();
            }
        }

        static function getAllTransactions() {
            global $pdo;
    
            // Prepare the SQL query
            $stmt = $pdo->query("SELECT * FROM `transactions`");

            // Execute the query
            $transactions = null;

            if($stmt->execute()){
                $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }

            return $transactions;
        }
    
    }

?>
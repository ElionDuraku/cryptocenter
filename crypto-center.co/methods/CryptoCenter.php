<?php session_start(); ?>
<?php require_once "../config.php"; ?>
<?php 
    class CryptoCenter {
        

        function __construct(){}
        
        function register() {
            global $pdo;
           // Prepare the SQL statement
            $sql = "INSERT INTO `users` (`username`, `email`, `role`) VALUES (?, ?, ?)";

            // Prepare the statement
            $stmt = $conn->prepare($sql);

            // Bind the parameters to the prepared statement
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $role);

            // Execute the prepared statement
            $stmt->execute();

            // Check if the registration was successful
            if ($stmt->rowCount() > 0) {
                echo "Registration successful!";
            } else {
                echo "Registration failed!";
            }
        }

        function login() {  
            global $pdo; 

            try {
                // Prepare the SQL statement
                $sql = "SELECT * FROM `users` WHERE `username` = :username";
        
                // Prepare the statement
                $stmt = $pdo->prepare($sql);
        
                // Bind the parameter to the prepared statement
                $stmt->bindParam(':username', $username);
        
                // Execute the prepared statement
                $stmt->execute();
        
                // Check if a matching user is found
                if ($stmt->rowCount() > 0) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
                    // Verify the password
                    if (password_verify($password, $user['password'])) {
                        // Password is correct, user is authenticated
                        echo "Login successful!";
                        return true;
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

        function getAllUsers() {
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
    }

?>
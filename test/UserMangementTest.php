<?php
use PHPUnit\Framework\TestCase;

include_once 'actions/UserManagementService/post/signup_action.php';

class UserManagementServiceTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $this->conn = new mysqli('localhost', 'root', '', 'acms');
        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }

    protected function tearDown(): void
    {
        $this->conn->close();
    }

    public function testValidateEmail()
    {
        // Invalid email format
        $this->assertFalse(isValidEmail('invalid-email'), 'Email format should be invalid.');

        // Valid email format
        $this->assertTrue(isValidEmail('john.doe@ashesi.edu.gh'), 'Email format should be valid.');
    }

    public function testValidatePassword()
    {
        // Invalid password format
        $this->assertFalse(isValidPassword('short1!'), 'Password format should be invalid.');

        // Valid password format
        $this->assertTrue(isValidPassword('ValidPass123!'), 'Password format should be valid.');
    }

    public function testValidatePhoneNumber()
    {
        // Invalid phone number format
        $this->assertFalse(isValidPhoneNumber('123'), 'Phone number format should be invalid.');

        // Valid phone number format
        $this->assertTrue(isValidPhoneNumber('1234567890'), 'Phone number format should be valid.');
    }

    public function testCheckEmail()
    {
        // Assuming email "test@example.com" does not exist
        $result = checkEmail($this->conn, 'test@example.com');
        $this->assertTrue($result['success'], 'Email should be available.');

        // Assuming email "existing@example.com" exists
        $result = checkEmail($this->conn, 'existing@example.com');
        $this->assertFalse($result['success'], 'Email should already be registered.');
    }

    public function testCheckPhoneNumber()
    {
        // Assuming phone number "1234567890" does not exist
        $result = checkPhoneNumber($this->conn, '1234567890');
        $this->assertTrue($result['success'], 'Phone number should be available.');

        // Assuming phone number "0987654321" exists
        $result = checkPhoneNumber($this->conn, '0987654321');
        $this->assertFalse($result['success'], 'Phone number should already be registered.');
    }

    public function testCheckPassword()
    {
        // Invalid password
        $result = checkPassword('short1!');
        $this->assertFalse($result['success'], 'Password should be invalid.');

        // Valid password
        $result = checkPassword('ValidPass123!');
        $this->assertTrue($result['success'], 'Password should be valid.');
    }

    public function testSignUp()
    {
        $email = 'newuser@ashesi.edu.gh';
        $phoneNo = '0123456789';
        $name = 'New User';
        $password = 'ValidPass123!';
        $role = 1; // Assuming role 1 exists
        $mealPlan = 1; // Assuming meal plan 1 exists

        // Encrypt the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Mock the default image as binary data
        $defaultImage = file_get_contents('path/to/your/default/image.jpg');

        // Insert new user into the database
        $query = "INSERT INTO users (email, phoneNo, name, password, roleID, mealPlanStatus, userImage) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssibs", $email, $phoneNo, $name, $hashedPassword, $role, $mealPlan, $defaultImage);

        $this->assertTrue($stmt->execute(), 'Signup should be successful.');

        // Clean up
        $stmt->close();
        $this->conn->query("DELETE FROM users WHERE email = '$email'");
    }
}
?>

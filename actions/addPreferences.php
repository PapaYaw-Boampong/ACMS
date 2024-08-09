<?php
include_once "../settings/connection.php"; // Include your database connection file
include_once "../settings/core.php"; // Include your database connection file
$userID = $_SESSION["userID"];
// echo "heyya";
// exit();
// Check if the form is submitted
// echo $_POST['dietaryRestrictions'];
// exit();

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // echo "Form submitted successfully";
    // exit();  // Use exit() here to check if you reach this point

    // Collect form data
    $dietaryRestrictions = isset($_POST['dietaryRestrictions']) ? $_POST['dietaryRestrictions'] : '';
    $dietaryDetails = [];
    if ($dietaryRestrictions === 'yes') {
        $dietaryDetails = [
            'gluten-free' => isset($_POST['glutenFree']) ? 'gluten-free' : '',
            'dairy-free' => isset($_POST['dairyFree']) ? 'dairy-free' : '',
            'nut-allergy' => isset($_POST['nutAllergy']) ? 'nut-allergy' : '',
            'shellfish-allergy' => isset($_POST['shellfishAllergy']) ? 'shellfish-allergy' : '',
            'soy-allergy' => isset($_POST['soyAllergy']) ? 'soy-allergy' : '',
            'other' => isset($_POST['otherDietary']) ? $_POST['otherDietary'] : ''
        ];
    }
    $dietaryDetails = array_filter($dietaryDetails); // Remove empty values
    $dietaryDetailsStr = implode(',', $dietaryDetails);

    $diets = [
        'vegetarian' => isset($_POST['vegetarian']) ? 'vegetarian' : '',
        'vegan' => isset($_POST['vegan']) ? 'vegan' : '',
        'keto' => isset($_POST['keto']) ? 'keto' : '',
        'paleo' => isset($_POST['paleo']) ? 'paleo' : '',
        'pescatarian' => isset($_POST['pescatarian']) ? 'pescatarian' : '',
        'none' => isset($_POST['none']) ? 'none' : ''
    ];
    $diets = array_filter($diets); // Remove empty values
    $dietsStr = implode(',', $diets);
    // Debugging outputs
    echo "Dietary Details: " . $dietaryDetailsStr . "<br>";
    echo "Diets: " . $dietsStr . "<br>";
    echo "Cultural Details: " . $culturalDetailsStr . "<br>";
    exit();
    $culturalRestrictions = isset($_POST['culturalRestrictions']) ? $_POST['culturalRestrictions'] : '';
    $culturalDetails = [];
    if ($culturalRestrictions === 'yes') {
        $culturalDetails = [
            'halal' => isset($_POST['halal']) ? 'halal' : '',
            'kosher' => isset($_POST['kosher']) ? 'kosher' : '',
            'hindu-dietary-laws' => isset($_POST['hinduDietaryLaws']) ? 'hindu-dietary-laws' : '',
            'other' => isset($_POST['otherCultural']) ? $_POST['otherCultural'] : ''
        ];
    }
    $culturalDetails = array_filter($culturalDetails); // Remove empty values
    $culturalDetailsStr = implode(',', $culturalDetails);

    // Assume userID is retrieved from session or other authentication mechanism
    $userID = 1; // Example userID, replace with actual logic

    // Insert into database
    $query = "INSERT INTO `Preferences` (`userID`, `dietaryRestrictions`, `diet`, `culturalRestrictions`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isss", $userID, $dietaryDetailsStr, $dietsStr, $culturalDetailsStr);

    if ($stmt->execute()) {
        echo "Preferences saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Form not submitted.";
}

?>

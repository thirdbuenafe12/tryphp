<?php
// Function to calculate the discriminant
function calculateDiscriminant($a, $b, $c) {
    // Calculate b^2
    $bSquared = $b * $b;
    
    // Calculate 4ac
    $fourAC = 4 * $a * $c;
    
    // Calculate the discriminant
    $discriminant = $bSquared - $fourAC;
    
    return $discriminant;
}

// Initialize variables for error and result
$error = "";
$result = "";

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Get user input
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    // Validate input
    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        $error = "Error: Coefficients must be numeric.";
    } else {
        // Calculate the discriminant
        $discriminant = calculateDiscriminant($a, $b, $c);

        // Output the result
        $result = "<p>The discriminant of the quadratic equation {$a}x^2 + {$b}x + {$c} is {$discriminant}.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quadratic Equation Discriminant Calculator</title>
</head>
<body>
    <h2>Quadratic Equation Discriminant Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="a">Enter the value of a:</label>
        <input type="text" id="a" name="a" required><br><br>
        
        <label for="b">Enter the value of b:</label>
        <input type="text" id="b" name="b" required><br><br>
        
        <label for="c">Enter the value of c:</label>
        <input type="text" id="c" name="c" required><br><br>
        
        <input type="submit" name="submit" value="Calculate Discriminant">
    </form>

    <?php
    // Output errors
    if(!empty($error)) {
        echo "<p>$error</p>";
    }

    // Output result
    if(!empty($result)) {
        echo $result;
    }
    ?>
</body>
</html>

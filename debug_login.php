<?php
require 'vendor/autoload.php';
require 'bootstrap/app.php';

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== LOGIN DEBUG SCRIPT ===\n\n";

// Get all users to see what emails are registered
$users = User::all(['id', 'name', 'email', 'created_at']);

echo "REGISTERED USERS:\n";
echo "----------------\n";
foreach($users as $user) {
    echo "ID: " . $user->id . "\n";
    echo "Name: " . $user->name . "\n";
    echo "Email: " . $user->email . "\n";
    echo "Created: " . $user->created_at . "\n";
    echo "------------------------\n";
}

echo "\nTOTAL USERS: " . $users->count() . "\n\n";

// Test case: Check if a specific email exists
$testEmail = "admin@test.com"; // Change this to the email you're testing with
$user = User::where('email', $testEmail)->first();

echo "TESTING EMAIL: $testEmail\n";
echo "----------------\n";
if ($user) {
    echo "✅ Email found in database\n";
    echo "User ID: " . $user->id . "\n";
    echo "User Name: " . $user->name . "\n";

    // Test password verification
    $testPassword = "123"; // Your test password
    echo "\nTESTING PASSWORD: '$testPassword'\n";
    echo "----------------\n";

    // Get the stored password hash as string
    $storedHash = (string) $user->password;

    if (Hash::check($testPassword, $storedHash)) {
        echo "✅ Password is correct\n";
    } else {
        echo "❌ Password is incorrect\n";
        echo "Expected: Hashed password\n";
        echo "Actual: " . substr($storedHash, 0, 20) . "...\n";
    }
} else {
    echo "❌ Email not found in database\n";
    echo "This email needs to be registered first\n";
}

echo "\n=== DEBUG COMPLETE ===\n";

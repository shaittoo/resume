<?php
/**
 * Create Placeholder Images for Portfolio Projects
 * This script creates simple placeholder images for all project images
 */

// Ensure the directory exists
$uploadDir = 'public/uploads/project_images/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// List of required images from the seeder with their actual filenames
$requiredImages = [
    'oms.jpg',
    'aidentify.jpg', 
    'backinup.jpg',
    'servicefinder.jpg',
    'tedx.jpg',
    'upvdpsm.jpg',
    'wakeapp.jpg',
    'planit.jpg',
    'eHalalan.jpg', // Note the capital H
    'kuseena.jpg'
];

// Check which images are missing
$missingImages = [];
foreach ($requiredImages as $image) {
    if (!file_exists($uploadDir . $image)) {
        $missingImages[] = $image;
    }
}

if (empty($missingImages)) {
    echo "All required images already exist!\n";
    exit;
}

echo "Creating placeholder images for: " . implode(', ', $missingImages) . "\n";

// Create a simple placeholder image
function createPlaceholderImage($filename, $width = 800, $height = 600) {
    // Create image
    $image = imagecreatetruecolor($width, $height);
    
    // Colors
    $bgColor = imagecolorallocate($image, 248, 250, 252); // Light gray background
    $textColor = imagecolorallocate($image, 71, 85, 105); // Dark gray text
    $borderColor = imagecolorallocate($image, 226, 232, 240); // Border color
    $accentColor = imagecolorallocate($image, 59, 130, 246); // Blue accent
    
    // Fill background
    imagefill($image, 0, 0, $bgColor);
    
    // Draw border
    imagerectangle($image, 0, 0, $width-1, $height-1, $borderColor);
    
    // Get project name from filename
    $projectName = str_replace('.jpg', '', basename($filename));
    
    // Handle special cases
    switch ($projectName) {
        case 'eHalalan':
            $displayName = 'eHalalan';
            break;
        case 'aidentify':
            $displayName = 'AIdentify';
            break;
        case 'backinup':
            $displayName = 'BackinUP';
            break;
        case 'servicefinder':
            $displayName = 'Service Finder';
            break;
        case 'upvdpsm':
            $displayName = 'UPV DPSM';
            break;
        case 'wakeapp':
            $displayName = 'WakeApp';
            break;
        case 'planit':
            $displayName = 'PlanIt';
            break;
        case 'kuseena':
            $displayName = 'Kuseena';
            break;
        default:
            $displayName = ucfirst($projectName);
    }
    
    // Draw a simple icon placeholder (rectangle with rounded corners effect)
    $iconSize = 120;
    $iconX = ($width - $iconSize) / 2;
    $iconY = ($height - $iconSize) / 2 - 40;
    
    // Draw icon background
    imagefilledrectangle($image, $iconX, $iconY, $iconX + $iconSize, $iconY + $iconSize, $accentColor);
    
    // Add text
    $text1 = $displayName;
    $text2 = 'Project Image';
    
    // Calculate text positions
    $text1Width = strlen($text1) * 12; // Approximate width
    $text2Width = strlen($text2) * 10;
    
    $text1X = ($width - $text1Width) / 2;
    $text2X = ($width - $text2Width) / 2;
    $textY = $iconY + $iconSize + 60;
    
    // Add text
    imagestring($image, 5, $text1X, $textY, $text1, $textColor);
    imagestring($image, 3, $text2X, $textY + 25, $text2, $textColor);
    
    // Save image
    imagejpeg($image, $filename, 90);
    imagedestroy($image);
    
    echo "Created: $filename\n";
}

// Create missing images
foreach ($missingImages as $image) {
    createPlaceholderImage($uploadDir . $image);
}

echo "\nAll placeholder images created successfully!\n";
echo "You can now run your static site generation without 404 errors.\n";
echo "\nNote: These are placeholder images. You can replace them with actual project screenshots later.\n";
?> 
<?php

/**
 * Utility Script to Clean Up Literal Git Merge Conflicts in the Workspace.
 * This script scans all PHP, JS, JSON, and CSS files and resolves conflicts 
 * by keeping the "theirs" side (the Web-Profile-Laravel project's codebase).
 */

function resolveConflictsInFile($filePath) {
    $content = file_get_contents($filePath);
    
    // Check if the file has git conflict markers
    if (strpos($content, '<<<<<<< HEAD') !== false) {
        echo "Resolving conflicts in: " . $filePath . "\n";
        
        // Regex to match:
        // <<<<<<< HEAD
        // [Ours]
        // =======
        // [Theirs - captured in group 1]
        // >>>>>>> [hash or branch]
        $pattern = '/<<<<<<< HEAD[\s\S]*?=======([\s\S]*?)>>>>>>> .*/';
        
        $cleanedContent = preg_replace($pattern, '$1', $content);
        
        if ($cleanedContent !== null) {
            file_put_contents($filePath, $cleanedContent);
            echo "✔ Cleaned successfully.\n";
        } else {
            echo "✘ Failed to clean.\n";
        }
    }
}

function scanAndCleanDir($dir) {
    $ignoredDirs = ['vendor', 'node_modules', '.git', 'storage'];
    $allowedExtensions = ['php', 'js', 'json', 'css', 'html', 'md'];

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $dir . DIRECTORY_SCHEME . $file;
        if (is_dir($path)) {
            if (in_array($file, $ignoredDirs)) {
                continue;
            }
            scanAndCleanDir($path);
        } else {
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            if (in_array($ext, $allowedExtensions)) {
                resolveConflictsInFile($path);
            }
        }
    }
}

// Define the directory separator scheme
define('DIRECTORY_SCHEME', DIRECTORY_SEPARATOR);

echo "Starting Conflict Clean Up...\n";
scanAndCleanDir(__DIR__);
echo "Conflict Clean Up Finished!\n";

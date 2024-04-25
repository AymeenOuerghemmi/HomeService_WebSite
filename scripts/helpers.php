<?php


function clean($data = array())
{
    foreach ($data as $key => $val) {
        $data[$key] = trim($val);
        $data[$key] = stripslashes($val);
        $data[$key] = htmlspecialchars($val);
    }
    return $data;
}

function upload($file, $allowed = ['png', 'jpg', 'jpeg'])
{
    // If $file is an array, handle multiple files
    if (is_array($file['name'])) {
        $uploadedFiles = [];

        foreach ($file['name'] as $index => $fileName) {
            $uploadedFile = uploadSingleFile([
                'name' => $file['name'][$index],
                'type' => $file['type'][$index],
                'tmp_name' => $file['tmp_name'][$index],
                'error' => $file['error'][$index],
                'size' => $file['size'][$index]
            ], $allowed);

            if ($uploadedFile !== false) {
                $uploadedFiles[] = $uploadedFile;
            }
        }

        return $uploadedFiles;
    } else {
        // Handle single file upload
        return uploadSingleFile($file, $allowed);
    }
}

function uploadSingleFile($file, $allowed)
{
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Check if the file extension is allowed
    if (!in_array($ext, $allowed)) {
        return false;
    }

    // Generate a unique file name to prevent overwriting
    $dest = uniqid().'.'.$ext;

    // Move the uploaded file to the destination directory
    if (move_uploaded_file($file['tmp_name'], '../images/'.$dest)) {
        return $dest; // Return the unique file name
    }

    return false;
}

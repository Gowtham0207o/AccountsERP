<?php

function require_role_or_redirect(array $allowedRoles, $redirectTo)
{
    $db = database::get_connection();

    $stmt = $db->prepare("
        SELECT r.role_name
        FROM roles r
        JOIN user_roles ur ON ur.role_id = r.id
        WHERE ur.user_id = ?
    ");
    $stmt->bind_param("i", $GLOBALS['AUTH_USER']['id']);
    $stmt->execute();

    $userRoles = array_column(
        $stmt->get_result()->fetch_all(MYSQLI_ASSOC),
        'role_name'
    );

    // If user has NONE of the allowed roles → redirect
    if (!array_intersect($allowedRoles, $userRoles)) {
        header("Location: $redirectTo");
        exit;
    }
}

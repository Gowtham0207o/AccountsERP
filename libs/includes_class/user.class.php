<?php

class user
{
    /**
     * Authenticate credentials (used ONLY by OAuth authorize endpoint)
     */
    public static function authenticate($email, $password)
    {
        $conn = database::get_connection();

        $stmt = $conn->prepare(
            "SELECT id, password_hash 
             FROM users 
             WHERE email = ? AND is_active = 1"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return false;
        }

        return $user['id'];
    }

    /**
     * Fetch user by ID (used by auth_guard)
     */
    public static function findById($userId)
    {
        $conn = database::get_connection();

        $stmt = $conn->prepare(
            "SELECT id, name, email 
             FROM users 
             WHERE id = ? AND is_active = 1"
        );
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    /**
     * Fetch roles for RBAC
     */
    public static function getRoles($userId)
    {
        $conn = database::get_connection();

        $stmt = $conn->prepare("
            SELECT r.role_name
            FROM roles r
            JOIN user_roles ur ON ur.role_id = r.id
            WHERE ur.user_id = ?
        ");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        return array_column(
            $stmt->get_result()->fetch_all(MYSQLI_ASSOC),
            'role_name'
        );
    }
}

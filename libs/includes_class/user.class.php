<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /* ---------- FIND USER ---------- */
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT id, name, email, password_hash, is_active 
             FROM users 
             WHERE email = ? 
             LIMIT 1"
        );
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();
        return $user ?: null;
    }

    /* ---------- VERIFY PASSWORD ---------- */
    public function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /* ---------- GET USER ROLES ---------- */
    public function getRoles(int $userId): array
    {
        $stmt = $this->db->prepare(
            "SELECT r.role_name
             FROM roles r
             INNER JOIN user_roles ur ON ur.role_id = r.id
             WHERE ur.user_id = ?"
        );
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        return array_column($stmt->get_result()->fetch_all(MYSQLI_ASSOC), 'role_name');
    }

    /* ---------- LOGIN ---------- */
    public function login(string $email, string $password): bool
    {
        $user = $this->findByEmail($email);

        if (!$user || !$user['is_active']) {
            return false;
        }

        if (!$this->verifyPassword($password, $user['password_hash'])) {
            return false;
        }

        $roles = $this->getRoles($user['id']);

        session_regenerate_id(true);

        $_SESSION['auth'] = [
            'id'    => $user['id'],
            'name'  => $user['name'],
            'email' => $user['email'],
            'roles' => $roles
        ];

        $this->recordLogin($user['id']);

        return true;
    }

    /* ---------- LOGIN AUDIT ---------- */
    private function recordLogin(int $userId): void
    {
        $stmt = $this->db->prepare(
            "UPDATE users SET last_login_at = NOW() WHERE id = ?"
        );
        $stmt->bind_param("i", $userId);
        $stmt->execute();
    }
}

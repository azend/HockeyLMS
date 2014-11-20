<?php

class UserRoles {
	const PARENT = 0;
	const PLAYER = 1;
	const COACH = 2;
	const LEAGUE_ADMIN = 3;
	const SYSTEM_ADMIN = 4;
}

class User {
	public $userId = -1;
	public $username = '';
	public $email = '';
	public $passwordHash = '';
	public $passwordSalt = '';
	public $isActivated = false;
	public $userRole = UserRoles::PARENT;
}

class UserModel extends Model {
	function getAllUsers () {
		
	}

	function getUser($email) {
		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, passwordSalt, isActivated, userRole FROM Users WHERE email = :email LIMIT 1');
		$stmt->execute(array(
			':email' => $email
		));

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

		$user = $stmt->fetch();

		return $user;
	}
}

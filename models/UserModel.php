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
	public $isActivated = false;
	public $userRole = UserRoles::PARENT;

	// Data serialization
	function __construct() {
		$this->userId = intval($this->userId);
		$this->userRole = intval($this->userRole);
	}
}

class UserModel extends Model {
	function all () {
		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, isActivated, userRole FROM Users');
		$stmt->execute();

		$users = array();
		while($user =$stmt->fetchObject('User')) {
			$users[] = $user;
		}

		return $users;
	}

	function find($email) {
		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, isActivated, userRole FROM Users WHERE email = :email LIMIT 1');
		$stmt->execute(array(
			':email' => $email
		));

		$user = $stmt->fetchObject('User');

		return $user;
	}


	function update($user) {
		$stmt = $this->db->prepare('UPDATE Users SET username=:username, email=:email, passwordHash=:passwordHash, isActivated=:isActivated, userRole=:userRole WHERE userId=:userId');

		$stmt->execute(array(
			':userId' => $user->userId,
			':username' => $user->username,
			':email' => $user->email,
			':passwordHash' => $user->passwordHash,
			':isActivated' => $user->isActivated,
			':userRole' => $user->userRole
		));

		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, passwordSalt, isActivated, userRole FROM Users WHERE userId = :userId LIMIT 1');
		$stmt->execute(array(':userId' => $this->db->lastInsertId()));

		$user = $stmt->fetchObject('User');

		return $user;
	}

	function create($user) {
		$stmt = $this->db->prepare('INSERT INTO Users (username, email, passwordHash, isActivated, userRole) VALUES (:username, :email, :passwordHash, :isActivated, :userRole)');

		$stmt->execute(array(
			':username' => $user->username,
			':email' => $user->email,
			':passwordHash' => $user->passwordHash,
			':isActivated' => $user->isActivated,
			':userRole' => $user->userRole
		));

		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, passwordSalt, isActivated, userRole FROM Users WHERE userId = :userId LIMIT 1');
		$stmt->execute(array(':userId' => $this->db->lastInsertId()));

		$user = $stmt->fetchObject('User');

		return $user;
	}
}

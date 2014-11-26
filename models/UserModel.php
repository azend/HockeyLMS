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
}

class UserModel extends Model {
	function all () {
		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, isActivated, userRole FROM Users');
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

		$users = array();
		while($user =$stmt->fetch()) {
			$users[] = $user;
		}

		return $users;
	}

	function find($email) {
		$stmt = $this->db->prepare('SELECT userId, username, email, passwordHash, isActivated, userRole FROM Users WHERE email = :email LIMIT 1');
		$stmt->execute(array(
			':email' => $email
		));

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

		$user = $stmt->fetch();

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

		$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

		$user = $stmt->fetch();

		return $user;
	}
}

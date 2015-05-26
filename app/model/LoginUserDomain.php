<?php
namespace app\model;

use mvce\model\BusinessDomain;

class LoginUserDomain extends BusinessDomain
{
	public function doInsert(array $properties)
	{
		
	}
	
	public function doUpdate(array $properties)
	{
		
	}
	
	public function doDelete(array $properties)
	{
		
	}
	
	public function doSelect(array $properties)
	{
		$sql = "SELECT u.user_id, u.username, u.password, u.first_name, u.last_name, u.email, 
				u.role, u.salt, u.status, u.about, u.date_reg, u.date_nav, 
				u.rate, u.rate_count, u.color, u.country, 
				group_concat(DISTINCT uc.comment_id SEPARATOR ',') as 'comments', 
				group_concat(DISTINCT urc.comment_id SEPARATOR ',') as 'rated_comments', 
				group_concat(DISTINCT concat(uf.user_id, ',', uf.friend_id) SEPARATOR ',') as 'friends', 
				group_concat(DISTINCT ulg.game_id SEPARATOR ',') as 'liked_games', 
				group_concat(DISTINCT upg.game_id SEPARATOR ',') as 'played_games', 
				group_concat(DISTINCT uug.game_id SEPARATOR ',') as 'uploaded_games',
				group_concat(DISTINCT gr.game_id SEPARATOR ',') as 'rated games' 
				FROM `user` u left outer join user_comment uc using (user_id) 
				left outer join user_friend uf on u.user_id = uf.user_id OR u.user_id=uf.friend_id 
				left outer join user_liked_game ulg on u.user_id=ulg.user_id 
				left outer join user_played_game upg on u.user_id=upg.user_id 
				left outer join user_uploaded_game uug on u.user_id=uug.user_id 
				left outer join user_rating_comment urc on u.user_id=urc.rating_user_id 
				left outer join game_rating gr on u.user_id=gr.user_id 
				where u.username= :USERNAME;";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(":USERNAME", $properties['username'], \PDO::PARAM_STR);
		$stmt->execute();
		
		if($stmt->rowCount() == 1)
		{
			return $stmt->fetch();	
		}	
	}
	
}
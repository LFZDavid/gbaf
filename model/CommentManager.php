<?php

class CommentManager extends Manager
{
	protected $table = 'comments';
	protected $classManaged = 'Comment';

	public function add(Comment $comment)
	{
		$q = $this->db->prepare('INSERT INTO comments(id_user, id_actor, date_add, content) VALUES(:id_user, :id_actor, :content)');
		$q->bindValue(':id_user' , $comment->id_user());
		$q->bindValue(':id_actor' , $comment->id_actor());
		$q->bindValue(':date_add' , time());
		$q->bindValue(':content' , $comment->content());
		$q->execute();
	}

	public function getListByActor($id_actor)
	{
		$q = $this->db->prepare('
			SELECT
			comments.id,
			comments.id_user,
			comments.date_add,
			comments.content,
			users.firstname AS user_name
			FROM comments
			INNER JOIN users ON users.id = comments.id_user
			WHERE id_actor = :id_actor
			ORDER BY comments.date_add DESC
			');
		$q->bindValue(":id_actor", $id_actor, PDO::PARAM_INT);
		$q->execute();
		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classManaged);
		$list = $q->fetchAll();
		return $list;
	}

	public function count($id_actor)
	{
		$q = $this->db->prepare('SELECT id FROM comments WHERE id_actor = :id_actor');
		$q->bindValue(':id_actor', $id_actor, PDO::PARAM_INT);
		$q->execute();
		$nbComment = $q->rowCount();
		return $nbComment;
	}
}
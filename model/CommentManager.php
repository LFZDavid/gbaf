<?php

class CommentManager extends Manager{

	function add(Comment $comment){
		$q = $this->db->prepare('INSERT INTO comments(id_user, id_actor, date_add, content) VALUES(:id_user, :id_actor, :content'));
		
		$q->bindValue(':id_user' , $comment->id_user());
		$q->bindValue(':id_actor' , $comment->id_actor());
		$q->bindValue(':date_add' , time());
		$q->bindValue(':content' , $comment->content());

		$q->execute();

	}

	function update(Comment $comment){
		$q = $this->db->prepare('UPDATE comments SET id_user = :id_user, id_actor = :id_actor, date_add = :date_add, content = :content WHERE id = :id');
		
		$q->bindValue(':id_user' , $comment->id_user());
		$q->bindValue(':id_actor' , $comment->id_actor());
		$q->bindValue(':date_add' , time());
		$q->bindValue(':content' , $comment->content());
		
		$q->execute();

	}

	function delete($id){
		$q = $this->db->prepare('DELETE FROM comments WHERE id = ?');
		$q->execute($id);
	}

	function getList(){
		$q = $this->db->query('SELECT comments.id, comments.date_add, comments.content, actors.name, users.firstname 
			FROM comments 
			INNER JOIN actors ON comments.id_actor = actors.id 
			INNER JOIN users ON comments.id_user = users.id
			ORDER BY date_add DESC');

		$list = $q->fetchAll();
		return $list;
	}

	function getUnique($id){
		$q = $this->db->prepare('SELECT comments.id, comments.date_add, comments.content, actors.name, users.firstname 
			FROM comments 
			INNER JOIN actors ON comments.id_actor = actors.id 
			INNER JOIN users ON comments.id_user = users.id
			WHERE comments.id = :id');
		$q->bindValue(':id', (int) $id, PDO::PARAM_INT);
		$q->execute();

		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

		$comment = $q->fetch();

		return $comment;
	}

	function count(){

		return = $this->db->query('SELECT COUNT(*) FROM comments');
	}
}
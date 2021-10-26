<?php

namespace Repository {

    use Model\Comment;
    use PDO;

    interface CommentRepository
    {
        function insert(Comment $comment): Comment;

        function findById(int $id): ?Comment;

        function findAll(): array;
    }

    class CommentRepositoryImpl implements CommentRepository
    {
        private PDO $connection;

        public function __construct(PDO $connection)
        {
            $this->connection = $connection;
        }

        /**
         * Insert new comment.
         *
         * @param Comment $comment
         * @return Comment
         */
        function insert(Comment $comment): Comment
        {
            $sql = "INSERT INTO comments(email, comment) VALUES (?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                $comment->getEmail(),
                $comment->getComment()
            ]);

            $id = $this->connection->lastInsertId();
            $comment->setId($id);

            return $comment;
        }

        /**
         * Find comment by id.
         *
         * @param int $id
         * @return Comment|null
         */
        function findById(int $id): ?Comment
        {
            $sql = "SELECT * FROM comments WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);

            if ($row = $statement->fetch()) {
                return new Comment($row["id"], $row["email"], $row["comment"]);
            } else {
                return null;
            }
        }

        /**
         * Get all comments.
         *
         * @return array
         */
        function findAll(): array
        {
            $sql = "SELECT * FROM comments";
            $statement = $this->connection->query($sql);

            $array = [];

            while ($row = $statement->fetch()) {
                $array[] = new Comment($row["id"], $row["email"], $row["comment"]);
            }

            return $array;
        }
    }
}
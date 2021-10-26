<?php

namespace Model {

    class Comment
    {
        private int $id;
        private string $email;
        private string $comment;

        public function __construct($id, $email, $comment)
        {
            $this->id = $id;
            $this->email = $email;
            $this->comment = $comment;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getComment(): string
        {
            return $this->comment;
        }

        /**
         * @param string $comment
         */
        public function setComment(string $comment): void
        {
            $this->comment = $comment;
        }
    }

}
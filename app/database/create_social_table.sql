-- tables
-- Table: Comments
drop table if exists Comments;

CREATE TABLE Comments (
    id integer NOT NULL  PRIMARY KEY AUTOINCREMENT,
    Message varchar(255) NOT NULL,
    Name varchar(20) NOT NULL,
    postid INTEGER NOT NULL REFERENCES Posts(id)
);

-- Table: Posts
drop table if exists Posts;

CREATE TABLE Posts (
    id integer NOT NULL  PRIMARY KEY AUTOINCREMENT,
    Name varchar(20) NOT NULL,
    Message varchar(255) NOT NULL,
    Title varchar(20) NOT NULL,
    Commentsum integer DEFAULT '0'
);

insert into Posts values (null, "joel", "lol","sss",3);


create database SoccerQuiz_php;

grant all on SoccerQuiz_php.* to dbuser@localhost identified by 'mu4uJsif';

use SoccerQuiz_php

create table users (
  id int not null auto_increment primary key,
  username varchar(255),
  score int
);

desc users;

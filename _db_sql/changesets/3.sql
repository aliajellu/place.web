insert into activity_type (run_id, author_id, name) values (1,1,'created journal entry');

alter table `question` ADD `allow_multipe_answer` int not null DEFAULT '0' AFTER `is_public`;

update `example` set type=1;
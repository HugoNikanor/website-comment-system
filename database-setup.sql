CREATE database IF NOT EXISTS website_comments;

USE website_comments;

CREATE TABLE IF NOT EXISTS blog_prod
(
	id       int(10)        NOT  NULL auto_increment,
	entry    varchar(255)   NOT  NULL,
	author   varchar(40)    NOT  NULL,
	time     timestamp      NOT  NULL DEFAULT CURRENT_TIMESTAMP,
	comment  varchar(2047)  NOT  NULL,
	parent   int(10)        NOT  NULL DEFAULT 0,

	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS blog_test
(
	id       int(10)        NOT  NULL auto_increment,
	entry    varchar(255)   NOT  NULL,
	author   varchar(40)    NOT  NULL,
	time     timestamp      NOT  NULL DEFAULT CURRENT_TIMESTAMP,
	comment  varchar(2047)  NOT  NULL,
	parent   int(10)        NOT  NULL DEFAULT 0,

	PRIMARY KEY (id)
);

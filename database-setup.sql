CREATE TABLE comments
(
	id       int(10)        NOT  NULL auto_increment,
	entry    varchar(255)   NOT  NULL,
	author   varchar(40)    NOT  NULL,
	time     timestamp      NOT  NULL DEFAULT CURRENT_TIMESTAMP,
	comment  varchar(2047)  NOT  NULL,

	PRIMARY KEY (id)
);

CartaCartaCREATE TABLE amministratori
(
	username varchar(20) PRIMARY KEY,
	password varchar(20) NOT NULL
);
INSERT INTO amministratori(username, password) VALUES ('admin', 'admin');

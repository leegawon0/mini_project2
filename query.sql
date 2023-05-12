CREATE DATABASE minitwo;

USE minitwo;

CREATE TABLE user_info(
	u_no INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(12) NOT null
	,u_pw VARCHAR(512) NOT NULL
);

INSERT INTO user_info(u_id, u_pw) VALUES('php506', '506');

COMMIT;
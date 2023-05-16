-- 데이터베이스 / 테이블 만들기
CREATE DATABASE minitwo;
USE minitwo;
CREATE TABLE user_info(
	u_no INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(12) NOT null
	,u_pw VARCHAR(512) NOT NULL
);
INSERT INTO user_info(u_id, u_pw) VALUES('php506', '506');
COMMIT;

-- 아이디 중복생성 안되게 만들기
ALTER TABLE user_info
MODIFY COLUMN u_id VARCHAR(12) UNIQUE;

-- 탈퇴 플래그 만들기
ALTER TABLE user_info
ADD d_flg ENUM('0', '1') DEFAULT '0';

-- 회원 이름 칼럼 만들기
ALTER TABLE user_info
ADD COLUMN u_name VARCHAR(30) NOT NULL;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Disscussion;
DROP TABLE IF EXISTS TrophyAcquired;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Course;
DROP TABLE IF EXISTS Trophy;
DROP TABLE IF EXISTS Topic;
DROP TABLE IF EXISTS  ;



CREATE TABLE Ranking(
    idRank INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    PRIMARY KEY (idRank)
);

CREATE TABLE Topic(
    idTopic INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    PRIMARY KEY (idTopic)
);

CREATE TABLE Trophy(
    idTrophy INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    PRIMARY KEY (idTrophy)
);

CREATE TABLE Course(
    idCourse INT NOT NULL AUTO_INCREMENT,
    idTopic INT NOT NULL,
    idRank INT NOT NULL,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    PRIMARY KEY (idCourse),
    FOREIGN KEY (idTopic) REFERENCES Topic(idTopic),
    FOREIGN KEY (idRank) REFERENCES Ranking(idRank)
);

CREATE TABLE User(
    idUser INT NOT NULL AUTO_INCREMENT,
    idRank INT NOT NULL,
    userName VARCHAR(30) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mdp VARCHAR(100) NOT NULL,
    level INT NOT NULL,
    xp DECIMAL NOT NULL,
    PRIMARY KEY (idUser),
    FOREIGN KEY (idRank) REFERENCES Ranking(idRank)
);

CREATE TABLE Disscussion(
    idDisscussion INT NOT NULL AUTO_INCREMENT,
    idUser INT NOT NULL,
    title VARCHAR(30) NOT NULL,
    content TEXT NOT NULL,
    dateCreation DATE NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (idDisscussion),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);

CREATE TABLE Comment(
    idComment INT NOT NULL AUTO_INCREMENT,
    idUser INT NOT NULL,
    idDisscussion INT NOT NULL,
    content TEXT NOT NULL,
    dateCreation DATE NOT NULL DEFAULT current_timestamp(),
    dateUpdate DATE NULL,
    PRIMARY KEY (idComment),
    FOREIGN KEY (idUser) REFERENCES User(idUser),
    FOREIGN KEY (idDisscussion) REFERENCES Disscussion(idDisscussion)
);

CREATE TABLE TrophyAcquired(
    idTrophy INT NOT NULL,
    idUser INT NOT NULL,
    dateObtention DATE NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (idTrophy,idUser),
    FOREIGN KEY (idTrophy) REFERENCES Trophy(idTrophy),
    FOREIGN KEY (idUser) REFERENCES User(idUser)
);
<?php include 'top.php'; ?>
<main>
    <h2>Create table statement for submissions via Contact page</h2>
    <pre>
CREATE TABLE tblContacts (
pmkContactID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
fldEmail VARCHAR(50) DEFAULT NULL,
fldFirstName VARCHAR(50) DEFAULT NULL,
fldLastName VARCHAR(50) DEFAULT NULL,
fldWebsite TINYINT(1) DEFAULT NULL,
fldArt TINYINT(1) DEFAULT NULL,
fldWriting TINYINT(1) DEFAULT NULL,
fldUrgency VARCHAR (40) DEFAULT NULL,
fldDescription TEXT,
fldPets VARCHAR (10) DEFAULT NULL
)
    </pre>

    <h2>Create table statement for display data requirement</h2>
    <pre>
CREATE TABLE softwareKnowledge (
pmkID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
fldName VARCHAR(30) DEFAULT NULL, 
fldType VARCHAR(30) DEFAULT NULL, 
fldCompetency INT DEFAULT NULL, 
fldYearLearned INT DEFAULT NULL
);
    </pre>

    <h2>Insert statement</h2>
    <pre>
INSERT INTO `softwareKnowledge`(`fldName`, `fldType`, `fldCompetency`, `fldYearLearned`) 
VALUES 
('Blender','Art','5','2020'),
('Godot','Game Design','2','2022'),
('Unity','Game Design','3','2021'),
('Photoshop','Art','5','2013'),
('Premiere','Video Editing','5','2013');
    </pre>

</main>
<?php include 'footer.php'; ?>
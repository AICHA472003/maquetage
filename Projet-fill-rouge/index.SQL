1. Creer la table CATEGORIE
CREATE TABLE CATEGORIE (
    id_categorie INT AUTO_INCREMENT,
    nom_categorie VARCHAR(100) NOT NULL,
    CONSTRAINT PK_CATEGORIE PRIMARY KEY (id_categorie)
);

CREATE TABLE RECETTE (
    id_recette INT AUTO_INCREMENT,
    titre_recette VARCHAR(150) NOT NULL,
    image_url VARCHAR(255),
    ingredients TEXT,        
    preparation TEXT,       
    id_categorie INT,       
    CONSTRAINT PK_RECETTE PRIMARY KEY (id_recette),
    CONSTRAINT FK_RECETTE_CATEGORIE FOREIGN KEY (id_categorie) REFERENCES CATEGORIE(id_categorie)
);